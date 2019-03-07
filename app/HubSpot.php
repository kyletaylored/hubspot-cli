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

  protected $hubspot;

  /**
   * HubSpot constructor.
   */
  public function __construct() {
    {
      $key = config('hubspot.key');
      $oauth = ($o = config('hubspot.oauth')) ? $o : false;
      $base_url = ($b = config('hubspot.base_url')) ? $b : 'https://api.hubapi.com';
      $http_errors = ($h = config('hubspot.http_errors')) ? $h : false;

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