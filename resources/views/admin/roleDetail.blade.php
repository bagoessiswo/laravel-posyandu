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
                    <h6 class="m-0 font-weight-bold text-primary">{{ $type }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ $url }}" method="POST">
                        @csrf
                        @if ($type === 'Update')
                            @method('PATCH')
                        @endif
                        <div class="form-group">
                            <label><b>Role</b></label>
                            @if ($type === 'Update')
                            <input type="text" class="form-control" id="role" name="role" placeholder="Nama role..." value="{{ $role->role }}">
                            @else
                            <input type="text" class="form-control" id="role" name="role" placeholder="Nama role...">
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info btn-md">
                                Simpan
                            </button>
                            <a href="/admin/role" class="btn btn-danger btn-md">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
   



