<html>
    <head>
        <link rel="stylesheet" href="//unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
        <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css" />
        <script src="//unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
        <script src="//cdn.jsdelivr.net/semantic-ui/2.2.6/semantic.min.js"></script>
        <link rel="stylesheet" href="//ehkoo.github.io/semantic-ui-examples/theme/main.css" />
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <nav class="ui fixed menu inverted navbar ">
            <a href="" class="brand item">NantesTraffic</a>
            <a href="" class="active item">Home</a>
        </nav>
        <div class="ui traffic"></div>
        <div id="map"></div>
        <script>
            let events = <?php echo $events; ?>;
            let marker = '<i class="warning icon"></i>'
            let mymap = L.map('map').setView([<?php echo $latitude ?>,<?php echo $longitude ?>], 9)
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoieGNob3BpbiIsImEiOiJjaXluMXg0cTAwMDBwM3VwZnN0Y2ZxM3JmIn0.Hfr7AY-5aNpongUyCXdOUg', {
                maxZoom: 18 ,attribution: 'Xavier CHOPIN and Alexis WURTH © <a href="http://univ-lorraine.fr">University of Lorraine</a>',id: 'mapbox.streets'
            }).addTo(mymap)
            $(events).each(function(index, event) {
                L.marker([event.latitude, event.longitude]).addTo(mymap).bindPopup("<b>"+ marker + " "+ event.nature +"</b>" +
                    "<br/> Type : "+ event.type +
                    "<br/> Details : "+ event.statut +
                    "<br/> Date of publication  : " + event.datePublication.substring(0,10) + " at " + event.datePublication.substring(16,11)
                );
            });
        </script>
    </body>
</html>