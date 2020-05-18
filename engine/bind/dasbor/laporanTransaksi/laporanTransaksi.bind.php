<div id='divLaporanTransaksi'>
    <table id='tblLaporanTransaksi' class='table table-hover'>
        <thead>
            <tr>
                <th id='capSesiWaktu'>Tahun</th>
                <th>Jumlah Transaksi Masuk</th>
                <th>Jumlah Transaksi Keluar</th>
                <th>Nominal Transaksi Masuk</th>
                <th>Nominal Transaksi Keluar</th>
                <th></th><th></th>
            </tr>
        </thead>
        <tbody>
        <span style="display: none;" id='txtTahunHide'></span>
            <tr v-for='dl in dataRilisTahun'>
                <td><a href='#!' v-on:click='tahunDetails(dl.tahun)'>{{dl.tahun}} {{bulanGrap}} {{tahunGrap}}<a/></td>
                <td>{{dl.jlhTransaksi}}</td>
                <td>{{dl.jlhTransaksiKeluar}}</td>
                <td>Rp. {{ Number(dl.nilaiTransaksi).toLocaleString() }}</td>
                <td>Rp. {{ Number(dl.nilaiTransaksiKeluar).toLocaleString() }}</td>
                <td><a href='#!' class="btn btn-primary btn-sm btn-icon icon-left" v-on:click='tahunDetails(dl.tahun)'><i class='fas fa-search-plus'></i> Detail</a></td>
                <td><a :href="'<?=HOMEBASE; ?>cetakLaporan/'+typeWaktu+'/'+dl.tahun+tahunCapGrap" target='new' class="btn btn-primary btn-sm btn-icon icon-left"><i class='fas fa-print'></i> Cetak Laporan</a></td>
            </td>
            </tr>
        </tbody>
    </table>
    <br/>
    <div class="row">
    <table id='tblDetailTanggal' class="table table-hover">
        <thead>
        <tr>
            <th>Waktu</th>
            <th>Kd Transaksi</th>
            <th>Jenis</th>
            <th>Nominal</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <tr v-for='dh in dataHarian'>
                <td>{{dh.waktu}}</td>
                <td>{{dh.kdTransaksi}}</td>
                <td>{{dh.arus}}</td>
                <td>Rp. {{ Number(dh.jumlah).toLocaleString() }}</td>
                <td>
                    <a href='<?=HOMEBASE; ?>/utility/cetakLaporan' class="btn btn-sm btn-icon btn-primary"><i class='fas fa-print'></i> Cetak Transaksi</a>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    
</div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksi.js"></script>  