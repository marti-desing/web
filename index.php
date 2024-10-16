<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>| Sistema de Gestión Turística</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- Custom Theme files -->
  <script src="js/jquery-1.12.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!--animate-->
  <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
  <script src="js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <!--//end-animate-->
</head>

<body>
  <?php include('includes/header.php'); ?>
  <div class="banner">
    <div class="container">
      <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"></h1> <!--inicio-->
    </div>
  </div>







  <!---holiday---->
  <div class="container">
    <div class="holiday">





      <h3>Lista de paquetes</h3>


      <?php $sql = "SELECT * from tbltourpackages order by rand() limit 4";
      $query = $dbh->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      $cnt = 1;
      if ($query->rowCount() > 0) {
        foreach ($results as $result) {  ?>
          <div class="rom-btm">
            <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
              <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">
            </div>
            <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
              <h4> <?php echo htmlentities($result->PackageName); ?></h4>
              <h6>Tipo de paquete : <?php echo htmlentities($result->PackageType); ?></h6>
              <p><b>Ubicación del paquete :</b> <?php echo htmlentities($result->PackageLocation); ?></p>
              <p><b>Características</b> <?php echo htmlentities($result->PackageFetures); ?></p>
            </div>
            <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
              <h5>Telefono <a href="http://wa.me/591<?php echo htmlentities($result->PackagePhone); ?>"><?php echo htmlentities($result->PackagePhone); ?></a></h5>
              <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>" class="view">Detalles</a>
            </div>
            <div class="clearfix"></div>
          </div>

      <?php }
      } ?>


      <div><a href="package-list.php" class="view">Ver más paquetes</a></div>
    </div>
    <div class="clearfix"></div>
  </div>




  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <style type="text/css">
    /* 
 * Always set the map height explicitly to define the size of the div element
 * that contains the map. 
 */
    #map {
      height: 100%;
    }

    /* 
 * Optional: Makes the sample page fill the window. 
 */
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
  <script type="text/javascript">
    // The following example creates five accessible and
    // focusable markers.
    function initMap() {
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: {
          lat: -18.483706879614374,
          lng: -64.1106600466317
        },
      });
      // Set LatLng and title text for the markers. The first marker (Boynton Pass)
      // receives the initial focus when tab is pressed. Use arrow keys to
      // move between markers; press tab again to cycle through the map controls.
      const tourStops = [
        [{
          lat: -18.489889860483284,
          lng: -64.10786687552685
        }, "Centro Informativo CHE"],
        [{
          lat: -18.49463687631165,
          lng: -64.10777463923657
        }, "Lavanderia del Che"],
        [{
          lat: -18.4824885923293,
          lng: -64.09666861665076
        }, "Museo Che Guevara"],
        [{
          lat: -18.481489557876767,
          lng: -64.09717854804771
        }, "Fosa de los Guerrilleros"],
        [{
          lat: -18.79476247856725,
          lng: -64.20151410571114
        }, "La Higuera"],
        [{
          lat: -18.493946933088132,
          lng: -64.11073086436208
        }, "El Mirador"],
        [{
          lat: -18.669827,
          lng: -64.127408
        }, "Boina del Che"],
        [{
          lat: -18.577608,
          lng: -64.086391
        }, "Ruinas de Pucarillo"],
        [{
          lat: -18.609291,
          lng: -64.083520
        }, "Virgen de la Purisima"],
        [{
          lat: -18.603882,
          lng: -64.083341
        }, "Padre Eterno"],
        [{
          lat: -18.614858,
          lng: -64.079807
        }, "Cruz Latina"],
        [{
          lat: -18.756801,
          lng: -64.077501
        }, "Cueva de los Incas"],
        [{
          lat: -18.614003,
          lng: -64.080579
        }, "Cueva del Dablo"],
      ];
      // Create an info window to share between markers.
      const infoWindow = new google.maps.InfoWindow();

      // Create the markers.
      tourStops.forEach(([position, title], i) => {
        const marker = new google.maps.Marker({
          position,
          map,
          title: `${i + 1}. ${title}`,
          label: `${i + 1}`,
          optimized: false,
        });

        // Add a click listener for each marker, and set up the info window.
        marker.addListener("click", () => {
          infoWindow.close();
          infoWindow.setContent(marker.getTitle());
          infoWindow.open(marker.getMap(), marker);
        });
      });
    }

    window.initMap = initMap;
  </script>
  <div id="map"></div>

  <!-- 
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises.
      See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
      for more information.
      -->
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBT2hYHLcDBEOfowTZj2D_BidCfQKgmFYg&callback=initMap&v=weekly"
    defer></script>




  <!--- routes ---->
  <!--<div class="routes">
	<div class="container">
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="glyphicon glyphicon-list-alt"></i></a>
			</div>
			<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
				<h3>0</h3>
				<p>Consultas</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left">
			<div class="rou-left">
				<a href="#"><i class="fa fa-user"></i></a>
			</div>
			<div class="rou-rgt">
				<h3>0</h3>
				<p>Usuarios registrados</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="fa fa-ticket"></i></a>
			</div>
			<div class="rou-rgt">
				<h3>0</h3>
				<p>Reserva</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>-->

  <?php include('includes/footer.php'); ?>
  <!-- signup -->
  <?php include('includes/signup.php'); ?>
  <!-- //signu -->
  <!-- signin -->
  <?php include('includes/signin.php'); ?>
  <!-- //signin -->
  <!-- write us -->
  <?php include('includes/write-us.php'); ?>
  <!-- //write us -->
</body>

</html>