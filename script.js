
// LOCATE Get the latitude and lognitude

document.getElementById("locate").addEventListener("click", () => {
	navigator.geolocation.getCurrentPosition(       
        
        (position) => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            document.getElementById("lat").value = latitude;
            document.getElementById("lng").value = longitude;

            alert("Location Captured");

            //Not impoetant - for debugging purposes
            document.getElementById("info").style.color = "green";
            document.getElementById("info").textContent =
                "Location captured!\n" +
               "Latitude: " + latitude + "\n" +
                "Longitude: " + longitude;
        },
        (error) => {
			switch(error.code){
                case error.PERMISSION_DENIED:
                    alert("Please turn on Location Services and try again.");
                    break;
                case error.POSITION_UNAVAILABLE:
            	    alert("Unable to get your location.\n\n" + "Please turn on Location on your phone, then try again.");
                    break;
                case error.TIMEOUT:
                    alert("Getting your location is taking longer than usual — this can happen on weak signal, or if 'Location Services' is not turned On. " + 
                          "Please try turning it On and try again. \n\nIf it keeps failing try moving on a different spot and try again. Make sure 'Location Services' is turned On.");
            }
        },
		{
			enableHighAccuracy: true,
            timeout: 6000,
			maximumAge: 0
		}
    );
});



// SUBMIT functionalities part

document.getElementById("submit").addEventListener("click", function () {

    const waterLevel = document.querySelector('input[name="level"]:checked');
    const headcount = document.querySelector('input[name="peoples"]:checked');
    const lat = document.getElementById("lat").value;
    const lng = document.getElementById("lng").value;

    const photo = document.getElementById("imgInput").files[0];
	
	
    // Check if location dont exists (lat and lng has no values)
    if (!lat || !lng) {
        document.getElementById("info").style.color = "red";
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
    //document.getElementById("info").textContent = "Sending report...";


    fetch("../save.php", {
    method: "POST",
    body: formData
})

    .then(response => response.text())
    .then(result => {
        document.getElementById("info").style.color = "green";
        document.getElementById("info").textContent =
            "SERVER RESPONSE:\n" + result;
    })

    .catch(error => {
        document.getElementById("info").style.color;
        document.getElementById("info").textContent =
            "FETCH ERROR:\n" + error;
    });

});