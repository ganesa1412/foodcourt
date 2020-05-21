@extends('customer_master')

@section('title', 'Detail Pesanan : #'.$id)

@section('content')
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Detail Pesanan #{{ $id }}</h5>

                                <table>
                                    @foreach($order as $o)
                                    <tr>
                                        <td>Waktu Pesanan</td>
                                        <td> :</td>
                                        <td>{{ $o->datetime }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Customer</td>
                                        <td> :</td>
                                        <td>{{ Session::get('customer_name') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Meja</td>
                                        <td> :</td>
                                        <td>{{ Session::get('table_no') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stand</td>
                                        <td> :</td>
                                        <td>{{ $o->name }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
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
                                                <th colspan="2"><div class="th-content text-right">Total Harga</div></th>
                                                <th><div class="th-content text-right">Rp. {{ $total }}</div></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="text-right">
                                    <a href="/" class="btn btn-primary mt-2">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection