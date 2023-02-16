@extends('layouts.app-master')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table jadwal</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800"></h1>
                                @can('jadwal-create')
                                    <a class="btn btn-success" href="{{ route('jadwals.create') }}"> Create New jadwal </a>
                                @endcan
                            </div>

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Tanggal</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>

                        @foreach ($jadwal as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->tanggal }}</td>
                            <td>
                                <form action="{{ route('jadwals.destroy',$product->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('jadwals.show',$product->id) }}">Show</a>
                                    @can('jadwal-edit')
                                    <a class="btn btn-primary" href="{{ route('jadwals.edit',$product->id) }}">Edit</a>
                                    @endcan


                                    @csrf
                                    @method('DELETE')
                                    @can('jadwal-delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $jadwal->links() !!}
                </div>
            </div>
        </div>

    </div>




@endsection
