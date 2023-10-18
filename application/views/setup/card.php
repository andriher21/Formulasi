<!-- Begin Page Content -->
<div class="container-fluid card-data">
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
                                <input type="text" id="searchbox" class="form-control" placeholder="Search Cards">
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
                                    <th>PID</th>
                                    <th>Card Number</th>
                                    <th>RFID</th>
                                    <th width="10px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cards as $card) : ?>
                                    <tr>
                                        <td class="pr-4 pl-0">
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                <input type="checkbox" class="chkboxes check check-data" name="checkbox" value="<?= $card['id'] ?>" data-name="<?= $card['pid'] ?>">
                                            </div>
                                        </td>
                                        <td><?= $card['pid'] ?></td>
                                        <td> <?= $card['card_number'] ?></td>
                                        <td> <?= $card['rfid'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group group-area-action">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEdit<?= $card['id'] ?>"><i class="fas fa-fw fa-edit"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Card</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('setup/card/insertCard') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="message-text" class="col-form-label">PID <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="pid" required>
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="message-text" class="col-form-label">RFID <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="rfid" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="message-text" class="col-form-label">Card Number <small class="text-danger"><u>*</u></small></label>
                                    <input class="form-control" type="text" name="card_number" required>
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
    <?php foreach ($cards as $card) : ?>
        <div class="modal fade" id="modalEdit<?= $card['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Manage Card</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('setup/card/editCard') ?>" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?= $card['id'] ?>" hidden>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">PID <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="pid" value="<?= $card['pid'] ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">RFID <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="rfid" value="<?= $card['rfid'] ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">Card Number <small class="text-danger"><u>*</u></small></label>
                                        <input class="form-control" type="text" name="card_number" value="<?= $card['card_number'] ?>" required>
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