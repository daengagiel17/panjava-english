<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use File;
use Yajra\Datatables\Datatables;
use DB;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(DataTables $dataTables, Request $request)
    {
        if(request()->ajax())
        {    
            $tutors = Tutor::all();

            return $dataTables->collection($tutors)
                    ->addColumn('photo', function(Tutor $tutor) {
                        return '<img src="'.asset($tutor->photo).'" alt="Foto tutor" width="80px" height="80px">';                        
                    })
                    ->addColumn('action', function (Tutor $tutor) {
                        return '<a href="'.route('tutor.show', ['id' => $tutor->id]).'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        <a href="'.route('tutor.edit', ['id' => $tutor->id]).'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <button data-id="'.$tutor->id.'" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>';
                    })
                    ->rawColumns(['photo', 'action'])
                    ->addIndexColumn()
                    ->toJson();    
        }

        return view('tutor.index');
    }

    public function show($id)
    {
        $tutor = Tutor::findOrFail($id);

        return view('tutor.show', compact(['tutor']));
    }

    public function create()
    {
        return view('tutor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'job' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg',
            'description' => 'required',
        ]);

        $dir = 'img/tutor/';
        $extension = strtolower($request->file('photo')->getClientOriginalExtension()); // get image extension
        $fileName = str_random() . '.' . $extension; // rename image
        $request->file('photo')->move($dir, $fileName);

        $tutor = Tutor::create([
            'name' => $request->name,
            'job' => $request->job,
            'description' => $request->description,
            'photo' => $dir . $fileName,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
        ]);

        return redirect()->route('tutor.index');
    }

    public function edit($id)
    {
        $tutor = Tutor::findOrFail($id);

        return view('tutor.edit', compact(['tutor']));
    }

    public function update(Request $request, $id)
    {
        $tutor = Tutor::findOrFail($id);

        if ($request->hasFile('photo')) {
            $dir = 'img/tutor/';
            if (File::exists($tutor->photo))
            {
                File::delete($tutor->photo);
            }
            $extension = strtolower($request->file('photo')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('photo')->move($dir, $fileName);
            $tutor->photo = $dir . $fileName;
        }

        $tutor->name = $request->name;
        $tutor->job = $request->job;
        $tutor->description = $request->description;
        $tutor->facebook = $request->facebook;
        $tutor->twitter = $request->twitter;
        $tutor->instagram = $request->instagram;
        $tutor->save();

        return redirect()->route('tutor.index');
    }

    public function destroy($id)
    {
        $tutor = Tutor::findOrFail($id);
        $tutor->delete();

        return response()->json($tutor);
    }
}
