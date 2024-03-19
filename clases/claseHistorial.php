<?php
class claseHistorial{
    private $Documento_paciente;
    private $Fecha_odontograma;
    private $comentario;

    
    public function __construct(){
        $this->Documento_paciente="";
        $this->Fecha_odontograma="";
        $this->comentario="";

    }
    
    public function odontograma($Documento_paciente, $Fecha_odontograma, $comentario) {
        $this->Documento_paciente= $Documento_paciente;
        $this->Fecha_odontograma= $Fecha_odontograma;
        $this->comentario= $comentario;
    }

}
