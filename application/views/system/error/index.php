<!-- Begin Page Content -->
<div class="container-fluid scan-log-data">
    <!-- Page Heading -->

    <div class="row">

    </div>
    <!-- DataTales Example -->
    <div class="section-body">
        <div class="row">
            <!-- <div class="col"></div> -->
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-6 mb-2">
                                <div class="input-group">
                                    <input type="text" id="searchbox" class="form-control" placeholder="Search">
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
                                        <th>Scan Date</th>
                                        <th>Name</th>
                                        <th><i class="fas fa-fw fa-flag"></i> Logs</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $count = 0;
                                    foreach ($errors as $error) : ?>
                                        <tr>
                                            <td><small class="text-danger"><?= $error['scan_date'] ?></small></td>
                                            <td><small class="text-primary"><?= $error['nama'] ?></small></td>
                                            <td><small><?= $error['message'] ?>: <?= $error['scan'] ?> </small></td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col"></div> -->
        </div>

    </div>
</div>
</div>