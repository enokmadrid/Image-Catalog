<?php

namespace App\Http\Controllers;

use App\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DesignController extends Controller {

    /**
     * DesignController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // get all the designs of the user
        $designs = Auth::user()->designs;

        // load the view and pass the designs
        return view('designs.index')->with('designs', $designs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // load the create form (app/views/designs/create.blade.php)
        return view('designs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        // validate
        $request->validate([
            'name'      => 'required',
            'number'    => 'required',
            'price'     => 'required | numeric',
            'image'     => 'required | mimes:jpeg,png,jpg | max:2048',
        ]);

        // Move Image
        $imagePath = "";


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() .'-'. $file->getClientOriginalName();

            $newPath = public_path('images');
            $imagePath = 'images/'.$imageName;
            $file->move($newPath, $imageName);
        }

        $design = [
            'name'  => $request->name,
            'number'=> $request->number,
            'price' => $request->price,
            'image' => $imagePath,
        ];

        // create and store by this user
        Auth::user()->designs()->create($design);

        // redirect
        Session::flash('message', 'Successfully created design!');
        return Redirect::to('designs');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(Design $design) {
        // show the view and pass the design to it
        return view('designs.show', compact('design'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(Design $design) {
        //
        return view('designs.edit', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Design $design) {
        // validate
        $request->validate([
            'name'      => 'required',
            'number'    => 'required',
            'price'     => 'required | numeric',
        ]);

        $design->fill($request->except('image'));

        // Move Image
        if ($request->hasFile('image')) {

            // validate image file
            $request->validate(['image' => 'required | mimes:jpeg,png,jpg | max:2048']);

            $file = $request->file('image');
            $imageName = time() .'-'. $file->getClientOriginalName();

            $newPath = public_path('images');
            $imagePath = 'images/'.$imageName;
            $file->move($newPath, $imageName);

            // update image path to the design item
            $design['image'] = $imagePath;
        }

        $design->save();

        // redirect
        Session::flash('message', 'Successfully Updated design!');
        return Redirect::to('designs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(Design $design) {
        // delete design
        $design->delete();

        Session::flash('message', 'Design deleted successfully!');
        return Redirect::to('designs');
    }
}
