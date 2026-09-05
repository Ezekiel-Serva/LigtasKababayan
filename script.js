// ========================
// LOCATE
// ========================

document.getElementById("locate").addEventListener("click", function () {
	navigator.geolocation.getCurrentPosition(
        function(position) {

            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            document.getElementById("lat").value = latitude;
            document.getElementById("lng").value = longitude;

            document.getElementById("info").textContent =
                "Location captured!\n" +
                "Latitude: " + latitude + "\n" +
                "Longitude: " + longitude;
			
			alert("Location Captured");

        },

        function(error) {
			
			if (error.code === error.PERMISSION_DENIED) {
            	alert("Location is unavailable.\n\n" + "Please turn on your Location on your phone.");
        	}
				
        	else if (error.code === error.POSITION_UNAVAILABLE) {
            	alert("Unable to get your location.\n\n" + "Please turn on Location on your phone, then try again.");
        	}
				
        	else if (error.code === error.TIMEOUT) {
				alert("Error: Unable to get your location\nTurn ON 'Location Services' on your phone\n\nQuick reminder:\nBefore clicking 'Get Location' make sure your phones 'Location Services' is ON.");
        	}          
        },
		{
			timeout: 5000,
			enableHighAccuracy: true,
			maximumAge: 0
		}
    );
});


// ========================
// SUBMIT
// ========================

document.getElementById("submit").addEventListener("click", function () {

    const waterLevel = document.querySelector('input[name="level"]:checked');
    const headcount = document.querySelector('input[name="peoples"]:checked');
    const lat = document.getElementById("lat").value;
    const lng = document.getElementById("lng").value;

    const photo = document.getElementById("cameraInput").files[0];
	
	
    // Check if location dont exists
    if (!lat || !lng) {
        document.getElementById("info").textContent =
            "ERROR: No location captured. Click 'Locate my Location' first.";
        return;
    }
		alert("Information Sent!")


    const formData = new FormData();
		formData.append("name", document.getElementById("name").value);
		formData.append("water_level", waterLevel ? waterLevel.value : "");
		formData.append("lat", lat);
		formData.append("lng", lng);
		formData.append("description", document.getElementById("locationDesc").value);
		formData.append("headcount", headcount ? headcount.value : "");
		formData.append("phone", document.getElementById("phone").value);
		
		if (photo) {
		    formData.append("photo", photo);
		}


    // Show what we're sendingkkkkkkkk
    document.getElementById("info").textContent = "Sending report...";


    fetch("../save.php", {
    method: "POST",
    body: formData
})

    .then(response => response.text())
    .then(result => {
        document.getElementById("info").textContent =
            "SERVER RESPONSE:\n" + result;
    })

    .catch(error => {
        document.getElementById("info").textContent =
            "FETCH ERROR:\n" + error;
    });

});