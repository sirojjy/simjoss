<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand font-weight-bold" href="javascript:void(0);">Progres Lahan</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-align-justify"></i>
	</button>
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-xl-11 mx-auto">
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body">
					<form class="form-horizontal" action="<?php echo $action; ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
						<div class="border p-4 rounded">
							<div class="card-title d-flex align-items-center">
								<h6 class="mb-0 text-primary"> Data Progres Lahan</h6>
							</div>
							<hr />
							<div class="row mb-3">
								<label for="tgl" class="col-sm-3 col-form-label">Tanggal</label>
								<div class="col-sm-9">
									<input type="date" required="" name="tgl" id="tgl" class="form-control">
								</div>
							</div>
							<div class="row mb-3">
								<label for="inputEnterYourName" class="col-sm-3 col-form-label">Seksi</label>
								<div class="col-sm-3">
									<select class="form-control mb-3" name="seksi" required="" aria-label="Default select example">
										<option selected>--- Pilih ---</option>
										<?php foreach ($seksi as $se) { ?>
											<option value="<?php echo $se->id_seksi ?>"><?php echo $se->seksi ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="row mb-3">
								<label for="inputPhoneNo2" class="col-sm-3 col-form-label">Kebutuhan Bidang</label>
								<div class="col-sm-3">
									<input type="text" required="" name="kebutuhan_bidang" class="form-control">
								</div>
								<label class="col-sm-3 col-form-label"><b>bidang</b></label>
							</div>
							<div class="row mb-3">
								<label for="inputPhoneNo2" class="col-sm-3 col-form-label">Rencana</label>
								<div class="col-sm-3">
									<input type="text" required="" name="rencana" class="form-control">
								</div>
								<label class="col-sm-3 col-form-label"><b>%</b></label>
							</div>
							<div class="row mb-3">
								<label for="inputPhoneNo2" class="col-sm-3 col-form-label">Realisasi</label>
								<div class="col-sm-3">
									<input type="text" required="" name="realisasi" class="form-control">
								</div>
								<label class="col-sm-3 col-form-label"><b>%</b></label>
							</div>
							<div class="row mb-3">
								<label for="inputChoosePassword2" class="col-sm-3 col-form-label">File</label>
								<div class="col-sm-9">
									<input type="file" name="file" accept=".pdf" class="form-control">
								</div>
							</div>
							<br>
							<div class="row">
								<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-9">
									<button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
									<a href="<?php echo site_url('Dokumen') ?>"><button type="submit" class="btn btn-danger px-4">Batal</button></a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--end row-->
</div>