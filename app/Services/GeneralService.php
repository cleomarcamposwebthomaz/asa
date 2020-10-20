<?php

namespace App\Services;

use DB;

class GeneralService
{
  /**
   * Retrieves the acceptable enum fields for a column
   *
   * @param string $column Column name
   *
   * @return array
   */
  public static function getPossibleEnumValues($table, $column)
  {
    $arr = DB::select(DB::raw('SHOW COLUMNS FROM ' . $table . ' WHERE Field = "' . $column . '"'));
    if (count($arr) == 0) {
      return array();
    }
    // Pulls column string from DB
    $enumStr = $arr[0]->Type;

    // Parse string
    preg_match_all("/'([^']+)'/", $enumStr, $matches);

    // Return matches
    return isset($matches[1]) ? $matches[1] : [];
  }
}