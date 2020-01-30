<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\DetailProgram;

class DetailProgramController extends Controller
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
        $detailPrograms = DetailProgram::all();

        return view('detail-program.index', compact(['detailPrograms']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();

        return view('detail-program.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DetailProgram::create([
            'program_id' => $request->program_id,
            'name' => $request->name,
        ]);

        return redirect()->route('detail-program.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailProgram = DetailProgram::findOrFail($id);

        return view('detail-program.edit', compact(['detailProgram']));
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
        $detailProgram = DetailProgram::findOrFail($id);
        $detailProgram->name = $request->name;
        $detailProgram->save();

        return redirect()->route('detail-program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailProgram = DetailProgram::findOrFail($id);
        $detailProgram->delete();

        return redirect()->route('detail-program.index');
    }
}
