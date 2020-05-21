<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>Printout Struk</title>
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		@font-face{
		  font-family: 'Nunito';
		  src: url(/assets/fonts/Nunito-Medium.ttf) format('truetype');
		}
		*{
			font-family: 'Nunito';
		}
		table *{
			font-size: 16px;
		}
	</style>
</head>
<body>
	<div class="container-fluid p-5">
		<div class="row">
			<div class="col-6 p-3">
				<h1 class="mb-3 mt-2">FOODCOURT</h1>
			</div>
			<div class="col-6 p-3 text-right">
				<img src="/assets/img/logo.png" height="90">
			</div>
			<div class="col-12 pt-3">
				<hr>
				<table width="50%">
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td>{{ $date }}</td>
					</tr>
					<tr>
						<td>Jam</td>
						<td>:</td>
						<td>{{ $time }}</td>
					</tr>
					<tr>
						<td>Nama Pelanggan</td>
						<td>:</td>
						<td>{{ $customer_name }}</td>
					</tr>
					<tr>
						<td>Nomor Meja</td>
						<td>:</td>
						<td>{{ $table_no }}</td>
					</tr>
					<tr>
						<td>Kasir</td>
						<td>:</td>
						<td>{{ Session::get('name') }}</td>
					</tr>
				</table>
				<hr>
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
                    @if($cstand != $pstand)
                    <hr>
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
                            <tbody>
                                @foreach($menu[$o->id_order] as $m)
                                <tr>
                                    <td width="50%"><div class="td-content customer-name">{{ $m->menu_name }}</div></td>
                                    <td><div class="td-content">{{ $m->quantity }}x</div></td>
                                    <td class="text-right"><div class="td-content pricing"><span class="">Rp. {{ $m->quantity * $m->price }}</span></div></td>
                                    @php
                                        $total += $m->price * $m->quantity;
                                    @endphp
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                @if(++$i === $n)
                                <tr>
                                    <th colspan="2"><div class="th-content text-right">Total Harga</div></th>
                                    <th><div class="th-content text-right">Rp. {{ $total }}</div></th>
                                </tr>
                                <tr>
                                    <th colspan="2"><div class="th-content text-right">Cash</div></th>
                                    <th><div class="th-content text-right">Rp. {{ $cash }}</div></th>
                                </tr>
                                <tr>
                                    <th colspan="2"><div class="th-content text-right">Kembali</div></th>
                                    <th><div class="th-content text-right">Rp. {{ $charge }}</div></th>
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
	</div>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>