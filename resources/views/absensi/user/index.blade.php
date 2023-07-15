@extends('layouts.app-master')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                   
                    <div class="col-1 text-left">
                        <a href="/absensi" title="Kembali">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="col-10 text-center">
                        <h6 class="m-0 font-weight-bold text-primary">DAFTAR ABSENSI</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <p>Periode : </p>
                        <hr>
                    </div>
                </div>
                <div class="table-responsive">

                    <table id="example" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($absensiDetails as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                @php
                                                    $details = DB::table('absensi')
                                                        ->where('name', $item->name)
                                                        ->orderBy('tanggal_absen')
                                                        ->get();
                                                    $count = count($details);
                                                @endphp
                                                @foreach ($details as $index => $detail)
                                                    <td>
                                                        <p>{{$detail->tanggal_absen}}</p>
                                                        <button
                                                            class="btn {{ $detail->attendance ? 'btn-success' : 'btn-danger' }}"
                                                            data-toggle="modal" data-target="#modal{{ $index }}">
                                                            {{ $detail->attendance ? 'H' : 'A' }}
                                                        </button>
                                                    </td>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal{{ $index }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="modalLabel{{ $index }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="modalLabel{{ $index }}">Detail Absensi
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Tampilkan detail absensi di sini -->
                                                                    <p>Periode: {{ $detail->periode }}</p>
                                                                    <p>Tanggal Absen: {{ $detail->tanggal_absen }}</p>
                                                                    <p>Nama: {{ $detail->name }}</p>
                                                                    <p>Nama Acara: {{ $detail->nama_acara }}</p>
                                                                    <p>Bukti Kehadiran: <img src="{{ url('storage/bukti_absen/' . $detail->bukti_absen) }}" alt="Bukti Kehadiran" style="max-width: 50%"></p>
                                                                    <p>Kehadiran:
                                                                        {{ $detail->attendance ? 'Hadir' : 'Tidak Hadir' }}
                                                                    </p>
                                                                    <p>Keterangan: {{ $detail->keterangan }}</p>
                                                                    <!-- Tambahkan informasi absensi lainnya yang diinginkan -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if (($index + 1) % 5 == 0)
                                            </tr>
                                            @if ($index + 1 != $count)
                                                <tr>
                                            @endif
                            @endif
                            @endforeach

                            </tr>
                        </tbody> --}}
                    </table>
                    </td>
                    </tr>
                    {{-- @endforeach --}}
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2()
        });
    </script>
@endsection
