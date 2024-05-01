@extends('admin.layaut')

@section('title', 'EDIT ROOM')

@section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
        </div>
        <div class="card-header">
            <h4>Edit Room</h4>
            <form action="{{route('updateRoom',$id)}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Select Floor</label>
                        <select class="form-control" name="floor_id" data-height="100%">
                            @foreach ($floors as $floor )
                            <option value="{{$floor->id}}" > {{$floor->name}} </option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Room name
                            @if ($errors->has('room_name'))
                                <div style="color: red">{{ $errors->first('room_name') }}</div>
                            @endif
                        </label>
                        <input type="text" name="room_name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Room number
                            @if ($errors->has('room_number'))
                                <div style="color: red">{{ $errors->first('room_number') }}</div>
                            @endif
                        </label>
                        <input type="number" name="room_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Capacity
                            @if ($errors->has('capacity'))
                                <div style="color: red">{{ $errors->first('capacity') }}</div>
                            @endif
                        </label>
                        <input type="number" name="capacity" class="form-control">
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
@endsection