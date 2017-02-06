<?php

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Created by PhpStorm.
 * User: mickeyschwab
 * Date: 2/3/17
 * Time: 6:33 PM
 */
class CashRegisterTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \App\Services\Order $order
     */
    protected $order;

    /**
     * @var \App\Services\CashRegister $cashRegister
     */
    protected $cashRegister;

    public function setUp()
    {
        $order = new \App\Services\Order();

        $product1 = new \App\Services\Product([
            'quantity' => 2,
            'amount' => 100,
            'currency' => 'USD'
        ]);
        $product1->order()->associate($order);

        $product2 = new \App\Services\Product([
            'quantity' => 3,
            'amount' => 100,
            'currency' => 'USD'
        ]);
        $product2->order()->associate($order);

        $transaction1 = new \App\Services\Transaction([
            'status' => 'FAILED',
            'amount' => 100,
            'currency' => 'USD'
        ]);
        $transaction1->order()->associate($order);

        $transaction2 = new \App\Services\Transaction([
            'status' => 'COMPLETE',
            'amount' => 100,
            'currency' => 'USD'
        ]);
        $transaction2->order()->associate($order);

        $this->order = $order;

        $this->cashRegister = new \App\Services\CashRegister();
    }

    public function testGetTransactionTotal()
    {
        $total = $this->cashRegister->getTransactionTotal($this->order);

        $this->assertEquals(\Money\Money::class, get_class($total));
        $this->assertEquals('500', $total->getAmount());
        $this->assertEquals('USD', $total->getCurrency()->getCode());
    }

	public function testGetProductTotal()
    {
        $total = $this->cashRegister->getProductTotal($this->order);
		echo ($total);

        $this->assertEquals(\Int\Int::class, get_class($total));
        $this->assertEquals('5', $total);
    }
}