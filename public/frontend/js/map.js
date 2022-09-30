var string = document.getElementById("tour_city").value;
var address = string.split('/ ');
address.forEach(myFunction);

mapboxgl.accessToken = 'pk.eyJ1IjoiYW5oZHEzNzEwIiwiYSI6ImNsN2ZneTNpcDBhNTYzdW16bjExbHY4YnMifQ.GTEaxbnrRKxUeier2n4Qjg';
const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/examples/cjgiiz9ck002j2ss5zur1vjji',
    center: [108.2011655, 16.048357],
    zoom: 5,
});

function myFunction(data) {
    axios.get('https://api.mapbox.com/geocoding/v5/mapbox.places/' + data + '.json?access_token=pk.eyJ1IjoiYW5oZHEzNzEwIiwiYSI6ImNsN2ZneTNpcDBhNTYzdW16bjExbHY4YnMifQ.GTEaxbnrRKxUeier2n4Qjg')
        .then(function (response) {
            let longitude = response.data.features[0].center[0];
            let latitude = response.data.features[0].center[1];
            let marker = new mapboxgl.Marker()
                .setLngLat([longitude, latitude])
                .addTo(map);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });
}