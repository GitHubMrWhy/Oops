var map;

var pos;



var autocp;

var countryRestrict = { country: 'us' };



function initialize() {

  var options = {

  

  componentRestrictions: {country: 'us'}

	};


  autocp = new google.maps.places.Autocomplete(

      /** @type {HTMLInputElement} */(document.getElementById('event_autocomplete')),

      {

        

        componentRestrictions: countryRestrict

      });

    

	

	google.maps.event.addListener(autocp, 'place_changed', function() {

    
    var place = autocp.getPlace();

    if (!place.geometry) {

      return;

    }

    
	document.getElementById('event_lat').value = place.geometry.location.lat();

	document.getElementById('event_lng').value = place.geometry.location.lng();
	

  });

}



