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
                <div class="table-responsive">

                    <table id="example" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Detail</th>
                                <th>Periode</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensi as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('absensi.detail', ['periode' => $item->periode]) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-eye fa-sm"></i> Lihat Absen
                                        </a> 
                                    </td>       
                             
                                    <td>
                                        {{ str_replace('-', ', ', strtoupper($item->periode)) }}
                                    </td>
                                </tr>
                            @endforeach

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
