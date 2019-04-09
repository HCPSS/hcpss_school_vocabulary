<?php

namespace Drupal\hcpss_school_vocabulary;

/**
 * A class for querying the HCPSS school api.
 */
class SchoolQuery {

  /**
   * An array of all school data json decoded.
   *
   * @var array
   */
  private $schools;

  /**
   * This is where the api is.
   *
   * @var string
   */
  private static $apiEndpoint = 'https://api.hocoschools.org';

  /**
   * Store school data;
   *
   * @var array
   */
  private static $data;

  /**
   * Get the school data.
   *
   * @return array
   *   School data keyed by acronym.
   */
  public static function getData()
  {
    if (self::$data === null) {
      $json = file_get_contents(self::$apiEndpoint . "/schools.json");
      $result = json_decode($json, true)['schools'];

      foreach ($result as $acronyms) {
        foreach ($acronyms as $acronym) {
          $json = file_get_contents(self::$apiEndpoint . "/schools/{$acronym}.json");
          self::$data[$acronym] = json_decode($json, true);
        }
      }
    }

    return self::$data;
  }
}
