<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Diskon;

class DiskonController extends Controller
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
        $diskons = Diskon::all();

        return view('diskon.index', compact(['diskons']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diskon = Diskon::findOrFail($id);

        return view('diskon.show', compact(['diskon']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();

        return view('diskon.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Diskon::create([
            'program_id' => $request->program_id,
            'banyak' => $request->banyak,
            'batas' => $request->batas,
            'price' => $request->price,
            'price_k' => substr($request->price, 0, -3) . 'K',
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir
        ]);

        return redirect()->route('diskon.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diskon = Diskon::findOrFail($id);

        return view('diskon.edit', compact(['diskon']));
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
        $diskon = Diskon::findOrFail($id);
        $diskon->banyak = $request->banyak;
        $diskon->batas = $request->batas;
        $diskon->price = $request->price;
        $diskon->price_k = substr($request->price, 0, -3) . 'K';
        $diskon->tanggal_awal = $request->tanggal_awal;
        $diskon->tanggal_akhir = $request->tanggal_akhir;
        $diskon->save();

        return redirect()->route('diskon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diskon = Diskon::findOrFail($id);

        $diskon->delete();

        return redirect()->route('diskon.index');
    }
}
