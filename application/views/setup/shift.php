<!-- Begin Page Content -->
<div class="container-fluid shift-data">
    <!-- DataTales Example -->

    <div class="row">
        <div class="col"></div>
        <div class="col-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="btn-group group-action-area">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalCenter"><i class="fas fa-fw fa-plus-circle"></i> &nbsp;New</button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <input type="text" id="searchbox" class="form-control" placeholder="Type shift code">
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
                                    <th>Shift Code</th>
                                    <th>Work Hour</th>
                                    <th>Work Start</th>
                                    <th>Work End</th>
                                    <th>Out Allowed</th>
                                    <th width="10px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($shifts as $shift) : ?>
                                    <tr>
                                        <td class="pr-4 pl-0">
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                <input type="checkbox" class="chkboxes check check-data" name="checkbox" value="<?= $shift['id'] ?>" data-name="<?= $shift['shift_code'] ?>">
                                            </div>
                                        </td>
                                        <td><?= $shift['shift_code'] ?></td>
                                        <td> <span class="badge badge-pill badge-primary"><?= date('H:i:s', strtotime($shift['actual_work_hour'])) ?></span></td>
                                        <td> <span class="badge badge-pill badge-info"><?= $shift['work_start'] ?></span></td>
                                        <td> <span class="badge badge-pill badge-info"><?= $shift['work_end'] ?></span></td>
                                        <td> <span class="badge badge-pill badge-success"><?= date('H:i:s', strtotime($shift['out_allowed'])) ?></span></td>
                                        <td class="text-center">
                                            <div class="btn-group group-area-action">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEdit<?= $shift['id'] ?>"><i class="fas fa-fw fa-edit"></i></button>
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


    <!-- Modal Add -->
    <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Shift</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('setup/shift/insert') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label for="message-text" class="col-form-label">Shift Code <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="shift_code" required>
                                </div>
                                <div class="col-6">
                                    <label for="message-text" class="col-form-label">Work Hour <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="work_hour" id="time" style="background-color: white;" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="message-text" class="col-form-label">Work Start <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="work_start" id="time" style="background-color: white;" required>
                                </div>
                                <div class="col-6">
                                    <label for="message-text" class="col-form-label">Work End <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="work_end" id="time" style="background-color: white;" required>
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

    <!-- Modal Edit -->
    <?php foreach ($shifts as $shift) : ?>
        <div class="modal fade" id="modalEdit<?= $shift['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Manage Shift</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('setup/shift/update') ?>" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?= $shift['id'] ?>" hidden>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <label for="message-text" class="col-form-label">Shift Code <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="shift_code" value="<?= $shift['shift_code'] ?>" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="message-text" class="col-form-label">Work Hour <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="work_hour" value="<?= $shift['actual_work_hour'] ?>" id="time" style="background-color: white;" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <label for="message-text" class="col-form-label">Work Start <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="work_start" value="<?= $shift['work_start'] ?>" id="time" style="background-color: white;" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="message-text" class="col-form-label">Work End <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="work_end" value="<?= $shift['work_end'] ?>" id="time" style="background-color: white;" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">Out Allowed <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="out_allowed" value="<?= $shift['out_allowed'] ?>" id="time" style="background-color: white;" required>
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