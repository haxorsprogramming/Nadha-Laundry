<?php
$dt = $data['dataTransaksi'];
$kodeTransaksi = $dt['kd_pembayaran'];
$kodeService = $dt['kd_kartu'];
$diskon = $dt['diskon'];
$subTotal = $dt['total_cuci'];
$total = $dt['total_final'];
$waktu = $dt['waktu'];
$waktuIndo = date('d M Y', strtotime($waktu));
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
                            1234 Main<br>
                            Apt. 4B<br>
                            Bogor Barat, Indonesia
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
                          <strong>Payment Method:</strong><br>
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
                        <tbody><tr>
                          <th data-width="40" style="width: 40px;">#</th>
                          <th>Produk</th>
                          <th class="text-center">Harga (@)</th>
                          <th class="text-center">Qt</th>
                          <th class="text-right">Total</th>
                        </tr>
                      </tbody></table>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                        <div class="section-title">Metode Pembayaran</div>
                        <p class="section-lead">Cash</p>
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
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                  <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-print"></i> Cetak</button>
                  <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Kembali</button>
                </div>
              </div>
            </div>
          </div>
        </section>
        <script src="<?= STYLEBASE; ?>/dasbor/detailTransaksi.js"></script>