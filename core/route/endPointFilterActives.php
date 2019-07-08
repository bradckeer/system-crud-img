<?php

    include_once '../models/class.Inventory.php';

    if ($_POST) {


        $items = new inventory();
        $data = strtoupper($_POST['search-item']);
        if ($data) {
            $items->getFilterArticle($data);
        }

    }
    

    




    

?>