var summary = '/printReporttensile';
var deleteUrl = '/scaletosap/delete';
var reportUrl = base_url+'/scaletosap';
var exp = '/exportReportData';
var DetailUrl = '/detailtensile';
var loadingpaket = '/scaletosap/loadingpaket';
var activepaket = 'scaletosap/activepaket';
var finishURL = '/scaletosap/finish';
var autofillURL = '/scaletosap/autofill';
var loadpaket = 'scaletosap/loadpaket';
var deletepaketURL = '/scaletosap/deletepaket'
var dateRange = {};
// var sumPrint;
$('#paketid').html('<option value="">Pilih PO Terlebih Dahulu</option>');

$('.data-summary').ready(function() {

    var table = $('#dataTable').dataTable({
        "bLengthChange" : false,
        "pageLength": 10,
         "columnDefs": [
        { 
            "targets": [ -1 ],
            "orderable": false,
            "ordering": false
        }
        ],
        "order": [[3, 'asc']]
    });
    $('#searchbox').keyup(function() {
        table.fnFilter($(this).val());
        });
    
    var startdate;
    var enddate;

    $('.data-datepicker').datepicker().on('changeDate', function(e){
        var d = e.date;
        var day = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();
        if (day < 10) {
            day = "0" + day;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var date = year + "-" + month + "-" + day;

        var datenow = new Date();
        var tahun = datenow.getFullYear();
        var bulan = datenow.getMonth()+ 1;
        var tanggal = datenow.getDate();
          if (tanggal < 10) {
            tanggal = "0" + tanggal;
        }
        if (bulan < 10) {
           bulan = "0" + bulan;
        }
         
        var today = tahun+"-"+ bulan+"-"+tanggal;
        // console.log(today);
        $(this).datepicker('hide');
            if(today == activeDate){
                window.location.href='daily/' +date;
            }
            else{
            window.location.href=date;
            }
    });

    $(".btn-print-summary").click(function() {
        var id=$(this).attr('id');
        var reportUrl = summary ;
        setTimeout(function() {
            // $('#print-summary-report').attr('src', base_url+reportUrl+'/'+id);
            window.open(base_url+reportUrl+'/'+id);
        }, 1000);
    });
    $(".btn-export").click(function() {
        var exportUrl = exp ;
        // console.log(exportUrl);
        setTimeout(function() {
            $('#print-summary-report').attr('src', base_url+exportUrl+ '/' + startDate + '/' + endDate);
        }, 1000);
    });
     var all = table.fnGetNodes();

    $('table').on('change', '.check-all', function(event) {
        var $checked = $(this).is(':checked');
    
        if ($checked) {
            $('.check-data', all).prop('checked', true);
        } else {
            $('.check-data', all).prop('checked', false);
        }
    });
});
$('.data-summary').on('change', '.chkboxes', function() {
    if ($('.chkboxes:checked').length > 0 && $('.btn-delete-selected').length <= 0) {
        $('.group-action-area').prepend('<button type="button" class="btn btn-sm btn-danger btn-delete-selected"><i class="fa fa-trash m-r-5"></i> &nbsp;Delete</button>');
    } else if ($('.chkboxes:checked').length <= 0) {
        $('.btn-delete-selected').remove();
    }
});

$('.data-summary').on('click', '.btn-delete-selected', function(){
    var idToDelete   = [];
    var nameToDelete = '<b>Are you sure to delete this data?</b><ol class="m-t-8 p-l-20">';
    var no = 1;
    $.each($('.check-data:checked'), function(index, item) {
        var item = $(item);
        if(item.val() != ''){
            idToDelete.push(item.val());
            nameToDelete += '<li>'+item.data('name')+'</li>';
        }

    });
    nameToDelete += '</ol>';
    confirmation(nameToDelete, 'doDelete("'+deleteUrl+'")');
});$('.data-summary').on('click', '.btn-proses', function(){

    $('#prosesModal').modal('show');
    var id=$(this).attr('id');
    $.ajax({
        url: base_url+loadpaket,
        type: "post",
        // // data: formData,
        // data: {id:id},
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data) {
            // console.log(data);
            drawTable1(data);
            users = data;
        }
    });
});
$('.data-summary').on('click', '.btn-finish', function(){

    $('#finishModal').modal('show');
    var id=$(this).attr('id');
    $.ajax({
        url: base_url+activepaket,
        type: "post",
        // // data: formData,
        // data: {id:id},
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data) {
            // console.log(data);
            drawTable(data);
            users = data;
        }
    });
});
$('.autofill').on('change', function()
{
    var aufnr = $("#aufnr").val();
    var matnr= $("#matnr").val();
    var html = '';
    $.ajax({
        url: base_url+autofillURL,
        type: 'POST',
        ContentType: 'application/json',
        dataType: 'JSON',
        data: {aufnr: aufnr,
            matnr: matnr
        },
        success: function(data) {
            // console.log(data);
            $.each(data, function(i, v) {
                $('#werks').val(v.werks);
                $('#matdesc').val(v.matdesc);
                $('#matidfg').val(v.flvid);
                $('#fgbatch').val(v.fgbatch);
                $('#flvname').val(v.flvdesc); 
                html +='<option value="">Select Paket </option>';
                for(let i=1;i <= v.nop;i++){
                    html +='<option value="Paket ' +i+ '"> Paket ' +i+'</option>';
                }
             
            if (html !== '') {
                $('#paketid').html(html);
            } else {
                $('#paketid').html('<option value="">Select PO </option>');
            }
            });
    }});
    
});

function drawTable(data) {
    var html = '';
    data = JSON.parse(data);
    var count = 0;
    $.each(data, function(i, v) {
        html += '<tr>';
        html += `<td class="text-center"><div class="custom-control custom-checkbox table-checkbox">
                <input type="checkbox" class="custom-control-input check-import" id="table-chk-${i}" value="${i}" data-name="${v.nama}" checked="true">
                <label class="custom-control-label" for="table-chk-${i}">&nbsp;</label>
            </div></td>`;
        // html += '<td>'+ ++count +' </td>'
        html += '<td id="paket">' + v.paketidactive + '</td>';
        html += '<td id="paket">' + v.poactive + '</td>';
    });
    if (html !== '') {
        $('.body-import-result').html(html);
    } else {
        $('.body-import-result').html('<tr><td colspan="6">Data not found.</td></tr>');
    }
}
function drawTable1(data) {
    var html = '';
    data = JSON.parse(data);
    var count = 0;
    $.each(data, function(i, v) {
        html += '<tr>';
        html += `<td class="text-center"><div class="custom-control custom-checkbox table-checkbox">
                <input type="checkbox" class="custom-control-input check-import" id="table-chk-${i}" value="${i}" data-name="${v.nama}" checked="true">
                <label class="custom-control-label" for="table-chk-${i}">&nbsp;</label>
            </div></td>`;
        // html += '<td>'+ ++count +' </td>'
        html += '<td id="paket">' + v.paket_load + '</td>';
        html += '<td id="paket">' + v.po_load + '</td>';
    });
    if (html !== '') {
        $('.body-proses-result').html(html);
    } else {
        $('.body-proses-result').html('<tr><td colspan="6">Data not found.</td></tr>');
    }
}
function doFinish() {

    var new_u = JSON.parse(users);
    // console.log(new_u);
    var data = [];
    var active_id =[];
    var paketidactive =[];
    var poactive =[];
    $('.check-import:checked').each(function(i, dom) {
        index = $(dom).val();
        // console.log(index);
        active_id = new_u[index]['active_id'];
        paketidactive= new_u[index]['paketactive'];
        poactive= new_u[index]['poactive'];
       

        // console.log(departement)
        data.push({
            active_id :active_id,
            // paketidactive :paketidactive,
            // poactive :poactive,
            
        });
    });
    // console.log(data);
    
    $.ajax({
        url: base_url+finishURL,
        type: 'POST',
        ContentType: 'application/json',
        dataType: 'JSON',
        data: {
            data: data
        },
        success: function(data) {
            location.reload(true);
            $('#finishModal').modal('hide');  
        }
    })
   
}
function doDeletePaket() {

    var new_u = JSON.parse(users);
    // console.log(new_u);
    var data = [];
    var load_id =[];
    var paket_load =[];
    var po_load =[];
    $('.check-import:checked').each(function(i, dom) {
        index = $(dom).val();
        // console.log(index);
        load_id = new_u[index]['load_id'];
        paket_load= new_u[index]['paket_load'];
        po_load= new_u[index]['po_load'];
       

        // console.log(departement)
        data.push({
            id :load_id,
            paketload :paket_load,
            poload :po_load
            
        });
    });
    // console.log(data);
    
    $.ajax({
        url: base_url+deletepaketURL,
        type: 'POST',
        ContentType: 'application/json',
        dataType: 'JSON',
        data: {
            data: data
        },
        success: function(data) {
            
            $('#prosesModal').modal('hide');  
        }
    })
    location.reload(true);
}
function doDelete(url){
    var idToDelete = [];
    $.each($('.check-data:checked'), function(index, item) {
    var item = $(item);
    if(item.val() != ''){
        idToDelete.push(item.val());
        }
    });
    $.ajax({
        url: base_url+url,
        type: 'post',
        dataType: 'json',
        data: {id: idToDelete},
        async:false,
        success: function(){
            
        }
    })
    location.reload(true);
    $('#modal-confirmation').modal('hide');
}



