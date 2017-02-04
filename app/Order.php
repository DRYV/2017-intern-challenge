<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Order
 * @package App\Services
 *
 * @property-read Collection[Transaction] transactions
 * @property-read Collection[Product] products
 */
class Order extends Model
{
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}