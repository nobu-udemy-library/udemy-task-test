<?php
namespace App\Services;

class CheckFormService
{
  public static function checkGender($contact)
  {
    // 年齢や性別などはDBへ数値で保存しているため、数値を日本語に変換してviewへ渡す
    if ($contact->gender == 0) {
      $gender = '男性';
    } else {
      $gender = '女性';
    }

    return $gender;
  }

  public static function checkAge($contact)
  {
    if ($contact->age === 1) {
      $age = '~19歳';
    }
    if ($contact->age === 2) {
      $age = '20~29歳';
    }
    if ($contact->age === 3) {
      $age = '30~39歳';
    }
    if ($contact->age === 4) {
      $age = '40~49歳';
    }
    if ($contact->age === 5) {
      $age = '50~59歳';
    }
    if ($contact->age === 6) {
      $age = '60歳~';
    }

    return $age;
  }
}
