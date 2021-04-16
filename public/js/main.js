const getPosition = async function () {
    let response = await fetch('https://geo.ipify.org/api/v1?apiKey=at_3E4A75PgM0NwwL7oUwk0MTNmpNxCP');
    let truc = await response.json();
    let lat = await truc.location.lat;
    let lng = await truc.location.lng;
    let datetime = Date.now();
    let object = {"location":
    {
        "lat":lat,
        "lng":lng
    },
    "date":datetime};
    let data = JSON.stringify(object);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        console.log(data);
        console.log(this.responseText);
        }
    }
    xmlhttp.open("POST", "../../points/add.php" , true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(data);
    console.log('plup!');
}
getPosition();
//setInterval(getPosition, 60000);