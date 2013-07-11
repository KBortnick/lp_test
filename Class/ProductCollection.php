<?php

class ProductCollection {

    private $products = array();
    private $filename;

    public function __construct($filename = 'product_list_input.csv') {
        $this->filename = $filename;
    }
    
    public function setFilename($filename){
        if($filename){
            $this->filename = $filename;
        }
    }

    /** Convert CSV into array of product data arrays * */
    private function parseCSV($filename) {
        $csv = file_get_contents($filename);

        $b = explode("\r", $csv);

        $name_fields = str_getcsv(array_shift($rows));

        $products = array();
        $i = 0;
        foreach ($rows as $row) {
            $fields = str_getcsv($row);
            foreach ($fields as $k => $v) {
                $products[$i][$name_fields[$k]] = $v;
            }
            $i++;
        }
        return $products;
    }

    /** Get collection of Products * */
    public function getProducts() {
        if(empty($this->products)){
            $product_arrays = $this->parseCSV($this->filename);

            foreach ($product_arrays as $details) {
                $this->products[] = new Product($details);
            }
        }
        
        return $this->products;
    }

}