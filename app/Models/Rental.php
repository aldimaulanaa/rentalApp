<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $table = 'rentals'; 

    protected $fillable = [
        'nomor_plat',
        'tanggal_mulai',
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Car', 'nomor_plat', 'nomor_plat');
    }

    public function returnModel()
    {
        return $this->hasOne('App\Models\ReturnModel');
    }
}
