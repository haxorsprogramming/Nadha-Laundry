<?php 
$dataSetting = $data['dataSetting'];
?>
<div class="row" id='divFormEditPengaturan'>
    <div class="col-lg-6 col-md-6 col-12">
        <table class="table">
            <tr>
                <td>Kd Setting</td>
                <td><span id='txtKdSetting'><?=$dataSetting['kd_setting']; ?></span></td>
            </tr>
            <tr>
                <td>Caption</td>
                <td><span id='txtCaption'><?=$dataSetting['caption']; ?></span></td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td><input type='text' id='txtValue' class='form-control' value="<?=$dataSetting['value']; ?>"></td>
            </tr>
        </table>
        <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click='simpanAtc'><i class='fas fa-save'></i> Simpan</a>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/formEditPengaturan.js"></script>