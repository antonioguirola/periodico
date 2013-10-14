<?php

class Comentario extends DataObject {

    public $datos = array(
        "usuario" => "",
        "atajoNoticia" => "",
        "fecha" => "",
        "cuerpo_comentario" => ""
        );

    public static function obtenerComentariosNoticia($filaInicio, $numeroFilas, $orden, $atajoNoticia) {
        $conexion = parent::conectar();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM ". TABLA_COMENTARIOS ." WHERE atajoNoticia = :atajoNoticia ORDER BY $orden LIMIT :filaInicio, :numeroFilas";
        try {
            $st=$conexion->prepare($sql);
            $st->bindValue(":filaInicio", $filaInicio, PDO::PARAM_INT);
            $st->bindValue(":numeroFilas", $numeroFilas, PDO::PARAM_INT);
            $st->bindValue(":atajoNoticia", $atajoNoticia, PDO::PARAM_STR);
            $st->execute();
            $com = array();
            foreach ($st->fetchAll() as $fila) {
                $com[]=new Comentario($fila);
            }
            $st=$conexion->query("SELECT found_rows() AS filasTotales");
            $fila = $st->fetch();
            parent::desconectar($conexion);
            return array($com, $fila["filasTotales"]);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }

    public static function obtenerComentario($username, $atajoNoticia, $fecha) {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . TABLA_COMENTARIOS . " WHERE usuario = :username, atajoNoticia=:atajoNoticia, fecha=:fecha";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":username", $username, PDO::PARAM_STR);
            $st->bindValue(":atajoNoticia", $atajoNoticia, PDO::PARAM_STR);
            $st->bindValue(":fecha", $fecha, PDO::PARAM_STR);
            $st->execute();
            $fila = $st->fetch();
            parent::desconectar($conexion);
            if ($fila)
                return new Comentario($fila);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function insertarComentario($username, $atajoNoticia, $cuerpoComentario) { 
        $conexion = parent::conectar();
        $sql = "INSERT INTO " . TABLA_COMENTARIOS . " (usuario,atajoNoticia,cuerpo_comentario) 
            VALUES(:username,:atajoNoticia,:cuerpoComentario)";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":username", $username, PDO::PARAM_STR);
            $st->bindValue(":atajoNoticia", $atajoNoticia, PDO::PARAM_STR);
            $st->bindValue(":cuerpoComentario", $cuerpoComentario, PDO::PARAM_STR);
            $st->execute();
            parent::desconectar($conexion);
        }catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Inserción fallada: " . $e->getMessage());
        }
    }
}
?>
