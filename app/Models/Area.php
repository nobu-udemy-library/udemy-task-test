<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  use HasFactory;

  // * リレーション設定 1対多の関係 関数名は複数形
  public function shops()
  {
    return $this->hasMany(Shop::class);
  }
}
