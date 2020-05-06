<div id='divLaporanTransaksi'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div>
            <h5>Filter - <?=$data['bulanIndo']; ?> </h5>
            <div class="form-inline" style="margin-bottom: 20px;">
                <select class="form-control">
                    <option>Bulan</option>
                    <option>Tahun</option>
                </select>
                &nbsp;-&nbsp;
                <select class="form-control">
                    <option v-for='db in dataCapBulan'>{{db.bulan}}</option>
                </select>&nbsp;&nbsp;
                &nbsp;-&nbsp;
                <select class="form-control">
                    <option>2019</option>
                    <option>2020</option>
                </select>&nbsp;&nbsp;
                <a href='#!' class="btn btn-sm btn-primary btn-icon icon-left" v-on:click='tampilkanAtc'><i class='fas fa-search'></i> Tampilkan</a>
            </div>
        </div>
    </div>
    <table id='tblLaporanTransaksi' class='table table-hover'>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah Transaksi</th>
                <th>Nominal Transaksi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for='dl in dataList'>
                <td>{{dl.tanggal}} {{dl.bulanIndo}}</td>
                <td></td>
                <td>aa</td>
                <td>aa</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksi.js"></script> 