<?php

class DatabaseConnector
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "pizza_db";
    private $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if (!$this->connection) {
            die("Ошибка подключения к базе данных: " . mysqli_connect_error());
        }
    }

    public function getPizzaPrice($pizzaType)
    {
        $pizzaType = $this->sanitizeInput($pizzaType);

        $query = "SELECT price FROM pizzas WHERE type = '$pizzaType'";
        $result = mysqli_query($this->connection, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            return $row['price'];
        }

        return 0;
    }

    public function getSaucePrice($sauce)
    {
        $sauce = $this->sanitizeInput($sauce);

        $query = "SELECT price FROM sauces WHERE type = '$sauce'";
        $result = mysqli_query($this->connection, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            return $row['price'];
        }

        return 0;
    }

    private function sanitizeInput($input)
    {
        $input = mysqli_real_escape_string($this->connection, $input);
        $input = htmlspecialchars($input);
        return $input;
    }
}


