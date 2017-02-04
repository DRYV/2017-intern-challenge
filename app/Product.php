<?php
namespace App\Services;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'quantity',
        'amount',
        'currency'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}