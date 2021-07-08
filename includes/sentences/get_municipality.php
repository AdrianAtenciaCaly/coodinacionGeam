<?php
require_once('../load.php');
$query = $db->query("select * from municipality where id_department= '$_GET[departamentoadd]'");
$municipality = array();
while ($r = $query->fetch_object()) {
    $municipality[] = $r;
}
if (count($municipality) > 0) {
    print "<option value='' selected disabled hidden>Seleccione una opción </option>    ";
    foreach ($municipality as $municipality) {
        print "<option value='$municipality->id_municipality'>$municipality->name_municipality</option>";
    }
} else {
    print "<option value=''>-- NO HAY DATOS --</option>";
}
?>