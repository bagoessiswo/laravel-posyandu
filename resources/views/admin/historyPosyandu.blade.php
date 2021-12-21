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
                    <div class="d-flex justify-content-between">
                        <a type="button" class="btn btn-success btn-md" href="/admin/history-posyandu/create">
                            <i class="fas fa-plus"></i>
                        </a>
                        <div class="input-group" style="margin-left: 15px;">
                            <form method="GET" action="/admin/history-posyandu" class="d-flex align-items-end">
                                <input type="text" class="form-control" placeholder=" " name="search" style="margin-right: 3px;">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width=30px>No.</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Balita</th>
                                    <th class="text-center">Tgl. Posyandu</th>
                                    <th class="text-center">Berat Badan</th>
                                    <th class="text-center">Tinggi Badan</th>
                                    <th class="text-center" width=150px>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($history as $data)
                                <tr>
                                    <td class="text-right">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('uploads/history/' . $data->image) }}" style="width:200px;"class="rounded float-left" alt="">
                                    </td>
                                    </td>
                                    <td>
                                        <b>Nama Balita: </b>{{ $data->balita->nama_balita }}
                                        <br>
                                        <b>Tgl. Lahir Balita: </b>{{ $data->balita->tgl_lahir_balita }}
                                        <br>
                                        <b>Jenis Kelamin: </b>
                                        @if ($data->balita->jenis_kelamin_balita === 'l')
                                            Laki-laki
                                        @elseif ($data->balita->jenis_kelamin_balita === 'p')
                                            Perempuan
                                        @endif
                                        <br>
                                        <b>Nama Orang Tua: </b>{{ $data->balita->nama_orang_tua }}
                                    </td>
                                    <td>{{ $data->tgl_posyandu }}</td>
                                    <td>{{ $data->berat_badan_balita }} kg</td>
                                    <td>{{ $data->tinggi_badan }} cm</td>
                                    <td class="text-center">
                                        <div class="row m-0">
                                            <div class="col-sm-6">
                                                <a class="btn btn-primary btn-flat btn-xs" href="/admin/history-posyandu/{{ $data->id }}"><i class="fa fa-edit" title="Edit"></i></a>
                                            </div>
                                            <div class="col-sm-6">
                                            <form action="/admin/history-posyandu/{{ $data->id }}" method="POST">
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
                <div class="card-footer">
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {!! $history->links("pagination::bootstrap-4") !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
   



