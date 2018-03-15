
<h3 style="text-align:center">Yamadori Map</h3>
<p style="text-align:center">click <a href="./addmarks.php">here</a> to add a location.
<div id="map"></div>

      <script>

      var customLabel = {
        private: {
          label: 'PR'
        },
        public: {
          label: 'PB'
        }
      };

function initMap() {
var map = new google.maps.Map(document.getElementById('map'), {
  center: new google.maps.LatLng(37.641922, -98.577179 ),
  zoom: 3
});
var infoWindow = new google.maps.InfoWindow;

  // todo add informaton about plant varieties found
  downloadUrl('./includes/enummapmarkers.php', function(data) {
    var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName('marker');
    Array.prototype.forEach.call(markers, function(markerElem) {
      var id = markerElem.getAttribute('id');
      var type = markerElem.getAttribute('type');
      if(type == "private") {
        name = "Private";
        address = "Private";
        phone = "Private";
        species = "Private";
      } else if(type != "private" || type == "public") {
        var name = markerElem.getAttribute('name');
        var address = markerElem.getAttribute('address');
        var phone = markerElem.getAttribute('phone');
        var species = markerElem.getAttribute('species');
      }
      var point = new google.maps.LatLng(
          parseFloat(markerElem.getAttribute('lat')),
          parseFloat(markerElem.getAttribute('lng')));

      var infowincontent = document.createElement('div');
      var strong = document.createElement('strong');
      strong.textContent = name
      infowincontent.appendChild(strong);
      infowincontent.appendChild(document.createElement('br'));

      var text = document.createElement('text');
      text.textContent = address
      infowincontent.appendChild(text);
      infowincontent.appendChild(document.createElement('br'));

      var text = document.createElement('text');
      text.textContent = phone
      infowincontent.appendChild(text);
      infowincontent.appendChild(document.createElement('br'));

      var text = document.createElement('text');
      text.textContent = species
      infowincontent.appendChild(text);
      var icon = customLabel[type] || {};
      var marker = new google.maps.Marker({
        map: map,
        position: point,
        label: icon.label
      });
      marker.addListener('click', function() {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
      });
    });
  });
}



function downloadUrl(url, callback) {
var request = window.ActiveXObject ?
    new ActiveXObject('Microsoft.XMLHTTP') :
    new XMLHttpRequest;

request.onreadystatechange = function() {
  if (request.readyState == 4) {
    request.onreadystatechange = doNothing;
    callback(request, request.status);
  }
};

request.open('GET', url, true);
request.send(null);
}

function doNothing() {}
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRMJYHo39F3atRvKunkZ5nBoNnJwLp3Nw&callback=initMap">
    </script>
