<?php
require_once('load.php');

//FUNCION PARA VERIFICAR CONEXION

function verificarConexionBD()
{
  global $db;
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  /* comprobar si el servidor sigue vivo */
  if ($mysqli->ping()) {
    printf("¡La conexión está con la BD bien!\n");
  } else {
    printf("Error: %s\n", $mysqli->error);
  }
  if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
  }
}

/**
 * función para buscar todas las filas de la tabla de base de datos por nombre de tabla
 *
 * @return   
 * @param string $table tabla a buscar 
 */
function find_all($table)
{
  global $db;
  if (tableExists($table)) {
    return find_by_sql("SELECT * FROM " . $db->escape($table));
  }
}

/**
 * Función para realizar consultas
 *
 * @return   result_set   resultado de la consulta 
 * @param string $sql a ejecutar
 */
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
  return $result_set;
}

/**
 * Función para buscar datos de la tabla por id
 *
 * @return   result   resultado de la consulta 
 * @param string $table  la tabla a buscar, $id id a buscar
 */
function find_by_id($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}'");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}

/**
 * Función para buscar datos de la tabla por id de usuario 
 *
 * @return   result   resultado de la consulta
 * @param string $table  la tabla a buscar, $id id a buscar
 */
function find_by_id_user($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}'");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}


/**
 * Función para buscar datos de la tabla por id de caja 
 *
 * @return   boolean true si se elimina o false si no se encuentra la id
 * @param string $table  la tabla a buscar, $id id a buscar
 */
function delete_by_id($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $sql = "DELETE FROM " . $db->escape($table);
    $sql .= " WHERE idbox=" . $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}

/**
 * Función para determinar si la tabla existe 
 * @return boolean true si existe o false si no
 * @param string $table  la tabla a buscar. 
 */
function tableExists($table)
{
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM ' . DB_NAME . ' LIKE "' . $db->escape($table) . '"');
  if ($table_exit) {
    if ($db->num_rows($table_exit) > 0)
      return true;
    else
      return false;
  }
}
/**
 * Función para validar inicio de session
 * @return $user  si es valido o falso si no 
 * @param string $username , $password 
 */
function authenticate($username = '', $password = '')
{
  global $db;
  $username = $db->escape($username);
  $password = $db->escape($password);
  // $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
  $sql  = sprintf("SELECT id,iduser,password FROM users WHERE iduser ='%s' LIMIT 1", $username);
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $user = $db->fetch_assoc($result);
    $password_request = sha1($password);
    if ($password_request === $user['password']) {
      return $user['id'];
    }
  }
  return false;
}

/**
 * Función para validar si el usuario es administrado o secretaria
 *  @return result 
 * @param string $require_level
 */
function page_require_tipo($require_level)
{
  global $session;
  global $db;
  $sql = "SELECT tipo FROM users WHERE   tipo = '$require_level'";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}


/**
 * Función para econtrar  el usuario de inicio de sesión actual por ID de sesión
 *  @return current_user 
 * 
 */
function current_user()
{
  static $current_user;
  global $db;
  if (!$current_user) {
    if (isset($_SESSION['user_id'])) :
      $user_id = intval($_SESSION['user_id']);
      $current_user = find_by_id('users', $user_id);
    endif;
  }
  return $current_user;
}

/**
 * Función para actualizar la fecha y hora de inicio de session.
 *  @return boolean true o false 
 * @param string $user_id
 */

function updateLastLogIn($user_id)
{
  global $db;
  $date = make_date();
  $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
  $result = $db->query($sql);
  return ($result && $db->affected_rows() === 1 ? true : false);
}



function findAllTeachers()
{
  global $db;
  $sql  = "SELECT t.id_teacher,
   t.names_teacher,
    t.surnames_teacher , 
    t.fullname_teacher ,
     t.observations_teacher ,
     t.status, 
     s.name_subject FROM teacher  t INNER JOIN subject s  ON s.id_subject = t.subject_teacher  ORDER BY  id_teacher DESC";
  return find_by_sql($sql);
}

function findAllsubject()
{
  global $db;
  $sql  = "SELECT * FROM subject ORDER BY  id_subject DESC";
  return find_by_sql($sql);
}


function findAllgroup()
{
  global $db;
  $sql  = "SELECT * FROM troop ORDER BY  id_group DESC";
  return find_by_sql($sql);
}
function findAllasistance()
{
  global $db;
  $sql  = "SELECT a.id_assistance, 
  a.date_assistance, 
  a.start_time_assistance,
  a.end_time_assistance,
  a.time_elapsed_assistance,
  c.name_colleges,
  t.fullname_teacher,
  s.name_subject, 
  a.socialized_material_assistance, 
  a.main_theme_assistance, 
  g.name_group, 
  a.evidence_assistance
  FROM assistance a INNER JOIN teacher t ON 
  a.teacher_assistance= t.id_teacher INNER JOIN subject s ON 
  t.subject_teacher = s.id_subject INNER JOIN troop g ON 
  a.group_assistance = g.id_group INNER JOIN colleges c ON  c.id_colleges = a.id_colleges ORDER BY  id_assistance DESC  ";
  return find_by_sql($sql);
}
function findAllasistancePdo()
{
  global $pdo;
  $sql  =  $pdo->prepare("SELECT a.id_assistance, 
  a.date_assistance, 
  a.start_time_assistance,
  a.end_time_assistance,
  a.time_elapsed_assistance,
  t.fullname_teacher,
  s.name_subject, 
  a.socialized_material_assistance, 
  a.main_theme_assistance, 
  a.institution_assistance, 
  g.name_group, 
  a.evidence_assistance
  FROM assistance a INNER JOIN teacher t ON 
  a.teacher_assistance= t.id_teacher INNER JOIN subject s ON 

  t.subject_teacher = s.id_subject INNER JOIN troop g ON 
  a.group_assistance = g.id_group  ORDER BY  id_assistance DESC");
  return find_by_sql($sql);
}
function findAllasistanceLimit()
{
  global $db;
  $sql  = "SELECT a.id_assistance, 
  a.date_assistance, 
  a.start_time_assistance,
  a.end_time_assistance,
  a.time_elapsed_assistance,
  c.name_colleges,
  t.fullname_teacher,
  s.name_subject, 
  a.socialized_material_assistance, 
  a.main_theme_assistance, 
  g.name_group, 
  a.evidence_assistance
  FROM assistance a INNER JOIN teacher t ON 
  a.teacher_assistance= t.id_teacher INNER JOIN subject s ON 
  t.subject_teacher = s.id_subject INNER JOIN troop g ON 
  a.group_assistance = g.id_group INNER JOIN colleges c ON  c.id_colleges = a.id_colleges LIMIT 100";

  return find_by_sql($sql);
}


function findAllstudents()
{
  global $db;
  $sql  = " SELECT s.id_students,
  s.identification_students,
  s.names_students,
  g.name_group
   FROM students  s INNER JOIN  troop g ON g.id_group = s.group_students ORDER BY  id_students DESC";
  return find_by_sql($sql);
}


function findGroup($id)
{
  global $db;
  $sql = " SELECT * FROM troop  WHERE  id_group = '$id' limit 1";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}

function countGroup()
{
  global $db;
  $sql  = "SELECT COUNT(*) as total FROM troop";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}
function countAsistence()
{
  global $db;
  $sql  = "SELECT COUNT(*) as total FROM assistance";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}
function countTeacher()
{
  global $db;
  $sql  = "SELECT COUNT(*) as total FROM teacher";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}

function countStudentsGroup($id_group)
{
  global $db;
  $sql  = "select COUNT(*) as total  from students WHERE group_students = '.$id_group.'";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}


function groupById($id_group)
{
  global $db;
  $sql  = "select *  from troop WHERE id_group = '.$id_group.'";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}
function findAllstudentsById($id_group)
{
  global $db;
  $sql  = "SELECT s.id_students,
  s.identification_students,
  s.names_students,
  g.name_group,
  g.cod_group
   FROM students  s INNER JOIN  troop g ON g.id_group = s.group_students WHERE g.id_group=" . $id_group . "";
  return find_by_sql($sql);
}

function findSubjectById($nameSubeject)
{
  global $db;
  $sql  = "SELECT s.id_subject from teacher t INNER JOIN subject s 
  ON s.id_subject = t.subject_teacher WHERE s.name_subject = '" . $nameSubeject . "' LIMIT 1";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}


function findAllDepartaments()
{
  global $db;
  $sql  = "SELECT * FROM department ";
  return find_by_sql($sql);
}

function findAllInstitutions()
{
  global $db;
  $sql  = "SELECT c.name_colleges,d.name_department,m.name_municipality  FROM colleges c 
  INNER JOIN municipality m ON m.id_municipality = c.id_municipality INNER JOIN 
  department d ON d.id_department= m.id_municipality ORDER BY id_colleges DESC";
  return find_by_sql($sql);
}

function countInstitutions()
{
  global $db;
  $sql  = "SELECT COUNT(*) as total from colleges limit 1";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}

