<!-- Begin Page Content -->
<div class="container-fluid employee-attendance-data-summary">
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
            <a href="<?= site_url('saptoscale/daily') ?>" class="btn btn-sm btn-primary float-right mr-2">&nbsp;Today&nbsp;</a>
        
    </div>
       
    </div>

    <!-- DataTales Example -->
    <div class="section-body section-emp-summary">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data SAP</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                        <div class="col-6">
                            <div class="btn-group group-action-area ">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalCenter"><i class="fas fa-fw fa-plus-circle"></i> &nbsp;New</button>
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
                                        <th> PO Number</th>
                                        <th> Plant</th>
                                        <th> FG ID</th>
                                        <th> FG Name </th>
                                        <!-- <th> Group </th> -->
                                        <th> FG Batch </th>
                                        <!-- <th> Frying Mechine Type </th> -->
                                        <!-- <th> Shift Info</th> -->
                                        <th> Finish Date </th>
                                        <!-- <th> Workorder Status </th> -->
                                        <!-- <th> Number of Batches </th> -->
                                        <th> Production Fry Factory </th>
                                        <th> Number of Paket </th>
                                        <!-- <th> Material ID RM  </th> -->
                                        <th> Material Name</th>
                                        <!-- <th> Total Weight </th> -->
                                        <!-- <th> Total WO Qty </th> -->
                                        <!-- <th> Total per paket </th> -->
                                        <!-- <th> Status Send </th> -->
                                        <!-- <th> Timestamp </th> -->
                                        <th width ="5px">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php foreach ($sap as $u) : ?>
                                            <tr>
                                            <td class="pr-4 pl-0">
                                                <div class="custom-control custom-checkbox table-checkbox">
                                                    <input type="checkbox" class="chkboxes check check-data" name="checkbox" value="<?= $u['sap_id'] ?>" data-name="<?= $u['matdesc'] ?>">
                                                </div>
                                              </td>  
                                            <td><?= $u['aufnr']; ?></td>
                                            <td><?= $u['werks']; ?></td>
                                            <td><?= $u['flvid']; ?></td>
                                            <td><?= $u['flvdesc']; ?></td>
                                            <!-- <td><?= $u['group']; ?></td> -->
                                            <td><?= $u['fgbatch']; ?></td>
                                            <!-- <td><?= $u['frymch']; ?></td> -->
                                            <!-- <td><?= $u['shinfo']; ?></td> -->
                                            <td><?= $u['fdate']; ?></td>
                                            <!-- <td><?= $u['wosts']; ?></td> -->
                                            <!-- <td><?= $u['nob']; ?></td> -->
                                            <td><?= $u['pff']; ?></td>
                                            <td><?= $u['nop']; ?></td>
                                            <!-- <td><?= $u['matnr']; ?></td> -->
                                            <td><?= $u['matdesc']; ?></td>
                                            <!-- <td><?= $u['tweight']; ?></td> -->
                                            <!-- <td><?= $u['twqty']; ?></td> -->
                                            <!-- <td><?= $u['tperpaket']; ?></td> -->
                                            <!-- <td><?= $u['stssend']; ?></td> -->
                                            <!-- <td><?= $u['tstamp']; ?></td> -->
                                            <td><div class="btn-group">
                                                    <!-- <button class="btn btn-sm btn-primary" data-toggle="modal" id="<?= $u['matnr']; ?>"data-target="#modalEdit" onclick="Edit(<?= $u['sap_id']; ?>)" style="margin:auto; display:block;" title="Edit Data" "> 
                                                        <i class="fas fa-edit"></i>
                                                    </button> -->
                                                    <button class="btn btn-sm btn-success detail-data" data-toggle="modal" id="<?= $u['matnr']; ?>" data-target="#modalDetail" onclick="Detail(<?= $u['sap_id']; ?>)" style="margin:auto; display:block;" title="Detail Data">
                                                            <i class="fas fa-marker"></i>
                                                    </button>
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
                    <form method="POST" action="<?= base_url('saptoscale/add') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" >
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Order Number</label>
                                        <input type="text"  class="form-control" name="aufnr">
                                </div>
                                <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Plant</label>
                                        <input type="textarea" class="form-control" name="werks">
                                </div>
                            </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark paw">Material ID FG</label>
                                        <input type="textarea" class="form-control" name="flvid">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark law">FG Name</label>
                                        <input type="textarea"  class="form-control" name="flvdesc">
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Group</label>
                                        <input type="textarea"  class="form-control" name="group">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">FG Batch</label>
                                        <input type="textarea"  class="form-control" name="fgbatch">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Frying Mechine</label>
                                        <input type="textarea"  class="form-control" name="frymch">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Shift Info</label>
                                        <input type="textarea"  class="form-control" name="shinfo">
                                    </div>
                                </div>
                                <!-- <div class="row mb-2">
                                    <div class="col">
                                        <label class="col-form-label font-weight-bold text-dark">Finish Date</label>
                                        <input type="textarea"  class="form-control" name="fdate">
                                    </div>
                                </div> -->
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Workorder Status</label>
                                        <input type="textarea"  class="form-control" name="wosts">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Number Of Batches</label>
                                        <input type="textarea"  class="form-control" name="nob">
                                    </div>
                                </div>
                               
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Production Fry Factory</label>
                                        <input type="textarea" class="form-control" name="pff">
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Number of Paket</label>
                                        <input type="textarea"  class="form-control" name="nop">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">material ID RM</label>
                                        <input type="textarea" class="form-control" name="matnr">
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Material Name</label>
                                        <input type="textarea"  class="form-control" name="matdesc">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Total Weight</label>
                                        <input type="textarea" class="form-control" name="tweight">
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Total Wo Qty</label>
                                        <input type="textarea"  class="form-control" name="twqty">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Total per Paket</label>
                                        <input type="textarea" class="form-control" name="tperpaket">
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Status Send</label>
                                        <input type="textarea"  class="form-control" name="stssend">
                                    </div>
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
        <div class="modal fade bd-example-modal-lg" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Delete Schedule</h5> -->

                        <h6 class="modal-title font-weight-bold text-primary">Detail Data</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('saptoscale/add') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" >
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Order Number</label>
                                        <input type="text"  class="form-control" id="aufnr" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Plant</label>
                                        <input type="textarea" class="form-control" id="werks" readonly>
                                </div>
                            </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark paw">FG ID</label>
                                        <input type="textarea" class="form-control" id="flvid" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark law">FG Name</label>
                                        <input type="textarea"  class="form-control" id="flvdesc" readonly>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Group</label>
                                        <input type="textarea"  class="form-control" id="group" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">FG Batch</label>
                                        <input type="textarea"  class="form-control" id="fgbatch" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Frying Mechine</label>
                                        <input type="textarea"  class="form-control" id="frymch" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Shift Info</label>
                                        <input type="textarea"  class="form-control" id="shinfo" readonly>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label class="col-form-label font-weight-bold text-dark">Finish Date</label>
                                        <input type="textarea"  class="form-control" id="fdate" readonly>
                                    </div>
                                </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Workorder Status</label>
                                        <input type="textarea"  class="form-control" id="wosts" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Number Of Batches</label>
                                        <input type="textarea"  class="form-control" id="nob" readonly>
                                    </div>
                                </div>
                               
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Production Fry Factory</label>
                                        <input type="textarea" class="form-control" id="pff" readonly>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Number of Paket</label>
                                        <input type="textarea"  class="form-control" id="nop" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">material ID RM</label>
                                        <input type="textarea" class="form-control" id="matnr" readonly>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Material Name</label>
                                        <input type="textarea"  class="form-control" id="matdesc" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Total Weight</label>
                                        <input type="textarea" class="form-control" id="tweight" readonly>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Total Wo Qty</label>
                                        <input type="textarea"  class="form-control" id="twqty" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Total per Paket</label>
                                        <input type="textarea" class="form-control"id="tperpaket" readonly>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Status Send</label>
                                        <input type="textarea"  class="form-control" id="stssend" readonly>
                                    </div>
                                </div>
                              
                        </div>
                        <div class=" modal-footer">

                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="submit" class="btn btn-sm btn-primary"> <i class="fas fa-save"></i> Save</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Delete Schedule</h5> -->

                        <h6 class="modal-title font-weight-bold text-primary">Edit Data</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('saptoscale/add') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" >
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Order Number</label>
                                        <input type="text"  class="form-control" name="aufnr" id="aufnr">
                                </div>
                                <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Plant</label>
                                        <input type="textarea" class="form-control" name="werks" id="werks">
                                </div>
                            </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark paw">Material ID FG</label>
                                        <input type="textarea" class="form-control" name="flvid" id="flvid">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark law">FG Name</label>
                                        <input type="textarea"  class="form-control" name="flvdesc" id="flvdesc">
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Group</label>
                                        <input type="textarea"  class="form-control" name="group" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">FG Batch</label>
                                        <input type="textarea"  class="form-control" name="fgbatch">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Frying Mechine</label>
                                        <input type="textarea"  class="form-control" name="frymch">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Shift Info</label>
                                        <input type="textarea"  class="form-control" name="shinfo">
                                    </div>
                                </div>
                                <!-- <div class="row mb-2">
                                    <div class="col">
                                        <label class="col-form-label font-weight-bold text-dark">Finish Date</label>
                                        <input type="textarea"  class="form-control" name="fdate">
                                    </div>
                                </div> -->
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Workorder Status</label>
                                        <input type="textarea"  class="form-control" name="wosts">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Number Of Batches</label>
                                        <input type="textarea"  class="form-control" name="nob">
                                    </div>
                                </div>
                               
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Production Fry Factory</label>
                                        <input type="textarea" class="form-control" name="pff">
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Number of Paket</label>
                                        <input type="textarea"  class="form-control" name="nop">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">material ID RM</label>
                                        <input type="textarea" class="form-control" name="matnr">
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Material Name</label>
                                        <input type="textarea"  class="form-control" name="matdesc">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Total Weight</label>
                                        <input type="textarea" class="form-control" name="tweight">
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Total Wo Qty</label>
                                        <input type="textarea"  class="form-control" name="twqty">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Total per Paket</label>
                                        <input type="textarea" class="form-control" name="tperpaket">
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label font-weight-bold text-dark">Status Send</label>
                                        <input type="textarea"  class="form-control" name="stssend">
                                    </div>
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

