const map = L.map('map',{
    center :[$wire.lat, $wire.lng ],
    zoom: 17,
    maxZoom : 18,
    minZoom : 10,
    zoomControl : true
});

// imanhashemiDEV


//////  marker   ///////
          const myIcon = L.icon({
              iconUrl: "https://www.pngall.com/wp-content/uploads/2017/05/Map-Marker-Free-Download-PNG.png",
              iconSize:[45,45]
          })
         let marker = L.marker([$wire.lat, $wire.lng],{
              icon: myIcon,
         }).addTo(map)

         marker.bindPopup('چهار شیر').openPopup()
         marker.bindPopup(`
           <h1> عنوان </h1>
           <button onclick="alert('clicked')"> click </button>
         `)

         marker.bindPopup('چهار شیر',{
             minWidth:200,
             closeOnClick: false
         })

 //// events ////
 map.on('click', function(event){
     const marker = L.marker([event.latlng.lat,event.latlng.lng],{ draggable:true}).addTo(map)
     // $wire.getPostion(event.latlng.lat,event.latlng.lng)
     marker.on('dragend',function (event){
         $wire.getPostion(event.target._latlng.lat,event.target._latlng.lng)
     })
 })


L.marker([$wire.lat, $wire.lng]).addTo(map);

          /// get user location

navigator.geolocation.getCurrentPosition(function (location){
    let lng = location.coords.longitude;
    let lat = location.coords.latitude;
    console.log(location.coords.accuracy);

    let map = L.map('map').setView([lat, lng ], 17);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    L.marker([lat, lng]).addTo(map);
})


