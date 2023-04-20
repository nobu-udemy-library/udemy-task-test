<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
  use HasFactory;

  // * リレーション設定 多対1の関係 関数名は単数
  public function area()
  {
    return $this->belongsTo(Area::class);
  }
}
