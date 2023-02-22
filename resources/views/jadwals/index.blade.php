@extends('layouts.app-master')

@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    {{-- modal --}}
    <div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <head>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
                </head>
                <div class="container">
                    <div id='calendar'></div>
                </div>
                <script>
                $(document).ready(function () {
                var SITEURL = "{{ url('/') }}";
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var calendar = $('#calendar').fullCalendar({
                                    editable: true,
                                    events: SITEURL + "/fullcalender",
                                    displayEventTime: false,
                                    editable: true,
                                    eventRender: function (event, element, view) {
                                        if (event.allDay === 'true') {
                                                event.allDay = true;
                                        } else {
                                                event.allDay = false;
                                        }
                                    },
                                    selectable: true,
                                    selectHelper: true,
                                    select: function (start, end, allDay) {
                                        var title = prompt('Event Title:');
                                        if (title) {
                                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                                            $.ajax({
                                                url: SITEURL + "/fullcalenderAjax",
                                                data: {
                                                    title: title,
                                                    start: start,
                                                    end: end,
                                                    type: 'add'
                                                },
                                                type: "POST",
                                                success: function (data) {
                                                    displayMessage("Event Created Successfully");
                                                    calendar.fullCalendar('renderEvent',
                                                        {
                                                            id: data.id,
                                                            title: title,
                                                            start: start,
                                                            end: end,
                                                            allDay: allDay
                                                        },true);
                                                    calendar.fullCalendar('unselect');
                                                }
                                            });
                                        }
                                    },
                                    eventDrop: function (event, delta) {
                                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                                           $.ajax({
                                            url: SITEURL + '/fullcalenderAjax',
                                            data: {
                                                title: event.title,
                                                start: start,
                                                end: end,
                                                id: event.id,
                                                type: 'update'
                                            },
                                            type: "POST",
                                            success: function (response) {
                                                displayMessage("Event Updated Successfully");
                                            }
                                        });
                                    },
                                    eventClick: function (event) {
                                        var deleteMsg = confirm("Do you really want to delete?");
                                        if (deleteMsg) {
                                            $.ajax({
                                                type: "POST",
                                                url: SITEURL + '/fullcalenderAjax',
                                                data: {
                                                        id: event.id,
                                                        type: 'delete'
                                                },
                                                success: function (response) {
                                                    calendar.fullCalendar('removeEvents', event.id);
                                                    displayMessage("Event Deleted Successfully");
                                                }
                                            });
                                        }
                                    }
                                });
                });
                function displayMessage(message) {
                    toastr.success(message, 'Event');
                }
                </script>
            </div>
        </div>
      </div>

    </div>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table jadwal</h6>
            </div>
            <div class="col d-flex justify-content-center mt-2">
                <div id='calendar' style="width:50%"></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMd">
                                    Tanggal Live streaming
                                  </button>
                                <h1 class="h3 mb-0 text-gray-800"></h1>
                                {{-- @can('jadwal-create') --}}
                                    <a class="btn btn-success" href="{{ route('jadwals.create') }}"> Create New jadwal </a>
                                {{-- @endcan --}}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Events Name</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>

                        @foreach ($jadwal as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->name }}</td>
                            {{-- <td>{{ $product->tanggal }}</td> --}}
                            <td>
                                <form action="{{ route('jadwals.destroy',$product->id) }}" method="POST">
                                    {{-- <a class="btn btn-info" href="{{ route('jadwals.show',$product->id) }}">Show</a>
                                    --}}

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
