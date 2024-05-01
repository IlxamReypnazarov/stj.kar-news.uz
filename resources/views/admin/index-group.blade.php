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
                    <h4>Groups table</h4>
                    <a style="float: right;" href="{{ route('createGroup') }}" class="btn btn-primary">Create Profession</a>
                </div>
                  @include('sweetalert::alert')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Profession</th>
                                <th>Faculty</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php $i=1?>
                            @foreach($groups as $group)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$group->name}}</td>
                                <td>{{$group->profession_name}}</td>
                                <td>{{$group->faculty_name}}</td>
                                <td><a href="{{route('editGroup',$group->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="{{route('deleteGroup',$group->id)}}" class="btn btn-danger" onclick ="confirmation(event)" >Delete</a></td>
                            </tr>
                            <?php $i++?>
                            @endforeach
                        </table>
                    </div>
                </div>
                {{$groups->links()}}
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
