<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug',
        'adult_price',
        'child_price',
    ];

    /**
     * Get the tour translations
     */
    public function translations()
    {
        return $this->hasMany(TourTranslation::class);
    }

    /**
     * Get the tour deals
     */
    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
}
