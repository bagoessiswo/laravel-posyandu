@extends('admin.layouts.main')

@section('admincontainer')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role</h1>
    </div>
    <!-- Main Content-->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a type="button" class="btn btn-success btn-md" href="/admin/role/create">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width=30px>No.</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center" width=150px>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($role as $data)
                                <tr>
                                    <td class="text-right">{{ $loop->index + 1 }}</td>
                                    <td>{{ $data->role }}</td>
                                    <td class="text-center">
                                        <div class="row m-0">
                                            <div class="col-sm-6">
                                                <a class="btn btn-primary btn-flat btn-xs" href="/admin/role/{{ $data->id }}"><i class="fa fa-edit" title="Edit"></i></a>
                                            </div>
                                            <div class="col-sm-6">
                                            <form action="/admin/role/{{ $data->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash" title="Hapus"></i></button>
                                            </form>
                                            </div>
                                        </div>  
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
   



