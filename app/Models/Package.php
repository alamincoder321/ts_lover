<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = ['doller','days','percentage','serial_number','featured','status','icon'];

    public function package_content(){
    return $this->hasMany(PackageContent::class, 'package_id', 'id');
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
