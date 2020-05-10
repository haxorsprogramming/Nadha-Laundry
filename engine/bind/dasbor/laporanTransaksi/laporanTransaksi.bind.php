<div id='divLaporanTransaksi'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div>
            <h5>Filter  {{tipeWaktu}} - <?=$data['bulanIndo']; ?> {{tahunSekarang}}</h5>
            <div class="form-inline" style="margin-bottom: 20px;">
                <select class="form-control" id='txtTipeWaktu' onchange="setTipeWaktu()">
                    <option value="bulan">Bulan</option>
                    <option value="tahun">Tahun</option>
                </select>
                &nbsp;&nbsp;&nbsp;
                <select class="form-control" id='txtBulan'>
                    <option v-for='db in dataCapBulan' :value='db.bulan'>{{db.bulan}}</option>
                </select>&nbsp;&nbsp;
                
                <select class="form-control" id='txtTahun'>
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
                <td>{{dl.jlhTransaksi}}</td>
                <td>Rp. {{ Number(dl.nilaiTransaksi).toLocaleString() }}</td>
                <td><a href='#!' class="btn btn-primary btn-icon icon-left"><i class='fas fa-search-plus'></i> Detail</a></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksi.js"></script>  