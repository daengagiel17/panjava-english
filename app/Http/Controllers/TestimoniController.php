<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Testimoni;
use File;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $testimonis = Testimoni::all();

        return view('testimoni.index', compact(['testimonis']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        return view('testimoni.show', compact(['testimoni']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();

        return view('testimoni.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg',
            'description' => 'required',
        ]);

        $dir = 'img/testimoni/';
        $extension = strtolower($request->file('photo')->getClientOriginalExtension()); // get image extension
        $fileName = str_random() . '.' . $extension; // rename image
        $request->file('photo')->move($dir, $fileName);

        $testimoni = Testimoni::create([
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'description' => $request->description,
            'photo' => $dir . $fileName,
        ]);
        
        return redirect()->route('testimoni.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        return view('testimoni.edit', compact(['testimoni']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if ($request->hasFile('photo')) {
            $dir = 'img/testimoni/';
            if (File::exists($testimoni->photo))
            {
                File::delete($testimoni->photo);
            }
            $extension = strtolower($request->file('photo')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('photo')->move($dir, $fileName);
            $testimoni->photo = $dir . $fileName;
        }

        $testimoni->name = $request->name;
        $testimoni->jabatan = $request->jabatan;
        $testimoni->description = $request->description;
        $testimoni->save();

        return redirect()->route('testimoni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $testimoni->delete();

        return redirect()->route('testimoni.index');
    }
}
