<div id='divDataTransaksi'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div>
            <h5>Filter tanggal</h5>
            <div class="form-inline" style="margin-bottom: 20px;">
                <input type="date" class="form-control" id='tglAwal' value="<?=$data['waktu'];?>">&nbsp;sampai&nbsp;
                <input type="date" class="form-control" id='tglAkhir' value="<?=$data['waktu'];?>">&nbsp;&nbsp;
                <a href='#!' class="btn btn-sm btn-primary">Tampilkan</a>
            </div>
        </div>
    </div>
    <table id='tblDataTransaksi' class='table table-hover'>
        <thead>
            <tr>
                <th>Kd Transaksi</th>
                <th>Asal</th>
                <th>Arus</th>
                <th>Total</th>
                <th>Saldo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($data['arusKas'] as $as) : 
                    $kdTransaksi = $as['kd_tracking'];
                    $asal = $as['asal'];
                    if($asal == 'pembayaran_cucian'){
                        $asalCap = "Pembayaran cucian";
                    }else{
                        $asalCap = "Pengeluaran laundry";
                    }
                    $arus = $as['arus'];
                    $total = $as['jumlah'];
                    
            ?>
            <tr>
                <td><?=$kdTransaksi; ?></td>
                <td><?=$asalCap; ?></td>
                <td><?=$arus; ?></td>
                <td>Rp. <?=number_format($total); ?></td>
                <td></td>
                <td><a><i class='fas fa-print'></i> Cetak Invoice</a></td>
            </tr>
            <?php 
                endforeach;
            ?>
            <!-- href='dataTransaksi/cetak/ -->
        </tbody>
    </table>
</div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/arusKas.js"></script>