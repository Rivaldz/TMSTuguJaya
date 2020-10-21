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
                    <div class="row" style="padding-top: 10px;">
                        <?php foreach($karyawan as $k){ ?>
                        <div class="col-md-5" style="border: 1px solid black; margin-left: 2%; border-radius: 10px;">
                            <div class="col-md-2">
                            <i class="material-icons" style="font-size: 48px; padding-top: 10px;">
                                account_circle
                            </i>
                            </div>
                            <div class="col-md-10">
                                <h3><?php echo $k['nama'] ?></h3>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>