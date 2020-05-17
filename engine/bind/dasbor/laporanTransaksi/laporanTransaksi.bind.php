<div id='divLaporanTransaksi'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div></div>
        
    </div>
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
            <tr v-for='dl in dataRilisTahun'>
                <td><a href='#!' v-on:click='tahunDetails(dl.tahun)'>{{dl.tahun}}<a/></td>
                <td>{{dl.jlhTransaksi}}</td>
                <td>{{dl.jlhTransaksiKeluar}}</td>
                <td>Rp. {{ Number(dl.nilaiTransaksi).toLocaleString() }}</td>
                <td>Rp. {{ Number(dl.nilaiTransaksiKeluar).toLocaleString() }}</td>
                <td><a href='#!' class="btn btn-primary btn-sm btn-icon icon-left"><i class='fas fa-search-plus'></i> Detail</a></td>
                <td><a href='#!' class="btn btn-primary btn-sm btn-icon icon-left"><i class='fas fa-print'></i> Cetak Laporan</a></td>
            </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksi.js"></script>  