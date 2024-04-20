<?php
require_once "conexion/conexion.php";
require_once "respuestas.class.php";

class citas extends conexion {

    private $table = "citas";
    private $citaid = "";
    private $pacienteid = "";
    private $fecha = "0000-00-00";
    private $horainicio = "";
    private $horafin = "";
    private $estado = "";
    private $motivo = "";
    private $token = "";

    public function listaCitas($pagina = 1){
        $inicio = 0;
        $cantidad = 100;
        if ($pagina > 1) {
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT CitaId,PacienteId,Fecha,HoraInicio,HoraFin,Estado,Motivo FROM " . $this->table . "limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    }

    public function obtenerCita($id){
        $query = "SELECT * FROM" . $this->table . "WHERE CitaId = '$id'";
        return parent::obtenerDatos($query);

    }

    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

        if (!isset($datos['token'])) {
            return $_respuestas->error_401();
        }else{
            $this->token = $datos['token'];
            $arrayToken = $this->buscarToken();

            if ($arrayToken) {
                if (!isset($datos['pasienteid']) || !isset($datos)) {
                    # code...
                }
            }
        }
    }
}
?>