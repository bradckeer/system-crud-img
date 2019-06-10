<?php

include 'core/core.php';?>

<?php include HTML_DIR.'config/header.php'; ?>
<body class="vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">    
<?php include HTML_DIR.'config/topNav.php'; ?>
<?php include HTML_DIR.'config/leftNav.php'; ?>

<?php 
if (isset($_GET['view'])) {
  # Verifica sí existe el controlador...
  if (file_exists('core/controllers/' . strtolower($_GET['view']) . 'Controllers.php' )) {
    # Incluye el controlador solicitado...
    include 'core/controllers/' . strtolower($_GET['view']) . 'Controllers.php';    

  } else {
    # Enviar error...
    include 'core/controllers/errorControllers.php';

  }


} else {
  # Envía al index...
  include 'core/controllers/indexControllers.php';

}
?>

<!-- <?php /* include HTML_DIR.'config/aside.php'; */ ?> -->
<?php include HTML_DIR.'config/footer.php'; ?>
</body>
</html> 


