@extends('admin.layouts.main')

@section('admincontainer')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posyandu</h1>
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
                            <label><b>Nama Posyandu</b></label>
                            @if ($type === 'Update')
                            <input type="text" class="form-control" id="nama_posyandu" name="nama_posyandu" placeholder="Nama posyandu..." value="{{ $posyandu->nama_posyandu }}">
                            @else
                            <input type="text" class="form-control" id="nama_posyandu" name="nama_posyandu" placeholder="Nama posyandu...">
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Kelurahan</b></label>
                            @if ($type === 'Update')
                            <select class="form-control" id="id_kelurahan" name="id_kelurahan">
                                @foreach ($kelurahan as $kelurahan)
                                    @if ($posyandu->id_kelurahan === $kelurahan->id)
                                    <option value="{{ $kelurahan->id }}" selected>{{ $kelurahan->kelurahan }}</option>
                                    @else
                                    <option value="{{ $kelurahan->id }}">{{ $kelurahan->kelurahan }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @else
                            <select class="form-control" id="id_kelurahan" name="id_kelurahan">
                                @foreach ($kelurahan as $kelurahan)
                                    <option value="{{ $kelurahan->id }}">{{ $kelurahan->kelurahan }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Alamat Posyandu</b></label>
                            @if ($type === 'Update')
                            <textarea type="text" class="form-control" id="alamat_posyandu" name="alamat_posyandu" placeholder="Alamat posyandu...">{{ $posyandu->alamat_posyandu }}</textarea>
                            @else
                            <textarea type="text" class="form-control" id="alamat_posyandu" name="alamat_posyandu" placeholder="Alamat posyandu..."></textarea>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info btn-md">
                                Simpan
                            </button>
                            <a href="/admin/posyandu" class="btn btn-danger btn-md">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
   



