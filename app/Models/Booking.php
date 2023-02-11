<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tour_id',
        'client_id',
        'adults_count',
        'children_count',
        'adult_price',
        'child_price',
        'total_price',
        'date',
    ];

    /**
     * Get the tour associated with the booking.
     */
    public function tour()
    {
        return $this->hasOne(Tour::class);
    }

    /**
     * Get the client associated with the booking.
     */
    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
