
<?php
require_once("./clases/Conexion.php");

class Carrito extends Conexion
{

  public function __construct()
  {
    parent::__construct();
  }

  public  function get_cantidad($productoId)
  {
    $resultado = $this->conexion_db->query("SELECT cantidad FROM detalleventas WHERE productoId ='$productoId'");
    return $resultado;
  }

  public  function agregar_producto($productoId)
  {
    $cantidad = $this->get_cantidad($productoId) + 1;
    $id = $productoId['id'];
    $this->conexion_db->query("INSERT INTO 'detalleventas' ('productoId','cantidad') VALUES ('$id', $cantidad)");

    return 'Agregado al carrito';
  }
}
?>



<?php

class ModeloMensaje
{


  public  function insert_mensaje($parametro)
  {

    //tiempo
    $hoy = date("Y-m-d H:i:s");
    $asunto = $parametro['asunto'];
    $message = $parametro['mensaje'];

    $sql = "INSERT INTO `mensaje`(`titulo`, `mensaje`, `usuario`, `desde`, `leido`) VALUES ('$asunto', '$message', 1 ,'$hoy', 0)";

    $conn =  $this->conectar_bd();

    if ($conn->query($sql) === TRUE) {
      $res['success'] = TRUE;
      $res['message'] = "Envio exitosamente";
    } else {
      $res['success'] = FALSE;
      $res['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    return $res;
  }
}

?>