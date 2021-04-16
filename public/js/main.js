const getPosition = async function () {
    let response = await fetch('https://geo.ipify.org/api/v1?apiKey=at_l3elHseb7Bj0krFxukdoK6M8erRaQ');
    let truc = await response.json();
    let lat = await truc.location.lat;
    let lng = await truc.location.lng;
    let datetime = Math.floor(Date.now() / 1000);
    object = {"location":
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
    xmlhttp.open("POST", "index.php?action=addPoint" , true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(data);
}
getPosition();
setInterval(getPosition, 1000);