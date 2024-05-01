@extends('student.layaut')

@section('title','INDEX APP')

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="d-inline">My Applications</h4>
          <div class="card-header-action">
            <a href="{{ route('createApp') }}" class="btn btn-primary">Create</a>
          </div>
        </div>
        <div class="card-body">
          <ul class="list-unstyled list-unstyled-border">

            @foreach ($apps as $app)

            <li class="media">
                <div class="media-body">
                    @if($app->status=="process")
                    <div class="badge badge-pill badge-warning mb-1 float-right">Process</div>
                    @elseif ($app->status=="success")
                    <div class="badge badge-pill badge-success mb-1 float-right">Completed</div>
                    @elseif ($app->status=='attached')
                    <div class="badge badge-pill badge-success mb-1 float-right">Attached</div>
                    @else
                    <div class="badge badge-pill badge-danger mb-1 float-right">Not Accepted</div>
                    @endif
                    <h6 class="media-title"><a href="#">{{ $app->lastname.' '.$app->firstname}}</a></h6>
                    <div class="text-small text-muted">{{ $app->created_at }}</div>
                </div>
            </li>

            @endforeach
            @foreach ($failed_apps as $app)

            <li class="media">
                <div class="media-body">
                    @if($app->status=="process")
                    <div class="badge badge-pill badge-warning mb-1 float-right">Process</div>
                    @elseif ($app->status=="success")
                    <div class="badge badge-pill badge-success mb-1 float-right">Completed</div>
                    @elseif ($app->status=='attached')
                    <div class="badge badge-pill badge-success mb-1 float-right">Attached</div>
                    @else
                    <div class="badge badge-pill badge-danger mb-1 float-right">Not Accepted</div>
                    @endif
                    <h6 class="media-title"><a href="#">{{ $app->lastname.' '.$app->firstname}}</a></h6>
                    <div class="text-small text-muted">{{ $app->created_at }}</div>
                </div>
            </li>

            @endforeach
            {{-- <li class="media">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cbx-2" checked>
                <label class="custom-control-label" for="cbx-2"></label>
              </div>
              <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-4.png">
              <div class="media-body">
                <div class="badge badge-pill badge-primary mb-1 float-right">Completed</div>
                <h6 class="media-title"><a href="#">Changes related to upload file </a></h6>
                <div class="text-small text-muted">Hasan Basri <div class="bullet"></div> 4 Min</div>
              </div>
            </li>
            <li class="media">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cbx-3">
                <label class="custom-control-label" for="cbx-3"></label>
              </div>
              <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-9.png">
              <div class="media-body">
                <div class="badge badge-pill badge-warning mb-1 float-right">Progress</div>
                <h6 class="media-title"><a href="#">Upload build on server</a></h6>
                <div class="text-small text-muted">John Doe <div class="bullet"></div> 8 Min</div>
              </div>
            </li>
            <li class="media">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cbx-4">
                <label class="custom-control-label" for="cbx-4"></label>
              </div>
              <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-10.png">
              <div class="media-body">
                <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
                <h6 class="media-title"><a href="#">Deliverd product to client</a></h6>
                <div class="text-small text-muted">Sarah Smith <div class="bullet"></div> 21 Min</div>
              </div>
            </li>
            <li class="media">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cbx-8">
                <label class="custom-control-label" for="cbx-8"></label>
              </div>
              <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-8.png">
              <div class="media-body">
                <div class="badge badge-pill badge-primary mb-1 float-right">Completed</div>
                <h6 class="media-title"><a href="#">Admin panel bug solve</a></h6>
                <div class="text-small text-muted">Poonam Patel <div class="bullet"></div> 11 Min</div>
              </div>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
  </div>

@endsection
