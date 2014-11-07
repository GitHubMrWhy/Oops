var map;
var pos;
var geocoder;
var marker;
var myinfowindow;
var markers;
var data;



var locs = [
[40.4333069,-86.91605909999998,'Mackey Arena'],
[40.4137374,-86.9337787,'Purdue Airport'],
[40.4248,-86.911,'PMU']
];

params  = "command=showEventList"  
request = new ajaxRequest()

request.open("POST", "service/index.php", true)
request.setRequestHeader("Content-type",
  "application/x-www-form-urlencoded")
request.setRequestHeader("Content-length", params.length)
request.setRequestHeader("Connection", "close")




request.onreadystatechange = function()
{
  if (this.readyState == 4)
  {
    if (this.status == 200)
    {
      if (this.responseText != null)
      {
        data = JSON.parse(this.responseText)

        //document.getElementById('info').innerHTML =data.length

      }
      else alert("Ajax error: No data received")
    }
  else alert( "Ajax error: " + this.statusText)
}
}

request.send(params)
//data = JSON.parse(this.responseText)


function ajaxRequest()
{
  try
  {
     request = new XMLHttpRequest()
  }
  catch(e1)
  {
    try
    {
      request = new ActiveXObject("Msxml2.XMLHTTP")
    }
    catch(e2)
    {
      try
      {
        request = new ActiveXObject("Microsoft.XMLHTTP")
      }
      catch(e3)
      {
        request = false
      }
    }
  }
  return request
}


function initialize() {
  var mapOptions = {
    zoom: 14
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      pos = new google.maps.LatLng(position.coords.latitude,
       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        //content: 'Location found using HTML5.'
      });
      marker = new google.maps.Marker({
        position: pos,
        map: map,
        animation: google.maps.Animation.DROP
      });	
      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
  geocoder = new google.maps.Geocoder(); 
  markers = [];
  myinfowindow = new google.maps.InfoWindow({
  	content: ''

  });
}

function handleNoGeolocation(errorFlag) {
  var content;
  if (errorFlag) {
    content = 'Error: The Geolocation service failed.';
  } else {
    content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(40.782710,-73.965310),
    content: content
  };
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(40.782710,-73.965310),
    map: map,
    animation: google.maps.Animation.DROP
  });	
  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

function hideMarkers() {
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(null);	
	}
	markers = [];
}

function testloc(){
	marker.setMap(null);
	for (var i = 0; i < data.length; i++) {
   //var mkpos = locs[i];
   var myLatLng = new google.maps.LatLng(data[i].latitude, data[i].longitude);

   var ifwindow = new google.maps.InfoWindow({
     content: data[i].content

   });
   var mk = new google.maps.Marker({
     position: myLatLng,
     map: map,
     title: data[i].content,
     animation: google.maps.Animation.DROP,
     infowindow: ifwindow
   });

   google.maps.event.addListener(mk, 'click', function() {
    myinfowindow.close();
    this.infowindow.open(map,this);
    myinfowindow = this.infowindow;
  });		
   markers.push(mk);
 }

}

$(document).ready(function(){
	$("#autocomplete").autocomplete({
		
   source:function(request,response){
    geocoder.geocode({'address':request.term},function(results){
     response($.map(results,function(item){
      return {
       label:item.formatted_address,
       value:item.formatted_address,
       latitude:item.geometry.location.lat(),
       longitude:item.geometry.location.lng(),
     }
   }))
   })
  },
  select:function(event,ui) {
   marker.setMap(null);
   pos = new google.maps.LatLng(ui.item.latitude,ui.item.longitude);
   marker = new google.maps.Marker({
    map:map,
    animation: google.maps.Animation.DROP
  })

   marker.setPosition(pos);
   map.setCenter(pos);
 }
})
});