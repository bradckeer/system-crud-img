<?php 

namespace fetch;

include 'core/core.php';


if ($_REQUEST) {
    switch (isset($_GET['mode']) ? $_GET['mode'] : null ) {
        case 'login_user':

            require 'core/bin/fetch_async_user/'.$_GET['mode'].'.php';
            
            break;
        case 'register_user':

            require 'ore/bin/fetch_async_user/'.$_GET['mode'].'.php';

            break;
        case 'lostPass_user':

            require 'ore/bin/fetch_async_user/'.$_GET['mode'].'.php';

            break;    
        default:

            header('location: index.php?view=index');
            break;

    }
} else {
    
}


?>