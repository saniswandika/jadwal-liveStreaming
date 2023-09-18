<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\inventaris;
use App\Models\pemakaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class pemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $checkRoles ;
    function __construct()
    {
         $this->middleware('permission:pemakaian-list|pemakaian-create|pemakaian-edit|pemakaian-delete', ['only' => ['index','show']]);
         $this->middleware('permission:pemakaian-create', ['only' => ['create','store']]);
         $this->middleware('permission:pemakaian-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pemakaian-delete', ['only' => ['destroy']]);
         $this->checkRoles = new RoleController;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $checkRoles = $this->checkRoles->getRoles();
        $jadwals = Event::all();
        $pemakaian = pemakaian::all();
       
        $barang = inventaris::orderByDesc('created_at')->get();

        return view('pemakaians.index',compact('pemakaian','barang','jadwals','checkRoles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkRoles = $this->checkRoles->getRoles();
        return view('pemakaians.create',compact('checkRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data['Nama_Pemakaian'] = $request->get('Nama_Pemakaian');
        $data['Nama_barang'] = $request->get('Nama_barang');
        // $data['end_date'] = $request->get('end_date');
        $data['tanggal_pakai'] = $request->get('tanggal_pakai');
        $data['jam_mulai'] = $request->get('jam_mulai');
        $data['jam_selesai'] = $request->get('jam_selesai');
        $data['Keterangan'] = $request->get('Keterangan');
        $data['Nama_barang'] = json_encode($request->Nama_barang);
        $data['pj_pemakaian'] = Auth::user()->name;

        $post = pemakaian::create($data);
        return redirect()->route('pemakaians.index')
                        ->with('success','pemakaian created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pemakaian  $pemakaian
     * @return \Illuminate\Http\Response
     */
    public function show(pemakaian $pemakaian)
    {   
        $checkRoles = $this->checkRoles->getRoles();
        return view('pemakaian.show',compact('pemakaian','checkRoles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pemakaian  $pemakaian
     * @return \Illuminate\Http\Response
     */
    public function edit(pemakaian $pemakaian)
    {   

        $checkRoles = $this->checkRoles->getRoles();
        return view('pemakaians.edit',compact('pemakaian','checkRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pemakaian  $pemakaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pemakaian $pemakaian)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $pemakaian->update($request->all());

        return redirect()->route('pemakaians.index')
                        ->with('success','pemakaian updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pemakaian  $pemakaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(pemakaian $pemakaian)
    {
        $pemakaian->delete();

        return redirect()->route('pemakaians.index')
                        ->with('success','pemakaian deleted successfully');
    }
}
