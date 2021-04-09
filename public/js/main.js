const getPosition = async function () {
    let response = await fetch('https://geo.ipify.org/api/v1?apiKey=at_3E4A75PgM0NwwL7oUwk0MTNmpNxCP');
    let data = await response.json();
    const lat = data.location.lat;
    const lng = data.location.lng;
    document.getElementById('lat').setAttribute("value", lat);
    document.getElementById('lng').setAttribute("value", lng);
}
getPosition();
//setInterval(getPosition, 60000);