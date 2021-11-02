<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Iphone;
use Illuminate\Http\Request;
use function Composer\Autoload\includeFile;

class IphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iphones = Iphone::all();
        $iphones1 = Iphone::all();

        if (auth()->user()) {

            return view('admin.index', compact('iphones'));
            //
        } elseif (abort(404)) ;
        return view('pages.home', compact('iphones1'));
    }

    public function index1()
    {
        $iphones1 = Iphone::all();

        return view('pages.home', compact('iphones1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iphones = Iphone::all();
        if (auth()->user()) {

            return view('admin.create', compact('iphones'));

        } elseif (abort(404)) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'message' => 'required|max:255',
        ]);


        $iphone = Iphone::create($attributes->except(['file_path', '_token']));


        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('public/images/', $filename);
            $iphone->images()->create([
                'file_path' => $filename
            ]);
        }
        return redirect('admin/index')->with('success', 'Iphone has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Iphone $iphone
     * @return \Illuminate\Http\Response
     */
    public function show(Iphone $iphone)
    {
        return view('admin/show', compact('iphone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Iphone $iphone
     * @return \Illuminate\Http\Response
     */
    public function edit(Iphone $iphone)
    {
        if (auth()->user()) {
            //
            return view('admin/edit', compact('iphone'));
        } elseif (abort(404)) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Iphone $iphone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Iphone $iphone)
    {
        $iphone->name = $request->name;
        $iphone->price = $request->price;
//        $iphone->file_path = $request->file_path;
        $iphone->message = $request->message;
        $iphone->is_active = $request->is_active;
        if ($request->hasFile('file_path')) {
            $destination = 'uploads/images/' . $iphone->file_path;
            $file = $request->file('file_path');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('public/images/', $filename);
            $iphone->file_path = $filename;
        }
        $iphone->save();
        return redirect('admin/index')->with('success', 'Part has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Iphone $iphone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iphone $iphone)
    {
        //
        $iphone->delete();
        return redirect('/admin/index')->with('success', 'Iphone has been deleted');
    }
}

