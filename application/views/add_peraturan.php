  <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <!-- <h4 class="page-title" style="color: #272996" >Pemasaran</h4> -->
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Pedoman dan Peraturan</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Sertifikat</li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="<?php echo $action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card-body">
                        <br><h4 class="card-title" style="color: #272996"><b>Tambah Data Standar Teknis Peraturan Terkait</b></h4><br>
                        
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">No. Dokumen</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="judul" name="no_dok" placeholder="">
                            </div>
                        </div>
                   
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Perihal</label>
                            <div class="col-sm-8">
                                 <textarea name="perihal" rows="3" class="form-control" placeholder=""></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Tanggal</label>
                            <div class="col-sm-8">
                               <input type="text" class="form-control" name="tanggal" id="datepicker-autoclose" placeholder="">
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Upload Dokumen</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="file" required>
                            </div>
                        </div>
                      
                   
                        
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">&nbsp;</label>
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-secondary waves-effect">Batal</button> 
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    // $(".select2").select2();
</script>
