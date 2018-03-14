<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Yamadori Maps | Add Location</title>
	<?php require('meta.php'); ?>
	<link rel="stylesheet" href="css/style.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="height:100%">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Home</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="yamadorimap.php">Connect 4</a></li>
					<li><a href="/addmarks.php">Speed Math!</a></li>
				</ul>
				<div class="form-group navbar-form navbar-right" type="text" id="log">
  <div type="text" id="logform">
    <form action="./logout.php" method="post">
      <input type="submit" id="logout_submit" class="btn btn-default" value="logout">
		</form>
	</div>
</div>

			</div>
		</div>
	</nav>
      
<h3 style="text-align:center">Yamadori Map</h3>
<div id="map"></div>
<div id="form">
      <table>
      <tr><td>Name:</td> <td><input type='text' id='name'/> </td> </tr>
      <tr><td>Address:</td> <td><input type='text' id='address'/> </td> </tr>
      <tr><td>Phone:</td> <td><input type='text' id='phone'/> </td> </tr>
        <!-- todo add informaton about plant varieties found -->


      <tr><td>Public/Private:</td> <td><select id='type'> +
                 <option value='private' SELECTED>Private</option>
                 <option value='public'>Public</option>
                 </select> </td></tr>
                 <tr><td></td><td><input type='button' value='Save' onclick='saveData()'/></td></tr>
      </table>
</div>
<div id="message">Location saved</div>

    <script>
      var map;
      var marker;
      var infowindow;
      var messagewindow;

      function initMap() {
        var USA = {lat: 37.641922, lng: -98.577179};
        map = new google.maps.Map(document.getElementById('map'), {
          center: USA,
          zoom: 3
        });

        infowindow = new google.maps.InfoWindow({
          content: document.getElementById('form')
        });

        messagewindow = new google.maps.InfoWindow({
          content: document.getElementById('message')
        });

        google.maps.event.addListener(map, 'click', function(event) {
          marker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });


          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });
        });
      }

      function saveData() {
        var name = escape(document.getElementById('name').value);
        var address = escape(document.getElementById('address').value);
        var phone = escape(document.getElementById('phone').value);
        // todo add informaton about plant varieties found
        var type = document.getElementById('type').value;
        var latlng = marker.getPosition();
        var url = './includes/addmarker.php?name=' + name + '&address=' + address + '&phone=' + phone +
                  '&type=' + type + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

        downloadUrl(url, function(data, responseCode) {

          if (responseCode == 200 && data.length <= 1) {
            infowindow.close();
            messagewindow.open(map, marker);
          }
        });
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request.responseText, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing () {
      }

    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRMJYHo39F3atRvKunkZ5nBoNnJwLp3Nw&callback=initMap">
    </script>
      



	<div class="container">
		<div class="navbar-fixed-bottom navbar-default">
			<?php include('copyright.php'); ?>
		</div>
	</div>
</body>

</html>
