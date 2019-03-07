<?php

return [

  // HubSpot API credentials.
  'hubspot' => [
    'key' => env('HUBSPOT_API_KEY'),
    'base_url' => env('HUBSPOT_BASE_URL'),
    'oauth' => env('HUBSPOT_OAUTH'),
    'http_errors' => env('HUBSPOT_HTTP_ERRORS')
  ]

];