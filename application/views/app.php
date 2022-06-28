<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('./assets/css/bootstrap.min.css'); ?>">
	<title>POS - SPAREPART MOTOR</title>
</head>

<body style="background-color: #76BA99;">
	<div class="container-fluid">
		<div class="row">
			<nav class="navbar navbar-dark bg-dark">
				<div class="container-fluid">
					<span class="navbar-brand mb-0 h1">APLIKASI POS</span>
				</div>
			</nav>
			<div class="col-lg-12">
				<div class="row p-5">
					<div class="card">
						<div class="card-body">
							<form action="<?= base_url('tambah') ?>" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group mb-3">
											<label for="">Nama Pelanggan</label>
											<input type="text" name="nama_pelanggan" class="form-control mt-2" required>
										</div>
										<div class="form-group mb-3">
											<label for="">Nama Barang</label>
											<select name="nama_barang" class="form-control mt-2" id="" required>
												<option selected disabled>-- Pilih Barang --</option>
												<?php foreach ($sparepart as $s) { ?>
													<option value="<?= $s ?>"><?= $s ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group mb-3">
											<label for="">Harga</label>
											<input type="number" name="harga" class="form-control mt-2" required>
										</div>
										<div class="form-group mb-3">
											<label for="">QTY</label>
											<input type="number" name="qty" class="form-control mt-2" required>
										</div>
									</div>
								</div>
								<div class="form-group mt-3">
									<button type="submit" class="btn btn-success">Simpan</button>
								</div>
							</form>
						</div>
					</div>
					<div class="card mt-5">
						<div class="card-header bg-info">
							<h4>Data Transaksi</h4>
						</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th>Nama Pelanggan</th>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th>QTY</th>
										<th>Sub Total</th>
										<th>Diskon</th>
										<th>Total Bayar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php $no = 1;
										foreach ($transaksi as $t) { ?>
											<th scope="row"><?= $no ?></th>
											<td><?= $t->nama_pelanggan ?></td>
											<td><?= $t->nama_barang ?></td>
											<td>Rp. <?= number_format($t->harga, 0) ?></td>
											<td><?= $t->qty ?></td>
											<td>Rp. <?= number_format($t->sub_total, 0) ?></td>
											<td>Rp. <?= number_format($t->diskon, 0) ?></td>
											<td>
												<?php
												$bayar = $t->sub_total - $t->diskon;
												?>
												Rp. <?= number_format($bayar, 0) ?>
											</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-warning btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#edit<?= $t->id ?>">Edit</button>
													<a href="<?= base_url('hapus/' . $t->id) ?>" class="btn btn-danger btn-sm fw-bold">Hapus</a>
												</div>

												<div class="modal fade" id="edit<?= $t->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<form action="<?= base_url('update/' . $t->id) ?>" method="post" enctype="multipart/form-data">
																	<div class="row">
																		<div class="col-lg-6">
																			<div class="form-group mb-3">
																				<label for="">Nama Pelanggan</label>
																				<input type="text" name="nama_pelanggan" value="<?= $t->nama_pelanggan ?>" class="form-control mt-2" required>
																			</div>
																			<div class="form-group mb-3">
																				<label for="">Nama Barang</label>
																				<select name="nama_barang" class="form-control mt-2" id="" required>
																					<option selected disabled>-- Pilih Barang --</option>
																					<?php foreach ($sparepart as $s) { ?>
																						<option value="<?= $s ?>" <?= $t->nama_barang == $s ? 'selected' : '' ?>><?= $s ?></option>
																					<?php } ?>
																				</select>
																			</div>
																		</div>
																		<div class="col-lg-6">
																			<div class="form-group mb-3">
																				<label for="">Harga</label>
																				<input type="number" name="harga" value="<?= $t->harga ?>" class="form-control mt-2" required>
																			</div>
																			<div class="form-group mb-3">
																				<label for="">QTY</label>
																				<input type="number" name="qty" value="<?= $t->qty ?>" class="form-control mt-2" required>
																			</div>
																		</div>
																	</div>
																	<div class="form-group mt-3">
																		<button type="submit" class="btn btn-success">Simpan</button>
																	</div>
																</form>
															</div>
															<div class="modal-footer">

															</div>
														</div>
													</div>
												</div>

											</td>

									</tr>
								<?php $no++;
										} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('./assets/js/bootstrap.min.js') ?>"></script>

</body>

</html>
