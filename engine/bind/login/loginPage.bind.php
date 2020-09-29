<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" , shrink-to-fit="no">
    <title></title>
    <!-- base:css -->
    <link rel="stylesheet" href="<?=STYLEBASE; ?>/login/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=STYLEBASE; ?>/login/vendors/base/vendor.bundle.base.css">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@700&family=Nunito:wght@600&display=swap" rel="stylesheet">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="ladun/login/css/style.css">
    <!-- endinject -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://asset.justhasnah.my.id/cdn/izi_toast/iziToast.min.css">
</head>

<body style="font-family: 'Nunito', sans-serif;">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5" id='login-app'>
                                <div class="brand-logo" style='text-align:center;'>
                                    <img src="<?=STYLEBASE; ?>/login/images/nadha_laundry.jpg" alt="logo"
                                        style='width:200px; '>
                                    <h4 style="font-weight:bold;">Aplikasi Manajemen Laundry</h4>
                                </div>
                                <div style='text-align:center;'>
                                    <h6 class="font-weight-light">Harap masuk untuk melanjutkan.</h6>
                                    <div>
                                        <div class="pt-3">
                                            <div class="form-group">
                                                <input v-model='userInput' type='text' class='form-control'
                                                    id='txtUsername' placeholder='Username'>
                                            </div>
                                            <div class="form-group">
                                                <input v-model='passwordInput' class="form-control" type='password'
                                                    id="txtPassword" placeholder="Password">
                                            </div>
                                            <div id='capNotifLogin'>

                                            </div>
                                            <div class="mt-3">
                                                <a id='btnMasuk' v-on:click='klikSaya'
                                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                                    href="#!">Masuk</a>
                                            </div>
                                            <div class="mt-2">
                                                <div style='padding-top:12px;'>
                                                    <h5 class="font-weight-light">2020 &copy; <a href='http://haxors.or.id'
                                                            target='new'>{{developer}}</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id='divWorker'></div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->
            <!-- base:js -->
            <script src="<?=STYLEBASE; ?>/login/js/login.js"></script>
            <script src="<?=STYLEBASE; ?>/login/js/page/auth-workers.js"></script>
            <script src="<?=STYLEBASE; ?>/login/vendors/base/vendor.bundle.base.js"></script>
            <script src="http://asset.justhasnah.my.id/cdn/izi_toast/iziToast.min.js"></script>
            <!-- endinject -->
            <!-- inject:js -->
            <script src="<?=STYLEBASE; ?>/login/js/template.js"></script>

            <!-- endinject -->
</body>

</html>