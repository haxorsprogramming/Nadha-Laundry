<div class="row" style="padding-left:15px;" id='divFormTambahPengeluaranLaundry'>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="form-group">
            <label>Kode Pengeluaran</label><br/>
            <span id='txtKodePengeluaran' style="font-size:30px;"><?=$data['kdPengeluaran']; ?></span>
        </div>
        <div class="form-group">
            <label>Nama pengeluaran</label>
            <input type="text" class="form-control" id='txtNamaPengeluaran'>
        </div>
        <div class="form-group">
            <label>Deks</label>
            <input type="text" class="form-control" id='txtDeks'>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" id='txtJumlah' value="0">
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" id='txtTanggal' value="<?=$data['waktu']; ?>">
        </div>
        <a href='#!' id='btnSimpan' class="btn btn-lg btn-primary btn-icon icon-left" v-on:click='simpan' id='btnSimpan'><i class='fas fa-save'></i> Simpan</a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="card card-primary">
        <div class="card-header">
            <h4>Tips & bantuan</h4>
        </div>
        <div class="card-body">
            Keterangan : 
            <ul>
                <li>Pengeluaran akan dihitung sebagai pembukuan laundry</li>
                <li>Masukkan tipe pengeluaran yang mempengaruhi seluruh kegiatan laundry</li>
            </ul>
        </div>
    </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/formTambahPengeluaranLaundry.js"></script>