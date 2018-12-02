
// alert("aaaa");
// Dashboard 1 Morris-chart
$(document).ready(function() {


// Morris bar chart
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90,
            c: 60
        }, {
            y: '2007',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2008',
            a: 50,
            b: 40,
            c: 30
        }, {
            y: '2009',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2010',
            a: 50,
            b: 40,
            c: 30
        }, {
            y: '2011',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2012',
            a: 100,
            b: 90,
            c: 40
        }],
        xkey: 'y',
        ykeys: ['a', 'b', 'c'],
        labels: ['A', 'B', 'C'],
        barColors:['#55ce63', '#2f3d4a', '#009efb'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });
// Extra chart
 // 
 });    
// $(document).ready(function() {
//   $('#form_filter').on('submit', function (e) {
//     e.preventDefault();
//     show_dashboard()
//   });

// function show_dashboard() {

//     $.ajax({
//         type: 'post',
//         url: url+'get_data/'+$('#bulan').val()+'/'+$('#tahun').val()+'/'+$('#cabang').val(),
//         data: $('#form_filter').serialize(),
//         dataType: 'json',
//         beforeSend: function() {
//             $("#loading").show();
//         },
//         success: function (dt) {

//             chart_item_terjual(dt.item_terjual);
//             chart_penjualan_cabang(dt.penjualan_cabang);
//             chart_penjualan(dt.penjualan);
//             table_top_konsumen(dt.top_konsumen);
//             table_top(dt.top);
//             $('#jumlah').html(dt.jumlah);
//             $('#jumlah_konsumen').html(dt.jumlah_konsumen);
//             $('#nama_cabang').html($('#cabang option:selected').text());
//             $("#loading").hide();
//         }
//     });
// }

// function chart_item_terjual(data) {
//    $('#item_terjual').html('');
//    Morris.Donut({
//       element: 'item_terjual',
//       data: data,
//       resize: true
//     });
// }

// function chart_penjualan(data) {
//    $('#penjualan').html('');
//     Morris.Line({
//       element: 'penjualan',
//       data: data,
//       xkey: 'tanggal',
//       ykeys: ['value'],
//       labels: ['Penjualan'],
//       resize:true,
//       // parseTime:false
//     });
// }

// function chart_penjualan_cabang(data) {
//    $('#penjualan_cabang').html('');
//     Morris.Bar({
//       element: 'penjualan_cabang',
//       data: data,
//       xkey: 'cabang',
//       ykeys: ['penjualan'],
//       labels: ['Penjualan'],
//       xLabelAngle: 25,
//       resize:true
//     });
// }

// function table_top_konsumen(data) {
//    $('#top_konsumen').html('');
//     var markup ='';
//     $.each(data, function(i, item) {
//         markup +='<tr>';
//         markup +='<td>'+item.nama+'</td>';
//         markup +='<td></td>';
//         markup +='<td align = "right">'+addCommas(item.pembelian)+'</td>';
//         markup +='</tr>';
//     });

//     $('#top_konsumen').html(markup)
// }

// function table_top(data) {
//    $('#top').html('');
//     var markup ='';
//     $.each(data, function(i, item) {
//         markup +='<tr>';
//         markup +='<td>'+item.nama+'</td>';
//         markup +='<td></td>';
//         markup +='<td align = "right">'+addCommas(item.penjualan)+'</td>';
//         markup +='</tr>';
//     });

//     $('#top').html(markup)
// }


// function addCommas(nStr)
//     {
//         nStr += '';
//         x = nStr.split('.');
//         x1 = x[0];
//         x2 = x.length > 1 ? '.' + x[1] : '';
//         var rgx = /(\d+)(\d{3})/;
//         while (rgx.test(x1)) {
//             x1 = x1.replace(rgx, '$1' + ',' + '$2');
//         }
//         return x1 + x2;
//     }

//   show_dashboard();



// })