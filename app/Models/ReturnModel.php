<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnModel extends Model
{
    protected $table = 'returns'; 

    protected $fillable = [
        'rental_id',
        'tanggal_pengembalian',
        'jumlah_hari',
        'total_biaya',
    ];

    public function rental()
    {
        return $this->belongsTo('App\Models\Rental');
    }
}
