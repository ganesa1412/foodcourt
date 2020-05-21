@extends('stand_master')

@section('title', 'Kategori Menu');

@section('content')
					<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <a class="btn btn-primary mb-3" href="#" data-toggle="modal" data-target="#addModal"><span>Tambah Kategori</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></a>

                         <!-- Modal -->
                            <form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ action('StandCrudController@add_category') }}">
                            	@csrf
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="level" value="2">
                                            <div class="form-group">
                                                <label for="nama">Nama Kategori</label>
                                                <input type="text" class="form-control" id="name" name="category_name" placeholder="Nama Kategori">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="zero-config" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nama Kategori</th>
                                                <th class="no-content">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($category as $c)
                                            <tr>
                                                <td>{{ $c->category_name }}</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#edModal" onclick="get_edit({{ $c->id_menu_category }})" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a> &nbsp;
                                                    <a href="/stand/delete/category/{{ $c->id_menu_category }}" onclick="return confirm('yakin ingin menghapus data ini?')" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Kategori</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <script type="text/javascript">
                        function get_edit(id){
                          $.ajax({
                           type: "GET", // Method pengiriman data bisa dengan GET atau POST
                            url: "/stand/get/category/"+id, // Isi dengan url/path file php yang dituju
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
                              $('#ed-id').val(response[0]['id_menu_category']);
                              $('#ed-name').val(response[0]['category_name']);
                            },
                            error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                            }
                          });
                        };
                    </script>

                    <!-- Modal -->
                    <form class="modal fade" id="edModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ action('StandCrudController@edit_category') }}">
                    	@csrf
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_menu_category" id="ed-id" value="">
                                    <div class="form-group">
                                        <label for="nama">Nama Kategori</label>
                                        <input type="text" class="form-control" id="ed-name" name="category_name" placeholder="Nama Kategori">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
@endsection