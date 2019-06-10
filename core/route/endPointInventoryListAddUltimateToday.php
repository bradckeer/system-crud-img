<?php
header("Content-type: application/json; charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../core.php';

$date = date('Y-m-d');
$strDate = '%'.$date.'%';
getUltimateIdInsert($strDate);

function getUltimateIdInsert($date){

    $db = new ConexionDB();
    $stmt = $db->prepare("SELECT 
            descrip_product,
            marc_product,
            model_product,
            serial_product,
            select_category,
            date_purchase,
            bill_num,
            quantity,
            select_department,
            cost_center,
            warranty_date,
            amount,
            id_user_img,
            register_date,
            code_qr,
            new_or_used,
            status_availability
            FROM inventory
            WHERE register_date LIKE ? ");
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $arr = [];
        $result = $stmt->get_result();

        while($row[] = $result->fetch_assoc()) {
            $arr = $row;
        }
        if(!$arr) {
            echo json_encode('No rows');
            exit();
        }

        echo json_encode($arr);

        $stmt->close();
        $db->close();
}




?>