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
