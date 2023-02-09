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
                <h6 class="m-0 font-weight-bold text-primary">Table Pemakaian</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800"></h1>
                                @can('pemakaian-create')
                                    <a class="btn btn-success" href="{{ route('pemakaians.create') }}"> Create New pemakaian </a>
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
                                <th>Details</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                           
                        @foreach ($pemakaian as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->detail }}</td>
                            <td>
                                <form action="{{ route('pemakaians.destroy',$product->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('pemakaians.show',$product->id) }}">Show</a>
                                    @can('pemakaian-edit')
                                    <a class="btn btn-primary" href="{{ route('pemakaians.edit',$product->id) }}">Edit</a>
                                    @endcan
                
                
                                    @csrf
                                    @method('DELETE')
                                    @can('pemakaian-delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $pemakaian->links() !!}
                </div>
            </div>
        </div>

    </div>
   



@endsection