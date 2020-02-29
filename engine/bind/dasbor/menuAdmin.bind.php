<ul class="sidebar-menu" style='margin-top:20px;'>
    <!-- <li class="menu-header">Menu</li> -->
    <li><a class="nav-link btnDashboard" href="#!" v-on:click='berandaAct'><i class="fas fa-newspaper"></i> <span>Dashboard</span></a></li>
    <li><a class="nav-link btnUjiDiagnosis" href="#!"><i class="fas fa-newspaper"></i> <span>Kartu Laundry</span></a></li>
    <li><a class="nav-link btnUjiDiagnosis" href="#!"><i class="fas fa-newspaper"></i> <span>Laundry Room</span></a></li>
    <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-newspaper"></i> <span>Data Master</span></a>
              <ul class="dropdown-menu" style="">
                <li><a class="nav-link" href="#!">Produk & Service</a></li>
                <li><a class="nav-link" href="#!" v-on:click='pelangganAtc'>Pelanggan</a></li>
                <li><a class="nav-link" href="#!" v-on:click='levelUserAtc'>Level User</a></li>
                <li><a class="nav-link" href="#!">Parfum</a></li>
              </ul>
            </li>
    <li><a class="nav-link btnDataKerusakan" href="#!"><i class="fas fa-newspaper"></i> <span>Data Pengeluaran</span></a></li>
    <li><a class="nav-link btnSettingLaundry" href="#!"><i class="fas fa-newspaper"></i> <span>Setting Laundry</span></a></li>
    <li><a class="nav-link btnSettingUser" href="#!"><i class="fas fa-newspaper"></i> <span>Manajemen User</span></a></li>
    <li><a class="nav-link" id='btnLogOut' href="<?=HOMEBASE;?>dasbor/logOut"><i class="fas fa-sign-out-alt"></i> <span>LogOut</span></a></li>
</ul>
