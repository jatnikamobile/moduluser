<div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse sidebar-fixed">
    <ul class="nav nav-list">
        <li class="hover <?=isset($main_menu) && $main_menu == 'beranda'? 'active':''?>">
            <a href="<?=base_url('Beranda')?>">
                <i class="menu-icon fa fa-home"></i><span class="menu-text"> Beranda </span>
            </a> <b class="arrow"></b>
        </li>
        <li class="hover <?=isset($main_menu) && $main_menu == 'opname_farmasi'? 'active':''?>">
            <a href="<?=base_url('StockOpname')?>">
                <i class="menu-icon fa fa-dropbox"></i><span class="menu-text"> Opname Farmasi </span>
            </a> <b class="arrow"></b>
        </li>
        <li class="hover <?=isset($main_menu) && $main_menu == 'stock_farmasi'? 'active':''?>">
            <a href="<?=base_url('StockFarmasi')?>">
                <i class="menu-icon fa fa-dropbox"></i><span class="menu-text"> Stock Farmasi </span>
            </a> <b class="arrow"></b>
        </li>
        <li class="hover <?=isset($main_menu) && $main_menu == 'mutasi'? 'active':''?>">
            <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-exchange"></i><span class="menu-text">Mutasi Obat</span><b class="arrow fa fa-angle-down"></b></a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover <?=isset($sub1) && $sub1 == 'masuk'? 'active':''?>">
                    <a href="<?=base_url('Mutasi/Masuk')?>"><i class="menu-icon fa fa-caret-right"></i> Masuk</a>
                    <b class="arrow"></b>
                </li>
                <li class="hover <?=isset($sub1) && $sub1 == 'keluar'? 'active':''?>">
                    <a href="<?=base_url('Mutasi/Keluar')?>"><i class="menu-icon fa fa-caret-right"></i> Keluar</a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="hover <?=isset($main_menu) && $main_menu == 'master'? 'active':''?>">
            <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-list-alt"></i><span class="menu-text">Master Data</span><b class="arrow fa fa-angle-down"></b></a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="hover <?=isset($sub1) && $sub1 == 'obat'? 'active':''?>">
                    <a href="<?=base_url('Master/Obat')?>"><i class="menu-icon fa fa-caret-right"></i> Obat</a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->
</div>
