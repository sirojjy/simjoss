<div class="page-content">
				

				<div class="row">
					<div class="col-xl-12 mx-auto">
						<h5 class="mb-10 text-uppercase"><b>Progres Lahan</b></h5>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-file me-1 font-22 text-primary"></i>
										</div>
										<h6 class="mb-0 text-primary">Tambah Data Progres Lahan</h6>
									</div>
									<hr/>
									<div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Tanggal</label>
										<div class="col-sm-9">
											<input type="text" class="form-control datepicker" >
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Seksi</label>
										<div class="col-sm-9">
											<select class="form-select mb-3" aria-label="Default select example">
												<option selected>--- Pilih ---</option>
												<option value="1">Paket II Seksi 1</option>
												<option value="2">Paket III Seksi 2</option>
												<option value="2">Paket IV Seksi 2A</option>
												<option value="3">Paket III Seksi 3</option>
												<option value="3">Paket IV Seksi 3</option>
												<option value="3">Paket IV Seksi 3B</option>
											</select>
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputPhoneNo2" class="col-sm-3 col-form-label">STA</label>
										<div class="col-sm-9">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputPhoneNo2" class="col-sm-3 col-form-label">Rencana</label>
										<div class="col-sm-9">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputPhoneNo2" class="col-sm-3 col-form-label">Realisasi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputChoosePassword2" class="col-sm-3 col-form-label">File</label>
										<div class="col-sm-9">
											<input type="file" class="form-control">
										</div>
									</div>
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-bug-alt me-1 font-22 text-primary"></i>
										</div>
										<h6 class="mb-0 text-primary">Data Issue</h6>
									</div>
									<hr>
									<div class="row mb-3">
										<!-- <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Tanggal</label> -->
										<div class="col-sm-11">
											<table class="table-responsive table-bangunan">
			                                    <tbody>
			                                    	<tr>     
			                                            <td>
			                                                <div class="form-group " style="width: 150px">
			                                                    <label class="mb-2"><b>Tanggal</b></label>
			                                                </div>                                         
			                                            </td>
			                                            <td> &emsp;</td>
			                                            <td>
			                                                <div class="form-group " style="width: 250px">
			                                                    <label class="mb-2"><b>Issue</b></label>
			                                                </div>                                         
			                                            </td>
			                                            <td> &emsp;</td>
			                                            <td>
			                                                <div class="form-group form-group-default" style="width: 250px">
			                                                    <label class="mb-2"><b>Rekomendasi</b></label>
			                                                </div>                                         
			                                            </td>
			                                            <td> &emsp;</td>
			                                            <td>
			                                                <div class="form-group form-group-default">
			                                                    <label class="mb-2"><b>Status</b></label>
			                                                </div>                                         
			                                            </td>
			                                            
			                                            <td> &emsp;</td>
			                                            <td>
			                                                <div class="form-group form-group-default" >
			                                                    <label class="mb-2"><b>File (.pdf)</b></label>
			                                                   
			                                                </div>
			                                            </td>   
			                                        </tr>
			                                        <tr>     
			                                            <td>
			                                                <div class="form-group " style="width: 150px">
			                                                    <input type="date" class="form-control datepicker" name="tanggal[]">
			                                                </div>                                         
			                                            </td>
			                                            <td> &emsp;</td>
			                                            <td>
			                                                <div class="form-group " style="width: 250px">
			                                                    <textarea class="form-control" rows="2"></textarea>
			                                                </div>                                         
			                                            </td>
			                                            <td> &emsp;</td>
			                                            <td>
			                                                <div class="form-group form-group-default" style="width: 250px">
			                                                    <textarea class="form-control" rows="2"></textarea>
			                                                </div>                                         
			                                            </td>
			                                            <td> &emsp;</td>
			                                            <td>
			                                                <div class="form-group form-group-default">
			                                                    <select class="form-control" id="jenis_dokumen" name="jenis_dokumen[]" style="width: 120px">
			                                                        <option> ----- </option>
			                                                        <option value="10">Open</option>
			                                                        <option value="11">Close</option>
			                                                    </select> 
			                                                </div>                                         
			                                            </td>
			                                            
			                                            <td> &emsp;</td>
			                                            <td>
			                                                <div class="form-group form-group-default" >
			                                                    <input type="file" name="file_evidence[]" class="form-control" style="width: 100%">
			                                                </div>
			                                            </td>

			                                        </tr>
			                                    </tbody>
			                                </table>
										</div>
										<div class="col-sm-1">
											<div class="form-group form-group-default" >
												 <label class="mb-4"> &nbsp; </label><br>
												<button class="btn btn-sm btn-primary add-more" type="button" id="addRow"><i class="bx bx-plus me-0"></i></button>
											</div>
										</div>
									</div>
									
									<br>
									<div class="row">
										
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
											<a href="<?php echo site_url('Dokumen') ?>"><button type="submit" class="btn btn-danger px-4">Batal</button></a>
										</div>
									</div>
									<br><br>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>