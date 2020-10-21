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
						Data Karyawan
					</h2>
				</div>
				<div class="body">
					<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add">
						<i class="material-icons">person_add</i>
						<span>Tambah Data</span>
					</button>
					<div class="table-responsive" style="margin-top: 20px;">
						<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Email</th>
									<th>No. Telp</th>
									<th>Posisi</th>
									<?php if($this->session->userdata('role')==1 || $this->session->userdata('role')==2) { ?>
									<th>Username</th>
									<th>Action</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($karyawan as $k) { ?>
								<tr>
									<td><?php echo $k['nama'] ?></td>
									<td><?php echo $k['alamat'] ?></td>
									<td><?php echo $k['email'] ?></td>
									<td><?php echo $k['no_telp'] ?></td>
									<td>
										<?php
											if($k['role']==2){
												echo 'Human Resource';
											}
											else if($k['role']==3){
												echo 'Atasan';
											}
											else if($k['role']==4){
												echo 'Karyawan';
											}
										?>
									</td>
									<?php if($this->session->userdata('role')==1 || $this->session->userdata('role')==2) { ?>
									<td><?php echo $k['username'] ?></td>
									<td>
										<button type="button" class="btn bg-yellow waves-effect" data-toggle="modal" data-target="#edit<?php echo $no; ?>">
											<i class="material-icons">edit</i>
										</button>
										<a href="<?php echo base_url() ?>Karyawan/deleteKaryawan/<?php echo $k['id_user'] ?>" onclick="return confirm('Anda Yakin Ingin Hapus Data Ini ?')"><button type="button" class="btn btn-danger waves-effect">
											<i class="material-icons">delete</i>
										</button></a>
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

<?php $num=1; foreach($karyawan as $k){ ?>
	<div class="modal fade" id="edit<?php echo $num; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">Tambah Data Karyawan</h4>
			</div>
			<form action="<?php echo base_url() ?>Karyawan/editKaryawan/<?php echo $k['id_user'] ?>" method="POST">
				<div class="modal-body">
					<label for="nama_karyawan">Nama Karyawan</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="nama_karyawan" class="form-control" value="<?php echo $k['nama'] ?>"
								placeholder="Masukkan nama karyawan">
						</div>
					</div>
					<label for="alamat">Alamat</label>
					<div class="form-group">
						<div class="form-line">
							<textarea name="alamat" name="alamat" rows="4" class="form-control no-resize"
								placeholder="Masukkan alamat karyawan"><?php echo $k['alamat'] ?></textarea>
						</div>
					</div>
					<label for="email">Email</label>
					<div class="form-group">
						<div class="form-line">
							<input type="email" name="email" class="form-control" value="<?php echo $k['email'] ?>" placeholder="Masukkan email karyawan">
						</div>
					</div>
					<label for="no_telp">Nomor Telepon</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="no_telp" class="form-control" value="<?php echo $k['no_telp'] ?>"
								placeholder="Masukkan nomor telepon karyawan">
						</div>
					</div>
					<label for="username">Username</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="username" class="form-control" value="<?php echo $k['username'] ?>"
								placeholder="Masukkan username karyawan">
						</div>
					</div>
					<label for="password">Password</label>
					<div class="form-group">
						<div class="form-line">
							<input type="password" name="password" class="form-control"
								placeholder="Kosongi saja jika tidak ingin mengganti password">
						</div>
					</div>
					<label for="nama_karyawan">Role</label>
					<div class="form-group">
						<div class="form-line">
							<select name="role" class="form-control show-tick">
								<?php
									if($k['role']==2){
										echo '<option value="2" selected>Human Resource</option>
										<option value="3">Atasan</option>
										<option value="4">Karyawan</option>';
									}
									else if($k['role']==3){
										echo '<option value="2">Human Resource</option>
										<option value="3" selected>Atasan</option>
										<option value="4">Karyawan</option>';
									}
									else if($k['role']==4){
										echo '<option value="2">Human Resource</option>
										<option value="3">Atasan</option>
										<option value="4" selected>Karyawan</option>';
									}
								?>
							</select>
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
				<h4 class="modal-title" id="largeModalLabel">Tambah Data Karyawan</h4>
			</div>
			<form action="<?php echo base_url() ?>Karyawan/addKaryawan" method="POST">
				<div class="modal-body">
					<label for="nama_karyawan">Nama Karyawan</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="nama_karyawan" class="form-control"
								placeholder="Masukkan nama karyawan">
						</div>
					</div>
					<label for="alamat">Alamat</label>
					<div class="form-group">
						<div class="form-line">
							<textarea name="alamat" name="alamat" rows="4" class="form-control no-resize"
								placeholder="Masukkan alamat karyawan"></textarea>
						</div>
					</div>
					<label for="email">Email</label>
					<div class="form-group">
						<div class="form-line">
							<input type="email" name="email" class="form-control" placeholder="Masukkan email karyawan">
						</div>
					</div>
					<label for="no_telp">Nomor Telepon</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="no_telp" class="form-control"
								placeholder="Masukkan nomor telepon karyawan">
						</div>
					</div>
					<label for="username">Username</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="username" class="form-control"
								placeholder="Masukkan username karyawan">
						</div>
					</div>
					<label for="password">Password</label>
					<div class="form-group">
						<div class="form-line">
							<input type="password" name="password" class="form-control"
								placeholder="Enter your password">
						</div>
					</div>
					<label for="nama_karyawan">Role</label>
					<div class="form-group">
						<div class="form-line">
							<select name="role" class="form-control show-tick">
								<option value="2">Human Resource</option>
								<option value="3">Atasan</option>
								<option value="4">Karyawan</option>
							</select>
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