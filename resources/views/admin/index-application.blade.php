@extends('admin.layaut')

@section('title', 'APP')

@section('content')
    <?php $i = 1; ?>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Applications</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($apps as $app)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $app->lastname . ' ' . $app->firstname }}</td>
                                    <td>{{ $app->created_at }}</td>
                                    <td>
                                        @if ($app->status == 'process')
                                            <div class="badge badge-warning">Process</div>
                                        @elseif ($app->status == 'success')
                                            <div class="badge badge-success">Succes</div>
                                        @elseif($app->status=='attached')
                                            <div class="badge badge-success">Attached</div>
                                        @else
                                            <div class="badge badge-danger">Not Accepted</div>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('adminShowApp',$app->id) }}" class="btn btn-primary">Detail</a></td>
                                </tr>
                                <?php $i++ ?>
                            @endforeach
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span
                                        class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
