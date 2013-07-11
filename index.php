<?php

spl_autoload_register(function ($class) {
    include 'Class/' . $class . '.php';
});

$_productCollection = new ProductCollection();

echo '<pre>';

foreach($_productCollection as $product){
    $details = $product->getData();
    print_r($details);
}
