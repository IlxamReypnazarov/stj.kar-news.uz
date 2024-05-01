@extends('student.layaut')

@section('title','INDEX Docs')

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="d-inline">My Docs</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled list-unstyled-border">

            @foreach ($docs as $doc)

            <li class="media">
                <div class="media-body">
                    <p class="media-title fw-bolder">Document<a href="{{ route('generatePDF',$doc->id) }}" class="btn btn-primary pull-right">Download</a></p>
                    <div class="text-small text-muted">{{ $doc->created_at }}</div>
                </div>
            </li>

            @endforeach

          </ul>
        </div>
      </div>
    </div>
  </div>

@endsection
