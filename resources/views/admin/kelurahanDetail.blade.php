@extends('admin.layouts.main')

@section('admincontainer')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelurahan</h1>
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
                            <label class="form-label"><b>Nama Kelurahan</b></label>
                            @if ($type === 'Update')
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Nama kelurahan..." value="{{ $kelurahan->kelurahan }}">
                            @else
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Nama kelurahan..." required>
                            @endif
                            
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Kecamatan</b></label>
                            @if ($type === 'Update')
                            <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                                @foreach ($kecamatan as $kecamatan)
                                    @if ($kelurahan->id_kecamatan === $kecamatan->id)
                                    <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->kecamatan }}</option>
                                    @else
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @else
                            <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                                @foreach ($kecamatan as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                                @endforeach
                            </select>
                            @endif

                        </div>
                        <div>
                            <button type="submit" class="btn btn-info btn-md">
                                Simpan
                            </button>
                            <a href="/admin/kelurahan" class="btn btn-danger btn-md">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
   



