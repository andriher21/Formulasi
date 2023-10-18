<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() . 'dashboard' ?>">
        <div class="sidebar-brand-icon">
            <i class="fab fa-envira"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Regios</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php
    $role_id = $this->session->userdata('role_id');
    $query = "SELECT * FROM sys_nav WHERE role_id = $role_id ORDER BY nav_order ASC";
    $result = $this->db->query($query)->result_array();
    // var_dump($result);
    // die;
    ?>

    <?php foreach ($result as $menu) : ?>
        <?php if ($menu['parent_id'] == '') : ?>
            <div class="sidebar-heading">
                <?= $menu['nav_title'] ?>
            </div>

            <?php $parent_id = $menu['nav_order'];
            $querySubMenu = "SELECT * FROM sys_nav WHERE parent_id = $parent_id and role_id = $role_id";
            $resultSubMenu = $this->db->query($querySubMenu)->result_array(); ?>

            <?php foreach ($resultSubMenu as $subMenu) : ?>
                <?php if ($nav_url == $subMenu['nav_index']) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif ?>

                    <a class="nav-link" href=" <?= base_url() . $subMenu['nav_url'] ?>">
                        <i class="<?= $subMenu['nav_icon']; ?>"></i>
                        <span><?= $subMenu['nav_title']; ?></span>
                    </a>
                    </li>
                <?php endforeach ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
            <?php endif ?>

        <?php endforeach ?>

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>
<!-- End of Sidebar -->