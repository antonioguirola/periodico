<?php


class UltimaNoticia extends DataObject {

    public $datos = array(
        "titulo" => "",
        "cuerpo" => "",
        "id"=>"",
        "fecha"=>""
        );

    public static function obtenerUltimasNoticias($filaInicio, $numeroFilas, $orden) {
        $conexion = parent::conectar();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM ". TABLA_NOTICIAS ." ORDER BY $orden LIMIT :filaInicio, :numeroFilas";
        try {
            $st=$conexion->prepare($sql);
            $st->bindValue(":filaInicio", $filaInicio, PDO::PARAM_INT);
            $st->bindValue(":numeroFilas", $numeroFilas, PDO::PARAM_INT);
            $st->execute();
            $resultado = array();
            foreach ($st->fetchAll() as $fila) {
                $resultado[]=new UltimaNoticia($fila);
            }
            $st=$conexion->query("SELECT found_rows() AS filasTotales");
            $fila = $st->fetch();
            parent::desconectar($conexion);
            return array($resultado, $fila["filasTotales"]);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallida: " . $e->getMessage());
        }
    }

    public static function obtenerUltimaNoticia($id) {
        $conexion = parent::conectar();
        $sql = "SELECT * FROM " . TABLA_NOTICIAS . " WHERE id = :id";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $fila = $st->fetch();
            parent::desconectar($conexion);
            if ($fila)
                return new UltimaNoticia($fila);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }

    public static function insertarUltimaNoticia($titulo,$cuerpo) { 
        $conexion = parent::conectar();
        $sql = "INSERT INTO " . TABLA_NOTICIAS . " (titulo,cuerpo) VALUES(:titulo,:cuerpo)";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":titulo", $titulo, PDO::PARAM_STR);
            $st->bindValue(":cuerpo", $cuerpo, PDO::PARAM_STR);
            $st->execute();
            parent::desconectar($conexion);
        }catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Inserción fallada: " . $e->getMessage());
        }
    }
    
    public static function eliminarUltimaNoticia($id) {
        $conexion = parent::conectar();
        $sql = "DELETE FROM " . TABLA_NOTICIAS . " WHERE id = :id";
        try {
            $st = $conexion->prepare($sql);
            $st->bindValue(":id", $id, PDO::PARAM_INT);
            $st->execute();
            parent::desconectar($conexion);
        } catch (PDOException $e) {
            parent::desconectar($conexion);
            die("Consulta fallada: " . $e->getMessage());
        }
    }
}
?>
