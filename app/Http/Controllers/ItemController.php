<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ItemController extends Controller
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
        $items = DB::table('items')->get();

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('items.create');
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
            'name' => ['required', 'string', 'max:255'],
            'found_in' => ['required', 'string', 'max:255'],
            'main_image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'other_images.*' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        $item = new Item([
            'name' => $request->get('name'),
            'found_in' => $request->get('found_in'),
            'created_by' => Auth::user()->id,
        ]);

        if ($item->save()) {
            $imageNames = [];
            $mainImage = $item->id . '-main.' . $request->file('main_image')->extension();
            $request->file('main_image')->move(public_path() . '/items/', $mainImage);

            $counter = 1;
            foreach ($request->file('other_images') as $image) {
                $name = $item->id . '-' . $counter . '.' . $image->extension();
                $image->move(public_path() . '/items/', $name);
                $imageNames[] = $name;
                $counter++;
            }

            $item->update(
                array(
                    'main_image' => $mainImage,
                    'other_images' => implode(',', $imageNames))
            );

            session()->flash('message_success', 'Item has been created.');
        } else {
            session()->flash('message_fail', 'Item has not been added.');
        }

        return redirect('/item');
    }

    /**
     * Display the specified resource.
     *
     * @param Item $item
     * @return Application|Factory|View|Response
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Item $item
     * @return Application|Factory|View|Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Item $item
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, Item $item)
    {
        if ($request->get('part') == 'data') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'found_in' => ['required', 'string', 'max:255'],
                'status' => ['required', 'integer'],
            ]);

            if ($item->update($request->all())) {
                session()->flash('message_success', 'Item updated successfully.');
            } else {
                session()->flash('message_fail', 'Item not updated successfully.');
            }
        } else {
            $request->validate([
                'main_image' => 'required|mimes:jpeg,jpg,png|max:2048',
                'other_images.*' => 'mimes:jpeg,jpg,png|max:2048'
            ]);

            $imageNames = [];
            $mainImage = $item->id . '-main.' . $request->file('main_image')->extension();
            $request->file('main_image')->move(public_path() . '/items/', $mainImage);

            $counter = 1;
            foreach ($request->file('other_images') as $image) {
                $name = $item->id . '-' . $counter . '.' . $image->extension();
                $image->move(public_path() . '/items/', $name);
                $imageNames[] = $name;
                $counter++;
            }

            $result = $item->update(
                array(
                    'main_image' => $mainImage,
                    'other_images' => implode(',', $imageNames))
            );

            if ($result) {
                session()->flash('message_success', 'Item updated successfully.');
            } else {
                session()->flash('message_fail', 'Item not updated successfully.');
            }
        }

        return redirect('/item/' . $item->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $item
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function destroy(Item $item)
    {
        if ($item->delete()) {
            session()->flash('message_success', 'Item deleted successfully.');
        } else {
            session()->flash('message_fail', 'Item not deleted successfully.');
        }

        return redirect('/item');
    }
}
