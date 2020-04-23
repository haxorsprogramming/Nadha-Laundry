<div id='divDataTransaksi'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div>
            <h5>Filter tanggal</h5>
            <div class="form-inline" style="margin-bottom: 20px;">
                <input type="date" class="form-control" id='tglAwal' value="<?=$data['waktu'];?>">&nbsp;sampai&nbsp;
                <input type="date" class="form-control" id='tglAkhir' value="<?=$data['waktu'];?>">&nbsp;&nbsp;
                <a href='#!' class="btn btn-sm btn-primary" v-on:click='tampilkanAtc'>Tampilkan</a>
            </div>
        </div>
    </div>
    <table id='tblDataTransaksi' class='table table-hover'>
        <thead>
            <tr>
                <th>Kode Invoice</th>
                <th>Pelanggan</th>
                <th>Waktu Transaksi</th>
                <th>Total Harga</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for='dt in dataTransaksi'>
                <td><a href='#!' v-on:click='detailTransaksiAtc(dt.invoice)'>{{dt.invoice}}</a></td>
                <td>{{dt.namaPelanggan}}</td>
                <td>{{dt.waktu}}</td>
                <td>Rp. {{ Number(dt.total).toLocaleString() }}</td>
                <td><a :href="'dataTransaksi/cetak/'+dt.invoice" target="new"
                        class="btn btn-sm btn-icon icon-left btn-primary"><i class='fas fa-print'></i> Cetak Invoice</a>
                </td>
            </tr>
            <!-- href='dataTransaksi/cetak/ -->
        </tbody>
    </table>
</div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/dataTransaksi.js"></script>