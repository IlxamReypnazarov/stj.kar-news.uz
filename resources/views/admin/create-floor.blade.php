@extends('admin.layaut')

@section('title', 'FLOOR CREATE')

@section('content')

    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          
        </div>
        <div class="card-header">
            <h4>Create Floor</h4>

            <form action="{{ route('storeFloor') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Floor name
                            @if ($errors->has('name'))
                                <div style="color: red">{{ $errors->first('name') }}</div>
                            @endif
                        </label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Floor number
                            @if ($errors->has('floor_number'))
                                <div style="color: red">{{ $errors->first('floor_number') }}</div>
                            @endif
                        </label>
                        <input type="number" name="floor_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="male" id="exampleRadios1"
                                checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="female" id="exampleRadios2"
                                checked>
                            <label class="form-check-label" for="exampleRadios2">
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>

            </form>




        </div>
    </div>
    </div>

@endsection
