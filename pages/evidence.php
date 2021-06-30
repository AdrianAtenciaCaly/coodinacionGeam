<?php
if (!isset($_GET['evicencia'])) {
    echo "ERROR,  HUBO UN ERROR AL LEER LA EVIDENVIA";
    echo "   <button onclick='window.close();'>Cerrar esta ventana </button> ";
} else {
?>
    <embed src="../uploads/evidences/<?php echo $_GET['evicencia']; ?>" type="application/pdf" id="visual" name="visual" width="100%" height="1000px" />
<?php } ?>