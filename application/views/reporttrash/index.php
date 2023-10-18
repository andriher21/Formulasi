<!-- Begin Page Content -->
<div class="container-fluid employee-attendance-data-summary">
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-4"></div>
        <div class="col-4">
            <?php if($start != $end){?>
                <p class="text-center font-weight-bold"> Date : <?= $start ?> - <?= $end ?></p>
            <?php }
            elseif($start == $end){?>
             <p class="text-center font-weight-bold"> Date : <?= $start ?></p>
            <?php }?>
        </div>
        <div class="col-4">
        <button class="btn btn-sm btn-primary data-daterangepicker float-right">&nbsp; <i class="fas fa-calendar-alt mr-2"></i> Date &nbsp;</button>
          
    </div>
       
    </div>

    <!-- DataTales Example -->
    <div class="section-body section-emp-summary">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Report Data </h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="btn-group group-action-area ">
                                    <!-- <button class="btn btn-sm btn-primary data-daterangepicker">&nbsp; <i class="fas fa-calendar-alt mr-2"></i>Last 7 Days &nbsp;</button> -->
                                    <!-- <button class="btn btn-primary  btn-print-summary"> <i class="fas fa-fw fa-print"></i> </button> -->
                                    <!-- <button class="btn btn-success btn-export"><i class="fas fa-fw fa-file-csv"></i> Export CSV</button> -->
                                
                                </div>
                            </div>
                            <div class="col-2"> </div>
                            <div class="col-4">
                                <div class="input-group">

                                    <input type="text" id="searchbox" class="form-control" placeholder="Search by Report">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search text-primary"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" width="100%" cellspacing="0" id="dataTable">
                                <thead>
                                    <tr>
                                        <!-- <th></th> -->
                                        <th width="10px" class="pr-4 pl-0">
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                <input type="checkbox" class="chkboxes check check-all" value="1" data-name="Master Admin" id="table-chk-all">
                                            </div>
                                        </th>
                                        <th> Workorder No </th>
                                        <th> Plant </th>
                                        <!-- <th> Flvid </th> -->
                                        <th> Material ID RM</th>
                                        <th> Material Name </th>
                                        <th> Material ID FG </th>
                                        <th> Paket ID </th>
                                        <th> Actual Weight </th>
                                        <th> Material Lot No </th>
                                        <th> Status Goreng </th>
                                        <th> FG Batch </th>
                                        <th> Flavor Name </th>
                                        <th> Actual QTY </th>
                                        <th> Workorder No Act</th>
                                        <th> Status PO Act</th>
                                        <th> Time Stamp </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php foreach ($report as $u) : ?>
                                            <tr>
                                            <td class="pr-4 pl-0">
                                                <div class="custom-control custom-checkbox table-checkbox">
                                                    <input type="checkbox" class="chkboxes check check-data" name="checkbox" value="<?= $u['trash_id'] ?>" data-name="<?= $u['aufnr'] ?>">
                                                </div>
                                              </td>  
                                              <td><?= $u['aufnr']; ?></td>
                                            <td><?= $u['werks']; ?></td>
                                            <!-- <td><?= $u['flvid']; ?></td> -->
                                            <td><?= $u['matnr']; ?></td>
                                            <td><?= $u['matdesc']; ?></td>
                                            <td><?= $u['matidfg']; ?></td>
                                            <td><?= $u['paketid']; ?></td>
                                            <td ><?= $u['actweight']; ?></td>
                                            <td ><?= $u['matlotno']; ?></td>
                                            <td><?= $u['stsgoreng']; ?></td>
                                            <td><?= $u['fgbatch']; ?></td>
                                            <td><?= $u['flvname']; ?></td>
                                            <td><?= $u['actqty']; ?></td>
                                            <td><?= $u['wnumact']; ?></td>
                                            <td><?= $u['stpoact']; ?></td>
                                            <td><?= $u['tstamp']; ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <iframe id="print-summary-report" hidden></iframe>
        
    
     <!-- Delete Modal -->
     <div class="modal fade" id="confirmation-dialog" tabindex="-1" role="dialog" aria-labelledby="modal-top" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="modal-body confirmation-dialog-notice"> Do you want to continue?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-shadow btn-confirmation-dialog-yes" data-dismiss="modal" data-url="javascript:;">
                        <i class="fa fa-trash m-r-5"></i> Yes
                    </button>
                    <button type="button" class="btn btn-secondary" id="" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Delete Modal -->

</div>
</div>
<!-- End of Main Content -->
<script>
    var base_url = '<?php echo base_url(); ?>'; 
    var startDate = '<?php echo date('Y-m-d',strtotime($start)) ?>';
    var endDate = '<?php echo date('Y-m-d',strtotime($end)); ?>';
    </script>

