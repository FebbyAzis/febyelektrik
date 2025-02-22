@extends('layout.app')
@section('content')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- @dd($kategori_barang) --}}
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Invoice</h1>


        </div>

        <!-- Content Row -->
        @if (session('Success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('Success') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('Successs'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('Successs') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('Successss'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('Successss') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Invoice</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <p>No Faktur</p>
                        <p>Nama Pelanggan/Toko</p>
                        <p>Alamat</p>
                    </div>
                    <div class="col-md-1 text-end">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $faktur->no_faktur }}</p>
                        <p>{{ $faktur->data_pelanggan->nama_toko }}</p>
                        <p>{{ $faktur->data_pelanggan->alamat }}</p>
                    </div>
                    
                </div>
                <hr class="sidebar-divider">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Barang</th>

                                <th class="text-center">Kuantitas</th>
                                <th class="text-center">Banyaknya</th>
                                <th class="text-center">Harga Beli</th>
                                <th class="text-center">Harga Jual</th>
                                <th class="text-center">Disc</th>
                                <th class="text-center">Potongan</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Laba</th>
                                
                            </tr>
                        </thead>
                        @php
                            $totalJumlah = 0;
                            $totalLaba = 0;
                            $totalPot = 0;
                        @endphp
                        <tbody>
                            @foreach ($df as $no => $p)
                                @php
                                    $totalbanyaknya = $p->banyaknya * $p->kuantitas;
                                @endphp
                                @php
                                    $disc = ($p->harga_jual * $p->kuantitas * $p->disc) / 100;
                                @endphp
                                @php
                                    $jumlah = $p->harga_jual * $p->kuantitas - $disc;
                                @endphp
                                @php
                                    $laba = $jumlah - $p->harga_beli * $p->kuantitas;
                                @endphp

                                @php
                                    $totalJumlah += $jumlah; // Tambahkan jumlah ke total
                                    $totalLaba += $laba;
                                    $totalPot += $disc; // Tambahkan laba ke total
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>
                                    <td>{{ $p->nama_barang }}</td>

                                    <td class="text-center">{{ $p->kuantitas }} {{ $p->qty }}</td>
                                    <td class="text-center">{{ $totalbanyaknya }}pcs</td>
                                    <td class="text-right">Rp.
                                        {{ number_format($p->harga_beli, 0, ',', '.') }}</td>
                                    <td class="text-right">Rp.
                                        {{ number_format($p->harga_jual, 0, ',', '.') }}</td>
                                    @if ($p->disc == 0)
                                        <td class="text-right"></td>
                                    @else
                                        <td class="text-right">{{ $p->disc }}%</td>
                                    @endif
                                    @if ($disc == 0)
                                        <td class="text-right"></td>
                                    @else
                                        <td class="text-right">Rp. {{ number_format($disc, 0, ',', '.') }}</td>
                                    @endif

                                    <td class="text-right">Rp. {{ number_format($jumlah, 0, ',', '.') }}</td>
                                    <td class="text-right">Rp. {{ number_format($laba, 0, ',', '.') }}</td>

                                   
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="7" class="text-center">Total</th>
                                @if ($totalPot == 0)
                                    <td class="text-right"></td>
                                @else
                                    <th class="text-right">Rp. {{ number_format($totalPot, 0, ',', '.') }}</th>
                                @endif
                                <th class="text-right">Rp. {{ number_format($totalJumlah, 0, ',', '.') }}</th>
                                <th class="text-right">Rp. {{ number_format($totalLaba, 0, ',', '.') }}</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Content Row -->



    </div>
    <!-- /.container-fluid -->


@endsection

@section('js')

    <script type="text/javascript">
        var harga_beli = document.getElementById('harga_beli');
        harga_beli.addEventListener('keyup', function(e) {
            harga_beli.value = formatRupiah(this.value, 'Rp. ');
        });
        var harga_jual = document.getElementById('harga_c');
        harga_jual.addEventListener('keyup', function(e) {
            harga_jual.value = formatRupiah(this.value, 'Rp. ');
        });

        var harga_beli_edit = document.getElementById('harga_beli_edit');
        harga_beli_edit.addEventListener('keyup', function(e) {
            harga_beli_edit.value = formatRupiah(this.value, 'Rp. ');
        });
        var harga_jual_edit = document.getElementById('harga_jual_edit');
        harga_jual_edit.addEventListener('keyup', function(e) {
            harga_jual_edit.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
    </script>
@endsection

