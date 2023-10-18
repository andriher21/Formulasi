<!-- Begin Page Content -->

<div class="container-fluid ">
    <!-- Page Heading -->
    <div class="row mb-2 ">
        <div class="col-4  ">
            <a href="<?= base_url('scaletosap/daily/'.$dates.'') ?>" class="btn btn-sm btn-primary"> <i class="fas fa-chevron-left mr-2"></i> Back &nbsp;</a>
        </div>
        <div class="col-4">  
        </div>
        <div class="col-4">
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="section-body">
    <div class="section-body section-emp-summary">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary text-center" > <?= $scale[0]['aufnr'] ?> / <?= $scale[0]['flvname'] ?> / <?= $scale[0]['matdesc'] ?> </h5>

                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                        <div class="col-6">
                            <!-- <div class="btn-group group-action-area ">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalCenter"><i class="fas fa-fw fa-plus-circle"></i> &nbsp;New</button>
                                <button type="button" class="btn btn-sm btn-info btn-proses" data-toggle="modal" data-target="#modalproses"><i class="fas fa-clock"></i> &nbsp;Proses</button>
                                <button type="button" class="btn btn-sm btn-success btn-finish" data-toggle="modal" data-target="#modalFinish"><i class="fas fa-check-circle"></i> &nbsp;Finish</button>
                            </div> -->
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
                                        <th> Plant</th>
                                        <!-- <th> FG Name </th> -->
                                        <th> Material ID </th>
                                        <th> Material Name </th>
                                        <!-- <th> FG Batch </th> -->
                                        
                                       
                                        
                                        <th> Paket ID </th>
                                        <th> Actual Weight </th>
                                        <th> Material Lot No </th>
                                        
                                        
                                        
                                        <th> Actual QTY </th>
                                        <!-- <th> Workorder No Act</th> -->
                                        
                                         <th> Status Goreng </th>
                                         <th> Status PO Act</th>
                                         <th> Time Stamp</th>
                                        <!-- <th width="5px">Action </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php foreach ($scale as $u) : ?>
                                            <tr>
                                            <td class="pr-4 pl-0">
                                                <div class="custom-control custom-checkbox table-checkbox">
                                                    <input type="checkbox" class="chkboxes check check-data" name="checkbox" value="<?= $u['scale_id'] ?>" data-name="<?= $u['matdesc'] ?>">
                                                </div>
                                              </td>  
                                            <td><?= $u['aufnr']; ?></td>
                                            <td><?= $u['werks']; ?></td>
                                            <!-- <td><?= $u['matidfg']; ?></td> -->
                                            <!-- <td><?= $u['flvname']; ?></td> -->
                                            <td><?= $u['matnr']; ?></td>
                                            <td><?= $u['matdesc']; ?></td>
                                            
                                            <!-- <td><?= $u['fgbatch']; ?></td> -->
                                            
                                            <!-- <td><?= $u['date']; ?></td> -->
                                          
                                            
                                            
                                            
                                            <td><?= $u['paketid']; ?></td>
                                            <td ><?= $u['actweight']; ?></td>
                                            <?php if($u['stpoact'] == '1'){ ?>
                                                <td ><a href="" class="text text-primary font-weight-bold" data-toggle="modal" id="editlot" 
                                                onclick="editlot('<?= $u['matlotno']?>','<?= $u['scale_id']?>')"data-target="#modaledit"><?= $u['matlotno']?></a></td> 
                                            <?php } 
                                            elseif($u['stpoact'] =='2') {?>
                                            <td ><?= $u['matlotno']; ?></td> 
                                            <?php } ?>
                                            
                                        
                                            <td><?= $u['actqty']; ?></td>
                                            <!-- <td><?= $u['wnumact']; ?></td> -->
                                          
                                              <?php if($u['stsgoreng'] == '1'){ ?>
                                                <td ><h5><span class="badge badge-warning">Proses</span></h5></td>
                                                <?php } 
                                            elseif($u['stsgoreng'] =='2') {?>
                                            <td ><h5><span class="badge badge-success"> Di Goreng</span></h5></td>
                                            <?php } ?> 
                                            <?php if($u['stpoact'] == '1'){ ?>
                                                <td ><h5><span class="badge badge-warning">Proses</span></h5></td>
                                            <?php } 
                                            elseif($u['stpoact'] =='2') {?>
                                            <td><h5><span class="badge badge-success">Finish</span></h5></td>
                                            <?php } ?>
                                            <td><?= $u['tstamp']; ?></td>
                
                                            <!-- <td><div class="btn-group"> -->
                                                <!-- <button class="btn btn-sm btn-primary edit-data" data-toggle="modal" data-target="#modalEdit<?= $u['matnr']; ?>" style="margin:auto; display:block;" >
                                                <i class="fas fa-edit"></i>
                                            </button> -->
                                            <!-- <td><?= $u['tstamp']; ?></td> -->
                                            <!-- <a href="<?= base_url('scaletosap/detail/'.$u['aufnr'].'/'.$u['matnr'].'/'.date('Y-m-d',strtotime($active_date)).'') ?>" class="btn btn-sm btn-success detail-data" style="margin:auto; display:block;" title="Detail Data">
                                                    <i class="fas fa-marker"></i></a> -->
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
    <iframe id="print-detail-report" hidden></iframe>
     <!-- Edit Modal -->
     <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modal-top" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Material  Lot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('scaletosap/editlot') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" >
                <div class="modal-body"> 
                     <div class="row mb-2">
                                    <div class="col">
                                        <label class="col-form-label font-weight-bold text-dark">Material Lot</label>
                                        <input type="textarea"  class="form-control" name="matlot" id="matlot">
                                    </div>
                                </div>
                </div>
                 <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-save"> <i class="fas fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Edit Modal -->
    

</div>
</div>
<!-- End of Main Content -->

<script>
    var base_url = '<?php echo base_url(); ?>'; 
    
    </script>
  <?php
    if (isset($tensilelist)) {
        foreach ($tensilelist as $list) :
            echo '<script>var labels = ['.$list['time'].'];
                        var load = ['.$list['load'].'];</script>';

             endforeach;
    }
    
    ?>