<script type="text/javascript">
var url = "<?php echo site_url('skpd/tipe_perusahaan/') ?>";
</script>
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data  Tipe Perusahaan</h4>
                <!-- <h6 class="card-title">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                <button class="new btn btn-sm btn-success" > <i class="fa fa-plus"></i> Tambah baru</button> </a>
                <div class="table-responsive m-t-10">
                    <table id="tipe_perusahaan" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th>ID </th>
                            <th>Nama Tipe Perusahaan</th>
                            <th>Keterangan</th>
                            <th width="180px">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->

<!-- MODALS tambah-->

<div class="modal" id="modal_tipe_perusahaan" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <?php  echo form_open('', 'id="form_tipe_perusahaan"'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defModalHead">Basic Modal</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <!-- <label class="col-md-3 col-xs-12 control-label">Nama  Tipe Perusahaan</label> -->
                        <div class="col-md-12 col-xs-12">
                            <input type="hidden" class="form-control" name="id" >
                            <input type="text" class="form-control" name="nama_tipe_perusahaan" placeholder="Nama Tipe Perusahaan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label class="col-md-3 col-xs-12 control-label">Keterangan</label> -->
                        <div class="col-md-12 col-xs-12">
                            <textarea class="form-control" name="ket" placeholder="keterangan" required></textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="mit" class="btn btn-primary">Simpan</button>
                    <a  class="btn btn-default" data-dismiss="modal">Batal</a>
                </div>
            </div>
        <?php  echo form_close(); ?>
    </div>
</div>

<div class="modal" id="modal_confirm" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-body">
                <p>Yakin hapus Tipe Perusahaan?</p>
                <input type="hidden" id="id_delete">
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm_delete" class="btn btn-danger"  data-dismiss="modal">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>

    </div>
</div>
