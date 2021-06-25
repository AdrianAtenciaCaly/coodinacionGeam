<?php
include "../load.php";
if (isset($_POST['nombredocente']) && isset($_POST['apellidodocente']) && isset($_POST['nombrecompleto']) && isset($_POST['asignaturedocente']) && isset($_POST['observacionesdocente'])) {
     $db->query("INSERT INTO teacher  VALUES(null,'" . $_POST['nombredocente'] . "','" . $_POST['apellidodocente'] . "','" . $_POST['nombrecompleto'] . "','" . $_POST['asignaturedocente'] . "','" . $_POST['observacionesdocente'] . "'
 )")or die($db->error);
    $session->msg('s', "Docente agregado correctamente.");
    redirect('../../pages/teachers.php', false);
} else {
    $session->msg('d', "Favor de llenar todos los campos. ");
    redirect('../../pages/teachers.php', false);
}
?>