<div id='divLaporanTransaksi'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div>
            <h5>Filter</h5>
            <div class="form-inline" style="margin-bottom: 20px;">
                <select class="form-control">
                    <option>Bulan</option>
                    <option>Tahun</option>
                </select>
                &nbsp;-&nbsp;
                <select class="form-control">
                    <option>Januari</option>
                    <option>Februari</option>
                </select>&nbsp;&nbsp;
                <a href='#!' class="btn btn-sm btn-primary" v-on:click='tampilkanAtc'>Tampilkan</a>
            </div>
        </div>
    </div>
    <table id='tblLaporanTransaksi' class='table table-hover'>
        <thead>
            <tr>
                <th id=''>Tanggal</th>
                <th>Jumlah Transaksi</th>
                <th>Nominal Transaksi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for='dl in dataList'>
                <td>{{dl.tanggal}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksi.js"></script>