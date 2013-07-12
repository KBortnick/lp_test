<?php
    spl_autoload_register(function ($class) {
        include 'Class/' . $class . '.php';
    });

    $_productCollection = new ProductCollection();

    $preferences = array(
        'sweetness',
        'acidity',
        'bitterness',
        'roast',
        'intensity',
        'complexity',
        'structure'
    );

    $sortable = array();
    $weighted = array();
    foreach ($_productCollection->getProducts() as $k => $product){
        $sortable[(string)$k] = $product;
        $weight = 0;
        foreach($_GET['pref'] as $sp){
            if(in_array($sp,$preferences)){
                $val = $product->getData($sp);
                if($val){
                    $weight += $val;
                }
            }
        }
        $weighted[(string)$k] = $weight;
    }
    arsort($weighted);
?>

<html>
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="wrapper">
            <form action="" method="GET">
                <strong>Personal Preferences:</strong> <br>
                <?php print_r($_GET['pref']); ?>
                <?php 
                    foreach($preferences as $pref){
                    ?>
                        <input type="checkbox" name="pref[]" value="<?php echo $pref; ?>" <?php
                               if(isset($_GET['pref']) && in_array($pref,$_GET['pref'])){ echo 'checked="checked"'; }
                               ?> /><?php echo $pref; ?> <br>
                    <?php
                    }
                ?>
                <input type="submit" name="submit" value="Search" />
            </form>
        </div>
        <div class="wrapper">
            <?php
                foreach($weighted as $key){
                    $product = $sortable[$key];
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
