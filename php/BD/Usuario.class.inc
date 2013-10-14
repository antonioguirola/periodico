<?php


class Usuario extends DataObject {

    public $datos = array(
        "nombreUsuario" => "",
        "password" => "",
        "nombre" => "",
        "apellidos" => "",
        "telefono" => "",
        "fechaNacimiento" => "",
        "email"=>"");

    public static function obtenerUsuarios($filaInicio, $numeroFilas, $orden) {
        $conexion = parent::conectar();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM ". TABLA_USUARIOS ." ORDER BY $orden LIMIT :filaInicio, :numeroFilas";
        #$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM ". TABLA_USUARIOS;
        try {
            $st=$conexion->prepare($sql);
            $st->bindValue(":filaInicio", $filaInicio, PDO::PARAM_INT);
            $st->bindValue(":numeroFilas", $numeroFilas, PDO::PARAM_INT);
            $st->execute();
            $users = array();
            foreach ($st->fetchAll() as $fila) {
                $users[]=new Usuario($fila);
            }
            $st=$conexion->query("SELECT found_rows() AS filasTotales");
            $fila = $st->fetch();
            parent::desconectar($conexion);
            return array($users, $fila["filasTotales"]);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }

    public static function obtenerUsuario($username) {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . TABLA_USUARIOS . " WHERE nombreUsuario = :username";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":username", $username, PDO::PARAM_STR);
            $st->execute();
            $fila = $st->fetch();
            parent::desconectar($conexion);
            if ($fila)
                return new Usuario($fila);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function insertarUsuario($nu,$p,$nom,$ap,$tlf,$nac,$email) { 
        $conexion = parent::conectar();
        $sql = "INSERT INTO " . TABLA_USUARIOS . " VALUES(:username,:passwd,:nombre,:apellidos,:tlf,:fecha,:email)";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":username", $nu, PDO::PARAM_STR);
            $st->bindValue(":passwd", $p, PDO::PARAM_STR);
            $st->bindValue(":nombre", $nom, PDO::PARAM_STR);
            $st->bindValue(":apellidos", $ap, PDO::PARAM_STR);
            $st->bindValue(":tlf", $tlf, PDO::PARAM_INT);
            $st->bindValue(":fecha", $nac, PDO::PARAM_STR);
            $st->bindValue(":email", $email, PDO::PARAM_STR);
            $st->execute();
            parent::desconectar($conexion);
        }catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Inserción fallada: " . $e->getMessage());
        }
    }
}
?>
