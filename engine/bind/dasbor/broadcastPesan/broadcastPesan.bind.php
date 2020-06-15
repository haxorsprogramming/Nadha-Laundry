<?php
$qBroadcastData = $this -> state('broadcastPesanData') -> getBroadcastData();
?>
<div id='divBroadcastPesan'>
    <div style='margin-bottom:25px;'>
        <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click='tambahBroadcastAtc'> 
            <i class="fas fa-plus-circle"></i> Tambah Broadcast Pesan
        </a>
    </div>
    <div id='divFormTambahBroadcast' class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" id='txtJudul' placeholder="Judul Pesan (mis. Promosi Terbaru)">
            </div>
            <div class="form-group">
                <label>Isi</label>
                <textarea class="form-control" id='txtIsi' placeholder="Isi pesan"></textarea>
                <ul>
                    <li>Masukkan regex {pelanggan} untuk memasukkan nama pelanggan</li>
                    <li>Cth : "Assalamualaikum {pelanggan}, NadhaLaundry lagi ada promo untuk idul fitri loh, masukkan kode promo xxx" </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label>Proses broadcast</label>
                <select class="form-control" id='txtProses'>
                    <option value="langsung">Langsung</option>
                    <option value="terjadwal">Terjadwal</option>
                </select>
            </div>
            <div class="form-group" id='formWaktuProses'>
                <label>Waktu proses</label>
                <input type="date" id='txtWaktuProses' class="form-control">
            </div>
            <div class="form-group">
                <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click='prosesBroadcast'><i class='fas fa-check-circle'></i> Proses</a>&nbsp; &nbsp;
                <a href='#!' class="btn btn-warning btn-icon icon-left"><i class='fas fa-reply'></i> Kembali</a>
            </div>
        </div>
    </div>
    <div id='divTabelBroadcast'>
        <table id='tblBroadcast' class='table table-hover'>
            <thead>
                <tr>
                    <th>Id Broadcast</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Sistem</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($qBroadcastData as $qb) : ?>
                <tr>
                    <td><?=$qb['id_pesan']; ?></td>
                    <td><?=$qb['judul']; ?></td>
                    <td><?=$qb['isi']; ?></td>
                    <td><?=$qb['sistem']; ?></td>
                    <td><?=$qb['waktu']; ?></td>
                    <td><?=$qb['status']; ?></td>
                    <td><a href='#!' class="btn btn-primary btn-sm btn-icon icon-left"><i class='fas fa-trash-alt'></i> Hapus</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id='divStatusBroadcast'>
        <h5>Sedang mengirimkan pesan broadcast, tunggu hingga proses selesai</h5>
    </div>
</div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/broadcastPesan.js"></script>