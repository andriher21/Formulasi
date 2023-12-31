<!-- Begin Page Content -->
<div class="container-fluid employee-data">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Employee Manager</h1> -->
    <form name="form-import" enctype="multipart/form-data" style="display: none;">
        <input id="import" type="file" name="file" accept=".csv">
    </form>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="float-left">
            <h6 class="m-0 font-weight-bold text-primary">Material Data</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="btn-group group-action-area">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalCenter"><i class="fas fa-fw fa-plus-circle"></i> &nbsp;New</button>
                        <button type="button" class="btn btn-sm btn-success btn-import"><i class="fas fa-fw fa-upload"></i> &nbsp;Import From CSV</button>
                        <!-- <a href="<?= base_url('uploads/template/Employee Import Format - User Management.csv') ?>" class="btn btn-sm btn-info"><i class="fas fa-fw fa-download"></i> &nbsp;Import Format</a> -->

                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" id="searchbox" class="form-control" placeholder="Search by Material name">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-search text-primary"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th width="10px" class="pr-4 pl-0">
                                <div class="custom-control custom-checkbox table-checkbox">
                                    <input type="checkbox" class="chkboxes check check-all" value="1" data-name="Master Admin" id="table-chk-all">
                                </div>
                            </th>
                            <th>Material No</th>
                            <th>Material Name</th>
                            <th>Jenis Material</th>
                            <th>Status Timbang</th>
                            <th width="10px">Konversi</th>
                            <th width="5px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0;
                        foreach ($material as $u) : ?>
                            <tr>
                                <td class="pr-4 pl-0">
                                    <div class="custom-control custom-checkbox table-checkbox">
                                        <input type="checkbox" class="chkboxes check check-data" name="checkbox" value="<?= $u['materialid'] ?>" data-name="<?= $u['materialname'] ?>">
                                    </div>
                                </td>
                                <td><?= $u['materialno']; ?></td>
                                <td><?= $u['materialname']; ?></td>
                                <?php if($u['materialjenis']=='1') {?>
                                    <td>Rempah</td>
                                <?php } elseif($u['materialjenis']=='2'){?>
                                    <td>Additive</td>
                                <?php } elseif($u['materialjenis']=='3'){?>
                                    <td>Flavor</td>
                                <?php } elseif($u['materialjenis']=='4'){?>
                                    <td>Olein</td>
                                <?php } ?>
                                <?php if($u['materialsttimbang']=='0') {?>
                                    <td>Ditimbang</td>
                                <?php } elseif($u['materialsttimbang']=='1'){?>
                                    <td>Tidak Ditimbang</td>
                                <?php } ?>
                                <td><?= $u['materialkonversi'];?></td>
                                <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEdit<?= $u['materialid']; ?>" style="margin:auto; display:block;">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    
                                   
                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('material/add') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                               
                                <div class="col-md-12">
                                    <label for="message-text" class="col-form-label">Material Number <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="materialno" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="message-text" class="col-form-label">Material Name <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="materialname" required>
                                </div>
                                <div class="col-md-12">
                                <label for="message-text" class="col-form-label">Jenis Material</label>
                                    <select name="materialjenis" class="form-control">
                                            <option value="">Select Jenis Material</option>
                                            <option value="1">Rempah</option>
                                            <option value="2">Additive</option>
                                            <option value="3">Flavor</option>
                                            <option value="4">Olein</option>
                                        </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="message-text" class="col-form-label">Status Timbang <small class="text-danger"><u>*</u></small></label>
                                    <select name="materialsttimbang" class="form-control">
                                            <option value="">Select Status timbang</option>
                                            <option value="0">Ditimbang</option>
                                            <option value="1">Tidak ditimbang</option>
                                        </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="message-text" class="col-form-label">Konversi<small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="materialkonversi" required>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Employee -->
    <?php foreach ($material as $u) : ?>
        <div class="modal fade" id="modalEdit<?= $u['materialid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Delete Schedule</h5> -->

                        <h6 class="modal-title font-weight-bold text-primary">Manage Material</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('material/edit') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $u['materialid'] ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="message-text" class="col-form-label">Material Number <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="materialno" value="<?= $u['materialno'] ?>" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="message-text" class="col-form-label">Material Name <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="materialname" value="<?= $u['materialname'] ?>" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="message-text" class="col-form-label">Jenis Material</label>
                                            <select name="materialjenis" class="form-control">
                                                    <option value="">Select Jenis Material</option>
                                                    <option value="1" <?= $u['materialjenis'] == '1' ? 'selected="true"' : ''; ?>>Rempah</option>
                                                    <option value="2" <?= $u['materialjenis'] == '2' ? 'selected="true"' : ''; ?>>Additive</option>
                                                    <option value="3" <?= $u['materialjenis'] == '3' ? 'selected="true"' : ''; ?>>Flavor</option>
                                                    <option value="4" <?= $u['materialjenis'] == '4' ? 'selected="true"' : ''; ?>>Olein</option>
                                                </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="message-text" class="col-form-label">Jenis Material</label>
                                            <select name="materialsttimbang" class="form-control">
                                                    <option value="">Select Jenis Material</option>
                                                    <option value="0" <?= $u['materialsttimbang'] == '0' ? 'selected="true"' : ''; ?>>Ditimbang</option>
                                                    <option value="q" <?= $u['materialsttimbang'] == '1' ? 'selected="true"' : ''; ?>>Tidak Ditimbang</option>
                                                   
                                                </select>
                                    </div>
                                    <div class="col-md-12">
                                    <label for="message-text" class="col-form-label">Konversi<small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="materialkonversi" value="<?= $u['materialkonversi'] ?>" required>
                                </div>
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
    <?php endforeach ?>

    <!-- Modal Import -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Import Material</h5>
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
                                    <th>Material Number</th>
                                    <th>Material Name</th>
                                    <th>Material Jenis</th>
                                    <th>Status Timbang</th>
                                    <th>Konversi</th>
                                </tr>
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
                        <button type="button" class="btn btn-primary" onClick="doImport();"> <i class="fas fa-save"></i> Save</button>
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
<!-- End of Main Content -->
<script>
    var base_url = '<?php echo base_url(); ?>'; ;
    </script>