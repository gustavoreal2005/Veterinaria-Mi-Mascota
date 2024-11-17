<?php
require_once "conexion.php";

class ModeloLaboratorio
{
    // Crear o registrar laboratorio
    public static function mdlIngresarLaboratorio($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (laboratorio, descripcion) VALUES (:laboratorio, :descripcion)");
        $stmt->bindParam(":laboratorio", $datos["laboratorio"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error";
        }

        $stmt->close();
        $stmt = null;
    }

    // Mostrar laboratorios
    public static function mdlMostrarLaboratorio($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    // Editar laboratorio
    public static function mdlEditarLaboratorio($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET laboratorio = :laboratorio, descripcion = :descripcion WHERE id = :id");
        $stmt->bindParam(":laboratorio", $datos["laboratorio"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error";
        }

        $stmt->close();
        $stmt = null;
    }

    // Eliminar laboratorio
    public static function mdlEliminarLaboratorio($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "OK";
            } else {
                return "Error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }

        $stmt->close();
        $stmt = null;
    }
}
