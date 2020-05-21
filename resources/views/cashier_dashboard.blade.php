@extends('cashier_master')

@section('title', 'Dashboard Kasir')

@section('content')
                    <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Daftar Pesanan</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><div class="th-content">Nomor Meja</div></th>
                                                <th><div class="th-content">Nama Customer</div></th>
                                                <th><div class="th-content"></div></th>
                                            </tr>
                                        </thead>
                                        <tbody id="desktopTable">
                                            @foreach($table as $t)
                                            <tr>
                                                <td><div class="td-content customer-name">{{ $t->table_no }}</div></td>
                                                <td><div class="td-content customer-name">{{ $t->customer_name }}</div></td>
                                                <td><div class="td-content">
                                                    <a href="/cashier/order/{{ $t->id_table."/".$t->customer_name }}" class="btn btn-primary">Detail</a>
                                                </div></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                        setInterval(call, 2000);
                        function call(){
                            $.ajax({
                                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                                url: "/cashier/get/order/", // Isi dengan url/path file php yang dituju
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
                                    $.each(response, function(key, value){
                                        var dCon = '<tr>'
                                                +'<td><div class="td-content customer-name">'+value['table_no']+'</div></td>'
                                                +'<td><div class="td-content customer-name">'+value['customer_name']+'</div></td>'
                                                +'<td><div class="td-content">'
                                                    +'<a href="/cashier/order/'+value['id_table']+'/'+value['customer_name']+'" class="btn btn-primary">Detail</a>'
                                                +'</div></td>'
                                            +'</tr>';
                                        $('#desktopTable').append(dCon);
                                    });
                                  
                                },
                                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                                  // alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                                }
                              });
                        }
                    </script>
@endsection