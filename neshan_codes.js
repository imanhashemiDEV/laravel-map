const map = new L.Map("map", {
    key: "web.27f6c7fe74024c67af55096e2fa9fbd4",
    maptype: "neshan",
    poi: false,
    traffic: false,
    center: [$wire.lat, $wire.lng],
    zoom: 18,
})

let positions =0;
let origin;
let destination;
map.on('click', function(event){

    if(positions < 2){
        L.marker([event.latlng.lat,event.latlng.lng]).addTo(map);
        if(positions===0){
            // $wire.setStart(event.latlng.lat,event.latlng.lng)
            origin = `${event.latlng.lat},${event.latlng.lng}`
        }else{
            // $wire.setEnd(event.latlng.lat,event.latlng.lng)
            // $wire.calculateDistance()
            destination = `${event.latlng.lat},${event.latlng.lng}`
            doApi();
        }
    }
    positions++;

})

async function doApi(url) {

    let options = {
        method: 'GET',
        headers: {
            'Api-Key' : 'service.eada9e20a7e649f59f5dc2fe86c993a5'
        },

    };



    const response = await fetch(`https://api.neshan.org/v4/direction?type=car&origin=${origin}&destination=${destination}&alternative=false`, options);
    if( response.ok ) {
        if( 200 <= response.status && response.status <= 299 ) {
            const result = await response.json();
            console.log(result.routes[0].legs[0].distance.text)

            for (let k = 0; k < Object.keys(result.routes).length; k++) {

                for (let j = 0; j < Object.keys(result.routes[k].legs).length; j++) {

                    for (let i = 0; i < Object.keys(result.routes[k].legs[j].steps).length; i++) {
                        let step = result.routes[k].legs[j].steps[i];

                        console.log(step)
                        L.Polyline.fromEncoded(step.polyline, {
                            color: "#250ECD",
                            weight: 12
                        }).addTo(map);


                    }
                }
            }




        } else {
            console.log( `got a ${response.status}` );
        }
    }
}
