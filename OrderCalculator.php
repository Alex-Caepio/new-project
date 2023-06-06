<?php

interface OrderCalculator
{
    public function calculateOrderPrice($pizzaType, $pizzaSize, $sauce);
}