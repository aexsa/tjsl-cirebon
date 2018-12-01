 <!-- Column -->
<div class="row">
    <div class="col-12">
    
        <?php if(!empty($status_perusahaan)):?>
            <?php foreach($status_perusahaan as $row):?>
                <?php if($row->status_validasi == 1):?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <h3 class="text-success"><i class="fa fa-check-circle"></i> Perusahaan Anda Telah di Verifikasi</h3> 
            Selamat, Status Perusahaan anda telah Terverifikasi Oleh SKPD setempat. Sekarang anda berhak  menerima permohonan TJSl dan dapat melakukan realisasi dana CSR perusahaan anda. terimakasih !
        </div>
        <?php endif; ?>
                <?php if($row->status_validasi == 0):?>

        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Perusahaan Anda Belum di Verifikasi</h3> 
            Pemberitahuan, Status Perusahaan anda Sedang dalam proses verifikasi Oleh SKPD setempat. Perusahaan anda belum berhak  menerima permohonan TJSl dan dapat melakukan realisasi dana CSR perusahaan anda. terimakasih !
        </div>
        <?php endif; ?>
        
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<!-- Column -->
 <div class="card-group">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h2>
                    <h3 class="">2456</h3>
                    <h6 class="card-subtitle">Permohonan Proposal TJSL</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                    <h3 class="">646</h3>
                    <h6 class="card-subtitle">ACC Permohonan TJSL</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple"></i></h2>
                    <h3 class="">561</h3>
                    <h6 class="card-subtitle">Realisasi Permohonan TJSL</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                    <h3 class="">$30010</h3>
                    <h6 class="card-subtitle">Laporan Realisasi TJSL</h6></div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    
                    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Realisasi TJSL Pemerintah Kota Cirebon</h4>
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>
               