<div class="row" style="padding-left:15px;padding-right:15px;" id='divPengeluaranLaundry'>
<div style="margin-bottom:20px;">
<a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahPengeluaran'><i class="fas fa-plus-circle"></i> Tambah Pengeluaran</a>
</div>
<table id='tblDataPengeluaran' class='table table-hover'>
        <thead>
            <tr>
                <th>Kode Pengeluaran</th>
                <th>Waktu</th>
                <th>Pengeluaran</th>
                <th>Deks</th>
                <th>Jumlah</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for='dp in dataPengeluaran'>
                <td><a href='#!' v-on:click='detailPengeluaran(dp.kdPengeluaran)'>{{dp.kdPengeluaran}}</a></td>
                <td>{{dp.waktu}}</td>
                <td>{{dp.pengeluaran}}</td>
                <td>{{dp.keterangan}}</td>
                <td>Rp. {{ Number(dp.jumlah).toLocaleString() }}</td>
                <th><div class="dropdown d-inline">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='fas fa-bars'></i> Aksi
                      </button>
                      <div class="dropdown-menu" x-placement="bottom-start" style="border:1px solid grey;position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item has-icon" href="#!"><i class="fas fa-info-circle"></i> Detail</a>
                        <a class="dropdown-item has-icon" href="#!" v-on:click='hapusAtc(dp.kdPengeluaran)'><i class="fas fa-trash-alt"></i> Hapus</a>
                      </div>
                    </div></th>
            </tr>
        </tbody>
    </table>

</div> 
<script src="<?=STYLEBASE; ?>/dasbor/pengeluaranLaundry.js"></script> 