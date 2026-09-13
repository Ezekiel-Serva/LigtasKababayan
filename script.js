// GET USER LOCATION
document.getElementById("locate").addEventListener("click", () => {

    // Check if the browser supports location
    if (!navigator.geolocation) {
        alert("Location is not supported by this browser.");
        return;
    }

    navigator.geolocation.getCurrentPosition(

        // If location is captured
        (position) => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            document.getElementById("lat").value = latitude;
            document.getElementById("lng").value = longitude;

            alert("Location Captured");

            document.getElementById("info").style.color = "green";
            document.getElementById("info").textContent =
                "Location captured!\n" +
                "Latitude: " + latitude + "\n" +
                "Longitude: " + longitude;
        },

        // If location fails
        (error) => {
            if (error.code === error.PERMISSION_DENIED) {
                alert("Please turn on Location Services and try again.");
            }

            else if (error.code === error.POSITION_UNAVAILABLE) {
                alert(
                    "Unable to get your location.\n\n" +
                    "Please turn on Location on your phone, then try again."
                );
            }

            else if (error.code === error.TIMEOUT) {
                alert(
                    "Getting your location is taking longer than usual. " +
                    "Please check your signal and Location Services, then try again."
                );
            }

            else {
                alert("Unable to capture your location.");
            }
        },

        // Location settings
        {
            enableHighAccuracy: true,
            timeout: 25000,
            maximumAge: 0
        }
    );
});


// SUBMIT REPORT
document.getElementById("submit").addEventListener("click", function () {

    const name = document.getElementById("name").value;
    const phone = document.getElementById("phone").value;

    const waterLevel =
        document.querySelector('input[name="level"]:checked');

    const headcount =
        document.querySelector('input[name="peoples"]:checked');

    const lat = document.getElementById("lat").value;
    const lng = document.getElementById("lng").value;

    const description =
        document.getElementById("locationDesc").value;

    const photo =
        document.getElementById("imgInput").files[0];

    const withVulnerable =
        document.querySelector('select[name="WITH_USER"]');

    const isVulnerable =
        document.querySelector('select[name="USER"]');


    // Check the required information
    if (!name || !waterLevel || !headcount || !phone) {
        document.getElementById("info").style.color = "red";
        document.getElementById("info").textContent =
            "ERROR: Please complete the name, water level, headcount, and phone number.";

        return;
    }


    // Check if location was captured
    if (!lat || !lng) {
        document.getElementById("info").style.color = "red";
        document.getElementById("info").textContent =
            "ERROR: No location captured. Click Get My Location first.";

        return;
    }


    // Put the information inside FormData
    const formData = new FormData();

    formData.append("name", name);
    formData.append("water_level", waterLevel.value);
    formData.append("lat", lat);
    formData.append("lng", lng);
    formData.append("description", description);
    formData.append("headcount", headcount.value);
    formData.append("phone", phone);


    // Check vulnerable-person selections
    if (withVulnerable.value !== "") {
        formData.append("vulnerable_status", withVulnerable.name);
        formData.append("vulnerable_type", withVulnerable.value);
    }

    else if (isVulnerable.value !== "") {
        formData.append("vulnerable_status", isVulnerable.name);
        formData.append("vulnerable_type", isVulnerable.value);
    }

    else {
        formData.append("vulnerable_status", "");
        formData.append("vulnerable_type", "");
    }


    // Add the photo if the user selected one
    if (photo) {
        formData.append("photo", photo);
    }


    document.getElementById("info").style.color = "black";
    document.getElementById("info").textContent =
        "Sending report...";


    let requestWasSuccessful = false;

    // Send the report to save.php
    fetch("../save.php", {
        method: "POST",
        body: formData
    })

    .then(response => {
        requestWasSuccessful = response.ok;

        return response.text();
    })

    .then(result => {

        // Check if PHP returned an error
        if (!requestWasSuccessful) {
            throw new Error(
                result || "The report could not be saved."
            );
        }

        alert(result);

        document.getElementById("info").style.color = "green";
        document.getElementById("info").textContent =
            "SERVER RESPONSE:\n" + result;
    })

    .catch(error => {
        alert("Error: " + error.message);

        document.getElementById("info").style.color = "red";
        document.getElementById("info").textContent =
            "ERROR:\n" + error.message;
    });
});