<div class="container-fluid">
	<div class="block-header">
		<ol class="breadcrumb breadcrumb-col-pink">
			<li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
			<li class="active"><i class="material-icons">library_books</i> <?php echo $title; ?></li>
		</ol>
	</div>
	<!-- Basic Card -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						Data Reward
					</h2>
				</div>
				<div class="body">
				<?php if($this->session->userdata('role')==1 || $this->session->userdata('role')==2) { ?>
					<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add">
						<i class="material-icons">person_add</i>
						<span>Tambah Data</span>
					</button>
				<?php } ?>
					<div class="table-responsive" style="margin-top: 20px;">
						<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
							<thead>
								<tr>
									<th>Nama Reward</th>
									<th>Poin</th>
									<th>Nama Karyawan</th>
									<?php if($this->session->userdata('role')==1 || $this->session->userdata('role')==2) { ?>
									<th>Action</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($reward as $k) { ?>
								<tr>
									<td><?php echo $k['nama_reward'] ?></td>
									<td><?php echo $k['poin'] ?></td>
									<td><?php echo $k['stok'] ?></td>
									<?php if($this->session->userdata('role')==1 || $this->session->userdata('role')==2) { ?>
									<td>
										<button type="button" class="btn bg-yellow waves-effect" data-toggle="modal" data-target="#edit<?php echo $no; ?>">
											<i class="material-icons">edit</i>
										</button>
										<a href="<?php echo base_url() ?>Reward/deleteReward/<?php echo $k['id_reward'] ?>" onclick="return confirm('Anda Yakin Ingin Hapus Data Ini ?')"><button type="button" class="btn btn-danger waves-effect">
											<i class="material-icons">delete</i>
										</button></a>
										<button class="btn bg-orange waves-effect">
											Cek
										</button>
									</td>
									<?php } ?>
								</tr>
								<?php $no++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $num=1; foreach($reward as $k){ ?>
	<div class="modal fade" id="edit<?php echo $num; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">Tambah Data Reward</h4>
			</div>
			<form action="<?php echo base_url() ?>Reward/editReward/<?php echo $k['id_reward'] ?>" method="POST">
				<div class="modal-body">
					<label for="nama_reward">Nama Reward</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="nama_reward" class="form-control" value="<?php echo $k['nama_reward'] ?>"
								placeholder="Masukkan nama reward">
						</div>
					</div>
					<label for="deskripsi">Deskripsi</label>
					<div class="form-group">
						<div class="form-line">
							<textarea name="deskripsi" name="deskripsi" rows="4" class="form-control no-resize"
								placeholder="Masukkan deskripsi reward"><?php echo $k['deskripsi'] ?></textarea>
						</div>
					</div>
					<label for="poin">Poin</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="poin" class="form-control" value="<?php echo $k['poin'] ?>"
								placeholder="Masukkan poin reward">
						</div>
					</div>
                    <label for="stok">Stok</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="stok" class="form-control" value="<?php echo $k['stok'] ?>"
								placeholder="Masukkan stok reward">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
					<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $num++; } ?>

<div class="modal fade" id="add" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">Tambah Data Reward</h4>
			</div>
			<form action="<?php echo base_url() ?>Reward/addReward" method="POST">
				<div class="modal-body">
                <label for="nama_reward">Nama Reward</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="nama_reward" class="form-control"
								placeholder="Masukkan nama reward">
						</div>
					</div>
					<label for="deskripsi">Deskripsi</label>
					<div class="form-group">
						<div class="form-line">
							<textarea name="deskripsi" name="deskripsi" rows="4" class="form-control no-resize"
								placeholder="Masukkan deskripsi reward"></textarea>
						</div>
					</div>
					<label for="poin">Poin</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="poin" class="form-control"
								placeholder="Masukkan poin reward">
						</div>
					</div>
                    <label for="stok">Stok</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="stok" class="form-control"
								placeholder="Masukkan stok reward">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
					<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">BATAL</button>
				</div>
			</form>
		</div>
	</div>
</div>