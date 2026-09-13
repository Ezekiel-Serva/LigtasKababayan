function loadUsers(){

fetch("../get_users.php")

.then(response => response.json())
.then(users => {
    console.log(users);
    const reports = document.getElementById("normalQueueReports");
    reports.innerHTML = "<pre>" + JSON.stringify(users, null, 2) + "</pre>";
})
.catch(error => {
    console.log(error)
})
}

loadUsers();


document.getElementById("rescuedBtn").addEventListener("click", function (){
    const userID = document.getElementById("userID").value;

    if(!userID){
        alert("Please Enter Rescued users ID before clicking 'Rescued'");
        return;
    }

    fetch("../rescued.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({id: userID})
    })
    .then(response => response.text())
    .then(result => {
        alert(result);
        loadUsers();

        document.getElementById("userID").value = "";
    })
    
    .catch(error => {
        alert("Failed to rescue user");
		console.log(error);
    });
});


    