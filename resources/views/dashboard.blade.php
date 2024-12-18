@extends('layout.app')
@section('content')  


<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- @dd($kategori_barang) --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      
        
    </div>

    <!-- Content Row -->
    @if (session('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('Success')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @if (session('Successs'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('Successs')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Statistik Pemasukan dan Pengeluaran</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    @php
                        $total_peng = 0;
                        $total_pem = 0;
                        $total_LB = 0;
                        $total_DISC = 0;
                    @endphp
                    @foreach ($invoice as $i)
                        @php
                            $total_pengeluaran = $i->harga_beli * $i->kuantitas;
                            $total_pemasukan = $i->harga_jual * $i->kuantitas;
                            $total_diskon =  $total_pemasukan * $i->disc / 100;
                            $total_laba = ($total_pemasukan - $total_diskon) - ($i->harga_beli * $i->kuantitas);
                        @endphp
                        @php
                            $total_DISC += $total_diskon;
                            $total_peng += $total_pengeluaran;
                            $total_pem += $total_pemasukan;
                            $total_LB += $total_laba;
                        @endphp
                    @endforeach
                    <div class="col-sm-3">
                        <p>Total Penjualan</p>
                        <p>Total Pengeluaran</p>
                        <p>Total Pemasukan</p>
                        <p>Total Laba</p>
                    </div>
                    <div class="col-sm-1">
                        {{-- @dd($total_DISC); --}}
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-sm-8">
                        <p>{{$total_beli}}</p>
                        <p>Rp. {{ number_format($total_peng ,0, ',', '.') }}</p>
                        <p>Rp. {{ number_format($total_pem - $total_DISC,0, ',', '.') }}</p>
                        <p>Rp. {{ number_format($total_LB ,0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>

    <!-- Content Row -->



</div>
<!-- /.container-fluid -->



<script type="text/javascript">
    var harga = document.getElementById('harga');
    harga.addEventListener('keyup', function(e)
    {
        harga.value = formatRupiah(this.value, 'Rp. ');
    });
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
    }
    </script>

@endsection