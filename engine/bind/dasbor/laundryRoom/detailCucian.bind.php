<?php
$kd = $data['kd'];
$this -> st -> query("SELECT * FROM tbl_kartu_laundry ORDER BY id DESC;");
$data['kartuLaundry'] = $this -> st -> queryAll();

//cari data pelanggan & cucian
$this -> st -> query("SELECT * FROM tbl_kartu_laundry WHERE kode_service='$kd' LIMIT 0,1;");
$qKartuLaundry = $this -> st -> querySingle();
$pelanggan = $qKartuLaundry['pelanggan'];
$waktuMasuk = $qKartuLaundry['waktu_masuk'];
//cari nama pelanggan 
$this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$pelanggan' LIMIT 0,1;");
$qNamaPelanggan = $this -> st -> querySingle();
$namaPelanggan = $qNamaPelanggan['nama_lengkap'];
//cari data cucian              
$this -> st -> query("SELECT total FROM tbl_temp_item_cucian WHERE kd_room='$kd';");
$jlhItem = $this -> st -> numRow();
$qTotal = $this -> st -> queryAll();
$hargaAwal = 0;
foreach($qTotal as $qt){
    $hargaSat = $qt['total'];
    $hargaAwal = $hargaAwal + $hargaSat;
}

?>
<div class="container" id='divDetailCucian'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
        <div  style="border-radius:3px; border:solid grey 1px;padding:12px;">
        <h5>Info cucian</h5>
        <table class="">
            <tr>
                <td>Kode Registrasi Cucian</td><td>: <span id='txtKdRegistrasi' style="font-weight: bold;"><?=$kd; ?></span></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td><td>: <span id='txtNamaPelanggan'><?=$namaPelanggan; ?></span></td>
            </tr>
            <tr>
                <td>Waktu Masuk</td><td>: <?=$waktuMasuk; ?></td>
            </tr>
            <tr>
                <td>Total Item</td><td>: <span id='txtJumlahItem'><?=$jlhItem; ?></span></td>
            </tr>
            <tr>
                <td>Total Harga</td><td>: Rp. <span id='txtTotalInt' style="display: none;"><?=$hargaAwal; ?></span><span id='txtTotalView'><?=number_format($hargaAwal); ?></span></td>
            </tr>
        </table>
        <div style="padding-top:12px;">
        <ul>
            <li><small> Item per service hanya bisa ditambahkan, tidak bisa dihapus</small></li>
            <li><small> Jika ingin menghapus item, harus membatalkan entry laundry dan membuat ulang melalui kartu laundry</small></li>
        </ul>
        <a href='#!' class="btn btn-primary btn-icon icon-left"><i class='fas fa-receipt'></i> Bayar</a>
        <div>

        </div>
        </div>
   
        </div>
               <hr/>
        <h5>List item cucian</h5>
        <table class="table table-bordered table-stripped" style="font-size: 15px;">
            <thead>
                <tr>
                    <th>Items</th>
                    <th>Qt</th>
                    <th>Total</th> 
                </tr>
            </thead>
            <tbody>
                <tr v-for='li in listItem'>
                    <td>{{li.teks}}</td><td>{{li.qt}} Kg</td><td>Rp. {{li.total}}</td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <h5>Tambah item cucian</h5>
            <div class="form-group">
            <label>Produk / Service</label>
            <select class="js-example-basic-single form-control" id='txtProduk' onchange="setProduk()">
            <option value='none'>-- Pilih produk --</option>
           <?php
            foreach($data['listProduk'] as $prod):
           ?>
        <option value="<?=$prod['kd_service'];?>"><?=$prod['nama'];?></option>
        <?php endforeach; ?>
           </select>
            </div>
            <div class="form-group">
            <label>Quantity</label>
                <input type="number" class="form-control" id='txtQt' onkeyup="getTotal()">
            </div>
            <div>
                <ul>
                    <li>Produk : <b>{{namaService}}</b> - ({{satuan}})</li>
                    <li>Harga (@) : Rp. {{hargaAtCap}}</li>
                    <li>Total : Rp. {{capTotal}}</li>
                </ul>
            </div>
            <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click="tambahItem" id='btnTambahItem'><i class='fas fa-plus-circle'></i> Tambah item</a>
        </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/detailCucian.js"></script>