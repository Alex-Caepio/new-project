<?php

require_once 'OrderCalculator.php';
require_once 'DatabaseConnector.php';
require_once 'CurrencyConverter.php';

class PizzaOrderCalculator implements OrderCalculator
{
    private $dbConnector;
    private $currencyConverter;

    public function __construct()
    {
        $this->dbConnector = new DatabaseConnector();
        $this->currencyConverter = new CurrencyConverter();
    }

    public function calculateOrderPrice($pizzaType, $pizzaSize, $sauce)
    {
        $pizzaPriceUSD = $this->dbConnector->getPizzaPrice($pizzaType);
        $sizeMultiplier = $this->getSizeMultiplier($pizzaSize);
        $saucePriceUSD = $this->dbConnector->getSaucePrice($sauce);

        $exchangeRate = $this->currencyConverter->getExchangeRate();

        if (!$exchangeRate) {
            echo 'Не удалось получить актуальный курс валют.' . '<br/>';
            return 0;
        }

        $pizzaPriceBYN = $pizzaPriceUSD * $exchangeRate;
        $saucePriceBYN = $saucePriceUSD * $exchangeRate;

        $totalPrice = $pizzaPriceBYN * $sizeMultiplier + $saucePriceBYN;

        return round($totalPrice, 2);
    }

    private function getSizeMultiplier($pizzaSize)
    {
        switch ($pizzaSize) {
            case '21':
                return 1;
            case '26':
                return 1.2;
            case '31':
                return 1.5;
            case '45':
                return 2;
            default:
                return 1;
        }
    }
}

