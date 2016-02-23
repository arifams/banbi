<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="<?php echo admin_url() ?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <?php foreach ($navs['result'] as $nav) : ?>
            <li>
                <a href="<?php echo admin_url() ?><?php echo $nav->url ?>"><i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $nav->name ?>
                    <?php if ($this->modules->getSubModules($nav->mod_id)) : ?>
                    <span class="fa arrow"></span>
                    <?php endif; ?>
                </a>
                <?php if ($this->modules->getSubModules($nav->mod_id)) : ?>
                <ul class="nav nav-second-level">
                    <?php foreach ($this->modules->getSubModules($nav->mod_id) as $subnav) : ?>
                    <li>
                        <a href="<?php echo admin_url() ?><?php echo $subnav->url ?>"><?php echo $subnav->name ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <!-- /.nav-second-level -->
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->