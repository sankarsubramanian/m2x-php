<?php

namespace Att\M2X;

class Device extends Resource {

/**
 * REST path of the resource
 *
 * @var string
 */
  public static $path = '/devices';

/**
 * The Key resource properties
 *
 * @var array
 */
  protected static $properties = array(
  	'name', 'description', 'visibility', 'groups'
  );

/**
 * The resource id for the REST URL
 *
 * @return string
 */
  public function id() {
  	return $this->id;
  }

/**
 * Get location details of the device, will return False if no 
 * location details are available. Otherwise it will return
 * an array with the details.
 *
 * @return array|boolean
 */
  public function location() {
  	$response = $this->client->get(self::$path . '/' . $this->id . '/location');
  	
  	if ($response->statusCode == 204) {
  		return False;
  	}

  	return $response->json();
  }
}
