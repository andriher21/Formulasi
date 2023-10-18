<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row">

    </div>
    <!-- DataTales Example -->
    <div class="section-body">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card shadow mb-4">

                    <div class="card-body">

                        <div class="row mb-2">
                            <div class="col-6">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalCenter"><i class="fas fa-fw fa-plus-circle"></i> &nbsp;New</button>

                            </div>
                            <!-- <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search text-primary"></i></span>
                                    </div>
                                    <input type="text" id="searchbox" class="form-control" placeholder="Search Duration">
                                </div>
                            </div> -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5px">No</th>
                                        <th>Description</th>
                                        <!-- <th>Late Allowed</th> -->
                                        <th>Out Allowed</th>
                                        <th width="5px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($durations)) { ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No data.</td>
                                        </tr>
                                    <?php } else { ?>
                                        <?php $count = 0;
                                        foreach ($durations as $duration) : ?>
                                            <tr>
                                                <td><?= ++$count ?></td>
                                                <td><?= $duration['desc'] ?></td>
                                                <!-- <td> <span class="badge badge-pill badge-primary"> <?= date('i', strtotime($duration['late_allowed'])) ?> Minute</span></td> -->
                                                <td> <span class="badge badge-pill badge-primary"> <?= date('H:i:s', strtotime($duration['out_allowed'])) ?></span></td>
                                                <td>
                                                    <div class="btn-group group-area-action">
                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEdit<?= $duration['id'] ?>"><i class="fas fa-fw fa-edit"></i></button>
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete<?= $duration['id'] ?>"><i class="fas fa-fw fa-trash"></i></button>
                                                    </div>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Duration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('setup/duration/insertDuration') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="message-text" class="col-form-label">Description </label>
                                    <input type="text" class="form-control" name="desc">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="message-text" class="col-form-label">Set Out Allowed (h:m)</label>
                                    <input class="form-control" style="background-color: white;" type="text" id="allowed" name="out_allowed">
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
    <?php foreach ($durations as $duration) : ?>
        <div class="modal fade" id="modalEdit<?= $duration['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Manage Duration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('setup/duration/editDuration') ?>" enctype="multipart/form-data">
                        <input type="text" name="id" value="<?= $duration['id'] ?>" hidden>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">Description</label>
                                        <input class="form-control" type="text" value="<?= $duration['desc'] ?>" name="desc">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="message-text" class="col-form-label">Set Late Allowed Minute(H:m)</label>
                                        <input class="form-control" style="background-color: white;" type="text" id="allowed" name="out_allowed" value="<?= $duration['out_allowed'] ?>">
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

    <!-- Modal Delete -->
    <?php foreach ($durations as $duration) : ?>
        <div class="modal fade" id="modalDelete<?= $duration['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Manage Duration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('setup/duration/deleteDuration') ?>" enctype="multipart/form-data">
                        <input type="text" value="<?= $duration['id'] ?>" name="id" hidden>
                        <div class="modal-body">
                            <div class="form-group">
                                <!-- <p>Delete Late Allowed <b class="text-danger"><?= date('i', strtotime($duration['late_allowed'])) ?> Minute</b> and -->
                                <p>Delete <b><?= $duration['desc'] ?></b>?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
</div>