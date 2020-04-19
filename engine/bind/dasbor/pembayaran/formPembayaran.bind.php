<?php
$kd = $data['kartuRegistrasi'];
$pelanggan = $kd['pelanggan'];

//cari data pelanggan 
$this -> st -> query("SELECT nama_lengkap, email, hp, level FROM tbl_pelanggan WHERE username='$pelanggan';");
$dPel = $this -> st -> querySingle();
$namaPel = $dPel['nama_lengkap'];
$level = $dPel['level'];
//cari diskon level 
$this -> st -> query("SELECT diskon_cuci FROM tbl_level_user WHERE kd_level='$level';");
$qLevel = $this -> st -> querySingle();
$diskonLevel = $qLevel['diskon_cuci'];
//buat kode transaksi 
$tahun = date("Y");
$bulan = date("m");
$hari = date("d");
$kodeTransaksi = "INV-".$tahun."-".$bulan."-".$hari."-".substr($kd['kode_service'], 0, 4);
?>
<div id='divFormPembayaran'>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class='card card-primary' style="border-radius:3px; padding:12px;">
        <div class="card-header"><h5>Data Cucian</h5></div>
        <div class="card-body">
            <table>
                <tr>
                    <td>Kode Cucian</td><td>: <b><span id='txtKodeService'><?=$kd['kode_service']; ?></span><b/></td>
                </tr>
                <tr>
                    <td>Kode Transaksi</td><td>: <span id='txtKodeTransaksi'><?=$kodeTransaksi; ?></span></td>
                </tr>
                <tr>
                    <td>Pelanggan</td><td>: <?=$namaPel; ?></td>
                </tr>
                <tr>
                    <td>Level Pelanggan</td><td>: <span id='txtLevelPelanggan'><?=$level; ?></span></td>
                </tr>
                <tr>
                    <td>Diskon level</td><td>: <span id='txtDiskonLevel'><?=$diskonLevel; ?></span> %</td>
                </tr>
            </table>
<hr/>
<h6>Item cucian</h6>
<table class="table table-bordered table-hover">
<tr>
    <th>Item</th><th>Qt</th><th>Total</th>
</tr>
<tr v-for='tb in itemService'>
    <td>{{tb.teks}}</td><td>{{tb.qt}}</td><td>{{tb.total}}</td>
</tr>
</table>
        </div>
    </div> 
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class='card card-primary' style="border-radius:3px; padding:12px;">
        <div class="card-header"><h5>Detail Harga</h5></div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Harga service</td><td>Rp. {{hargaAwal}}</td>
                </tr>
                <tr>
                    <td>Disc ({{diskonLevel}}%)</td><td>Rp. {{hargaFin1}}</td>
                </tr>
                <tr>
                    <td>Kode Promo</td><td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Kode Promo" id='txtKodePromo'>
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button" id='txtGunakan' v-on:click='cekPromo'>Gunakan</button>
                        </div>
                      </div>
                    </td>
                </tr>
                <tr>
                    <td>Tunai</td><td>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Tunai" id='txtTunai' v-model='tunai'>
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button" id='txtSetTunai' v-on:click='setTunai'>Set</button>
                        </div>
                      </div>
                    </td>
                </tr>
                <tr id='divTblPromo'>
                    <td>
                        Promo 
                    </td>
                    <td><span id='txtNamaPromo'>-</span></td>
                </tr>
                <tr>
                    <td>Harga akhir</td><td>Rp. <span id='txtHargaFinal' style="display: none;"></span><span id='txtHargaFinalCap' style="font-size: 20px;"></span></td>
                </tr> 
                <tr>
                    <td>Tunai</td><td>Rp. {{ Number(tunai).toLocaleString() }}</td>
                </tr>
                <tr>
                    <td>Kembali</td><td>Rp. {{ Number(kembali).toLocaleString() }}</td>
                </tr>         
            </table>
            <div>
                <a href='#!' class="btn btn-lg btn-primary" v-on:click='prosesPembayaran' id='btnProsesPembayaran'><i class='fas fa-check-circle'></i> Proses pembayaran</a>&nbsp;&nbsp;
                <a href='#!' class="btn btn-lg btn-warning" id='btnKembali'><i class='fas fa-reply'></i> Kembali</a>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/formPembayaran.js"></script>
