@extends('admin.layaut')

@section('title', 'FACULTY EDIT')

@section('content')

    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">

        </div>
        <div class="card-header">

            <form action="{{ route('updateFaculty',$id) }}" method="post">
                @csrf
                <div class="card-body">
                <h4>Edit Faculty</h4>
                    <div class="form-group">
                        <label>Faculty name
                            @if ($errors->has('name'))
                                <div style="color: red">{{ $errors->first('name') }}</div>
                            @endif
                        </label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

@endsection
