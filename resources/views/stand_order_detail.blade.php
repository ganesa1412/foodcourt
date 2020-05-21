@extends('stand_master')

@section('title', 'Detail Pesanan #'.$id)

@section('content')
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <form class="widget" method="post" action="{{ action('StandCrudController@set_status') }}">
                        	@csrf
                            <div class="widget-heading">
                                <h5 class="mt-0">Ubah Status Pesanan :</h5>
                            </div>
                            <div class="row p-0 standselect">
                                <div class="col-md-9 col-xs-7">
                                    <select class="form-control input-sm" name="status">
                                        <option value="0">Menunggu Konfirmasi</option>
                                        <option value="1">Sedang Disiapkan</option>
                                        <option value="2">Sudah Diantar</option>
                                        <option value="3">Tolak Pesanan</option>
                                    </select>
                                    <input type="hidden" name="id_order" value="{{ $id }}">
                                </div>
                                <div class="col-md-3 col-xs-5">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Detail Pesanan</h5>

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
                                        <td>{{ $o->customer_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Meja</td>
                                        <td> :</td>
                                        <td>{{ $o->table_no }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stand</td>
                                        <td> :</td>
                                        <td>{{ Session::get('name') }}</td>
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
                                                <th><div class="th-content text-right">Rp. 40.000</div></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection