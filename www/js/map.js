var map;
var pos;
var geocoder;
var marker;
var myinfowindow;
var markers;
var event_list
var img_list
var autocp;
var countryRestrict = { country: 'us' };
var data;
var data_params;
var data_request;

var locs = [
  [40.4333069,-86.91605909999998,'Yard sale','Tue 11/1/14','3pm','Mackey Arena','http://mingshengxu.com/oops/img/images.jpeg'],
  [40.4137374,-86.9337787,'Party','Thu 12/1/14','5pm','Purdue Airport','http://awesomeshit.ninja/wp-content/uploads/2014/11/grumpy-cat-no.jpg'],
  [40.4248,-86.911,'Church','Sun 11/15/14','6pm','PMU','http://static2.businessinsider.com/image/509802cb69bedd6209000009/nicolas-cage-will-be-in-the-expendables-3.jpg']
];

function searchrequest(value) {
	
	if (value == 'events') {
  data_params  = "command=showEventList";
	} else if (value == 'pictures') {
	data_params  = "command=showImageList";
	}
	
  data_request = new XMLHttpRequest();
 
  data_request.open("POST", "service/index.php", false);
  data_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


  data_request.onreadystatechange = function() {
  
    if (this.readyState == 4) {
      if (this.status == 200) {
        if (this.responseText != null) {
          data = JSON.parse(data_request.responseText);                
      }
      else {
		alert("Ajax error: No data received");
		}
    }
  else {
		alert( "Ajax error: " + this.statusText);
		}
	}
	
	}
	
	data_request.send(data_params);
}


function initialize() {
  
  data_request = null;
  var mapOptions = {
    zoom: 14
  };
  
  var options = {
  types: ['(cities)'],
  componentRestrictions: {country: 'us'}
	};
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

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
  marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });
  geocoder = new google.maps.Geocoder(); 
  markers = [];
  myinfowindow = new google.maps.InfoWindow({
  	content: ''

  });
  autocp = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      {
        types: ['(cities)'],
        componentRestrictions: countryRestrict
      });
    
	autocp.bindTo('bounds', map);
	google.maps.event.addListener(autocp, 'place_changed', function() {
    hideMarkers();
    // marker.setVisible(false);
    var place = autocp.getPlace();
    if (!place.geometry) {
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(13);  
    }
	if (place.geometry) {
		map.panTo(place.geometry.location);
		map.setZoom(13);
		
	  } else {
		document.getElementById('autocomplete').placeholder = 'Enter a city';
	  }
    
    
	marker.setMap(null);
	marker = new google.maps.Marker({
			map:map,
			animation: google.maps.Animation.DROP
		})
	marker.setPosition(place.geometry.location);
	map.setCenter(place.geometry.location);
    // marker.setVisible(true);
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

function eventTest() {
  marker.setMap(null);
  hideMarkers();


  //post_form("command=showEventList");

	for (var i = 0; i < data.length; i++) {
    	var mkpos = data[i];
    	var myLatLng = new google.maps.LatLng(data[i].latitude, data[i].longitude);
    	var contentString;
		//check database if already joined

		//can be switched between true/false for testing	
		var joined = true;
		if (joined == true) {
		contentString = '<div id="content">'+'<center>'+
		  '<div id="siteNotice">'+
		  '</div>'+
		  '<h1 id="firstHeading" class="firstHeading">'+data[i].subject+'</h1>'+
		  '<div id="bodyContent">'+
		  // '<p>Date: '+ img_list[i].img_list +'</p>'+
		  
		  '<p>Location: '+ data[i].location +'</p>'+
		  //replace with actual link
		  '<p><a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
		  'Event link</a> '+'</p>'+
		  '</div>'+
		  '<button type="button" onclick="joinEventTest()"> Join event test </button>'+'</center>'
		  '</div>';
		
    	} else {
		contentString = '<div id="content">'+'<center>'+
		  '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">'+data[i].subject+'</h1>'+
      '<div id="bodyContent">'+
      '<p>Date: '+ data[i].event_time +'</p>'+
      
      '<p>Location: '+ data[i].location +'</p>'+
		  //replace with actual link
		  '<p><a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
		  'Event link</a> '+'</p>'+
		  '</div>Joined!'+'</center>'+'</div>';
		}
		var ifwindow = new google.maps.InfoWindow({
  			
			content: contentString
      		  		
  		});
    	
    	var mk = new google.maps.Marker({
        	position: myLatLng,
        	map: map,
        	
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

function joinEventTest() {
	//INSERT query goes here
}

function photoTest() {
	marker.setMap(null);
	hideMarkers();

  //var data=post_form("command=showImageList");

	for (var i = 0; i < data.length; i++) {
    	var mkpos = data[i];
    	var myLatLng = new google.maps.LatLng(data[i].latitude, data[i].longitude);
    	var contentString;
		//check database if already joined

		//can be switched between true/false for testing	
		
		contentString = '<img src="'+data[i].src+'" height="100" width="100"></img>';
		
		var ifwindow = new google.maps.InfoWindow({
  			
			content: contentString
      		  		
  		});
    	
    	var mk = new google.maps.Marker({
        	position: myLatLng,
        	map: map,
        	title: data[i].caption,
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

function dropdownTest(value) {
	hideMarkers();
	if (value == 'events') {
		
		searchrequest('events');
		eventTest();
		delete data_request;
		
	} else if (value == 'users') {
		
	} else if (value == 'pictures') {
		
		searchrequest('pictures');
		photoTest();
		delete data_request;
	}
}