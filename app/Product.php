<?php
namespace App;

class Product extends Model
{
    public $table = 'products';

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