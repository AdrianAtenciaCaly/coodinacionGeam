<?php
include "../load.php";

if (isset($_POST['iddocenteeditar']) && isset($_POST['nombredocenteeditar']) && isset($_POST['apellidodocenteeditar']) && isset($_POST['nombrecompletoeditar']) && isset($_POST['asignaturedocenteeditar']) && isset($_POST['observacionesdocenteeditar'])) {
     $db->query("UPDATE teacher SET  names_teacher ='" . $_POST['nombredocenteeditar'] . "',
     surnames_teacher =  '" . $_POST['apellidodocenteeditar'] . "',
     fullname_teacher = '" . $_POST['nombrecompletoeditar'] . "',
     subject_teacher= '" . $_POST['asignaturedocenteeditar'] . "',
     observations_teacher = '" . $_POST['observacionesdocenteeditar'] . "' WHERE id_teacher = '" . $_POST['iddocenteeditar'] . "';")or die($db->error);
    $session->msg('s', "Docente actualizado correctamente.");
    redirect('../../pages/teachers.php', false);
} else {
    $session->msg('d', "Favor de llenar todos los campos. ");
    redirect('../../pages/teachers.php', false);
}
