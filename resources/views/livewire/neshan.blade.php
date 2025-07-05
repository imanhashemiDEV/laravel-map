<div class="box">
    <input type="text" wire:model="address">
    <div id="map"></div>
</div>


@script
<script>
    const map = new L.Map("map", {
        key: "web.27f6c7fe74024c67af55096e2fa9fbd4",
        maptype: "neshan",
        poi: false,
        traffic: false,
        center: [$wire.lat, $wire.lng],
        zoom: 16,
    })

    let positions=0;
    let origin;
    let destination;

    map.on('click',function (event){
        if(positions <2){
            L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);
            if(positions===0){
               origin = `${event.latlng.lat},${event.latlng.lng}`
            }else{
                destination = `${event.latlng.lat},${event.latlng.lng}`
                drawRoute()
            }
        }
        positions++

        //getAddress(event.latlng.lat, event.latlng.lng)
    })

    async function getAddress(lat,lng){
        let options ={
            method:'GET',
            headers:{
                'Api-Key':'service.403334b727654de6b09ecabae0f0d994'
            }
        }
         const response = await fetch(`https://api.neshan.org/v5/reverse?lat=${lat}&lng=${lng}`,options);
         if(response.ok){
             const result = await response.json();
             console.log(result.formatted_address)
             $wire.address = result.formatted_address
         }
    }

    async function drawRoute(){
        let options ={
            method:'GET',
            headers:{
                'Api-Key':'service.eada9e20a7e649f59f5dc2fe86c993a5'
            }
        }
        const response = await fetch(`https://api.neshan.org/v4/direction?type=car&origin=${origin}&destination=${destination}&alternative=false`,options);
        if(response.ok){
            const result = await response.json();
            console.log(result.routes[0].legs[0].distance.text)
            console.log(result.routes[0].legs[0].duration.text)
            for (let k = 0; k < Object.keys(result.routes).length; k++) {
                for (
                    let j = 0;
                    j < Object.keys(result.routes[k].legs).length;
                    j++
                ) {
                    for (
                        let i = 0;
                        i < Object.keys(result.routes[k].legs[j].steps).length;
                        i++
                    ) {
                        let step = result.routes[k].legs[j].steps[i];

                        L.Polyline.fromEncoded(step.polyline, {
                            color: '#250ECD',
                            weight: 12,
                        }).addTo(map);

                    }
                }
            }
        }

    }
</script>
@endscript
