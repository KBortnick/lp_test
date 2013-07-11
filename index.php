<?php

spl_autoload_register(function ($class) {
    include 'Class/' . $class . '.php';
});

$_productCollection = new ProductCollection();
?>

<html>
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        
        <div class="wrapper">
            <?php
                foreach($_productCollection->getProducts() as $product){
                    ?>
                    <div class="item" id="<?php echo $product->getData('handle'); ?>">
                        <div class="thumb">
                            <img src="images/<?php echo $product->getData('handle'); ?>.jpg">
                        </div>
                        <div class="data">
                            <h3><?php echo $product->getData('name'); ?></h3><br>
                            <button class="view_more">More Details</button>
                        </div>
                    </div>
            
                    <div class="item-more" id="<?php echo $product->getData('handle'); ?>-data">
                        <?php
                            foreach($product->getData as $key => $value){
                                echo $key . ': ' . $value . '<br>';
                            }
                        ?>
                    </div>
                    <?php
                }
            ?>
        </div>
    </body>
</html>
echo '<pre>';
