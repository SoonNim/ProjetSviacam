<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CVIAWEB</title>

    <!-- Bootstrap structure CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top " role="navigation">
<!-- AFFICHE LA BARRE DE NAVIGATION EN HAUT DE PAGE  -->
<?php include "include/index/navINDEX.html"; ?>

        </nav>
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
<!-- AFFICHAGE DU CAROUSEL D'INFORMATIONS -->
  <?php include "include/index/home.html"; ?>

</div>


<section id="features" class="container services">
    <div class="row">
<!--   LIGNE D'INFORMATIONS EN DESSOUS DU CAROUSEL-->
<?php include "include/index/exp.html"; ?>

    </div>
</section>

<section  class="container features">
  <!--  AFFICHE LES INFORMATIONS SUR LE PROJET -->
  <?php include "include/index/features.html"; ?>


</section>


<section id="testimonials" class="navy-section testimonials" style="margin-top: 0">

    <div class="container">
      <!-- AFFICHE L'ESPACE "START"  -->
      <?php include "include/index/started.html"; ?>

    </div>

</section>

<section id="contact" class="gray-section contact">
    <div class="row">
      <!--  AFFICHE LE PIED DE PAGE -->
      <?php include "include/index/footerINDEX.html"; ?>

    </div>
</section>

<!-- Mainly scripts -->

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/wow/wow.min.js"></script>
<script src="include/index/index.js"></script>

</body>
</html>
