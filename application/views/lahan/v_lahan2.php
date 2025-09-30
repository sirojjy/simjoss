<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<h5 class="mb-0 text-uppercase"><b>Progres Lahan</b></h5>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="<?php echo site_url('Lahan/add_progresLahan') ?>"><button type="button" class="btn btn-primary">Tambah Data</button></a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr style="text-align: center">
										<th style="width: 25px">No.</th>
										<th style="width: 90px;">Tanggal</th>
										<th>Seksi</th>
										<th>Progres</th>
										<th style="width: 100px;">Kebutuhan Bidang</th>
										<th style="width: 100px;">Realisasi</th>
										<th style="width: 90px;">Issue Open</th>
										<th style="width: 140px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td align="center">1.</td>
										<td align="center">07-07-2022</td>
										<td align="center">Paket II Seksi 1</td>
										<td><div class="progress" style="height: 6px;">
	                                      <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 80%"></div>
	                                      </div></td>
										<td align="center">600</td>
										<td align="center">400</td>
										<td align="center"><a href="<?php echo site_url('Issue') ?>"><span class="badge bg-gradient-ibiza rounded-pill">3</span></a></td>
										<td align="center"><button type="button" class="btn btn-sm btn-success"><i class='bx bx-edit me-0'></i></button>&emsp;<button type="button" class="btn btn-sm btn-danger"><i class='bx bx-trash-alt me-0'></i></button></td>
									</tr>
									<tr>
										<td align="center">2.</td>
										<td align="center">07-07-2022</td>
										<td align="center">Paket III Seksi 2</td>
										<td><div class="progress" style="height: 6px;">
	                                      <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
	                                      </div></td>
										<td align="center">250</td>
										<td align="center">130</td>
										<td align="center"><span class="badge bg-gradient-ibiza rounded-pill">1</span></td>
										<td align="center"><button type="button" class="btn btn-sm btn-success"><i class='bx bx-edit me-0'></i></button>&emsp;<button type="button" class="btn btn-sm btn-danger"><i class='bx bx-trash-alt me-0'></i></button></td>
									</tr>
									<tr>
										<td align="center">3.</td>
										<td align="center">07-07-2022</td>
										<td align="center">Paket III Seksi 3</td>
										<td><div class="progress" style="height: 6px;">
	                                      <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 70%"></div>
	                                      </div></td>
										<td align="center">100</td>
										<td align="center">40</td>
										<td align="center"><span class="badge bg-gradient-ibiza rounded-pill ">2</span></td>
										<td align="center"><button type="button" class="btn btn-sm btn-success"><i class='bx bx-edit me-0'></i></button>&emsp;<button type="button" class="btn btn-sm btn-danger"><i class='bx bx-trash-alt me-0'></i></button></td>
									</tr>
									
									
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
				
			</div>
