<?php
namespace App;

class Transaction extends Model
{

    public $table = 'transactions';

    protected $fillable = [
        'id',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}