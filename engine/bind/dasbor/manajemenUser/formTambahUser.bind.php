<div class="row" id='divFormTambahUser'>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" id='txtUsername'>
    </div>
    <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" id='txtPassword'>
    </div>
    <div class="form-group">
          <label>Tipe User</label>
          <select class="form-control" id='txtTipe'>
              <option value="admin">Administrator</option>
              <option value="operator">Operator</option>
          </select>
    </div>
    <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" v-on:click='simpanAtc' id='btnSimpan'><i class='fas fa-save'></i> Simpan</a>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/formTambahUser.js"></script>