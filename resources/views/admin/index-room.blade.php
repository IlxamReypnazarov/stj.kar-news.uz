@extends('admin.layaut')

@section('title', 'ROOMS')

@section('content')

    <div class="row">

        <div class="col-12 col-md-6 col-lg-9">
            @if (\Session::has('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {!! \Session::get('message') !!}
                    </div>
                </div>
            @endif

            <div class="card text-center ">
                <div class="card-header">
                    <h4>Rooms table</h4>
                    <a style="float: right;" href="{{route('createRoom')}}" class="btn btn-primary">Create Room </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Floor</th>
                                <th>Number</th>
                                <th>Capacity</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Detail</th>
                            </tr>
                            <?php $i=1?>
                            @foreach($rooms as $room)
                            <tr>
                                <td>{{$i}}</td>
                                 <td> {{$room->room_name}} </td>
                                <td> {{$room->floor_name}} </td>
                                <td> {{$room->room_number}} </td>
                                <td> {{($room->all_capacity)-($room->capacity)}}/{{ $room->all_capacity }} </td>
                                <td>
                                    @if ($room->capacity>0)
                                    <div class="badge badge-success">Empty</div>
                                    @else
                                    <div class="badge badge-danger">Full</div>
                                    @endif
                                </td>
                                <td><a href="{{route('editRoom',$room->id)}}" class="btn btn-primary">Edit</a></td>
                                @include('sweetalert::alert')
                                <td><a href="{{route('deleteRoom',$room->id)}}" class="btn btn-danger" data-confirm-delete="true">Delete</a></td>
                                <td><a href="{{route('detailRoom',$room->id)}}" class="btn btn-success" >Detail</a></td>
                            </tr>
                            <?php $i++?>
                            @endforeach
                        </table>
                    </div>
                </div>
                {{$rooms->links()}}
            </div>
        </div>

    </div>

@endsection
