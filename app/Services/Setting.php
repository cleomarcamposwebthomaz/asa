<?php

namespace App\Services;

use App\Models\Setting as ModelsSetting;

class Setting
{
  protected $setting;

  /**
   * Class constructor.
   */
  public function __construct(ModelsSetting $setting = null)
  {
    $this->setting = $setting;
  }

  public function getSetting($name, $field  = 'value')
  {
    $setting = $this->setting->query()->where('name', $name)->first();

    if ($field !== '*') {
      return $setting->{$field};
    }

    return $setting;
  }
}