@extends('admin.layouts.main')

@section('admincontainer')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History Posyandu</h1>
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
                            <label><b>Balita</b></label>
                            @if ($type === 'Update')
                            <select class="form-control" id="id_balita" name="id_balita">
                                @foreach ($balita as $balita)
                                    @if ($history->id_balita === $balita->id)
                                    <option value="{{ $balita->id }}" selected>{{ $balita->nama_balita }}</option>
                                    @else
                                    <option value="{{ $balita->id }}">{{ $balita->nama_balita }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @else
                            <select class="form-control" id="id_balita" name="id_balita">
                                @foreach ($balita as $balita)
                                    <option value="{{ $balita->id }}">{{ $balita->nama_balita }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Tgl. Posyandu</b></label>
                            @if ($type === 'Update')
                            <input type="text" class="form-control" id="tgl_posyandu" name="tgl_posyandu" placeholder="YYYY-MM-DD" value="{{ $history->tgl_posyandu }}">
                            @else
                            <input type="text" class="form-control" id="tgl_posyandu" name="tgl_posyandu" placeholder="YYYY-MM-DD">
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Berat Badan</b></label>
                            @if ($type === 'Update')
                            <input type="number" step="0.01" class="form-control" id="berat_badan_balita" name="berat_badan_balita" placeholder="kilogram (kg)" value="{{ $history->berat_badan_balita }}">
                            @else
                            <input type="number" step="0.01" class="form-control" id="berat_badan_balita" name="berat_badan_balita" placeholder="kilogram (kg)" >
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Tinggi Badan</b></label>
                            @if ($type === 'Update')
                            <input type="number" step="0.01" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="centimeter (cm)" value="{{ $history->tinggi_badan }}">
                            @else
                            <input type="number" step="0.01" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="centimeter (cm)" >
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info btn-md">
                                Simpan
                            </button>
                            <a href="/admin/history-posyandu" class="btn btn-danger btn-md">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
   



