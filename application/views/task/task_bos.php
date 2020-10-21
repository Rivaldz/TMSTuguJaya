<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
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
						My Task
					</h2>
				</div>
				<div class="body">
					<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add">
						<i class="material-icons">person_add</i>
						<span>Tambah Task</span>
                    </button>
                    <div class="tab" style="margin-top: 10px;">
                        <button type="button" class="tablinks <?php if ($this->uri->segment(3) != '') {
                                                                    if ($this->uri->segment(3) == 'recent') {
                                                                        echo 'active';
                                                                    }
                                                                } else {
                                                                    echo 'active';
                                                                } ?>" onclick="openCity(event, 'Recent')">Recent</button>
                        <button type="button" class="tablinks <?php if ($this->uri->segment(3) != '') {
                                                                    if ($this->uri->segment(3) == 'history') {
                                                                        echo 'active';
                                                                    }
                                                                } ?>" onclick="openCity(event, 'History')">History</button>
                    </div>
					<div id="Recent" class="tabcontent" style="<?php if ($this->uri->segment(3) != '') {
                                                            if ($this->uri->segment(3) == 'recent') {
                                                                echo 'display: block;';
                                                            }
                                                        } else {
                                                            echo 'display: block;';
                                                        } ?>">
                        <div class="row" style="padding-top: 10px;">
                        <?php foreach($recent as $r){ ?>
                        <div class="col-md-11" style="border: 1px solid black; margin-left: 4%; border-radius: 10px; padding: 10px 10px 10px;">
                            <div class="col-md-1">
                            <i class="material-icons" style="font-size: 48px;">
                                perm_contact_calendar
                            </i>
                            <?php if($r['status']==0){ ?>
                            <a href="<?php echo base_url() ?>Task/startTask/<?php echo $r['id_task'] ?>"><button class="btn btn-primary">START</button></a>
                            <?php } else if($r['status']==1){ ?>
                            <a href="<?php echo base_url() ?>Task/finishTask/<?php echo $r['id_task'] ?>"><button class="btn btn-info">FINISH</button></a>
                            <?php } ?>
                            </div>
                            <div class="col-md-9">
                                <?php echo $r['nama_task'] ?><br>
                                <?php echo $r['deadline'] ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo $r['created_at'] ?><br>
                                <?php if($r['status']==0){ ?>
                                    <span class="label label-info">Waiting</span>
                                <?php } else if($r['status']==1){ ?>
                                    <span class="label label-warning">On Progress</span>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        </div>
                    </div>
                    <div id="History" class="tabcontent" style="<?php if ($this->uri->segment(3) != '') {
                                                            if ($this->uri->segment(3) == 'history') {
                                                                echo 'display: block;';
                                                            }
                                                        } ?>">
                        <div class="row" style="padding-top: 10px;">
                        <?php foreach($history as $h){ ?>
                        <div class="col-md-11" style="border: 1px solid black; margin-left: 4%; border-radius: 10px; padding: 10px 10px 10px;">
                            <div class="col-md-1">
                            <i class="material-icons" style="font-size: 48px;">
                                perm_contact_calendar
                            </i>
                            </div>
                            <div class="col-md-9">
                                <?php echo $h['nama_task'] ?><br>
                                <?php echo $h['deadline'] ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo $h['created_at'] ?><br>
                                <span class="label label-success">Finish</span>
                            </div>
                        </div>
                        <?php } ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <?php $num=1; foreach($task as $k){ ?>
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
<?php $num++; } ?> -->

<div class="modal fade" id="add" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">Tambah Task</h4>
			</div>
			<form action="<?php echo base_url() ?>Task/addTaskBos" method="POST">
				<div class="modal-body">
                <label for="nama_task">Nama Task</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" name="nama_task" class="form-control"
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
					<label for="deadline">Deadline</label>
					<div class="form-group">
                        <div class="form-line" id="bs_datepicker_container">
                            <input type="date" name="deadline" class="form-control" placeholder="Please choose a date...">
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
<script type="text/javascript">
    function openCity(evt, command) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(command).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>