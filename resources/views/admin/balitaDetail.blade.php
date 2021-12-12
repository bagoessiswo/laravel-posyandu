@extends('admin.layouts.main')

@section('admincontainer')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Balita</h1>
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
                            <label><b>Nama Balita</b></label>
                            @if ($type === 'Update')
                            <input type="text" class="form-control" id="nama_balita" name="nama_balita" placeholder="Nama balita..." value="{{ $balita->nama_balita }}">
                            @else
                            <input type="text" class="form-control" id="nama_balita" name="nama_balita" placeholder="Nama balita..." required>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>NIK Orang Tua</b></label>
                            @if ($type === 'Update')
                            <input type="text" class="form-control" id="nik_orang_tua" name="nik_orang_tua" placeholder="NIK orang tua..." value="{{ $balita->nik_orang_tua }}">
                            @else
                            <input type="text" class="form-control" id="nik_orang_tua" name="nik_orang_tua" placeholder="NIK orang tua...">
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Nama Orang Tua</b></label>
                            @if ($type === 'Update')
                            <input type="text" class="form-control" id="nama_orang_tua" name="nama_orang_tua" placeholder="Nama orang tua..." value="{{ $balita->nama_orang_tua }}">
                            @else
                            <input type="text" class="form-control" id="nama_orang_tua" name="nama_orang_tua" placeholder="Nama orang tua...">
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Tgl. Lahir Balita</b></label>
                            @if ($type === 'Update')
                            <input type="text" class="form-control" id="tgl_lahir_balita" name="tgl_lahir_balita" placeholder="YYYY-MM-DD" value="{{ $balita->tgl_lahir_balita }}">
                            @else
                            <input type="text" class="form-control" id="tgl_lahir_balita" name="tgl_lahir_balita" placeholder="YYYY-MM-DD">
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Jenis Kelamin Balita</b></label>
                            @if ($type === 'Update')
                            <select class="form-control" id="jenis_kelamin_balita" name="jenis_kelamin_balita">
                                @if ($balita->jenis_kelamin_balita === 'l')
                                <option value="l" selected>Laki-laki</option>
                                @else
                                <option value="l">Laki-laki</option>
                                @endif

                                @if ($balita->jenis_kelamin_balita === 'p')
                                <option value="p" selected>Perempuan</option>
                                @else
                                <option value="p">Perempuan</option>
                                @endif
                            </select>
                            @else
                            <select class="form-control" id="jenis_kelamin_balita" name="jenis_kelamin_balita">
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Status</b></label>
                            @if ($type === 'Update')
                            <select class="form-control" id="status" name="status">
                                @if ($balita->status === 1)
                                <option value="1" selected>Tercatat</option>
                                @else
                                <option value="1">Tercatat</option>
                                @endif

                                @if ($balita->status === 0)
                                <option value="0" selected>Belum Tercatat</option>
                                @else
                                <option value="0">Belum Tercatat</option>
                                @endif
                            </select>
                            @else
                            <select class="form-control" id="status" name="status">
                                <option value="1">Tercatat</option>
                                <option value="0">Belum Tercatat</option>
                            </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><b>Posyandu</b></label>
                            @if ($type === 'Update')
                            <select class="form-control" id="id_posyandu" name="id_posyandu">
                                @foreach ($posyandu as $posyandu)
                                    @if ($balita->id_posyandu === $posyandu->id)
                                    <option value="{{ $posyandu->id }}" selected>{{ $posyandu->nama_posyandu }}</option>
                                    @else
                                    <option value="{{ $posyandu->id }}">{{ $posyandu->nama_posyandu }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @else
                            <select class="form-control" id="id_posyandu" name="id_posyandu">
                                @foreach ($posyandu as $posyandu)
                                    <option value="{{ $posyandu->id }}">{{ $posyandu->nama_posyandu }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info btn-md">
                                Simpan
                            </button>
                            <a href="/admin/balita" class="btn btn-danger btn-md">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
   



