<?php
/**
 * Created by PhpStorm.
 * User: mickeyschwab
 * Date: 2/3/17
 * Time: 6:05 PM
 */

namespace App\Services;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}