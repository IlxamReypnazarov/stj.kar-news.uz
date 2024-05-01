@extends('admin.layaut')

@section('title', 'PROFESSIONS')

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
                    <h4>Professions table</h4>
                    <a style="float: right;" href="{{ route('createProfession') }}" class="btn btn-primary">Create Profession</a>
                </div>
                  @include('sweetalert::alert')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Faculty</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php $i=1?>
                            @foreach($professions as $profession)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$profession->name}}</td>
                                <td>{{$profession->faculty_name}}</td>
                                <td><a href="{{route('editProfession',$profession->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="{{route('deleteProfession',$profession->id)}}" class="btn btn-danger" onclick ="confirmation(event)" >Delete</a></td>
                            </tr>
                            <?php $i++?>
                            @endforeach
                        </table>
                    </div>
                </div>
                {{$professions->links()}}
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
