<?php

return array(
	'locator' => array(
		'props'    => array(
            'tiles' => function($tiles = null) {
            	// 13.11.2018 - CARTO currently serves the positron style under the 'light_all' name
            	$tiles = $tiles ?? option('sylvainjule.locator.tiles');
            	return str_replace('positron', 'light_all', $tiles);
            },
            'geocoding' => function($geocoding = null) {
            	return $geocoding ?? option('sylvainjule.locator.geocoding');
            },
            'liststyle' => function($liststyle = null) {
            	return $liststyle ?? option('sylvainjule.locator.liststyle');
            },
            'display' => function($display = null) {
            	return $display ?? option('sylvainjule.locator.display');
            },
            'zoom' => function($zoom = []) {
            	return array(
            		'min'     => $zoom['min']     ?? option('sylvainjule.locator.zoom.min'),
            		'default' => $zoom['default'] ?? option('sylvainjule.locator.zoom.default'),
            		'max'     => $zoom['max']     ?? option('sylvainjule.locator.zoom.max'),
            	);
            },
            'center' => function($center = []) {
            	return array(
            		'lat'     => $center['lat'] ?? option('sylvainjule.locator.center.lat'),
            		'lon'     => $center['lon'] ?? option('sylvainjule.locator.center.lon'),
            	);
            },
            'value' => function($value = null) {
            	return Yaml::decode($value);
            }
		),
		'computed' => array(
			'markerUrl' => function() {
				$tint = in_array($this->marker, ['light', 'dark']) ? $this->marker : option('sylvainjule.locator.marker');
				return kirby()->url('media') . '/plugins/sylvainjule/locator/images/marker-icon-'. $tint .'.png';
			},
			'mapbox' => function() {
				return array(
					'id'    => option('sylvainjule.locator.mapbox.id'),
                	'token' => option('sylvainjule.locator.mapbox.token', ''),
				);
			}
		),
    ),
);