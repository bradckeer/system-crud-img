<?php

    include_once '../models/class.Inventory.php';

    $items = new inventory();
    $codeQr = $_POST['code-product'];
    $items->getArticle($codeQr);


?>