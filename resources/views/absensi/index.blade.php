@extends('layouts.app-master')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Absensi</h6>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800"></h1>
                                {{-- @can('absensi-create') --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Isi Form Untuk Absensi
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Absensi Kehadiran</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('absensi.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="periode">Periode</label>
                                                            <input type="text"
                                                                class="form-control @error('periode') is-invalid @enderror"
                                                                name="periode" value="{{ date('F Y') }}" readonly>
                                                            @error('periode')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group col-md-6">
                                                            <label for="tanggal_absen">Tanggal Kehadiran</label>
                                                            <input type="date"
                                                                class="form-control @error('tanggal_absen') is-invalid @enderror"
                                                                name="tanggal_absen" value="{{ date('Y-m-d') }}" readonly>
                                                            @error('tanggal_absen')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="periode">Nama</label>
                                                            <input type="text"
                                                                class="form-control @error('periode') is-invalid @enderror"
                                                                name="name" value="{{ Auth::user()->name }}"
                                                                placeholder="Masukkan Periode" readonly>
                                                            @error('periode')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="nama_acara">Nama Acara</label>
                                                            <select class="form-control @error('nama_acara') is-invalid @enderror" name="nama_acara">
                                                                <option value="">Pilih Acara</option>
                                                                <!-- Tambahkan pilihan kehadiran sesuai dengan data yang tersedia -->
                                                                @foreach ($event as $item)
                                                                    <option value="{{ $item->title }}">{{ $item->title }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('nama_acara')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label for="bukti_absen">Bukti Kehadiran</label>
                                                            <input type="file"
                                                                class="form-control-file @error('bukti_absen') is-invalid @enderror"
                                                                name="bukti_absen" id="bukti_absen" accept="image/*">
                                                            @error('bukti_absen')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <!-- Menampilkan pratinjau gambar -->
                                                        <div class="form-group col-md-6">
                                                            <label>Pratinjau Gambar</label>
                                                            <img id="previewImage" src="#" alt="Pratinjau"
                                                                style="max-width: 100%; height: auto; display: none;">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="nama_pj">Nama Penanggung Jawab</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_pj') is-invalid @enderror"
                                                                name="nama_pj" value="{{ old('nama_pj') }}"
                                                                placeholder="Masukkan Nama PJ">
                                                            @error('nama_pj')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="attendance">Kehadiran</label>
                                                            <select
                                                                class="form-control @error('attendance') is-invalid @enderror"
                                                                name="attendance">
                                                                <option value="">Pilih Kehadiran</option>
                                                                <!-- Tambahkan pilihan kehadiran sesuai dengan data yang tersedia -->
                                                                <option value="1">Hadir</option>
                                                                <option value="0">Tidak Hadir</option>
                                                            </select>
                                                            @error('attendance')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="keterangan">Keterangan</label>
                                                            <input type="textarea"
                                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                                name="keterangan" value="{{ old('keterangan') }}"
                                                                placeholder="Masukkan Keterangan">
                                                            @error('keterangan')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <a class="btn btn-success" href="{{ route('inventaris.create') }}"> Create New inventaris </a> --}}
                                    {{-- @endcan --}}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="table-responsive">

                    <table id="example" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Details</th>
                                <th>Periodde</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensi as $item)
                                <td>
                                    <a href="{{ route('absensi.detail', ['periode' => $item->periode]) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-eye fa-sm"></i> Lihat Absen
                                    </a>                                    
                                </td>
                                <td>{{ str_replace('-', ', ', strtoupper($item->periode)) }}</td>
                            @endforeach

                        </tbody>

                    </table>

                    {{-- {!! $inventaris->links() !!} --}}
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2()
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                    $('#previewImage').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#bukti_absen').change(function() {
            readURL(this);
        });
    </script>
@endsection
