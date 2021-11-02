@extends('admin.layouts.main')

@section('admincontainer')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
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
                            <label><b>Username</b></label>
                            @if ($type === 'Update')
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username..." value="{{ $user->username }}">
                            @else
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username...">
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Username</b></label>
                            @if ($type === 'Update')
                            <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}" placeholder="Password...">
                            @else
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password...">
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Role</b></label>
                            @if ($type === 'Update')
                            <select class="form-control" id="id_role" name="id_role">
                                @foreach ($role as $role)
                                    @if ($user->role[0]->id === $role->id)
                                    <option value="{{ $role->id }}" selected>{{ $role->role }}</option>
                                    @else
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @else
                            <select class="form-control" id="id_role" name="id_role">
                                @foreach ($role as $role)
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach
                            </select>
                            @endif

                        </div>
                        <div>
                            <button type="submit" class="btn btn-info btn-md">
                                Simpan
                            </button>
                            <a href="/admin/user" class="btn btn-danger btn-md">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection