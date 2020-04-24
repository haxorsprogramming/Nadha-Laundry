<?php
$dt = $data['dataTransaksi'];
$kodeTransaksi = $dt['kd_pembayaran'];
$kodeService = $dt['kd_kartu'];
$diskon = $dt['diskon'];
$subTotal = $dt['total_cuci'];
$total = $dt['total_final'];
$waktu = $dt['waktu'];
$tunai = $dt['tunai'];
$kembali = $tunai - $total;
$waktuIndo = date('d M Y', strtotime($waktu));
//cari daftar item cucian 
$this -> st -> query("SELECT * FROM tbl_temp_item_cucian WHERE kd_room='$kodeService';");
$qDaftarItem = $this -> st -> queryAll();

?>
<section class="section" id='divDetailTransaksi'>
          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Invoice</h2>
                      <div class="invoice-number">Service Id #<?=$kodeTransaksi; ?></div>
                      <span id='txtKodeService' style='display:none;'><?=$kodeService; ?></span>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Pembayaran oleh </strong><br>
                          {{namaPelanggan}}<br>
                            {{emailPelanggan}}<br>
                            {{alamatPelanggan}}<br>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Kepada </strong><br>
                          {{namaLaundry}}<br>
                        {{alamatLaundry}}<br>
                        {{kotaLaundry}}, {{kodePosLaundry}}<br>
                        {{kabupatenLaundry}}, {{provinsiLaundry}}
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Metode pembayaran</strong><br>
                            Cash<br>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Tanggal Transaksi</strong><br>
                          <?=$waktuIndo; ?><br><br>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Daftar items</div>
                    <p class="section-lead">Daftar item produk/service yang dimasukkan</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tbody>
                        <tr>
                          <th data-width="40" style="width: 40px;">#</th>
                          <th>Produk</th>
                          <th class="text-center">Harga (@)</th>
                          <th class="text-center">Qt</th>
                          <th class="text-right">Total</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach($qDaftarItem as $di):
                            $kodeItem = $di['kd_item'];
                            $qt = $di['qt'];
                            $totalTemp = $di['total'];
                            $hargaAt = $di['harga_at'];
                            //cari deks produk 
                            $this -> st -> query("SELECT nama, satuan FROM tbl_service WHERE kd_service='$kodeItem' LIMIT 0,1;");
                            $qNamaProd = $this -> st -> querySingle();
                            $namaProduk = $qNamaProd['nama'];
                            $satuan = $qNamaProd['satuan'];
                        ?>
                        <tr>
                            <td><?=$no; ?></td>
                            <td><?=$namaProduk; ?></td>
                            <td class="text-center">Rp. <?=number_format($hargaAt); ?></td>
                            <td class="text-center"><?=$qt; ?> <?=$satuan; ?></td>
                            <td class="text-right">Rp. <?=number_format($totalTemp); ?></td>
                        </tr>
                        <?php 
                        $no++; 
                        endforeach
                        ?>
                      </tbody></table>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                        <div class="section-title">Kode Promo</div>
                        <p class="section-lead">--</p>
                        <!-- <div class="images">
                          <img src="assets/img/visa.png" alt="visa">
                          <img src="assets/img/jcb.png" alt="jcb">
                          <img src="assets/img/mastercard.png" alt="mastercard">
                          <img src="assets/img/paypal.png" alt="paypal">
                        </div> -->
                      </div>
                      <div class="col-lg-4 text-right">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Subtotal</div>
                          <div class="invoice-detail-value">Rp. <?=number_format($subTotal); ?></div>
                        </div>
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Diskon <small>(Level pengguna & kode promo)</small></div>
                          <div class="invoice-detail-value">Rp. <?=number_format($diskon); ?></div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Total</div>
                          <div class="invoice-detail-value invoice-detail-value-lg">Rp. <?=number_format($total); ?></div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Tunai</div>
                          <div class="invoice-detail-value">Rp. <?=number_format($tunai); ?></div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Kembali</div>
                          <div class="invoice-detail-value">Rp. <?=number_format($kembali); ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <a class="btn btn-primary btn-icon icon-left" href='dataTransaksi/cetak/<?=$kodeTransaksi; ?>' target="new"><i class="fas fa-print"></i> Cetak</a>
                  <button class="btn btn-warning btn-icon icon-left" v-on:click='kembaliAtc'><i class="fas fa-reply"></i> Kembali</button>
                </div>
              </div>
            </div>
          </div>
        </section>
        <script src="<?= STYLEBASE; ?>/dasbor/detailTransaksi.js"></script> 