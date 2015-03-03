<?php

class Car{
    private $make_model;
    private $price;
    private $miles;
    private $car_image;

    function worthBuying($max_price)
    {
        return $this->price < ($max_price + 100);
    }


    function worthMiles($max_miles)
    {
        return $this->miles < ($max_miles);
    }

    function __construct($model, $price, $miles, $car_image)
    {
        $this->make_model = $model;
        $this->price = $price;
        $this->miles = $miles;
        $this->car_image = $car_image;
    }

    function setModel($car_model)
    {
        $this->make_model = $car_model;
    }

    function setPrice($car_price)
    {
        $this->price = $car_price;
    }

    function setMiles($car_miles)
    {
        $this->miles = $car_miles;
    }

    function getModel()
    {
        return $this->make_model;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getMiles()
    {
        return $this->miles;
    }

    function getImage()
    {
        return $this->car_image;
    }
}

$porsche = new Car("2014 Porsche 911", 114991, 7864, "porsche.jpg");
$ford = new Car("2011 Ford F450", 55995, 14241, "ford.jpeg");
$lexus = new Car("2013 Lexus RX 350", 44700, 20000, "lexus.jpg");
$mercedes = new Car("Mercedes Benz CLS550", 40000, 38000, "mercedes.jpeg");

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();

foreach ($cars as $car) {
    if ($car->worthBuying($_GET['price']) && $car->worthMiles($_GET['miles'])) {
        array_push($cars_matching_search, $car);
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Your Car Dealership's Homepage</title>
    </head>
    <body>
        <h1>Your Car Dealership</h1>
        <ul>
            <?php

                if (empty($cars_matching_search)) {
                    echo "<p>There are no matches.  Try again.</p>";
                } else {
                    foreach ($cars_matching_search as $car) {
                             $model = $car->getModel();
                             $price = $car->getPrice();
                             $miles = $car->getMiles();
                             $image = $car->getImage();

                             echo "<li> $model </li>";
                             echo "<ul>";
                                 echo "<li><img src= $image ></li>";
                                 echo "<li> Price: $price </li>";
                                 echo "<li> Miles: $miles </li>";
                             echo "</ul>";

                         }
                }

                // if (!empty($cars_matching_search)) {
                //     foreach ($cars_matching_search as $car) {
                //         $model = $car->getModel();
                //         $price = $car->getPrice();
                //         $miles = $car->getMiles();
                //
                //         echo "<li>" . $model . "</li>";
                //         echo "<ul>";
                //             echo "<li>" . $price . "</li>";
                //             echo "<li> Miles:" . $miles . "</li>";
                //         echo "</ul>";
                //
                //     }
                // } else {
                //     echo "<p>There are no matches.  Try again.</p>";
                // }
            ?>
        </ul>
    </body>
</html>
