@extends('customer_master')

@section('title', 'Daftar Pesanan')

@section('content')
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Daftar Pesanan</h5>
                                <table>
                                    <tr>
                                        <td>Nama Pelanggan</td>
                                        <td> :</td>
                                        <td> {{ Session::get('customer_name') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Meja</td>
                                        <td> :</td>
                                        <td> {{ Session::get('table_no') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="widget-content mobile-hide">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><div class="th-content">Nomor Order</div></th>
                                                <th><div class="th-content">Stand</div></th>
                                                <th><div class="th-content th-heading">Total Tagihan</div></th>
                                                <th><div class="th-content">Status</div></th>
                                                <th><div class="th-content"></div></th>
                                            </tr>
                                        </thead>
                                        <tbody id="desktopTable">
                                            @foreach($order as $o)
                                            <tr>
                                                <td><div class="td-content">#{{ $o->id_order }}</div></td>
                                                <td><div class="td-content customer-name">{{ $o->name }}</div></td>
                                                <td><div class="td-content pricing"><span class="">Rp. {{ $total[$o->id_order] }}</span></div></td>
                                                <td><div class="td-content"><span class="badge outline-badge-{{ $status[$o->status][0] }}">{{ $status[$o->status][1] }}</span></div></td>
                                                <td><div class="td-content">
                                                    <a href="/order/{{$o->id_order}}" class="btn btn-primary">Detail</a>
                                                </div></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="widget-content desktop-hide">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><div class="th-content">Stand</div></th>
                                                <th><div class="th-content"></div></th>
                                            </tr>
                                        </thead>
                                        <tbody id="mobileTable">
                                            @foreach($order as $o)
                                            <tr>
                                                <td><div class="td-content customer-name">
                                                    {{ $o->name }}<br>
                                                    <span class="">Rp. {{ $total[$o->id_order] }}</span><br>
                                                    <span class="badge outline-badge-{{ $status[$o->status][0] }}">{{ $status[$o->status][1] }}</span>
                                                </div></td>
                                                <td><div class="td-content">
                                                    <a href="/order/{{$o->id_order}}" class="btn btn-primary btn-sm">Detail</a>
                                                </div></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        setInterval(call, 2000);
                        function call(){
                            $.ajax({
                                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                                url: "/get/order/", // Isi dengan url/path file php yang dituju
                                // data: {id_user : id}, // data yang akan dikirim ke file yang dituju
                                dataType: "json",
                                beforeSend: function(e) {
                                  if(e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json;charset=UTF-8");
                                  }
                                },
                                success: function(response){ // Ketika proses pengiriman berhasil
                                  // set isi dari combobox kota
                                  // lalu munculkan kembali combobox kotanya
                                    $('#desktopTable').empty();
                                    $('#mobileTable').empty();
                                    $.each(response, function(key, value){
                                        var dCon = '<tr>'
                                            +'<td><div class="td-content">#'+value['id_order']+'</div></td>'
                                            +'<td><div class="td-content customer-name">'+value['name']+'</div></td>'
                                            +'<td><div class="td-content pricing"><span class="">Rp. '+value['total']+'</span></div></td>'
                                            +'<td><div class="td-content"><span class="badge outline-badge-'+value['st_color']+'">'+value['st_text']+'</span></div></td>'
                                            +'<td><div class="td-content">'
                                                +'<a href="/order/'+value['id_order']+'" class="btn btn-primary">Detail</a>'
                                            +'</div></td>'
                                        +'</tr>';
                                        $('#desktopTable').append(dCon);

                                        var mCon = '<tr>'
                                                +'<td><div class="td-content customer-name">'
                                                    +value['name']+'<br>'
                                                    +'<span class="">Rp. '+value['total']+'</span><br>'
                                                    +'<span class="badge outline-badge-'+value['st_color']+'">'+value['st_text']+'</span>'
                                                +'</div></td>'
                                                +'<td><div class="td-content">'
                                                    +'<a href="/order/'+value['id_order']+'" class="btn btn-primary btn-sm">Detail</a>'
                                                +'</div></td>'
                                            +'</tr>';
                                        $('#mobileTable').append(mCon);
                                    });
                                  
                                },
                                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                                  // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                                }
                              });
                        }
                    </script>
@endsection