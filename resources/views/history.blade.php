@extends('layouts.main')

@section('container')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url({{ asset('img/contact-bg.jpg') }})">)">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>History Posyandu</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="my-5">
                    @if ($history)
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th width=250px><b>Nama Orang Tua</b></th>
                            <td>{{ $history->balita->nama_orang_tua }}</td>
                        </tr>
                        <tr>
                            <th width=250px><b>NIK Orang Tua</b></th>
                            <td>{{ $history->balita->nik_orang_tua }}</td>
                        </tr>
                        <tr>
                           <th width=250px><b>Nama Balita</b></th>
                           <td>{{ $history->balita->nama_balita }}</td>
                        </tr>
                        <tr>
                            <th width=250px><b>Tgl. Lahir Balita</b></th>
                            <td>{{ $history->balita->tgl_lahir_balita }}</td>
                        </tr>
                        <tr>
                            <th width=250px><b>Jenis Kelamin</b></th>
                            <td>
                                @if ($history->balita->jenis_kelamin_balita === 'l')
                                    Laki-laki
                                @elseif ($history->balita->jenis_kelamin_balita === 'p')
                                    Perempuan
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th width=250px><b>Tgl. Posyandu</b></th>
                            <td>{{ $history->tgl_posyandu }}</td>
                        </tr>
                        <tr>
                            <th width=250px><b>Berat Badan</b></th>
                            <td>{{ $history->berat_badan_balita }} kg</td>
                        </tr>
                        <tr>
                            <th width=250px><b>Tinggi Badan</b></th>
                            <td>{{ $history->tinggi_badan }} cm</td>
                        </tr>
                    </table>
                    @else
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th width=250px><b>Nama Orang Tua</b></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th width=250px><b>NIK Orang Tua</b></th>
                            <td></td>
                        </tr>
                        <tr>
                           <th width=250px><b>Nama Balita</b></th>
                           <td></td>
                        </tr>
                        <tr>
                            <th width=250px><b>Tgl. Lahir Balita</b></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th width=250px><b>Jenis Kelamin</b></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th width=250px><b>Tgl. Posyandu</b></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th width=250px><b>Berat Badan</b></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th width=250px><b>Tinggi Badan</b></th>
                            <td></td>
                        </tr>
                        
                    </table>
                    @endif
                       
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
   



