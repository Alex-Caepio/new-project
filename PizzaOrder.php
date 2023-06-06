<?php

require_once 'PizzaOrderCalculator.php';

class PizzaOrder
{
    private $pizzaType;
    private $pizzaSize;
    private $sauce;

    public function __construct($pizzaType, $pizzaSize, $sauce)
    {
        $this->pizzaType = $pizzaType;
        $this->pizzaSize = $pizzaSize;
        $this->sauce = $sauce;
    }

    public function calculateOrderPrice()
    {
        $calculator = new PizzaOrderCalculator();
        $totalPrice = $calculator->calculateOrderPrice($this->pizzaType, $this->pizzaSize, $this->sauce);
        return $totalPrice;
    }

    public function getOrderSummary()
    {
        $totalPrice = $this->calculateOrderPrice();
        $orderSummary = "Пицца: $this->pizzaType<br>";
        $orderSummary .= "Размер: $this->pizzaSize см<br>";
        $orderSummary .= "Соус: $this->sauce<br>";
        $orderSummary .= "Цена: $totalPrice BYN";
        return $orderSummary;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pizzaType = $_POST['pizzaType'];
    $pizzaSize = $_POST['pizzaSize'];
    $sauce = $_POST['sauce'];

    $pizzaOrder = new PizzaOrder($pizzaType, $pizzaSize, $sauce);
    $orderSummary = $pizzaOrder->getOrderSummary();

    echo $orderSummary;
}
