@extends('admin.layaut')

@section('title', 'ATTACHMENT MOVE')

@section('content')

    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
        </div>
        <div class="card-header">
            <h4>Move Attachment</h4>
            <form action="{{ route('storeMoveAttach') }}" method="post">
                @csrf
                <div class="card-body">
                    @livewire('create-attachment')
                    <input type="hidden" name="attachment_id" value="{{ $attachment->id }}">
                    <div class="card-footer text-right">
                        <input type="submit" class="btn btn-primary mr-1" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection
