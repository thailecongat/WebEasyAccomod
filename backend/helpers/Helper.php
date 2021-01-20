<?php

class Helper
{
  const STATUS_INACTIVE = 0;
  const STATUS_INACTIVE_TEXT = "Disabled";
  const STATUS_ACTIVE = 1;
  const STATUS_ACTIVE_TEXT = 'Active';
//::
  public static function getStatusText($status)
  {
    $status_text = '';
    switch ($status) {
      case self::STATUS_INACTIVE:
        $status_text = self::STATUS_INACTIVE_TEXT;
        break;
      case self::STATUS_ACTIVE:
        $status_text = self::STATUS_ACTIVE_TEXT;
        break;
      default:
        $status_text = 'Not set';
    }

    return $status_text;
  }
}