<?php 


if (!empty($_POST['user']) && !empty($_POST['pass'])) {

    $db = new ConexionDB();

    $data = $db->real_escape_string($_POST['user']);
    $pass = __Encryption($_POST['pass']);

    /* crear una sentencia preparada */
    $sql = $db->prepare('SELECT user_img_pseudonym, user_img_email FROM user_img WHERE (user_img_pseudonym = ? OR user_img_email = ?) AND user_img_encryption = ?');

    if ($sql) {

        /* ligar parámetros para marcadores */
        $sql->bind_param('sss', $data, $data, $pass);
        /* ejecutar la consulta */
        $sql->execute();
         /* ligar variables de resultado */
        $sql->bind_result($user_img_pseudonym, $user_img_email);

        /* obtener valor */
        while ($sql->fetch()) {
            
            printf ("%s (%s)\n", $user_img_pseudonym, $user_img_email);

        }

    } else {

        $sql = $db->prepare('SELECT cod_img_mistakes, description_img_mistakes FROM `img_mistakes` WHERE `cod_img_mistakes`= 1001 OR `cod_img_mistakes`= 1002');
        $sql->execute();
        $sql->bind_result($cod_img_mistakes, $description_img_mistakes);
        
        while ($sql->fetch()) {

            $response[] = array('error' => $cod_img_mistakes, 'status' => $description_img_mistakes);
            
        }

        echo json_encode($response);

    }
    /* cerrar sentencia */
    $sql->close();
    /* cerrar conexión */
    $db->close();
} else {
    # code...
}


?>