var map, geo, $add_new,markers = [];
function builderMapsProInit(){
    
    $add_new = jQuery( '#markers' ).next( 'p.add_new' ).find('a');
    geo = new google.maps.Geocoder();

    // update add_new row button label
    $add_new.text( builderMapsPro.labels.add_marker );

    builderMapsPro_make_preview();
}
function builderMapsPro_make_preview() {
        map = new google.maps.Map( document.getElementById( 'map-canvas' ), {
                center: new google.maps.LatLng( -34.397, 150.644 )
        } );
        builderMapsPro_update_map_preview();
        builderMapsPro_setup_markers();
}

function builderMapsPro_setup_markers() {
        var $ = jQuery;
        var markers = $( '#markers' ).find( '> .themify_builder_row' );
        function _setup_markers( i ) {
                var row = $( markers[i] ); // get single marker
                row.data( 'marker_index', i );
                markers[i] = builderMapsPro_add_new_marker( row.find( '[name="address"]' ).val(), row.find( '[name="title"]' ).val(), row.find( '[name="image"]' ).val(), i );
                if ( i < markers.length ) {
                        setTimeout( function(){
                                i++;
                                _setup_markers( i );
                        }, 350 ); /* wait 350ms before loading the new marker */
                }
        }
        _setup_markers( 0 );
}

function builderMapsPro_update_map_preview() {
        var $ = jQuery;
        geo.geocode( { 'address': $( '#map_center' ).val() }, function( results, status ) {
                if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter( results[0].geometry.location );
                }
        });

        var options = {
                zoom : parseInt( $( '#zoom_map' ).val() ),
                mapTypeId : google.maps.MapTypeId[ $( '#type_map' ).val() ],
                styles : builderMapsPro.styles[ $( '#style_map' ).val() ],
                disableDefaultUI : $( '#disable_map_ui' ).val() == 'yes',
                draggable : false,
                scrollwheel : false
        };
        map.setOptions( options );
}


function builderMapsPro_add_new_marker( address, title, image, index ) {
        if( address == null || address.trim() == '' ) {
                return null;
        }

        geo.geocode( { 'address': address }, function( results, status ) {
                if (status == google.maps.GeocoderStatus.OK) {
                        markers[index] = new google.maps.Marker({
                                map : map,
                                position: results[0].geometry.location,
                                icon : image
                        });
                        if( title.trim() != '' ) {
                                var infowindow = new google.maps.InfoWindow({
                                        content: '<div class="maps-pro-content">' + title + '</div>'
                                });
                                google.maps.event.addListener( markers[index], 'click', function() {
                                        infowindow.open( map, markers[index] );
                                });
                        }
                }
                return null;
        });
}

function builderMapsPro_remove_marker( index ) {
        if( markers[index] != undefined ) {
                markers[index].setMap( null );
                markers[index] = null;
        }
}

(function( w ) {
        
	jQuery(function($){
            
                function loadScript(src, callback) {
                    var script = document.createElement("script");
                    script.type = "text/javascript";
                    if (callback) script.onload = callback;
                    document.getElementsByTagName("head")[0].appendChild(script);
                    script.defer = true;
                    script.async = true;
                    script.src = src;
                }
                
		$( 'body' ).on( 'editing_module_option', function(e){
			if( ! $( '#map-preview' ).length > 0 ) return;
                        if (typeof google !== 'object') {
                            loadScript('//maps.google.com/maps/api/js?sensor=false&callback=builderMapsProInit&key='+builderMapsPro.key);
                        } else {
                            builderMapsProInit();
                        }
		} )
		.on( 'change', '#map_center, #zoom_map, #type_map, #style_map, #disable_map_ui', builderMapsPro_update_map_preview )
		.on( 'change', '#markers .tfb_lb_option_child', update_markers )
		.on( 'click', '#markers .themify_builder_delete_row', delete_marker_action );

		

			
		function update_markers() {
			var row = $( this ).closest( '.themify_builder_row' ),
				index = ( row.data( 'marker_index' ) == undefined ) ? markers.length : row.data( 'marker_index' );

			// make sure it's removed first
			builderMapsPro_remove_marker( index );

			markers[index] = builderMapsPro_add_new_marker( row.find( '[name="address"]' ).val(), row.find( '[name="title"]' ).val(), row.find( '[name="image"]' ).val(), index );
		}

		function delete_marker_action() {
			var index = $( this ).closest( '.themify_builder_row' ).data( 'marker_index' );
			builderMapsPro_remove_marker( index );
		}
	});
}( window ));