<?php 
$dataSetting = $data['dataSetting'];
?>
<div class="row" id='divFormEditPengaturan'>
    <div class="col-lg-6 col-md-6 col-12">
        <table class="table">
            <tr>
                <td>Kd Setting</td>
                <td><?=$dataSetting['kd_setting']; ?></td>
            </tr>
            <tr>
                <td>Caption</td>
                <td><?=$dataSetting['caption']; ?></td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td><input type='text' class='form-control' value="<?=$dataSetting['value']; ?>"></td>
            </tr>
        </table>
        <a href='#!' class="btn btn-primary btn-icon icon-left"><i class='fas fa-save'></i> Simpan</a>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/formEditPengaturan.js"></script>