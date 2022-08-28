<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'is_active'
    ];

    /*Every category has Many subcategories */
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
