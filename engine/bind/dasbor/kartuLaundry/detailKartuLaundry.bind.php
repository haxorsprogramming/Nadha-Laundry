<?php
$detailKartu = $data['detailKartu'];
$kodeService = $detailKartu['kode_service'];
$waktuRegistrasi = $detailKartu['waktu_masuk'];
$username = $detailKartu['pelanggan'];
$statusCucian = $detailKartu['status'];

//cari nama pelanggan 
$this -> st -> query("SELECT nama_lengkap FROM tbl_pelanggan WHERE username='$username';");
$qNamaPelanggan = $this -> st -> querySingle();
$namaPelanggan = $qNamaPelanggan['nama_lengkap'];
//status cucian 
if($statusCucian == 'hold'){
    $capStatus = 'Hold (Menunggu antrian ke laundry room)';
}elseif($statusCucian === 'cuci'){
    $capStatus = 'Cuci (Sedang di laundry room)';
}else{
    $capStatus = 'Selesai (Selesai di cuci)';
}
?>
<div class="container" id='divDetailKartuLaundry'>
    <div style='margin-bottom:15px;'>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
        <div class='card card-primary' style="border-radius:3px; padding:12px;">
        <div class="card-header"><h5>Kartu laundry <?=$kodeService; ?></h5></div>
        <div style="padding-top:12px;padding-left:10px;">
        <table class="table">
            <tr>
                <td>Pelanggan</td>
                <td><?=$namaPelanggan; ?></td>
            </tr>
            <tr>
                <td>Waktu Registrasi</td>
                <td><?=$waktuRegistrasi; ?></td>
            </tr>
            <tr>
                <td>Status Cucian</td>
                <td><?=$capStatus; ?></td>
            </tr>
            <tr>
                <td>Statu Pembayaran</td>
            </tr>
            <tr>
                <td>Sudah di ambil</td>
            </tr>
        </table>
        <div style="text-align: center;padding-top:12px;">
            <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left"><i class='fas fa-receipt'></i> Bayar</a>&nbsp;&nbsp;
            <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left"><i class='fas fa-check-circle'></i> Set sudah di ambil</a>&nbsp;&nbsp;
            <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left"><i class='fas fa-tshirt'></i> Ke laundry room</a>&nbsp;&nbsp;
        </div>
        </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
        <div class='card card-primary' style="border-radius:3px; padding:12px;">
        <div class="card-header"><h5>Timeline</h5></div>
        <div class="card-body">
        <div class="activities">
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary">2 min ago</span>
                        <span class="bullet"></span>
                        <a class="text-job" href="#">View</a>
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger trigger--fire-modal-1" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div>
                        </div>
                      </div>
                      <p>Have commented on the task of "<a href="#">Responsive design</a>".</p>
                    </div>
                  </div>
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-arrows-alt"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job">1 hour ago</span>
                        <span class="bullet"></span>
                        <a class="text-job" href="#">View</a>
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger trigger--fire-modal-2" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div>
                        </div>
                      </div>
                      <p>Moved the task "<a href="#">Fix some features that are bugs in the master module</a>" from Progress to Finish.</p>
                    </div>
                  </div>
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-unlock"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job">4 hour ago</span>
                        <span class="bullet"></span>
                        <a class="text-job" href="#">View</a>
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger trigger--fire-modal-3" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div>
                        </div>
                      </div>
                      <p>Login to the system with ujang@maman.com email and location in Bogor.</p>
                    </div>
                  </div>
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job">12 hour ago</span>
                        <span class="bullet"></span>
                        <a class="text-job" href="#">View</a>
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger trigger--fire-modal-4" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div>
                        </div>
                      </div>
                      <p>Log out of the system after 6 hours using the system.</p>
                    </div>
                  </div>
                  <div class="activity">
                    <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-trash"></i>
                    </div>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job">Yesterday</span>
                        <span class="bullet"></span>
                        <a class="text-job" href="#">View</a>
                        <div class="float-right dropdown">
                          <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                          <div class="dropdown-menu">
                            <div class="dropdown-title">Options</div>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger trigger--fire-modal-5" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                          </div>
                        </div>
                      </div>
                      <p>Removing task "Delete all unwanted selectors in CSS files".</p>
                    </div>
                  </div>
                </div>
        </div>
        </div>
        </div>
    </div>
</div>