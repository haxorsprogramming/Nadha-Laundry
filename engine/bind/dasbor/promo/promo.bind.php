<div id='divPromo'>
<div style='margin-bottom:15px;'>
    <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' id='btnTambahPromo' v-on:click='bukaFormTambahPromo()'><i
            class="fas fa-plus-circle"></i> Tambah Promo</a>
</div>
<hr/>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12" >
        <table id='tblPromo' class="table table-hover">
            <thead>
                <tr>
                    <td>Kd Promo</td>
                    <td>Deks</td>
                    <td>Diskon</td>
                    <td>Status</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for='dp in dataPromo'>
                    <td>{{dp.kdPromo}}</td>
                    <td>{{dp.deks}}</td>
                    <td>{{dp.diskon}}</td>
                    <td></td>
                    <td>
                        <div class="dropdown d-inline">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='fas fa-bars'></i> Aksi
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start"
                                style="border:1px solid grey;position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item has-icon" href="#!"><i class="fas fa-info-circle"></i>
                                    Detail</a>
                                <a class="dropdown-item has-icon" href="#!"><i class="fas fa-info-circle"></i> Hapus</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div id='divTambahPromo'>
            <h5>Tambah Promo</h5>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Kode Promo</label>
                <input type="text" class="form-control" id="txtKodePromo" placeholder="Kode Promo">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Deks</label>
                <input type="text" class="form-control" id="txtDeks" placeholder="Deksripsi promo">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Diskon (%)</label>
                <input type="number" class="form-control" id="txtDiskon" placeholder="Diskon">
            </div>
            <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click='simpanAtc()'><i class='fas fa-save'></i> Simpan</a>&nbsp;
            <a href='#!' class="btn btn-warning btn-icon icon-left" v-on:click='batalAtc()'><i class='fas fa-times-circle'></i> Batal</a>
        </div>
    </div>
</div>
    
</div>
<script src="<?=STYLEBASE; ?>/dasbor/promo.js"></script>