<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <title>Nadha Laundry - Dashboard</title>
   <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
   <!-- General CSS Files -->
   <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/iziToast.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/jqvmap.min.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/summernote-bs4.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/wl.theme.default.min.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/datatables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/fakeLoader.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/style.css">
  <link rel="stylesheet" href="<?=STYLEBASE; ?>/dasbor/stisla/css/components.css">
  <script src="https://www.gstatic.com/charts/loader.js"></script>

 </head>

 <body style="font-family: 'Nunito Sans';">
 <div class="fakeLoader"></div>
   <div id="app">
     <div class="main-wrapper">
       <div class="navbar-bg"  style='background-color:#0ab59e;'></div>
       <nav class="navbar navbar-expand-lg main-navbar">
         <form class="form-inline mr-auto">
           <ul class="navbar-nav mr-3">
             <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

           </ul>

         </form>
         <ul class="navbar-nav navbar-right">

           <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
             <img alt="image" src="<?=STYLEBASE; ?>/dasbor/img/avatar-1.png" class="rounded-circle mr-1">
             <div class="d-sm-none d-lg-inline-block">Hi, <?=$_SESSION['userSes']; ?></div></a>
             <div class="dropdown-menu dropdown-menu-right">
               <a href="<?= HOMEBASE; ?>dasbor/logOut" id='btnLogOutTop' class="dropdown-item has-icon text-danger">
                 <i class="fas fa-sign-out-alt"></i> Logout
               </a>
             </div>
           </li>
         </ul>
       </nav>
       <div class="main-sidebar" id='divMenu'>
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="#!" style='height:30px;'>
              <img src='<?=STYLEBASE; ?>/dasbor/img/nadha_laundry.jpg' style="width: 100px;">
              </a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="#!">NL</a>
            </div>
            <?php
            $this -> bind('dasbor/menuAdmin');
            ?>
          </aside>
       </div>

       <!-- Main Content -->
       <div class="main-content">
         <section class="section">
           <div class="section-header">
             <h1 id='capUtama'> Nadha Laundry - {{judulForm}}</h1>

           </div>
           
         <div id="divUtama">

       </div>
     </section>

     </div>
   </div>
 <footer class="main-footer" id='divFooter'>

           Copyright &copy; {{tahun}} - {{author}}

</footer>
   <!-- General JS Scripts -->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/popper.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/bootstrap.min.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/jquery.nicescroll.min.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/moment.min.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/stisla.js"></script>

   <!-- JS Libraies -->

   <!-- <script src="https://demo.getstisla.com/asset/modules/jquery.simpleWeather.min.js"></script> -->
   <!-- <script src="https://demo.getstisla.com/asset/modules/Chart.min.js"></script> -->
   <!-- <script src="https://demo.getstisla.com/asset/modules/jquery.vmap.min.js"></script> -->
   <!-- <script src="https://demo.getstisla.com/asset/maps/jquery.vmap.world.js"></script> -->
   <!-- <script src="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.js"></script> -->
   <!-- <script src="https://demo.getstisla.com/asset/modules/jquery.chocolat.min.js"></script> -->
     <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/datatables.min.js"></script>
     <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/iziToast.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js'></script>
   <!-- Template JS File -->
   <script src="<?=STYLEBASE; ?>/dasbor/stisla/js/scripts.js"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/modalJs/animatedModal.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   <script src="<?=STYLEBASE; ?>/dasbor/fakeLoader.min.js"></script>
   <!-- Page Specific JS File -->

   <script src="<?=STYLEBASE; ?>/dasbor/index.js"></script>
 </body>
 </html>
