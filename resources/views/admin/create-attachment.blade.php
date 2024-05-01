@extends('admin.layaut')

@section('title', 'ATTACHMENT CREATE')

@section('content')

    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
        </div>
        <div class="card-header">
            <h4>Create Attachment</h4>
            <form action="{{ route('storeAttach') }}" method="post">
                @csrf
                <div class="card-body">
                    @livewire('create-attachment')
                    <input type="hidden" name="app_id" value="{{ $app->id }}">
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

@endsection
