<?php
  require_once "libs/dao.php";
/*
    SELECT `dinosaurios`.`iddinosaurios`,
        `dinosaurios`.`dinosauriosNombre`,
        `dinosaurios`.`dinosauriosPeso`,
        `dinosaurios`.`dinosauriosClase`,
        `dinosaurios`.`dinosauriosEpoca`
    FROM `dinosaurios`.`dinosaurios`;
*/

  function obtenerListas()
  {
      $sqlstr = "select `dinosaurios`.`iddinosaurios`,
          `dinosaurios`.`dinosauriosNombre`,
          `dinosaurios`.`dinosauriosPeso`,
          `dinosaurios`.`dinosauriosClase`,
          `dinosaurios`.`dinosauriosEpoca`
      from `dinosaurios`.`dinosaurios`";

      $dinosaurios = array();
      $dinosaurios = obtenerRegistros($sqlstr);
      return $dinosaurios;
  }

  function obtenerEpocaPorId($id)
  {
    $sqlstr="select `dinosaurios`.`dinosauriosEpoca`
          from `dinosaurios`.`dinosaurios` where iddinosaurios=%d";
    $dinosaurios= array();
    $dinosaurios=obtenerUnRegistro(sprintf($sqlstr, $id));
    return $dinosaurios;
  }


  function obtenerEpocas()
  {
      return array(
          array("cod"=>"CRE", "dsc"=>"Crétasico"),
          array("cod"=>"JUR", "dsc"=>"Jurásico"),
          array("cod"=>"TRI", "dsc"=>"Triásico")
      );
  }

  function agregarNuevoDinosaurio($nombre, $peso, $clase, $epoca) {
      $insSql = "INSERT INTO dinosaurios(dinosauriosNombre, dinosauriosPeso, dinosauriosClase, dinosauriosEpoca)
        values ('%s', %f, '%s', '%s');";
        if (ejecutarNonQuery(
            sprintf(
                $insSql,
                $nombre,
                $peso,
                $clase,
                $epoca
            )))
        {
          return getLastInserId();
        } else {
            return false;
        }
  }

  function obtenerDinosaurioPorId($id)
  {
    $sqlstr = "select `dinosaurios`.`iddinosaurios`,
        `dinosaurios`.`dinosauriosNombre`,
        `dinosaurios`.`dinosauriosPeso`,
        `dinosaurios`.`dinosauriosClase`,
        `dinosaurios`.`dinosauriosEpoca`
    from `dinosaurios`.`dinosaurios` where iddinosaurios=%d";
    $dinosaurios= array();
    $dinosaurios=obtenerUnRegistro(sprintf($sqlstr, $id));
    return $dinosaurios;
  }

  function modificarDinosaurio($nombre, $peso, $clase, $epoca, $iddinosaurios)
  {
      $updSQL = "UPDATE dinosaurios set dinosauriosNombre='%s', dinosauriosPeso=%f,
      dinosauriosClase='%s', dinosauriosEpoca='%s' where iddinosaurios=%d;";

      return ejecutarNonQuery(
          sprintf(
              $updSQL,
              $nombre,
              $peso,
              $clase,
              $epoca,
              $iddinosaurios
          )
      );
  }

?>
