function initMap() {
  var map = document.getElementById('map');
  if (map) {
    var myLatLng = {lat: 44.21721, lng: 3.3234957};
    map = new google.maps.Map(map, {
      center: myLatLng,
      zoom: 12
    });

    var infoContent = '<div>'+
    '<h3>Le Gîte de la Doline</h3>'+
    '<p>Hures-la-Parade</p>'+
    '</div>';

    var infowindow = new google.maps.InfoWindow({
      content: infoContent
    });

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: 'https://gitedeladoline.com/wp-content/themes/wordpress-underscore-one-page/img/icons/ne_barn-2.png'
    });

    marker.addListener('mouseover', function() {
      infowindow.open(map, this);
    });

    marker.addListener('mouseout', function() {
      infowindow.close();
    });
  }
}
