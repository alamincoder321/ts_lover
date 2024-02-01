<?php

namespace App\Models;

use App\Models\BasicSettings\CookieAlert;
use App\Models\BasicSettings\PageHeading;
use App\Models\BasicSettings\SEO;
use App\Models\CustomPage\PageContent;
use App\Models\FAQ;
use App\Models\Footer\FooterContent;
use App\Models\Footer\QuickLink;
use App\Models\HomePage\AboutSection;
use App\Models\HomePage\BlogSection;
use App\Models\HomePage\CallToActionSection;
use App\Models\HomePage\CounterInformation;
use App\Models\HomePage\EquipmentSection;
use App\Models\HomePage\Hero\Slider;
use App\Models\HomePage\Hero\StaticSection;
use App\Models\HomePage\Methodology\WorkProcess;
use App\Models\HomePage\Methodology\WorkProcessSection;
use App\Models\HomePage\ProductSection;
use App\Models\HomePage\Prominence\Feature;
use App\Models\HomePage\Prominence\FeatureSection;
use App\Models\HomePage\Testimony\Testimonial;
use App\Models\HomePage\Testimony\TestimonialSection;
use App\Models\Instrument\EquipmentCategory;
use App\Models\Instrument\EquipmentContent;
use App\Models\Instrument\EquipmentModel;
use App\Models\Instrument\Location;
use App\Models\Journal\BlogCategory;
use App\Models\Journal\BlogInformation;
use App\Models\MenuBuilder;
use App\Models\Popup;
use App\Models\Shop\ProductCategory;
use App\Models\Shop\ProductContent;
use App\Models\Shop\ShippingCharge;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'code', 'direction', 'is_default'];

  public function packages()
  {
    return $this->hasMany(Package::class);
  }
  public function pageName()
  {
    return $this->hasOne(PageHeading::class);
  }
}
