<div style='margin-bottom:15px;'>
    <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left'><i class="fas fa-plus-circle"></i> Tambah Promo</a>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-12"  id='divPromo'>
    <table id='tblPromo' class="table">
        <thead>
            <tr>
            <td>Kd Promo</td><td>Deks</td><td>Digunakan</td><td>Status</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for='dp in dataPromo'>
                <td>{{dp.kdPromo}}</td>
                <td>{{dp.deks}}</td>
                <td>{{dp.diskon}}</td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-12">
</div>
<script src="<?=STYLEBASE; ?>/dasbor/promo.js"></script>