<!-- Begin Page Content -->
<div class="container-fluid gate-data">
    <!-- Page Heading -->

    <div class="row">

    </div>
    <!-- DataTales Example -->
    <div class="section-body">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="btn-group group-action-area">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalCenter"><i class="fas fa-fw fa-plus-circle"></i> &nbsp;New</button>
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
                                        <th>Serial Number</th>
                                        <th>Building</th>
                                        <th>Ip Camera</th>
                                        <th>In/Out</th>
                                        <th witdth="5px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($gates)) { ?>
                                        <tr>
                                            <td colspan="9" style="text-align:center">No data.</td>
                                        </tr>
                                    <?php } else { ?>
                                        <?php $count = 0;
                                        foreach ($gates as $gate) : ?>
                                            <tr>
                                                <td class="pr-4 pl-0">
                                                    <div class="custom-control custom-checkbox table-checkbox">
                                                        <input type="checkbox" class="chkboxes check check-data" name="checkbox" value="<?= $gate['id'] ?>" data-name="<?= $gate['building'] ?>">
                                                    </div>
                                                </td>
                                                <td><?= $gate['sn'] ?></td>
                                                <td> <?= $gate['building'] ?></td>
                                                <td> <?= $gate['ip_camera'] ?></td>
                                                <?php if ($gate['io'] == 1) { ?>
                                                    <td> <span class="badge badge-pill badge-primary"> In</span></td>
                                                <?php } else { ?>
                                                    <td> <span class="badge badge-pill badge-danger"> Out</span></td>
                                                <?php } ?>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEdit<?= $gate['id'] ?>"> <i class="fas fa-fw fa-edit"></i> </button>

                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>

    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Gate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('setup/gate/insertGate') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="message-text" class="col-form-label">Serial Number <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="sn" required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="message-text" class="col-form-label">Building <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="building" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="message-text" class="col-form-label">IP Camera </label>
                                    <input class="form-control" type="text" name="ip_camera">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="message-text" class="col-form-label">IN / OUT</label>
                                    <select class="form-control" name="io" required>
                                        <option value="1">In</option>
                                        <option value="0">Out</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php foreach ($gates as $gate) : ?>
        <div class="modal fade" id="modalEdit<?= $gate['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Gate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('setup/gate/editGate') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $gate['id'] ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">Serial Number <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="sn" value="<?= $gate['sn'] ?>" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">Building <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="building" value="<?= $gate['building'] ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">IP Camera </label>
                                        <input class="form-control" type="text" name="ip_camera" value="<?= $gate['ip_camera'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">IN / OUT</label>
                                        <select class="form-control" name="io" required>
                                            <option value="1">In</option>
                                            <option value="0">Out</option>
                                        </select>
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
    <?php endforeach ?>

    <?php foreach ($gates as $gate) : ?>
        <div class="modal fade" id="modalDelete<?= $gate['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Gate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('setup/gate/deleteGate') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $gate['id'] ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <p for="recipient-name" class="col-form-label">Delete gate <b> <?= $gate['building']; ?></b>?</p>
                            </div>
                        </div>
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Delete Modal -->
    <div class="modal fade" id="confirmation-dialog" tabindex="-1" role="dialog" aria-labelledby="modal-top" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="modal-body confirmation-dialog-notice"> Do you want to continue?</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-shadow btn-confirmation-dialog-yes" data-dismiss="modal" data-url="javascript:;">
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