<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RechargePackageContent extends Model
{
    use HasFactory;
  protected $fillable = ['recharge_package_id', 'title', 'language_id'];
}
