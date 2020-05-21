@extends('customer_master')

@section('title', 'Tambah Pesanan')

@section('content')
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <form class="widget" method="post" action="{{ action('CustomerController@add_order') }}">
                        @csrf
                        <div class="widget-heading standselect">
                            <h5 class="">Pilih Stand :</h5>
                            <select class="form-control mt-3 input-sm" name="stand" onchange="this.form.submit()">
                                <option value="">- Pilih Stand -</option>
                                @foreach($stand as $s)
                                <option value="{{ $s->id_user }}" {{ isset($id) && ($id == $s->id_user) ? "selected":"" }}>{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>

                @if (isset($id))
                <form action="{{ action('CustomerCrudController@add_order') }}" method="post" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    @csrf
                    <div class="row">

                        @foreach($category as $c)
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-table-two">
                                <div class="widget-heading">
                                    <h5 class="">{{ $c->category_name }}</h5>
                                </div>

                                <div class="widget-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th><div class="th-content">Menu</div></th>
                                                    <th width="40%"><div class="th-content text-center">Jumlah</div></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($menu as $m)
                                                    @if($m->id_menu_category == $c->id_menu_category)
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <img class="rounded mr-3" src="/assets/img/menu/{{ $m->img }}" width="80" alt="pic1">
                                                            <div class="media-body">
                                                                <h4 class="media-heading mt-2">{{ $m->menu_name }}</h4>
                                                                <p class="media-text">Rp. {{ $m->price }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><div class="td-content text-center">
                                                        <input id="menu{{ $m->id_menu }}" class="touchMenu input-sm" data-price="{{ $m->price }}" type="text" value="" name="menu{{ $m->id_menu }}"><br>
                                                        <strong class="price">Rp. <span id="price{{ $m->id_menu }}">0</span></strong>
                                                    </div></td>
                                                </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row desktop-hide" style="height: 150px;"></div>

                    <div class="row layout-top-spacing" id="mobile-float">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-table-two">
                                <table class="table total-price">
                                    <tbody>
                                        <tr>
                                            <td><div class="td-content text-left">Total Harga</div></td>
                                            <td><div class="td-content text-right">Rp. <span id="total">0</span></div></td>
                                            <td><div class="td-content text-right mobile-hide"><button type="submit" class="btn btn-primary mt-2">Checkout</button></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <input type="hidden" name="id_stand" value="{{ $id }}">
                                <button type="submit" class="btn btn-primary mt-2 btn-block desktop-hide">Checkout</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
@endsection