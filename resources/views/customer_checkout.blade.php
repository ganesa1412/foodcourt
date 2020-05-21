@extends('customer_master')

@section('title', 'Checkout Pesanan #'.$id)

@section('content')
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Checkout Pesanan #{{ $id }}</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="10%"><div class="th-content"></div></th>
                                                <th><div class="th-content">Menu</div></th>
                                                <th><div class="th-content">Jumlah</div></th>
                                                <th><div class="th-content th-heading">Harga</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp

                                            @foreach($menu as $m)
                                            <tr>
                                                <td><div class="td-content"><img class="rounded" src="/assets/img/menu/{{ $m->img }}" width="100%" alt="pic1"></div></td>
                                                <td><div class="td-content customer-name">{{ $m->menu_name }}</div></td>
                                                <td><div class="td-content">{{ $m->quantity }}x</div></td>
                                                <td><div class="td-content pricing"><span class="">Rp. {{ $m->quantity * $m->price }}</span></div></td>
                                                @php
                                                    $total += $m->quantity * $m->price;
                                                @endphp
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3"><div class="th-content text-right">Total Harga</div></th>
                                                <th><div class="th-content text-right">Rp. {{ $total }}</div></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="text-right">
                                    <a href="/add_order/confirm/{{ $id }}" onclick="return confirm('Konfirmasi pesanan?')" class="btn btn-primary mt-3">Pesan Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection