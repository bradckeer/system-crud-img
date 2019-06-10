<?php


function __Encryption($encrypting){

    $cost = strlen($encrypting) ? strlen($encrypting) : 10;
  
    $bytes = bin2hex(random_bytes($cost));
    $hash = password_hash($bytes, PASSWORD_DEFAULT, ['cost' => $cost]);
  
    $encoded = base64_encode($bytes . $hash);
    
    
    return $encoded;
  
  }
  
  
  
  
  
?>