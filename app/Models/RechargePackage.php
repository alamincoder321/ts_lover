<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargePackage extends Model
{
    use HasFactory;
  protected $fillable = ['doller', 'serial_number', 'featured', 'status','icon'];

  public function package_content()
  {
    return $this->hasMany(RechargePackageContent::class, 'recharge_package_id', 'id');
  }

  // deleting
  protected static function boot()
  {
    parent::boot();
    static::deleting(function ($category) {
      $category->package_content()->delete();
    });
  }
}
