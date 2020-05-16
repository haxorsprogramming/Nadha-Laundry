<div id='divLaporanTransaksi'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div></div>
        </div> 
    </div>
    <table id='tblLaporanTransaksi' class='table table-hover'>
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Jumlah Transaksi</th>
                <th>Nominal Transaksi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for='dl in dataList'>
                <td></td>
                <td></td>
                <td></td>
                <td><a href='#!' class="btn btn-primary btn-icon icon-left"><i class='fas fa-search-plus'></i> Detail</a></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksi.js"></script>  