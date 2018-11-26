$(document).ready(function() {

	var permohonan_tjsl = $('#permohonan_tjsl').DataTable({
        ajax : url+'listener_show_all',
        processing: true,
        columns: [
        { sName: "permohonan_tjsl_id" },
        { sName: "nama_pj" },
        { sName: "tipe_pj" },
        { sName: "email" },
        { sName: "nama_program_prioritas" },
        { sName: "nama_perusahaan" },
        { sName: "nilai_rab" },
        { sName: "aksi" }
         ],
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        columnDefs: [
        { targets: [0], visible: false},
        ]
    });
    

    //event ketika tombol edit di click
    $(document).on('click', '.detail', function() {
        var id_permohonan_tjsl = $(this).data('id');
        // alert(id_permohonan_tjsl);
        $.ajax({
            type: 'post',
            url: url+'get_permohonan_tjsl',
            data: {id : id_permohonan_tjsl},
            dataType: 'json',
            success: function (dt) {
                $('#modal_detail .modal-title').html('Permohonan <strong class="text-success">'  +id_permohonan_tjsl+ '</strong>'); 
                $('#modal_detail input[name="id"]').val(dt.id);
                $('#modal_detail input[name="nama_pemohon"]').val(dt.nama_pj);
                $('#modal_detail input[name="program_prioritas"]').val(dt.nama_program_prioritas);
                $('#modal_detail input[name="tipe_pemohon"]').val(dt.tipe_pemohon);
                $('#modal_detail input[name="sub_program_prioritas"]').val(dt.nama_sub_program_prioritas);
                $('#modal_detail input[name="email"]').val(dt.email);
                $('#modal_detail input[name="tipe_perusahaan"]').val(dt.nama_tipe_perusahaan);
                $('#modal_detail input[name="nik_pj"]').val(dt.nik_pj);
                $('#modal_detail input[name="nama_perusahaan"]').val(dt.nama_perusahaan);
                $('#modal_detail input[name="no_hp"]').val(dt.no_hp);
                $('#modal_detail input[name="alamat"]').val(dt.alamat);
                $('#modal_detail input[name="nilai_rab"]').val(dt.nilai_rab);
                $('#modal_detail input[name="deskripsi"]').val(dt.deskripsi);
                $('#modal_detail input[name="kecamatan"]').val(dt.nama_kec);
                $('#modal_detail input[name="kelurahan"]').val(dt.nama_kel);
                $('#modal_detail input[name="file"]').val(dt.file);
                $('#modal_detail').modal('show');

            }
        });
    })

    //event ketika tombol PREVIEW PROPOSAL   di click
    $(document).on('click', '.preview_proposal', function() {
        var id_permohonan_tjsl = $(this).data('id');
        var file = $(this).data('file');
        // alert(id_permohonan_tjsl);
        $.ajax({
            type: 'post',
            url: url+'get_permohonan_tjsl',
            data: {id : id_permohonan_tjsl},
            dataType: 'json',
            success: function (dt) {
                $('#modal_preview_proposal .modal-title').html('Preview Proposal Permohonan Tjsl <strong class="text-success">'  +file+ '</strong>'); 
                $('#modal_preview_proposal .modal-file').html('<embed src="../uploads/files/'+file+'" type="application/pdf" width="100%" height="700px"/>');
                $('#modal_preview_proposal').modal('show');

            }
        });
        
    })

    //event ketika tombol hapus di click
    $(document).on('click', '.delete', function() {
        var id_permohonan_tjsl = $(this).data('id');
        $('#id_delete').val(id_permohonan_tjsl)
        $('#modal_confirm').modal('show');
    })

    //Proses simpan
    $('#form_permohonan_tjsl').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: url+'save',
            data: $('#form_permohonan_tjsl').serialize(),
            dataType: 'json',
            success: function (dt) {
                $.toast({heading: dt.heading,text: dt.msg,position: 'top-right',loaderBg:'#ff6849',icon: dt.status,hideAfter: 3500, stack: 6
              });
                $("#modal_permohonan_tjsl").modal("hide");
                permohonan_tjsl.ajax.reload();
                $('#form_permohonan_tjsl').trigger("reset");

            }
        });

    });

    //Proses hapus
    $(document).on('click', '#confirm_delete', function() {
        var id_permohonan_tjsl = $('#id_delete').val();
        $.ajax({
            type: 'post',
            url: url+'delete',
            data: {id : id_permohonan_tjsl},
            dataType: 'json',
            success: function (dt) {
                $.toast({heading: dt.heading,text: dt.msg,position: 'top-right',loaderBg:'#ff6849',icon: dt.status,hideAfter: 3500, stack: 6
              });
                permohonan_tjsl.ajax.reload();
            }
        });
    })


})