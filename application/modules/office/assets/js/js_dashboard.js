   
$(document).ready(function() {
  $('#form_filter').on('submit', function (e) {
    e.preventDefault();
    show_dashboard()
  });

function show_dashboard() {

    $.ajax({
        type: 'post',
        url: url+'get_data/'+$('#bulan').val()+'/'+$('#tahun').val()+'/'+$('#cabang').val(),
        data: $('#form_filter').serialize(),
        dataType: 'json',
        beforeSend: function() {
            $("#loading").show();
        },
        success: function (dt) {
            chart_realisasi(dt.realisasi);
            $('#jumlah_permohonan_tjsl').html(dt.jumlah_permohonan_tjsl);
            $('#jumlah_permohonan_tjsl_acc').html(dt.jumlah_permohonan_tjsl_acc);
            $('#jumlah_permohonan_tjsl_realisasi').html(dt.jumlah_permohonan_tjsl_realisasi);
            $('#total_realisasi').html(addCommas(dt.total_realisasi));
            $("#loading").hide();
        }
    });
}


function chart_realisasi(data) {
   $('#realisasi').html('');
    Morris.Line({
      element: 'realisasi',
      data: data,
      xkey: 'tanggal',
      ykeys: ['value'],
      labels: ['Realisasi'],
      resize:true,
      // parseTime:false
    });
}

function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

  show_dashboard();



})