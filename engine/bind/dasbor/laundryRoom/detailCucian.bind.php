<?php
$kd = $data['kd'];

?>
<div class="container" id='divDetailCucian'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
        <h5>Info cucian</h5>
        <table class="table table-bordered">
            <tr>
                <td>Kode Registrasi Cucian</td><td><span id='txtKdRegistrasi'><?=$kd; ?></span></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td><td></td>
            </tr>
            <tr>
                <td>Waktu Masuk</td><td></td>
            </tr>
            <tr>
                <td>Total Item</td></td>
            </tr>
            <tr>
                <td>Total Harga</td></td>
            </tr>
        </table>
        <hr/>
        <h5>List item cucian</h5>
        <table class="table table-bordered table-stripped" style="font-size: 15px;">
            <thead>
                <tr>
                    <td>Items</td>
                    <td>Qt</td>
                    <td>Total</td> 
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
            <a href='#!' class="btn btn-primary" v-on:click="tambahItem">Tambah item</a>
        </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/detailCucian.js"></script>