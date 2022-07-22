<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="<?php if($active == 'dashboard'){ echo 'active'; } ?>"> <a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li class="<?php if($active == 'user'){ echo 'active'; } ?>"> <a href="/user"><i class="fa fa-users"></i> <span>User</span></a></li>
    <li class="<?php if($active == 'jurnal'){ echo 'active'; } ?>"> <a href="/jurnal"><i class="fa fa-book"></i> <span>Jurnal</span></a></li>
    <li class="<?php if($active == 'cetak_jurnal'){ echo 'active'; } ?>"> <a href="/cetak-jurnal"><i class="fa fa-book"></i> <span>Cetak Jurnal</span></a></li>
    <li class="<?php if($active == 'absen'){ echo 'active'; } ?>"> <a href="/absen"><i class="fa fa-camera"></i> <span>Absensi</span></a></li>
    <li class="<?php if($active == 'rekap_absensi'){ echo 'active'; } ?>"> <a href="/rekapan"><i class="fa fa-folder"></i> <span>Rekap Absensi</span></a></li>
</ul>