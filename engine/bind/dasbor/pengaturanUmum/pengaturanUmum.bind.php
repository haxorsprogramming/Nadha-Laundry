<div class="row" style="padding-left:15px;padding-right:15px;" id='divPengaturanUmum'>

    <table id='tblPengaturanUmum' class='table table-hover'>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Caption</th>
                <th>Nilai</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for='lp in listPengeluaran'>
                <td>{{lp.kdSetting}}</td>
                <td>{{lp.caption}}</td>
                <td>{{lp.value}}</td>
                <td><a href='#!' class="btn btn-sm btn-primary" v-on:click='editAtc(lp.kdSetting)'><i class='far fa-edit'></i> Edit</a></td>
            </tr>
        </tbody>
    </table>

</div>
<script src="<?=STYLEBASE; ?>/dasbor/pengaturanUmum.js"></script>