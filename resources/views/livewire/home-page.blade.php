<div class="flex items-center h-[100vh] w-full p-12 rounded-2xl">
    <div id="map" class="bg-white w-full h-[100%] rounded-2xl m-2">

    </div>
</div>

@script
<script>
         const map = L.map('map',{
             center :[$wire.lat, $wire.lng ],
             zoom: 12,
             maxZoom : 18,
             minZoom : 10,
             zoomControl : true
         })
         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map)
</script>
@endscript
