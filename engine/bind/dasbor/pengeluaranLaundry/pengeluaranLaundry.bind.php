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
                <th></th>
            </tr>
        </tbody>
    </table>

</div>
<script src="<?=STYLEBASE; ?>/dasbor/pengeluaranLaundry.js"></script>