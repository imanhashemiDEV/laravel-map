<div class="flex items-center h-[100vh] w-full p-12 rounded-2xl">
    <div id="map" class="bg-white w-full h-[100%] rounded-2xl m-2">

    </div>
</div>

@script
<script>

          navigator.geolocation.getCurrentPosition(function (location){
              let lng = location.coords.longitude;
              let lat = location.coords.latitude;
              console.log(location.coords.accuracy);

              let map = L.map('map').setView([lat, lng ], 17);
              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

              L.marker([lat, lng]).addTo(map);
          })


</script>
@endscript
