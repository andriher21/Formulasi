var summary = '/printReportbending';
var deleteUrl = '/saptoscale/delete';
var reportUrl = base_url+'/saptoscale';
var exp = '/exportReportData';
var DetailUrl = '/detailbending';
var selectWhere = 'saptoscale/selectwhere';
var dateRange = {};
// var sumPrint;
$('.employee-attendance-data-summary').ready(function() {

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
        "order": [[1, 'asc']]
    });
    $('#searchbox').keyup(function() {
        table.fnFilter($(this).val());
        });
    
    

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
$('.employee-attendance-data-summary').on('change', '.chkboxes', function() {
    if ($('.chkboxes:checked').length > 0 && $('.btn-delete-selected').length <= 0) {
        $('.group-action-area').prepend('<button type="button" class="btn btn-sm btn-danger btn-delete-selected"><i class="fa fa-trash m-r-5"></i> &nbsp;Delete</button>');
    } else if ($('.chkboxes:checked').length <= 0) {
        $('.btn-delete-selected').remove();
    }
});

$('.employee-attendance-data-summary').on('click', '.btn-delete-selected', function(){
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
});

function Detail(id){
    $.ajax({
        url: base_url+selectWhere,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        async:false,
        success: function(data){
            // console.log(data);
            $.each(data, function(i, v) {
                $('#aufnr').val(v.aufnr);
                $('#werks').val(v.werks);
                $('#flvid').val(v.flvid);
                $('#flvdesc').val(v.flvdesc);
                $('#group').val(v.group);
                $('#fgbatch').val(v.fgbatch);
                $('#frymch').val(v.frymch); 
                $('#shinfo').val(v.shinfo);
                $('#fdate').val(v.fdate);
                $('#wosts').val(v.wosts);
                $('#nob').val(v.nob);
                $('#pff').val(v.pff);
                $('#nop').val(v.nop);
                $('#matnr').val(v.matnr);
                $('#matdesc').val(v.matdesc);
                $('#tweight').val(v.tweight);
                $('#twqty').val(v.twqty);
                $('#tperpaket').val(v.tperpaket);
                $('#stssend').val(v.stssend);
            });
        }
    })
}
function Edit(id){

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
            location.reload(true);
    $('#modal-confirmation').modal('hide');
        }
    })
    
}



