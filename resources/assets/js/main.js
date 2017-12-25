var app = angular.module('crossOverApp', []);

/*
* Angular service for Google Map
*/
app.service('GMap', function($q) {
    
    /*
	* Initialize Google Map
    */
    this.init = function() {
        var options = {
            center: new google.maps.LatLng(39.305, -76.617),
            zoom: 11,
            disableDefaultUI: true    
        }

        this.bounds = new google.maps.LatLngBounds();

        this.gMap = new google.maps.Map(
            document.getElementById("googlemap"), options
        );
        this.places = new google.maps.places.PlacesService(this.gMap);
    }
    
    /*
	* Create Marker to Google Map
    */
    this.createMarker = function(lat_long) {
        this.marker = new google.maps.Marker({
            map: this.gMap,
            position: lat_long,
            animation: google.maps.Animation.DROP
        });

        this.bounds.extend(this.marker.position);

        this.gMap.fitBounds(this.bounds);

        return this.marker;
    }
    
});


app.controller('CrossOverController', function($scope, $http, GMap) {

	/**
     * Fetch events plages
     * return none
     */
    fetchEvents = function(route) {
        var route_url = '   /api/events/' + route;
        
        // http request to fetch all the events from DB
        $http.get(route_url).then(
            function(events) {
                $scope.events = events.data;
                
                // add event markers to the map
                angular.forEach($scope.events, function(event) {
                    lat_long = {
                        lat: parseFloat(event.latitude), 
                        lng: parseFloat(event.longitude) 
                    };

                    // add marker on map and listen for click event
                    createMarkerOnGoogleMap(lat_long, event);
                });
            }
        );
    }

    /**
     * get today's date
     * return string @date, format 2017-12-24
     */
    $scope.todayDate = function() {
        var date = new Date();
        var dd = date.getDate();
        var mm = date.getMonth()+1;
        
        var yyyy = date.getFullYear();
        if(dd < 10){
            dd = '0' + dd;
        } 
        if(mm < 10){
            mm = '0' + mm;
        } 
        today = yyyy + '-' + mm + '-' + dd;
        
        return today;
    }

    /*
    * get the current route from current URL
    * return string @route
    */
    getRouteUrl = function() {
        index 		= window.location.pathname.indexOf('/') + 1;
        index2 		= window.location.pathname.lastIndexOf('/');

        length 		= index2-index;
        if(index2 == 0)
            length = window.location.pathname.length;
    
        return window.location.pathname.substr(index, length);
    }

    /*
    * Get the Event Place ID from URL
    * return int @id
    */
    getEventIdFromURL = function() {
        return window.location.pathname.substr(
                window.location.pathname.lastIndexOf('/') + 1);
    }

    /**
     * Create marker on the Google map and bind for click events
     * return none
     */
    createMarkerOnGoogleMap = function(latlong, event) {
        var marker = GMap.createMarker(latlong);
        marker.addListener('click', function() {
            $scope.$apply(function(){
                $scope.currentEvent = event;
            });
        });
    }

    /**
     * Get the stands data for an event
     */
    getEventStands = function(eventid) {
        $http.get('/api/events/' + eventid).then(
            function(stands) {
                $scope.stands = stands.data;

                // for all stands
                //  add event listener
                //  show reserved if
                angular.forEach($scope.stands, function(stand) {
                    [st, text] = selectStandElement(stand.name);
                    console.log(st, text)
                    listenAndActOnStandClick(st, text, stand);

                    if(stand.reserved)
                    {
                        reserveTheStand(st, text, stand);
                    }
                });
            }
        );
    }

    /**
     * Listen for click event on stand and perform action
     */
    listenAndActOnStandClick = function(st, text, stand) {
        st.on('click', function(e) {
            
            $scope.$apply(function(){
                $scope.currentStand = stand;
                $('#myModal').modal('show');
            });
            
        }.bind(this));

        text.on('click', function(e) {
            
            $scope.$apply(function(){
                $scope.currentStand = stand;
                $('#myModal').modal('show');
            });
            
        }.bind(this));
    }

    /**
     * Update stand styling to show as reserved
     */
    reserveTheStand = function(st, text, stand) {
        st.style("fill", "#e6e6e6");
        st.html('<title>Booked. Click to view the booking comapny detail.</title>');
    }

    /**
     * return the stand dom element
     */
    selectStandElement = function(name) {
        console.log(d3.selectAll("rect."+name), d3.selectAll("text."+name));
        return [d3.selectAll("rect."+name), d3.selectAll("text."+name)];
    }

    // Initiliazation variables

    // Current event selected on Google map
    $scope.currentEvent = null;


    // Current stand selected on hall map
    $scope.currentStand = null;
    
    // get the route from current URL
    $scope.route = getRouteUrl();
    
    if($scope.route == "" || $scope.route == "current-events" || $scope.route == "past-events") {
        // initialize the Google map
        GMap.init();
        
        // fetch all the events and create markers on the google map
        fetchEvents($scope.route);
    } else if($scope.route == 'event') {
        // get all the stands for an event
        getEventStands( getEventIdFromURL() );
    }
});