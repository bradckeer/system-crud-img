<?php
header("Content-type: application/json; charset=utf-8");


include '../core.php';

if($_POST){
    $descripProduct = $_POST["descrip-product"];
    $marcProduct = $_POST["marc-product"];
    $modelProduct = $_POST["model-product"];
    $serialProduct = $_POST["serial-product"];
    $selectCategory = $_POST["select-category"];
    $datePurchase = $_POST["date-purchase"];
    $billNum = $_POST["bill-num"];
    $quantity = $_POST["quantity"];
    $selectDepartment = $_POST["select-department"];
    $costCenter = $_POST["cost-center"];
    $warrantyDate = $_POST["warranty-date"];
    $amount = number_format($_POST["amount"], 2, '.', '');
    $conditionNew = $_POST["condition-new"];
    $conditionUsed = $_POST["condition-used"];
    
    if ($descripProduct !== '' && $marcProduct !== '' && $modelProduct !== '' && $serialProduct !== '' && $selectCategory !== '' && $datePurchase !== '' && $billNum !== '' && $quantity !== '' && $selectDepartment !== '' && $costCenter !== '' && $warrantyDate !== '' && $amount !== '') {
        

        $db = new ConexionDB();
        //$db->query('SELECT * FROM conexiondb WHERE id = 1 LIMIT 1');

        $userImg = 13;
        $registerDate = date('Y-m-d H:i:s',time());

        $descripProduct = $db->real_escape_string(mb_convert_case($descripProduct, MB_CASE_UPPER, "UTF-8"));
        $marcProduct = $db->real_escape_string(mb_convert_case($marcProduct, MB_CASE_UPPER, "UTF-8"));
        $modelProduct = $db->real_escape_string(mb_convert_case($modelProduct, MB_CASE_UPPER, "UTF-8"));
        $serialProduct = $db->real_escape_string(mb_convert_case($serialProduct, MB_CASE_UPPER, "UTF-8"));
        $selectCategory = $db->real_escape_string($selectCategory);
        $datePurchase = $datePurchase;
        $billNum = $db->real_escape_string(mb_convert_case($billNum, MB_CASE_UPPER, "UTF-8"));
        $quantity = $db->real_escape_string($quantity);
        $selectDepartment = $db->real_escape_string($selectDepartment);
        $costCenter = $db->real_escape_string(mb_convert_case($costCenter, MB_CASE_UPPER, "UTF-8"));
        $warrantyDate = $warrantyDate;
        $amount = $db->real_escape_string($amount);

        $codeQr = mb_convert_case(trim($serialProduct).md5($registerDate), MB_CASE_UPPER);
        
        $ArticleNew = ($conditionNew === true) ? 1 : 0;
        $ArticleUsed = ($conditionUsed === true) ? 2 : 0;

        $ArticleCondition = ($ArticleNew === 1) ? $ArticleNew : $ArticleUsed;

        $status_availability = 1;
    
        try {

            $db->autocommit(false);
            $stmt = $db->prepare("INSERT INTO inventory(
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
                )VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $stmt->bind_param("ssssissiissdsssii", $descripProduct, $marcProduct, $modelProduct, $serialProduct, $selectCategory, $datePurchase, $billNum, $quantity, $selectDepartment, $costCenter, $warrantyDate, $amount, $userImg, $registerDate, $codeQr, $ArticleCondition, $status_availability);

            $stmt->execute();
            $ultimateIdInsert = $db->insert_id;

            $db->commit();
            $stmt->close();

            getUltimateIdInsert($ultimateIdInsert);

        } catch (\Throwable $th) {
                
                $db->rollback();
                $error = $db->errno . ' ' . $db->error;
                echo $error;
                die('Error: ' .  $th->getMessage());
        }

    } else {
        echo json_encode(false);
    }
}

    function getUltimateIdInsert($id){

        $db = new ConexionDB();

        $stmt = $db->prepare("SELECT 
                id_inventory,
                descrip_product, 
                marc_product,
                model_product,
                serial_product,
                date_purchase,
                bill_num,
                quantity,
                select_department,
                cost_center,
                warranty_date,
                amount 
                FROM inventory
                WHERE id_inventory = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $arr = [];
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()) {
                $arr = $row;
            }
            if(!$arr) exit('No rows');
            
            echo json_encode($arr);

            $stmt->close();
            $db->close();
    }







?>