@extends('admin.layaut')

@section('title', 'FACULTIES')

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
                    <h4>Faculties table</h4>
                    <a style="float: right;" href="{{ route('createFaculty') }}" class="btn btn-primary">Create Faculty </a>
                </div>
                  @include('sweetalert::alert')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php $i=1?>
                            @foreach($faculties as $faculty)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$faculty->name}}</td>
                                <td><a href="{{route('editFaculty',$faculty->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="{{route('deleteFaculty',$faculty->id)}}" class="btn btn-danger" onclick ="confirmation(event)" >Delete</a></td>
                            </tr>
                            <?php $i++?>
                            @endforeach
                        </table>
                    </div>
                </div>
                {{$faculties->links()}}
            </div>
        </div>

    </div>

      <script type="text/javascript">
        function confirmation(ev) {

            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                    title: " OSHIRESIZBE",
                    text: "yaq bolsa cancel di basıń! ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,

                })

                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }
                });
        }
    </script>

@endsection
