<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use File;

class ProgramController extends Controller
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
        $programs = Program::all();

        return view('program.index', compact(['programs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);

        return view('program.show', compact(['program']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('program.create');
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
            'description' => 'required',
            'objective' => 'required',
            'price' => 'required',
            'seat' => 'required',
            'category' => 'required',
            'durasi' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg',
        ]);

        $dir = 'img/program/';
        $extension = strtolower($request->file('photo')->getClientOriginalExtension()); // get image extension
        $fileName = str_random() . '.' . $extension; // rename image
        $request->file('photo')->move($dir, $fileName);

        Program::create([
            'name' => $request->name,
            'photo' => $dir . $fileName,
            'description' => $request->description,
            'objective' => $request->objective,
            'price' => $request->price,            
            'seat' => $request->seat,
            'category' => $request->category,
            'durasi' => $request->durasi,
            'price_k' => substr($request->price,0,-3) . 'K',
        ]);

        return redirect()->route('program.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);

        return view('program.edit', compact(['program']));
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
        $program = Program::findOrFail($id);

        $program->name = $request->name;
        $program->description = $request->description;
        $program->objective = $request->objective;
        $program->price = $request->price;
        $program->price_k = substr($request->price,0,-3) . 'K';
        $program->seat = $request->seat;
        $program->durasi = $request->durasi;
        $program->category = $request->category;

        if ($request->hasFile('photo')) {
            $dir = 'img/program/';
            if (($program->photo != '') && ($program->photo != 'img/program/comingsoon.png') && (File::exists($program->photo))){
                File::delete($program->photo);
            }
            $extension = strtolower($request->file('photo')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('photo')->move($dir, $fileName);
            $program->photo = $dir . $fileName;
        }

        $program->save();

        return redirect()->route('program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('program.index');
    }

    /**
     * Change status the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $program = Program::findOrFail($id);
        $program->status = !$program->status;
        $program->save();

        return redirect()->route('program.index');
    }
}
