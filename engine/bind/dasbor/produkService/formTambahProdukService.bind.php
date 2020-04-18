<div id='divFormTambahProdukService'>
  <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
  <div class="form-group">
          <label>Kode Produk / Service</label><br/>
          <strong id='txtKode' style="font-size:18px;"><?=$data['kode']; ?></strong>
    </div>
    <div class="form-group">
            <label>Nama Produk / Service</label>
            <input type="text" class="form-control" v-model='namaProduk' id='txtNama'>
      </div>
      <div class="form-group">
              <label>Deksripsi</label>
              <input type="text" class="form-control" v-model='deksProduk' id='txtDeks'>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
            <label>Satuan</label>
          <select class="form-control" v-model='satuanProduk' id='txtSatuan'>
            <option v-for='op in opsiSatuan' :value="op.satuan">{{op.cap}}</option>
          </select>
      </div>
      <div class="form-group">
              <label>Harga (@)</label>
              <input type="text" class="form-control" v-model='hargaProduk' id='txtHarga'>
        </div>

      </div>
  </div>
  <div>
    <a href='#!' class="btn btn-lg btn-primary" v-on:click='simpanAksi' id="btnSimpan"><i class='fas fa-save'></i> {{judulbtn}}</a>&nbsp;&nbsp;
    <a href='#!' id='btnClear' class="btn btn-lg btn-warning btn-icon icon-left" v-on:click='clearForm'><i class='fas fa-clipboard-check'></i> Clear form</a>
&nbsp;&nbsp;
    <a href='#!' id='btnKembali' class="btn btn-lg btn-success btn-icon icon-left" v-on:click='kembali'><i class='fas fa-reply'></i> Kembali</a>
  </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/formTambahProdukService.js"></script>
