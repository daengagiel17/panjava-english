<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\Program;
use Yajra\Datatables\Datatables;
use DB;

class RegistrasiController extends Controller
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
    public function index(DataTables $dataTables, Request $request)
    {
        $registrations = Registration::with('program')->get();

        if(request()->ajax())
        {
            if($request->program)
            {
                $registrations = $registrations->where('program_id', $request->program);
            }

            if($request->status)
            {
                $registrations = $registrations->where('status', $request->status);
            }
    
            return $dataTables->collection($registrations)
                    ->addColumn('status', function(Registration $registration) {
                        if($registration->status == 'registrasi')
                        {
                            return '<td><span class="badge bg-danger">'.$registration->status.'</span></td>';
                        }

                        return '<td><span class="badge bg-success">'.$registration->status.'</span></td>';                        
                    })
                    ->addColumn('action', function (Registration $registration) {
                        if($registration->status == 'bayar')
                        {
                            return '<a href="'.route('registration.show', ['id' => $registration->id]).'" class="btn btn-sm btn-info"><i class="fas fa-bars"></i></a>';    
                        }
                        return '<a href="'.route('registration.show', ['id' => $registration->id]).'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        <button data-id="'.$registration->id.'" class="btn btn-sm btn-primary btn-update"><i class="fas fa-edit"></i></button>
                        <button data-id="'.$registration->id.'" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>';
                    })
                    ->rawColumns(['status', 'action'])
                    ->addIndexColumn()
                    ->toJson();    
        }

        $programs = Program::all();

        $banner = $this->banner();

        return view('registration.index', compact(['programs', 'banner']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registration = Registration::findOrFail($id);

        return view('registration.show', compact(['registration']));
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
        $registration = Registration::find($id);

        if(isset($registration->registration_diskon_id))
        {
            $id = Registration::where('registration_diskon_id', $registration->registration_diskon_id)->pluck('id');
            Registration::whereIn('id', $id)->update(['status'=>'bayar']);
        }
        else
        {
            Registration::where('id', $id)->update(['status'=>'bayar']);
        }

        $banner = $this->banner();

        return response()->json($banner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Registration::destroy($id);

        $banner = $this->banner();

        return response()->json($banner);
    }

    private function banner()
    {
        $registration_today = Registration::whereDate('created_at', date_create())->count();

        $registration = Registration::count();        

        $paid_off = Registration::where('status', 'bayar')->count();
        $persen = round(($paid_off / $registration * 100) , 1) ;

        $day = Registration::select(DB::raw('DATE(created_at)'))->distinct()->get()->count();
        $average_registration = round(($registration / $day), 1);

        return [$registration_today, $registration, $persen, $average_registration];
    }
}
