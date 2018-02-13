<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CVIAWEB</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <link href="css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <link href="css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <link href="css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/video.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
<!--  NAVIGATION  BARRE GAUCHE -->
    <nav class="navbar-default navbar-static-side" role="navigation">
      <?php include "include/nav.html"; ?>
    </nav>
<!-- END NAVIGATION BARRE GAUCHE -->
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
<!-- NAVIGATION RETRECISSANT -->
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        </nav>

      <!--  END NAVIGATION RETRECISSANT -->
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>...</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                           <h5> <i class="fa fa-camera"></i> Webcam</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <video id="videoInput" style="position:relative"></video>
                            <canvas id="canvas1" class="canvas" width=100px; height="100px" style="border: 1px solid red;position:absolute;left:15%;top:15%; display: none;" ></canvas>
                            <canvas id="canvas2" class="canvas" width=100px; height="100px" style="border: 1px solid blue;position:absolute;right:15%;top:15%; display: none;"></canvas>
                            <canvas id="canvas3" class="canvas" width=100px; height="100px" style="border: 1px solid yellow;position:absolute;right:15%;bottom:15%; display: none;"></canvas>
                            <canvas id="canvas4" class="canvas" width=100px; height="100px" style="border: 1px solid green;position:absolute;left:15%;bottom:15%; display: none;"></canvas>


                        </div>

                    </div>
                </div>

<!--  CAPTEUR 1 -->
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><i class="fa fa-dashboard"></i> Capteur 1</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form role="form">
                                <div>
                                    <label> <input type="checkbox" class="i-checks" id="i-checks" onclick="checking(this)"> Activé le capteur 1 </label>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- END CAPTEUR 1 -->

   <!-- CAPTEUR 2 -->
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><i class="fa fa-dashboard"></i> Capteur 2</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form role="form">
                                <div>
                                    <label>   <input type="checkbox" class="i-checks" id="i-checks" onclick="checking2(this)"> Activé le capteur 2</label>
                                </div>
                            </div>
                        </div>
                    </div>
      <!-- END CAPTEUR 2 -->

   <!-- CAPTEUR 3 -->
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><i class="fa fa-dashboard"></i> Capteur 3</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form role="form">
                                <div>
                                    <label>
                                        <input type="checkbox" class="i-checks" id="i-checks" onclick="checking3(this)">
                                        Activé le capteur 3
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
      <!-- END CAPTEUR 3 -->

    <!-- CAPTEUR 4 -->
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><i class="fa fa-dashboard"></i> Capteur 4</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form role="form">
                                <div>
                                    <label>
                                        <input type="checkbox" class="i-checks" id="i-checks" onclick="checking4(this)">
                                        Activé le capteur 4
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
      <!-- END CAPTEUR 4 -->
      <!-- CAPTEUR 5 -->
                  <div class="col-lg-6">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                              <h5><i class="fa fa-dashboard"></i> Capteur 5</h5>
                              <div class="ibox-tools">
                                  <a class="collapse-link">
                                      <i class="fa fa-chevron-up"></i>
                                  </a>
                                  <a class="close-link">
                                      <i class="fa fa-times"></i>
                                  </a>
                              </div>
                          </div>
                          <div class="ibox-content">
                              <form role="form">
                                  <div>
                                      <label>
                                          <input type="checkbox" class="i-checks" id="i-checks" onclick="checking4(this)">
                                          Activé le capteur 5
                                      </label>
                                  </div>
                              </div>
                          </div>
                      </div>
        <!-- END CAPTEUR 5 -->


                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script async src="opencv.js" onload="onOpenCvReady();" type="text/javascript"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="include/app/app.js"></script>
    <script src="include/app/webcam.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>

   <!-- JSKnob -->
   <script src="js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="js/plugins/nouslider/jquery.nouislider.min.js"></script>

   <!-- Switchery -->
   <script src="js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Tags Input -->
    <script src="js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Dual Listbox -->
    <script src="js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

    <script>

    // FONCTION D'ACTIVATION DES CANVAS

    // ACTIVE CANVAS 1
        function checking (check) {
            if (check.checked)
               document.getElementById("canvas1").style.display="block";

            else
               document.getElementById('canvas1').style.display="none";

        };

        // ACTIVE CANVAS 2
        function checking2 (check) {
            if (check.checked)
               document.getElementById("canvas2").style.display="block";

            else
               document.getElementById('canvas2').style.display="none";

        };

        //ACTIVE CANVAS 3
        function checking3 (check) {
            if (check.checked)
               document.getElementById("canvas3").style.display="block";

            else
               document.getElementById('canvas3').style.display="none";

        };

        //ACTIVE CANVAS 4
        function checking4 (check) {
            if (check.checked)
               document.getElementById("canvas4").style.display="block";

            else
               document.getElementById('canvas4').style.display="none";

        };

        // ACTIVE CANVAS 5
        function checking5 (check) {
            if (check.checked)
               document.getElementById("canvas5").style.display="block";

            else
               document.getElementById('canvas5').style.display="none";

        };


        // FONCTION POUR LES DROITS D'ACTIVATION DE LA WEBCAM VIA LE NAVIGATEUR
        let video = document.getElementById("videoInput");
        navigator.mediaDevices.getUserMedia({ video: true, audio: false })
            .then(function(stream) {
                video.srcObject = stream;
                video.play();
            })
            .catch(function(err) {
                console.log("An error occured! " + err);
            });

    </script>

</body>

</html>
