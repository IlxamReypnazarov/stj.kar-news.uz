@extends('admin.layaut')

@section('title', 'GROUP EDIT')

@section('content')

    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
        </div>
        <div class="card-header">
            <form action="{{ route('updateGroup',$id) }}" method="post">
                @csrf
                <div class="card-body">
                <h4>Edit Group</h4>
                    <div class="form-group">
                        <label>Group name
                            @if ($errors->has('name'))
                                <div style="color: red">{{ $errors->first('name') }}</div>
                            @endif
                        </label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>
                    @livewire('profession')
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
@endsection
