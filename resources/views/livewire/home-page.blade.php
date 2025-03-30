<div class="flex items-center h-[100vh] w-full p-12 rounded-2xl">
    <div id="map" class="bg-white w-full h-[100%] rounded-2xl m-2">

    </div>
</div>

@script
<script>
         const map = L.map('map',{
             center :[$wire.lat, $wire.lng ],
             zoom: 17,
             maxZoom : 18,
             minZoom : 10,
             zoomControl : true
         })
         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map)

         // marker
         const myIcon = L.icon({
             iconUrl: "https://www.pngall.com/wp-content/uploads/2017/05/Map-Marker-Free-Download-PNG.png",
             iconSize:[45,45]
         })
         let marker = L.marker([$wire.lat, $wire.lng],{
             // icon: myIcon,
         }).addTo(map)

         //marker.bindPopup('چهار شیر').openPopup()
         // marker.bindPopup(`
         //   <h1> عنوان </h1>
         //   <button onclick="alert('clicked')"> click </button>
         // `)
         marker.bindPopup('چهار شیر',{
             minWidth:200,
             closeOnClick: false
         })
</script>
@endscript
