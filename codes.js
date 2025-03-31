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
