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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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

            if ($request->hasFile('other_images')) {
                $counter = 1;
                foreach ($request->file('other_images') as $image) {
                    $name = $item->id . '-' . $counter . '.' . $image->extension();
                    $image->move(public_path() . '/items/', $name);
                    //Storage::disk('public')->put('items/'.$name, $image);
                    $imageNames[] = $name;
                    $counter++;
                }
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
        $generateImagePath = function ($filename) {
            return public_path() . '/items/' . $filename;
        };
        $image = public_path() . '/items/' . $item->main_image;
        $images = array_map($generateImagePath, explode(',',$item->other_images));
        array_push($images,$image);

        if ($item->delete()) {
            $fd = false;
            if (File::delete($images)) {
                $fd = true;
            }
            session()->flash('message_success', 'Item deleted successfully ::' . $fd);
        } else {
            session()->flash('message_fail', 'Item not deleted successfully.');
        }

        return redirect('/item');
    }

    public function pending(Request $request) {
        $items = Item::where('status', '0')->get();
        //$items = DB::table('items')->where('status', false)->get();

        return view('items.pending', [
            'items' => $items
        ]);
    }

    public function taken(Request $request) {
        $items = Item::where('recovered', 'yes')->get();

        return view('items.taken', [
            'items' => $items
        ]);
    }

    public function approve(Request $request) {
        $item = Item::find($request->id);
        $item->status = $request->status;
        if ($item->save()) {
            session()->flash('message_success', 'Item approved successfully.');
        } else {
            session()->flash('message_fail', 'Item not approved successfully.');
        }
        return back();
    }
}
