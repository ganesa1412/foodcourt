@extends('cashier_master')

@section('title', 'Detail Order')

@section('content')
                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Detail Pesanan</h5>

                                <table>
                                    <tr>
                                        <td>Nama Customer</td>
                                        <td> :</td>
                                        <td>{{ $customer_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Meja</td>
                                        <td> :</td>
                                        <td>{{ $table_no }}</td>
                                    </tr>
                                </table>
                            </div>

                            @php
                                $total = 0;
                                $n = count($order);
                                $i = 0;
                                $cstand;
                                $pstand = '';
                            @endphp
                            @foreach($order as $o)
                                @php
                                    $cstand = $o->stand;
                                @endphp
                            <div class="widget-content">
                                <hr>
                                @if($cstand != $pstand)
                                <table class="mb-2">
                                    <tr>
                                        <td>Stand</td>
                                        <td> :</td>
                                        <td>{{ $o->stand }}</td>
                                    </tr>
                                </table>
                                @endif

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
                                            @foreach($menu[$o->id_order] as $m)
                                            <tr>
                                                <td><div class="td-content customer-name">{{ $m->menu_name }}</div></td>
                                                <td><div class="td-content">{{ $m->quantity }}x</div></td>
                                                <td><div class="td-content pricing"><span class="">Rp. {{ $m->quantity * $m->price }}</span></div></td>
                                                @php
                                                    $total += $m->price * $m->quantity;
                                                @endphp
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            @if(++$i === $n)
                                            <tr>
                                                <th colspan="2"><div class="th-content">Total Harga</div></th>
                                                <th><div class="th-content text-right">Rp. {{ $total }}</div></th>
                                            </tr>
                                            @endif
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                                @php
                                    $pstand = $o->stand;
                                @endphp
                            @endforeach
                        </div>
                    </div>


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <form class="widget" method="post" action="{{ action('CashierController@print') }}" target="_blank">
                            @csrf
                            <div class="widget-heading">
                                <h5 class="mt-0">Masukkan Nilai Pembayaran :</h5>
                            </div>
                            <div class="row p-0 standselect">
                                <div class="col-md-8 col-xs-7">
                                    <input type="number" class="form-control input-sm" name="pembayaran" placeholder="Nominal Pembayaran">
                                    <input type="hidden" name="id_table" value="{{ $id_table }}">
                                    <input type="hidden" name="customer_name" value="{{ $customer_name }}">
                                    <input type="hidden" name="total" value="{{ $total }}">
                                </div>
                                <div class="col-md-4 col-xs-5">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Hitung Kembalian & Cetak</button>
                                </div>
                            </div>
                        </form>
                    </div>
@endsection