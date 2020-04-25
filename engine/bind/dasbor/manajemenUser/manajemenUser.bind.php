<div style="padding-left:20px;margin-right:10px;" id='divTabelPelanggan' >
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahUserAtc'>
            <i class="fas fa-plus-circle"></i> Tambah User</a>
<div class="row" style="margin-top:20px;">
<table id='tblUser' class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Username</th>
            <th>Tipe</th>
            <th>Last Login</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr v-for='lu in listUser'>
           <td>{{lu.username}}</td> 
           <td>{{lu.tipeUser}}</td> 
           <td>{{lu.lastLogin}}</td> 
           <td>
           <div class="dropdown d-inline">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='fas fa-bars'></i> Aksi
                      </button>
                      <div class="dropdown-menu" x-placement="bottom-start" style="border:1px solid grey;position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item has-icon" href="#!"><i class="fas fa-info-circle"></i> Detail</a>
                        <a class="dropdown-item has-icon" href="#!" v-on:click='hapusAtc(lu.username)'><i class="fas fa-trash-alt"></i> Hapus</a>
                      </div>
                    </div>
           </td> 
        </tr>
    </tbody>
    </table>
</div>
    

</div>

<script src="<?=STYLEBASE; ?>/dasbor/manajemenUser.js"></script>