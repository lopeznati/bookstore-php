<?php
   session_start();
   unset($_SESSION); //Vacia la session
    
   session_destroy(); //destruye o termina la sesion pero no siempre funciona conviene hacer unset
   die(header('Location:signin.php'));
 ?>   