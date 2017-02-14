<?php

require __DIR__  . '/../config/database.php';


class CashRegisterTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \App\Order $order
     */
    protected $order;

    /**
     * @var \App\Services\CashRegister $cashRegister
     */
    protected $cashRegister;

    public function setUp()
    {
        $order = \App\Order::with(['products', 'transactions'])->find(1);
        $this->order = $order;

        $this->cashRegister = new \App\Services\CashRegister();
    }

    public function testGetTransactionTotal()
    {
        $total = $this->cashRegister->getTransactionTotal($this->order);

        $this->assertEquals(\Money\Money::class, get_class($total));
        $this->assertEquals('1000', $total->getAmount());
        $this->assertEquals('USD', $total->getCurrency()->getCode());
    }

    public function testGetProductTotal()
    {
        $total1 = $this->cashRegister->getProductTotal($this->order);
		
		$this->assertEquals(\Money\Money::class, get_class($total1));
		$this->assertEquals('1000', $total1->getAmount());
        $this->assertEquals('USD', $total1->getCurrency()->getCode());
    }

    public function testProductTotalEqualsTransactionTotal()
    {
        $total = $this->cashRegister->getTransactionTotal($this->order);
		$total1 = $this->cashRegister->getProductTotal($this->order);

		
		$this -> assertEquals($total->getAmount(), $total1->getAmount());
        $this -> assertEquals($total->getCurrency()->getCode(), $total1->getCurrency()->getCode());
    }
}