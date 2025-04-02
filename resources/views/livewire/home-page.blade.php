<div class="flex items-center h-[100vh] w-full p-12 rounded-2xl">
    <div id="map" class="bg-white w-full h-[100%] rounded-2xl m-2">

    </div>
</div>

@script
<script>


         let map = L.map('map').setView([$wire.lat, $wire.lng ], 17);
         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

         L.Control.geocoder().addTo(map);
</script>
@endscript
