<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;

class Company extends Model
{
    protected $guarded = [];
    public function brands() {
        return $this->hasMany(Brand::class);
    }
}
