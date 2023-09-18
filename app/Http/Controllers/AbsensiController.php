<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Event;
use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Import Carbon untuk bekerja dengan tanggal

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $checkRoles;
    public function __construct()
    {
        $this->checkRoles = new RoleController;
    }
    public function index()
    {
        $checkRoles = $this->checkRoles->getRoles();
        $jadwals = jadwal::all();
        $absensi = Absensi::groupBy('periode')->select('periode')->get();
        $event = Event::all(); // Mengambil data event

        // dd($absensi);
        return view('absensi.index', compact('jadwals', 'absensi', 'event', 'checkRoles'));
    }

    public function detail($periode)
    {
        $checkRoles = $this->checkRoles->getRoles();
        $jadwals = jadwal::all();
        $bulan = Absensi::where('periode', $periode)->first();

        $absensiDetails = Absensi::groupBy('name')
            ->select('name', 'tanggal_absen', 'nama_acara', 'bukti_absen', 'nama_pj', 'attendance')
            ->get();


        // dd($absensi);
        return view('absensi.detail', compact('jadwals', 'absensiDetails', 'bulan', 'checkRoles'));
    }
    public function userAbsen($name)
    {
        $checkRoles = $this->checkRoles->getRoles();
        $jadwals = jadwal::all();
        $periode = Absensi::groupBy('periode')->select('id','name', 'tanggal_absen', 'nama_acara', 'periode', 'bukti_absen', 'nama_pj', 'attendance','keterangan')
        ->get();
        // dd($periode);  
        $event = Event::all();

        // $bulan = Absensi::where('periode', $periode)->first();
        $pegawai = Absensi::where('name', $name)
        ->select('name')
        ->first();

        
// Mendapatkan bulan ini
    $bulanIni = Carbon::now()->month;

    // Mendapatkan tahun ini
    $tahunIni = Carbon::now()->year;

    // Mendapatkan bulan sebelumnya
    $bulanSebelumnya = Carbon::now()->subMonth()->month;

    // Mengambil data absensi untuk bulan ini dan bulan sebelumnya
    $absensiDetails = Absensi::where('name', $name)
        ->where(function ($query) use ($bulanIni, $tahunIni, $bulanSebelumnya) {
            $query->whereMonth('tanggal_absen', $bulanIni)
                ->whereYear('tanggal_absen', $tahunIni)
                ->orWhere(function ($query) use ($bulanSebelumnya, $tahunIni) {
                    $query->whereMonth('tanggal_absen', $bulanSebelumnya)
                        ->whereYear('tanggal_absen', $tahunIni);
                });
        })
        ->groupBy('tanggal_absen')
        ->select('name', 'tanggal_absen', 'nama_acara', 'periode', 'bukti_absen', 'nama_pj', 'attendance', 'keterangan')
        ->get();

        $absensiByBulan = $absensiDetails->groupBy(function ($detail) {
            return date('Y-m', strtotime($detail->tanggal_absen));
        });
        // dd($absensiDetails);
        return view('absensi.user', compact('absensiByBulan','jadwals', 'checkRoles', 'absensiDetails', 'event','pegawai','periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'periode' => 'required|string',
            'tanggal_absen' => 'required|date',
            'name' => 'required',
            'nama_acara' => 'required|string',
            'bukti_absen' => 'required|image',
            'nama_pj' => 'required|string',
            'attendance' => 'required|string',
            'keterangan' => 'string'

        ]);

        // Buat instansi model Absensi baru
        $absensi = new Absensi();
        $absensi->periode = $validatedData['periode'];
        $absensi->tanggal_absen = $validatedData['tanggal_absen'];
        $absensi->name = $validatedData['name'];
        $absensi->nama_acara = $validatedData['nama_acara'];
        if ($request->hasFile('bukti_absen')) {
            $file = $request->file('bukti_absen');
            $filename = $file->getClientOriginalName(); // Mengambil nama asli file
            $path = $file->storeAs('/bukti_absen', $filename); // Menyimpan file dengan nama asli ke direktori storage/app/public/bukti_absen

            $absensi->bukti_absen = $filename;
        }
        $absensi->nama_pj = $validatedData['nama_pj'];
        $absensi->attendance = $validatedData['attendance'];
        $absensi->keterangan = $validatedData['keterangan'];
        // dd($absensi);
        // Simpan absensi baru ke dalam database
        $absensi->save();

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->back()->with('success', 'Absensi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
