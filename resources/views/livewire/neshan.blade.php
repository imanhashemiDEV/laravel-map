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

    map.on('click',function (event){
        L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);
        getAddress(event.latlng.lat, event.latlng.lng)
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
</script>
@endscript
