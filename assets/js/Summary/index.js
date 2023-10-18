var summary = '/ReportSummary/printReportSummary';
// var deleteUrl = '/ReportT/delete';
var reportUrl = base_url+'/ReportSummary/daily';
var exp = '/ReportSummary/exportCsv';
var DetailUrl = '/detailbending';
var dateRange = {};
// var sumPrint;

$('.employee-attendance-data-summary').ready(function() {

    var table = $('#dataTable').dataTable({
        "bLengthChange" : false,
        "pageLength": 10,
         "columnDefs": [
        { 
            "targets": [-3 ],
            "orderable": false,
            "ordering": false
        }
        ],
        "order": [[1, 'asc']]
    });
    var table1 = $('#dataTable1').dataTable({
        "bLengthChange" : false,
        "pageLength": 10,
         "columnDefs": [
        { 
            "targets": [ -2 ],
            "orderable": false,
            "ordering": false
        }
        ],
        "order": [[1, 'asc']]
    });
    $('#searchbox').keyup(function() {
        table.fnFilter($(this).val());
        });
    $('#searchbox1').keyup(function() {
            table1.fnFilter($(this).val());
            });
    var startdate;
    var enddate;

    $('.data-daterangepicker').daterangepicker({
        ranges: {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        },
        //  startDate: [moment(), moment()],
        // endDate  : [moment().subtract(6, 'days'), moment()],
    }, function (start, end, label) {
        var labels = $('.data-daterangepicker').html('&nbsp; <i class="fas fa-calendar-alt mr-2"></i> '+label+ '&nbsp;');
        startdate = start.format("YYYY-MM-DD");
        enddate = end.format("YYYY-MM-DD");
    });

    $('.data-daterangepicker').on('apply.daterangepicker', function(ev, picker) {
		startdate = picker.startDate.format('YYYY-MM-DD');
		enddate = picker.endDate.format('YYYY-MM-DD');
		if(startdate != '' && enddate !='' ){
            window.location.href = reportUrl+'/'+startdate+'/'+enddate;
            
        }
      

    });

    $(".btn-print-summary").click(function() {
        var id=$(this).attr('id');
        var reportUrl = summary ;
        setTimeout(function() {
            $('#print-summary-report').attr('src', base_url+reportUrl+'/' + startDate + '/' + endDate);
            // window.open(base_url+reportUrl+'/'+ startDate + '/' + endDate);
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



