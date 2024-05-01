@extends('admin.layaut')

@section('title', 'PROFESSION EDIT')

@section('content')

    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
        </div>
        <div class="card-header">
            <form action="{{ route('updateProfession',$id) }}" method="post">
                @csrf
                <div class="card-body">
                <h4>Edit Profession</h4>
                    <div class="form-group">
                        <label>Profession name
                            @if ($errors->has('name'))
                                <div style="color: red">{{ $errors->first('name') }}</div>
                            @endif
                        </label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>Faculty</label>
                        <select  name="faculty" class="form-control selectric"  >
                          <option value="">-select-</option>
                          @foreach ($faculties as $faculty)
                          <option value="{{$faculty->id}}" > {{$faculty->name}} </option>
                          @endforeach
                        </select>
                      </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

@endsection
