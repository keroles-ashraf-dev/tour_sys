<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tour_id',
        'min_adults_count',
        'min_children_count',
        'adult_discount',
        'child_discount',
    ];

    /**
     * Get the tour that owns the deal
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
