<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Penjualan</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	<style>
		.simple-pagination ul {
			margin: 0 0 20px;
			padding: 10px 10px 10px 10px;
			list-style: none;
			text-align: center
		}
		.simple-pagination li {
			display: inline-block;
			margin-right: 5px
		}
		.simple-pagination li a,
		.simple-pagination li span {
			color: #666;
			padding: 5px 15px 5px 15px;
			text-decoration: none;
			border: 1px solid #eee;
			background-color: #fff;
			box-shadow: 0 0 10px 0 #eee
		}
		.simple-pagination .current {
			color: #fff;
			background-color: #0069d9;
			border-color: #0069d9;
		}
		.simple-pagination .next.current,
		.simple-pagination .prev.current {
			color: #666;
			background: #fff;
			border: 1px solid #eee;
			cursor: not-allowed
		}
	</style>
</head>
<body>
	<div class="container">
		<br>
		<h2>Data Penjualan</h2>
		<br>
		<form action="<?php echo base_url('/');?>" method="POST">
			<table width="100%" border="0">
				<tr>
					<td width="10%">Tgl. Penjualan</td>
					<td width="14%">
						<input type="date" name="awal">
					</td>
					<td width="5%">s/d</td>
					<td width="14%">
						<input type="date" name="akhir">
					</td>
					<td>
						<button class="btn btn-primary">Terapkan</button>
					</td>
				</tr>
			</table>
		</form>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID PENJUALAN</th>
					<th scope="col">NAMA PRODUK</th>
					<th scope="col">JUMLAH</th>
					<th scope="col">HARGA SATUAN</th>
					<th scope="col">SUB TOTAL</th>
					<th scope="col">DISKON</th>
					<th scope="col">TOTAL HARGA</th>
					<th scope="col">TGL. PENJUALAN</th>
				</tr>
			</thead>
			<tbody class="list-wrapper">
				<?php foreach ($data->result() as $row):?>
				<tr class="list-item">
					<th scope="row"><?php echo $row->id_penjualan;?></th>
					<td><?php echo $row->nama_produk;?></td>
					<td><?php echo $row->jumlah_beli;?></td>
					<td><?php echo number_format($row->harga_satuan, 0, ',', '.');?></td>
					<td><?php echo number_format($row->subtotal, 0, ',', '.');?></td>
					<td><?php echo $row->diskon;?>%</td>
					<td><?php echo number_format(round($row->totalharga,0), 0, ',', '.');?></td>
					<td><?php echo $row->tgl_penjualan;?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div id="pagination-container"></div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.simplePagination.js');?>"></script>
	<script>
		var items = $(".list-wrapper .list-item");
		var numItems = items.length;
		var perPage = 5;
		items.slice(perPage).hide();
		$('#pagination-container').pagination({
			items: numItems,
			itemsOnPage: perPage,
			prevText: "Previous",
			nextText: "Next",
			onPageClick: function (pageNumber) {
				var showFrom = perPage * (pageNumber - 1);
				var showTo = showFrom + perPage;
				items.hide().slice(showFrom, showTo).show();
			}
		});
	</script>
</body>
</html>