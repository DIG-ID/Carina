(function ($) {
  window.initMap = function(){}

  function initMap($el) {
    var $markers = $el.find('.marker');

    // Hide all POIs (incl. hotels), keep your custom marker visible
    var mapStyle = [
      // remove all POIs (icons + shapes + labels)
      { featureType: "poi", elementType: "all", stylers: [{ visibility: "off" }] },
      // (optional) also remove transit icons
      { featureType: "poi.business", elementType: "all", stylers: [{ visibility: "off" }] },

      // keep your earlier tweaks
      { featureType: "administrative.land_parcel", elementType: "labels", stylers: [{ visibility: "off" }] },
      { featureType: "road.local", elementType: "labels", stylers: [{ visibility: "on" }] }
    ];

    var mapArgs = {
      zoom: getResponsiveZoom($el),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      fullscreenControl: false,
      streetViewControl: false,
      mapTypeControl: false,
      zoomControl: true,
      scrollwheel: false,
      styles: mapStyle,
      // make Google’s default POIs unclickable (belt & suspenders)
      clickableIcons: false
    };

    var map = new google.maps.Map($el[0], mapArgs);

    map.markers = [];
    $markers.each(function () {
      initMarker($(this), map);
    });

    centerMap(map);
    return map;
  }

  function initMarker($marker, map) {
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = { lat: parseFloat(lat), lng: parseFloat(lng) };

    // Optional: use a custom hotel icon so it's clear which pin is yours
    var marker = new google.maps.Marker({
      position: latLng,
      map: map,
      // icon: { url: '/path/to/carina-pin.png', scaledSize: new google.maps.Size(32, 32) }
    });

    map.markers.push(marker);

    if ($marker.html()) {
      var infowindow = new google.maps.InfoWindow({ content: $marker.html() });
      google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);
      });
    }
  }

  function isMobile() {
    return window.matchMedia('(max-width: 1280px)').matches;
  }
  function getResponsiveZoom($el) {
    var zDesktop = parseInt($el.data('zoom') || 16, 10);
    var zMobile  = parseInt($el.data('zoom-mobile') || (zDesktop - 2), 10);
    return isMobile() ? zMobile : zDesktop;
  }

  function shouldOffset() {
    return window.matchMedia('(min-width: 1280px)').matches;
  }

  //offset map marker
  function setOffsetCenter(map, latLng, offsetX, offsetY) {
    // offsetX/offsetY in pixels
    var scale = Math.pow(2, map.getZoom());
    var proj = map.getProjection();
    if (!proj) {
      google.maps.event.addListenerOnce(map, 'projection_changed', function(){
        setOffsetCenter(map, latLng, offsetX, offsetY);
      });
      return;
    }
    var worldPoint = proj.fromLatLngToPoint(latLng);
    var newPoint = new google.maps.Point(
      worldPoint.x - (offsetX / scale),
      worldPoint.y + (offsetY / scale)
    );
    map.setCenter(proj.fromPointToLatLng(newPoint));
  }

  function centerMap(map) {
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function (marker) {
      bounds.extend({ lat: marker.position.lat(), lng: marker.position.lng() });
    });

    if (map.markers.length === 1) {
      var c = bounds.getCenter();
      map.setCenter(c);
      if (shouldOffset()) {
        // Example: shift 180px right, 0px down on desktop/tablet
        setOffsetCenter(map, c, 270, 60);
      }
      else{
        setOffsetCenter(map, c, 130, 20);
      }
    } else {
      // MULTI MARKER branch
      map.fitBounds(bounds);
      google.maps.event.addListenerOnce(map, 'idle', function () {
        if (shouldOffset()) map.panBy(270, 60);
      });
    }
  }

  $(document).on('ready', () => {
    $('.acf-map').each(function () {
      initMap($(this));
    });
  });

})(jQuery);
