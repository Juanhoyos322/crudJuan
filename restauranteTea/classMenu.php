<?php
require_once ("Autoload.php");
class Menu extends Conexion{
    //PROPIEDADES

    private $strProducto;
    private $intPrecio;
    private $conexion;
    //METODOS
    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function setItem(string $producto, int $precio){
        try {
            $this->strProducto = $producto;
            $this->intPrecio = $precio;
            $sql = " INSERT INTO `menu`(`producto`, `precio`) VALUES (:pro,:pre) ";
            $arrayData = array(
                ':pro'=>$this->strProducto,
                ':pre'=>$this->intPrecio
            );
            $insert = $this->conexion->prepare($sql);
            $resInsert = $insert->execute($arrayData);
            $insert->closeCursor();
        }catch (Exception $e){
            echo "Error en su consulta: ".$e->getMessage();
        }
    }
    public function getProducto($producto){
        try {
            $this->strProducto = $producto;

            $sql = "SELECT * FROM menu WHERE producto = :pro";
            $arrData = array(":pro" => $this->strProducto);

            $query = $this->conexion->prepare($sql);
            $query->execute($arrData);

            $request = $query->fetch(PDO::FETCH_ASSOC); //ARRAY
            $query->closeCursor();

            return $request;
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        }
    }
    public function getProductos(){
        try {
            $sql = "SELECT * FROM menu";
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchAll();
            return $request;

        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        }
    }
}