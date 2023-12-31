@extends('admin.master')
@section('content')
    <h3 class="mt-4">Dashboard</h3>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card border-0" style="background-color: #C2D6FF; height: 10rem">
                <div class="card-body mt-4">
                    Jumlah User <br>
                    <h3>{{ $totalUsers }} <small style="font-size: 16px">User</small></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0" style="background-color: #C2D6FF; height: 10rem">
                <div class="card-body mt-4">
                    Jumlah User Aktif <br>
                    <h3>{{$activeUsers}} <small style="font-size: 16px">User</small></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0" style="background-color: #C2D6FF; height: 10rem">
                <div class="card-body mt-4">
                    Jumlah Produk <br>
                    <h3>{{$totalProducts}} <small style="font-size: 16px">Produk</small></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0" style="background-color: #C2D6FF; height: 10rem">
                <div class="card-body mt-4">
                    Jumlah Produk Aktif <br>
                    <h3>{{$activeProducts}} <small style="font-size: 16px">Produk</small></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="card border-0 shadow-sm" style="width:50rem">
            <h3 class="mt-3">Produk Terbaru</h3>
            <div class="card-body">
                <table class="table  table-borderless">
                    <thead class="table-borderless table-primary">
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Tanggal dibuat</th>
                            <th scope="col">Harga (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestProducts as $product)
                        <tr>
                            <td>
                                <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('admin/images/profile.png') }}" alt=""
                                    style="margin-right: 2rem; max-height: 50px;">
                                {{ $product->name }}
                            </td>
                            <td class="text-muted">{{ $product->created_at->format('d M Y') }}</td>
                            <td class="text-muted">Rp. {{ number_format($product->price, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
