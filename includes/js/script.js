/***************  MAPAS  ********************/
jQuery(document).ready(function () {
    var mapa = document.getElementById('map');
    if (mapa){
    var map;
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var centerPosition = new google.maps.LatLng(19.3301036,-99.0651531); 


    var style = [

  
/*
    {
        "featureType": "road.arterial",
            "stylers": [{
            "visibility": "on"
        }, {
            "color": "#fee379"
        }]
    }, 

    {
        "featureType": "road.highway",
            "stylers": [{
                "color": "#fee379"
            "visibility": "on"
        }, {
            "color": "#fee379"
        }]
    }, 
*/
    {
        "featureType": "landscape",
            "stylers": [{
            "visibility": "on"
        }, {
            "color": "#f3f4f4"
        }]
    }, 


    {
        "featureType": "water",
            "stylers": [{
            "visibility": "on"
        }, {
            "color": "#7fc8ed"
        }]
    }
    ,{
        "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [{
            "visibility": "on"
        }, {
            "color": "#83cead"
        }]
    }, 


    {
        "featureType": "landscape.man_made",
            "elementType": "geometry",
            "stylers": [{
            "weight": 0.9
        }, 
        {
            "visibility": "on"
        }]
    }

    ];

    var options = 
    {
        zoom: 17,
        center: centerPosition,
        disableDefaultUI: true,
        panControl: true,
        zoomControl: true,
        zoomControlOptions: {
          style: google.maps.ZoomControlStyle.SMALL
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };





 map = new google.maps.Map($('#map')[0], options);
    map.setOptions({
        styles: style
    });
    

   






    var image = {
        url: '../includes/Flat-UI-master/images/icons/local2.png',
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(12, 59)
    };
    var shadow = {
        url: '../includes/img/shadow.png',
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(-2, 36)
    };
    var marker = new google.maps.Marker({
        position: centerPosition,
        map: map,
        icon: image,
        //shadow: shadow
    });
}
});








/***************  END MAPAS  ********************/