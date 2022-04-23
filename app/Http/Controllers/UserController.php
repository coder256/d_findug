<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'regex:/^[\+]?(\d{10}|\d{12})$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = new User([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'tel' => $request->get('tel'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'status' => $request->get('status'),
            'password' => Hash::make($request->get('password')),
        ]);

        if ($user->save()) {
            session()->flash('message_success', 'User account has been created.');
        } else {
            session()->flash('message_fail', 'User account has not been added.');
        }

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View|Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View|Response
     */
    public function edit(User $user)
    {
        return view('admins.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, User $user)
    {
        if ($request->get('part') == 'data') {
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name'  => ['required', 'string', 'max:255'],
                'tel'        => ['required', 'string', 'max:255'],
                'email'      => ['required', 'string', 'email', 'max:255'],
                'role'       => ['required', 'string'],
            ]);

            if ($user->update($request->all())) {
                session()->flash('message_success', 'User updated successfully.');
            } else {
                session()->flash('message_fail', 'User not updated successfully.');
            }
        } else {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);

            $result = $user->update(array(
                'password' => Hash::make($request->get('password'))
            ));

            if ($result) {
                session()->flash('message_success', 'User updated successfully.');
            } else {
                session()->flash('message_fail', 'User not updated successfully.');
            }
        }

        return redirect('/user/' . $user->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            session()->flash('message_success', 'User deleted successfully.');
        } else {
            session()->flash('message_fail', 'User not deleted successfully.');
        }

        return redirect('/user');
    }
}
