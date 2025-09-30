<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand font-weight-bold" href="javascript:void(0);">Progres Nilai</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-align-justify"></i>
	</button>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-12 mx-auto">
			<div class="card border-top border-0 border-4 border-primary">
				<div class="card-body">
					<form class="form-horizontal" action="<?= $action; ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
						<div class="border p-4 rounded">
							<div class="card-title d-flex align-items-center">
								<h6 class="mb-0 text-primary font-weight-bold"> Data Progres Nilai</h6>
							</div>
							<hr />
							<div class="row mb-3">
								<label for="tgl" class="col-sm-3 col-form-label">Tanggal</label>
								<div class="col-sm-8">
									<input type="date" required="" id="tgl" name="tgl" class="form-control">
								</div>
							</div>
							<div class="row mb-3">
								<label for="seksi" class="col-sm-3 col-form-label">Seksi</label>
								<div class="col-sm-8">
									<select class="form-control mb-8" id="seksi" name="seksi" required="" aria-label="Default select example">
										<option selected disabled value="">--- Pilih ---</option>
										<?php foreach ($seksi as $se) { ?>
											<option value="<?= $se->id_seksi ?>"><?= $se->seksi ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="row mb-3">
								<label for="kontrak" class="col-sm-3 col-form-label">Kontrak + PPN</label>
								<label class="col-sm-1 col-form-label"><b>Rp.</b></label>
								<div class="col-sm-7">
									<input type="number" required="" id="kontrak" name="kontrak_ppn" class="form-control">
								</div>
							</div>
							<div class="row mb-3">
								<label for="akrual" class="col-sm-3 col-form-label">Akrual Progres Konstruksi</label>
								<label class="col-sm-1 col-form-label"><b>Rp.</b></label>
								<div class="col-sm-7">
									<input type="number" required="" id="akrual" name="akrual_progres" class="form-control">
								</div>
							</div>
							<div class="row mb-3">
								<label for="telah_dibayar" class="col-sm-3 col-form-label">Telah Dibayarkan</label>
								<label class="col-sm-1 col-form-label"><b>Rp.</b></label>
								<div class="col-sm-7">
									<input type="number" required="" id="telah_dibayar" name="telah_dibayar" class="form-control">
								</div>
							</div>
							<div class="row mb-3">
								<label for="deviasi_rupiah" class="col-sm-3 col-form-label">Deviasi Rupiah (Kontrak - Telah dibayarkan) </label>
								<label class="col-sm-1 col-form-label"><b>Rp.</b></label>
								<div class="col-sm-7">
									<input type="number" required="" id="deviasi_rupiah" name="deviasi_rupiah_dibayar" class="form-control">
								</div>
							</div>
							<div class="row mb-3">
								<label for="file" class="col-sm-3 col-form-label">File</label>
								<div class="col-sm-9">
									<input type="file" id="file" accept=".pdf" name="file" class="form-control">
								</div>
							</div>
							<div class="row">
								<label class="col-sm-3 col-form-label"></label>
								<div class="col-sm-9">
									<button type="submit" class="btn btn-primary px-4 mr-2">Simpan</button>
									<a href="<?= site_url('Progres/nilai') ?>"><button type="submit" class="btn btn-danger px-4">Batal</button></a>
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