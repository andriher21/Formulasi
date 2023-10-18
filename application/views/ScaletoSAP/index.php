<!-- Begin Page Content -->
<div class="container-fluid data-summary">
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-4"></div>
        <div class="col-4">
        <p class="text-center font-weight-bold"> Date : <?= $active_date ?></p>
        </div>
        <div class="col-4">
        <button type="button" class="btn btn-sm btn-primary mb-3 data-datepicker float-right"><i class="fas fa-fw fa-calendar-alt"></i></button>
            <!-- <div class="date"></div> -->
            <div class="btn-group float-right mr-2">
                <a href="<?= $prev_date_uri ?>" class="btn btn-sm btn-primary float-right"> <i class="fas fa-chevron-left"></i></a>
                <a href="<?= $next_date_uri ?>" class="btn btn-sm btn-primary float-right"> <i class="fas fa-chevron-right"></i></a>
            </div>
            <a href="<?= site_url('scaletosap/daily') ?>" class="btn btn-sm btn-primary float-right mr-2">&nbsp;Today&nbsp;</a>
        
    </div>
       
    </div>

    <!-- DataTales Example -->
    <div class="section-body section-emp-summary">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Scale </h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                        <div class="col-6">
                            <div class="btn-group group-action-area ">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalCenter"><i class="fas fa-fw fa-plus-circle"></i> &nbsp;New</button>
                                <button type="button" class="btn btn-sm btn-info btn-proses" data-toggle="modal" data-target="#modalproses"><i class="fas fa-clock"></i> &nbsp;Proses</button>
                                <button type="button" class="btn btn-sm btn-success btn-finish" data-toggle="modal" data-target="#modalFinish"><i class="fas fa-check-circle"></i> &nbsp;Finish</button>
                            </div>
                        </div>
                            <div class="col-2"> </div>
                            <div class="col-4">
                                <div class="input-group">

                                    <input type="text" id="searchbox" class="form-control" placeholder="Search Data">
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
                                        <th> Po Number </th>
                                        <!-- <th> Plant </th> -->
                                        <th> FG ID</th>
                                        <th> FG Name </th>
                                        <th> Material ID </th>
                                        <th> Material Name </th>
                                        <!-- <th> FG Batch </th> -->
                                        <th> Finish Date</th>
                                        <th width="5px"> Status Goreng </th>
                                        <th width="5px">Status Finish </th>
                                        
                                        <!-- <th> Paket ID </th> -->
                                        <!-- <th> Actual Weight </th>
                                        <th> Material Lot No </th>
                                        
                                        
                                        
                                        <th> Actual QTY </th>
                                        <th> Workorder No Act</th>
                                        <th> Status PO Act</th> -->
                                        
                                        <th width="5px">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php foreach ($scale as $u) : ?>
                                            <tr scope="row">
                                            <td class="pr-4 pl-0">
                                                <div class="custom-control custom-checkbox table-checkbox">
                                                    <input type="checkbox" class="chkboxes check check-data" name="checkbox" value="<?= $u['scale_id'] ?>" data-name="<?= $u['matdesc'] ?>">
                                                </div>
                                              </td>  
                                            <td><?= $u['aufnr']; ?></td>
                                            <!-- <td><?= $u['werks']; ?></td> -->
                                            <td><?= $u['matidfg']; ?></td>
                                            <td><?= $u['flvname']; ?></td>
                                            <td><?= $u['matnr']; ?></td>
                                            <td><?= $u['matdesc']; ?></td>
                                            
                                            <!-- <td><?= $u['fgbatch']; ?></td> -->
                                            <!-- <td><?= $u['tstamp']; ?></td> -->
                                            <td><?= $u['date']; ?></td>
                                            <!-- <?php if($u['stsgoreng'] == '1'){ ?>
                                                <td ><h5><span class="badge badge-warning">Belum Di goreng</span></h5></td>
                                            <?php } 
                                            elseif($u['stsgoreng'] =='2') {?>
                                            <td ><h5><span class="badge badge-success">Di Goreng</span></h5></td>
                                            <?php } ?> -->
                                            
                                            
                                            
                                            <!-- <td><?= $u['paketid']; ?></td> -->
                                            <!-- <td ><?= $u['actweight']; ?></td>
                                            <td ><?= $u['matlotno']; ?></td> -->
                                        
                                            <!-- <td><?= $u['actqty']; ?></td>
                                            <td><?= $u['wnumact']; ?></td> -->
                                            <!-- <?php if($u['stpoact'] == '1'){ ?>
                                                <td ><?= $u['stpoact']; ?></td>
                                            <?php } 
                                            elseif($u['stpoact'] =='2') {?>
                                            <td class="bg-success"><?= $u['stpoact']; ?></td>
                                            <?php } ?> -->
                                            <!-- <td><?= $u['tstamp']; ?></td> -->
                                                <td><span class="badge badge-pill badge-info"><?= $u['stsgoreng']?> of <?= $u['countgoreng']?></span></td>
                                                <td><span class="badge badge-pill badge-info"><?= $u['stpoact']?> of <?= $u['countpoact']?></span></td>
                                            <td><div class="btn-group">
                                                <!-- <button class="btn btn-sm btn-primary edit-data" data-toggle="modal" data-target="#modalEdit<?= $u['matnr']; ?>" style="margin:auto; display:block;" >
                                                <i class="fas fa-edit"></i>
                                            </button> -->
                                            <a href="<?= base_url('scaletosap/detail/'.$u['aufnr'].'/'.$u['matnr'].'/'.date('Y-m-d',strtotime($active_date)).'') ?>" class="btn btn-sm btn-success detail-data" style="margin:auto; display:block;" title="Detail Data">
                                                    <i class="fas fa-marker"></i></a>
                                        </div>
                                        </td>
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
        <div class="modal fade bd-example-modal-lg" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Delete Schedule</h5> -->

                        <h6 class="modal-title font-weight-bold text-primary">New Data</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('scaletosap/add') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" >
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Worked No</label>
                                        <select class="form-control selectpicker " id='aufnr' name="aufnr" data-live-search="true">
                                        <?php
                                           echo '<option value="">Select PO</option>';
                                             foreach ($po as $p) {
                                                echo '<option value="' . $p['aufnr'] . '">' . $p['aufnr'] . '</option>';
                                                                                                            }
                                               ?></select>
                                </div>
                                <div class="form-group col-md-6">
                                <label class="col-form-label font-weight-bold text-dark paw">Material ID RM</label>
                                        <select class="form-control selectpicker autofill" id="matnr" name="matnr" data-live-search="true">
                                        <?php
                                           echo '<option value="">Select Material </option>';
                                             foreach ($material as $m) {
                                                echo '<option value="' . $m['matnr'] . '">' . $m['matnr'] . '</option>';
                                                                                                            }
                                               ?></select>
                                </div>
                            </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">                                   
                                         <label class="col-form-label font-weight-bold text-dark">Plant</label>
                                        <input type="textarea" class="form-control" name="werks" id='werks' readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark law">Material Name</label>
                                        <input type="textarea" class="form-control" name="matdesc" id="matdesc" readonly>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Material ID FG</label>
                                        <input type="textarea"  class="form-control" name="matidfg" id="matidfg" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Paket ID</label>
                                        <!-- <input type="textarea"  class="form-control" name="paketid" id="paketid" > -->
                                        <select class="form-control" name="paketid" id="paketid" required>					
                                            </select>
                                    </div>
                                </div>
                                
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">FG Batch</label>
                                        <input type="textarea"  class="form-control" name="fgbatch" id="fgbatch" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Flavor Name</label>
                                        <input type="textarea"  class="form-control" name="flvname" id="flvname" readonly>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label class="col-form-label font-weight-bold text-dark">Status Goreng</label>
                                        <select name="stsgoreng" id="stsgoreng" class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Actual Weight</label>
                                        <input type="textarea"  class="form-control" name="actweight" id="actweight">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Material Lot no</label>
                                        <input type="textarea"  class="form-control" name="matlotno" id="matlotno">
                                    </div>
                    
                                                                                                        </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label class="col-form-label font-weight-bold text-dark">Workorder No Act</label>
                                        <select class="form-control selectpicker "  name="wnumact" data-live-search="true">
                                        <?php
                                           echo '<option value="">Select PO</option>';
                                             foreach ($po as $p) {
                                                echo '<option value="' . $p['aufnr'] . '">' . $p['aufnr'] . '</option>';
                                                                                                            }
                                               ?></select>
                                    </div>
<!-- <!--                                
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Status Po Act</label>
                                        <input type="textarea"  class="form-control" name="stpoact">
                                    </div> 
                                </div>  -->
                                                                                                        </div>
                              
                        </div>
                        <div class=" modal-footer">

                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary"> <i class="fas fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <!-- Modal Proses -->
    <div class="modal fade" id="prosesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Proses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="import" method="post">
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class=" text-center">#</th>
                                    <!-- <th>No</th> -->
                                    <th>Paket</th>
                                    <th>Po</th>
                            </thead>
                            <tbody class="body-proses-result">
                                <tr>
                                    <td colspan="6">Data not found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" onClick="doDeletePaket();"> <i class="fa fa-trash"></i> Delete</button>
                        <!-- <button type="button" class="btn btn-primary btn-save"> <i class="fas fa-save"></i> Save</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
            <!-- Modal Finish -->
    <div class="modal fade" id="finishModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Finish Shift</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="import" method="post">
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class=" text-center">#</th>
                                    <!-- <th>No</th> -->
                                    <th>Paket</th>
                                    <th>Po</th>
                            </thead>
                            <tbody class="body-import-result">
                                <tr>
                                    <td colspan="6">Data not found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onClick="doFinish();"> <i class="fas fa-check-circle"></i> Finish</button>
                        <!-- <button type="button" class="btn btn-primary btn-save"> <i class="fas fa-save"></i> Save</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    var activeDate = '<?= $dates ?>';
    </script>

