<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$site_path = "http://" .$_SERVER["SERVER_NAME"].'/pvlf2023';
$root_path = $_SERVER["DOCUMENT_ROOT"].'/pvlf2023';
include_once($root_path.'/php/config/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Basic Page Needs ================================================== -->
   <meta charset="utf-8">
   
   <meta name="robots" content="noindex, follow">

   <meta name="site-url" content="<?= $site_path ?>">

   <!-- Mobile Specific Metas ================================================== -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <meta name="description" content="PVLF will include the first of its kind PVLF PVLF Pragatie Vichaar Literature Festival 2023!">
   <title>PVLF Pragatie Vichaar Literature Festival 2023| Pragatie</title>
   
   <link rel="shortcut icon" href="<?= $site_path ?>/images/fav.png.png">

      <!-- CSS
         ================================================== -->
   <!-- Bootstrap -->
   <link rel="stylesheet" href="<?= $site_path ?>/css/bootstrap.min.css">

   <!-- FontAwesome -->
   <link rel="stylesheet" href="<?= $site_path ?>/css/font-awesome.min.css">
   <!-- Animation -->
   <link rel="stylesheet" href="<?= $site_path ?>/css/animate.css">
   <!-- magnific -->
   <link rel="stylesheet" href="<?= $site_path ?>/css/magnific-popup.css">
   <!-- carousel -->
   <link rel="stylesheet" href="<?= $site_path ?>/css/owl.carousel.min.css">

   <!-- isotop -->
   <link rel="stylesheet" href="<?= $site_path ?>/css/isotop.css">
   <!-- ico fonts -->
   <link rel="stylesheet" href="<?= $site_path ?>/css/xsIcon.css">
   <!-- Template styles-->
   <link rel="stylesheet" href="<?= $site_path ?>/css/style.css">
   <!-- Responsive styles-->
   <link rel="stylesheet" href="<?= $site_path ?>/css/responsive.css">

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      
      <!-- Meta Pixel Code -->
    <!--    <script>-->
    <!--      !function(f,b,e,v,n,t,s)-->
    <!--      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?-->
    <!--      n.callMethod.apply(n,arguments):n.queue.push(arguments)};-->
    <!--      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';-->
    <!--      n.queue=[];t=b.createElement(e);t.async=!0;-->
    <!--      t.src=v;s=b.getElementsByTagName(e)[0];-->
    <!--      s.parentNode.insertBefore(t,s)}(window, document,'script',-->
    <!--      'https://connect.facebook.net/en_US/fbevents.js');-->
    <!--      fbq('init', '430536715256596');-->
    <!--      fbq('track', 'PageView');-->
    <!--    </script>-->
    <!--    <noscript><img height="1" width="1" style="display:none"-->
    <!--      src="https://www.facebook.com/tr?id=430536715256596&ev=PageView&noscript=1"-->
    <!--    /></noscript>-->
    <!-- End Meta Pixel Code -->

    <!-- Google Tag Manager -->
    <!--    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':-->
    <!--    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],-->
    <!--    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=-->
    <!--    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);-->
    <!--    })(window,document,'script','dataLayer','GTM-M7KW97F');</script>-->
    <!-- End Google Tag Manager -->
    
    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MMW66GV');</script> -->
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K8RGTZF');</script>
<!-- End Google Tag Manager -->
    
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
        <!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M7KW97F"-->
        <!--height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
    <!-- End Google Tag Manager (noscript) -->
    
    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMW66GV"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8RGTZF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
   <div class="body-inner">
      <!-- Header start -->
      	<header id="header" class="header header-transparent">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
               <!-- logo-->
               <a class="navbar-brand" href="<?= $site_path ?>">
                  <img src="<?= $site_path ?>/images/logo-yellow.png" alt="">
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item"><a href="<?= $site_path ?>">Home</a></li>
                     <li class="nav-item"><a href="<?= $site_path ?>/about-us">About </li>
                     <li class="nav-item"><a href="<?= $site_path ?>/speakers">Speakers </li>
                     <li class="nav-item dropdown">
                        <a href="" class="" data-toggle="dropdown">Awards <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                        <li class="#"><a href="<?= $site_path ?>/awards">About</a></li>
                        <li class="#"><a href="<?= $site_path ?>/author-excellence-awards">PVLF Author Excellence Awards</a></li>
                        <li class="#"><a href="#">PVLF People's Choice Publisher Awards</a></li>
                        <li class="#"><a href="<?= $site_path ?>/reader-choice-book-awards">PVLF Readers' Choice Book Awards</a></li>
                        </ul>
                     </li>
                     <li class="nav-item"><a href="<?= $site_path ?>/jury">Our Jury</a></li>
                     <!--<li class="nav-item"><a href="#">Sponsors</a></li>-->
                     <!-- <li class="nav-item"><a href="query-form.php">Query Form</a></li> -->
                     <li class="nav-item"><a href="#">Schedule</a></li>
                     <li class="nav-item"><a href="https://www.frontlist.in/public/pvlf/" target="_blank">PVLF 2022</a></li>                                                   
                  </ul>
               </div>
            </nav>
			</div><!-- container end-->
		</header>
      <!--/ Header end -->