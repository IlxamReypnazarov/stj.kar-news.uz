@extends('admin.layaut')

@section('title', 'SHOW-ROOM')

@section('content')
    <?php $i = 1; ?>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $floor->floor_number }}th floor {{ $room->room_number }}th rooms students</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Detail</th>
                                <th>Move</th>
                                <th>Delete</th>
                            </tr>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $student->lastname . ' ' . $student->firstname }}</td>
                                    <td><a href="{{ route('adminShowApp',$student->id) }}" class="btn btn-primary">Detail</a></td>
                                    <td><a href="{{ route('moveAttach',$student->id) }}" class="btn btn-success">Move</a></td>
                                    <td><a href="{{ route('deleteAttach',$student->id) }}" class="btn btn-danger">Delete</a></td>
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
