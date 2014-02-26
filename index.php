<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="leaflet/leaflet.css" />
    <link rel="stylesheet" href="css/MarkerCluster.Default.css">
    <link rel="stylesheet" href="css/MarkerCluster.css">
    <script src="js/vendor/modernizr.js"></script>
	<script type="text/javascript">
	<?php
	include('myitems.php');
	?>
	</script>
    <script src="leaflet/leaflet.js"></script>
    <script src="js/leaflet-providers.js"></script>
    <script src="js/leaflet.markercluster-src.js"></script>
  </head>
  <body>
    
    <div class="row" style="height:100vh;">
      <div class="large-12 columns" id="map">
      </div>
    </div>
    <div id="myModal" class="reveal-modal" data-reveal>
      <h2>Success!</h2>
      <p>Your submission has been recorded and saved.</p>
	  <p><a href="#" onclick="location.reload();">Refresh map</a></p>
      <a class="close-reveal-modal">&#215;</a>
    </div>
    <!-- Map time -->
    <script type="text/javascript">
      var map = new L.Map('map').setView([45.56671, -94.19369],14);

      // Define the different layers and default layer
      var defaultLayer = L.tileLayer('http://{s}.tiles.mapbox.com/v3/nps.map-lj6szvbq/{z}/{x}/{y}.png', {maxZoom:18}).addTo(map);

      var baseLayers = {
            'Default Mapbox': L.tileLayer('http://{s}.tiles.mapbox.com/v3/nps.map-lj6szvbq/{z}/{x}/{y}.png'),
            'MapQuest Aerial': L.tileLayer.provider('MapQuestOpen.Aerial'),
            'MapQuest OSM': L.tileLayer.provider('MapQuestOpen.OSM'),
            // 'Stamen Watercolor': L.tileLayer.provider('Stamen.Watercolor')
          };

      var overlayLayers = {
            'OpenWeatherMap PressureContour': L.tileLayer.provider('OpenWeatherMap.PressureContour'),
            'OpenWeatherMap Wind': L.tileLayer.provider('OpenWeatherMap.Wind'),
            'OpenWeatherMap Temperature': L.tileLayer.provider('OpenWeatherMap.Temperature'),
            'OpenWeatherMap Snow': L.tileLayer.provider('OpenWeatherMap.Snow')
          };

      var layerControl = new L.control.layers(baseLayers, overlayLayers, {collapsed: true, position:'topleft'}).addTo(map);
      
      var popup = L.popup();

      function onMapClick(e) {

          var form = '<form class="row" id="inputform" enctype="multipart/form-data" class="well">'+
                  '<label><strong>Name:</strong> <i>marker title</i></label>'+
                  '<input type="text" class="small-3 columns" placeholder="Required" id="name" name="name" />'+
                  '<label><strong>Email:</strong> <i>never shared</i></label>'+
                  '<input type="text" class="small-3 columns" placeholder="Required" id="email" name="email" />'+
                  '<label><strong>Description:</strong></label>'+
                  '<input type="text" class="small-3 columns" placeholder="Optional" id="description" name="description" />'+
                  '<input style="display: none;" type="text" id="lat" name="lat" value="'+ e.latlng.lat.toFixed(6)+'" />'+
                  '<input style="display: none;" type="text" id="lng" name="lng" value="'+ e.latlng.lng.toFixed(6)+'" /><br><br>'+
                  '<div class="row">'+
                    '<div class="small-6 small-push-2 columns center"><button type="button" class="btn tiny round" onclick="insertUser()">Submit</button></div>'+
                  '</div>'+
                  '</form>';

        popup
          .setLatLng(e.latlng)
          .setContent(form)
          .openOn(map);

        var marker = new L.marker(e.latlng).addTo(map);

      }

      
      map.on('contextmenu', onMapClick);


      // start pulling in markers from json

      var markers = L.markerClusterGroup();

      var markerList = [];

      for (var i = 0; i < myItems.length; i++) {
        var a = myItems[i];
        var name = a[2]
        var description = a[3];
        var marker = L.marker(L.latLng(a[0], a[1]), { description: description });
        marker.bindPopup(
          "Submitter: "+name+
          "<br>"+
          "Description: "+description);
        markerList.push(marker);
      }

      markers.addLayers(markerList);
      map.addLayer(markers);

      // Form submission

      function insertUser() {
        $("#loading-mask").show();
        $("#loading").show();
        var name = $("#name").val();
        var email = $("#email").val();
        var description = $("#description").val();
        var lat = $("#lat").val();
        var lng = $("#lng").val();
        if (name.length == 0) {
          alert("Name is required!");
          return false;
        }
        if (email.length == 0) {
          alert("Email is required!");
          return false;
        }
        var dataString = 'name='+ name + '&email=' + email + '&description=' + description + '&lat=' + lat + '&lng=' + lng;
        //console.log(dataString);
        $.ajax({
          type: "POST",
          url: "insert.php",
          data: dataString,
          success: function() {
            $('#myModal').foundation('reveal', 'open');
          }
        });
        return false;

      }
    </script>
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.reveal.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
