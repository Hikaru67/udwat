<?php

if (!function_exists('checkHavingAccess')) {
  function checkHavingAccess(int $roles, int $access)
  {
      $checking = $roles & $access;

      return $checking > 0 ? true : false;
  }
}