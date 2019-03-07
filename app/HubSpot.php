<?php
/**
 * Created by PhpStorm.
 * User: kyletaylor
 * Date: 2019-03-06
 * Time: 13:31
 */

namespace App;

use SevenShores\Hubspot\Factory as HubspotFactory;

/**
 * @property \SevenShores\Hubspot\Factory hubspot
 */
class HubSpot {

  public $hubspot;

  /**
   * HubSpot constructor.
   */
  public function __construct() {
    {
      $key = env('HUBSPOT_API_KEY');
      $oauth = ($o = env('HUBSPOT_OAUTH')) ? $o : false;
      $base_url = ($b = env('HUBSPOT_BASE_URL')) ? $b : 'https://api.hubapi.com';
      $http_errors = ($h = env('HUBSPOT_HTTP_ERRORS')) ? $h : false;

      // Kill if no API key.
      if (empty($key)) {
        dd( 'HubSpot API key required in .env file.');
      }

      $hubspot = new HubspotFactory([
        'key'      => $key,
        'oauth'    => $oauth,
        'base_url' => $base_url
      ],
        null,
        [
          'http_errors' => $http_errors
        ],
        false // return Guzzle Response object for any ->request(*) call
      );

      $this->hubspot = $hubspot;
    }
  }
}