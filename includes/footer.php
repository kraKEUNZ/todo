// declaration de notre footer ou nous avons demandé l'éxecution des scripts afin de le réutiliser
<?php
    foreach($scripts as $script){
        echo "<script src=\"../js/$script\"></script>";
    }
?>
</body>
</html>
