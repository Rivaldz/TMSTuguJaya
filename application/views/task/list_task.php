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
						Data Task
					</h2>
				</div>
				<div class="body">
					<?php
                        if($this->session->userdata('role')==1){
                    ?>
					<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add">
						<i class="material-icons">person_add</i>
						<span>Tambah Data</span>
					</button>
					<?php
						}
					?>
					<div class="table-responsive" style="margin-top: 20px;">
						<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
							<thead>
								<tr>
									<th>Nama Task</th>
									<th>Deskripsi</th>
									<th>To</th>
									<th>Dibuat Tanggal</th>
									<th>Deadline</th>
									<th>Poin</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($task as $k) { ?>
								<tr>
									<td><?php echo $k['nama_task'] ?></td>
									<td><?php echo $k['deskripsi'] ?></td>
										<?php 
											foreach($bos as $b) {
												if($b['id_user'] == $k['dari']){
													echo $b['nama'];
												}
											}
										?>
									<td>
										<?php 
											foreach($karyawan as $kar) {
												if($kar['id_user']==$k['ke']){
													echo $kar['nama'];
												}
											}
										?>
									</td>
									<td><?php echo $k['created_at'] ?></td>
									<td><?php echo $k['deadline'] ?></td>
									<td><?php echo $k['poin'] ?></td>

									<td>
									<?php
									if($this->session->userdata('role')==1){
									 ?>
										<button type="button" class="btn bg-yellow waves-effect" data-toggle="modal" data-target="#edit<?php echo $no; ?>">
											<i class="material-icons">edit</i>
										</button>
										<a href="<?php echo base_url() ?>Task/deleteTask/<?php echo $k['id_task'] ?>" onclick="return confirm('Anda Yakin Ingin Hapus Data Ini ?')"><button type="button" class="btn btn-danger waves-effect">
											<i class="material-icons">delete</i>
										</button></a>

									<?php 
									}else if($this->session->userdata('role')==4){
									 ?>
									 	<?php if($k['status']==0){ ?>
										<a href="<?php echo base_url() ?>Task/startTask/<?php echo $k['id_task'] ?>" onclick="return confirm('Anda yakin telah menyelesaikan pekerjaan ini?')">
										<button type="button" class="btn btn-danger waves-effect">
										SELESAI	
										</button></a>
										<?php }else if($k['status']==1){?>
											<h6>Checking by Atasan/HR</h6>
										<?php } ?>
									 <?php } ?>
									</td>
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

<?php $num=1; foreach($task as $k){ ?>
	<div class="modal fade" id="edit<?php echo $num; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">Tambah Data Task</h4>
			</div>
			<form action="<?php echo base_url() ?>Task/editTask/<?php echo $k['id_task'] ?>" method="POST">
				<div class="modal-body">
					<label for="nama_task">Nama Task</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="nama_task" class="form-control" value="<?php echo $k['nama_task'] ?>"
								placeholder="Masukkan nama task">
						</div>
					</div>
					<label for="deskripsi">Deskripsi Pekerjaan</label>
					<div class="form-group">
						<div class="form-line">
							<textarea name="deskripsi" name="deskripsi" rows="4" class="form-control no-resize"
								placeholder="Masukkan deskripsi task"><?php echo $k['deskripsi'] ?></textarea>
						</div>
					</div>
					<label for="dari">Dari</label>
					<div class="form-group">
						<div class="form-line">
							<select name="dari" id="dari" class="form-control">
								<?php foreach($bos as $b){ 
									if($k['dari']==$b['id_user']) { ?>
										<option value="<?php echo $b['id_user'] ?>" selected><?php echo $b['nama'] ?></option>
								<?php } else { ?>
										<option value="<?php echo $b['id_user'] ?>"><?php echo $b['nama'] ?></option>
								<?php }} ?>
							</select>
						</div>
					</div>
					<label for="ke">Ke</label>
					<div class="form-group">
						<div class="form-line">
							<select name="ke" id="ke" class="form-control">
								<?php foreach($karyawan as $kar){ 
									if($k['ke']==$kar['id_user']) { ?>
										<option value="<?php echo $kar['id_user'] ?>" selected><?php echo $kar['nama'] ?></option>
								<?php } else { ?>
										<option value="<?php echo $kar['id_user'] ?>"><?php echo $kar['nama'] ?></option>
								<?php }} ?>
							</select>
						</div>
					</div>
					<label for="poin">Poin</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="poin" class="form-control" value="<?php echo $k['poin'] ?>"
								placeholder="Masukkan poin task">
						</div>
					</div>
					<label for="deadline">Deadline</label>
					<div class="form-group">
						<div class="form-line">
							<input type="date" name="deadline" class="form-control" value="<?php echo $k['deadline'] ?>">
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
				<h4 class="modal-title" id="largeModalLabel">Tambah Data Task</h4>
			</div>
			<form action="<?php echo base_url() ?>Task/addTask" method="POST">
				<div class="modal-body">
				<label for="nama_task">Nama Task</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="nama_task" class="form-control"
								placeholder="Masukkan nama task">
						</div>
					</div>
					<label for="deskripsi">Deskripsi Pekerjaan</label>
					<div class="form-group">
						<div class="form-line">
							<textarea name="deskripsi" name="deskripsi" rows="4" class="form-control no-resize"
								placeholder="Masukkan deskripsi task"></textarea>
						</div>
					</div>
					<!-- <label for="dari">Dari</label> -->
					<div class="form-group">
						<!-- <div class="form-line">
							<select name="dari" id="dari" class="form-control">
								<?php foreach($bos as $b){ ?>
									<option value="<?php echo $b['id_user'] ?>"><?php echo $b['nama'] ?></option>
								<?php } ?>
							</select>
						</div> -->
					</div>
					<label for="ke">Ke</label>
					<div class="form-group">
						<div class="form-line">
							<select name="ke" id="ke" class="form-control">
								<?php foreach($karyawan as $kar){ ?>
									<option value="<?php echo $kar['id_user'] ?>"><?php echo $kar['nama'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<label for="poin">Poin</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="poin" class="form-control"
								placeholder="Masukkan poin task">
						</div>
					</div>
					<label for="deadline">Deadline</label>
					<div class="form-group">
						<div class="form-line">
							<input type="date" name="deadline" class="form-control">
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