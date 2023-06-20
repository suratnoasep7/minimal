<!-- Sidebar -->
<div class="sidebar" id="sidebar">

    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">
                <li class="menu-title">
                    <span><?= strtoupper($segment[1]->caption) ?></span>
                </li>
                <?php
                $menu_kategori = modules::run('navigation/menu_kategori', "HR");
                foreach ($menu_kategori as $row) {
                ?>

                    <?php
                    $link = "#";
                    if (empty($row->submenu)) {
                        $link = strtolower($row->uri);
                    ?>
                        <li>
                            <a href="<?= $link; ?>" <?= strtolower($this->uri->segment(2)) == strtolower($row->name) ? 'class="active"' : ""; ?>>
                                <i class="<?= str_replace("fa fa", "la la", $row->icon); ?>"></i>
                                <span> <?= $row->caption ?></span>
                            </a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li class="submenu">
                            <a href="<?= $link; ?>" <?= strtolower($this->uri->segment(2)) == strtolower($row->name) ? 'class="active subdrop"' : ""; ?>>
                                <i class="<?= str_replace("fa fa", "la la", $row->icon); ?>"></i>
                                <span> <?= $row->caption ?></span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="<?= $this->uri->segment(2) == strtolower($row->caption) ? 'display:block !important' : "display:none;"; ?>">
                                <?php
                                foreach ($row->submenu as $submenu) {
                                    $expldsMenuUri = end(explode("/", $submenu->uri));
                                ?>
                                    <li><a <?= strtolower($this->uri->segment(3)) == strtolower($expldsMenuUri) ? 'class="active "' : ""; ?> href="<?= $submenu->uri ?>"><?= $submenu->caption ?></a></li>

                                <?php
                                }
                                ?>
                            </ul>
                        <?php
                    }
                        ?>

                        </li>
                    <?php
                }
                    ?>
                    <li>
                        <a href="<?= site_url() ?>logout"><i class="la la-power-off"></i> <span>Sign Out</span></a>
                    </li>
            </ul>

        </div>
    </div>
</div>
<script>
    // untuk open menu aktif
    setTimeout(() => {
        $(".sidebar-vertical li a.active").click()
    }, 300);
</script>
<!-- /Sidebar -->