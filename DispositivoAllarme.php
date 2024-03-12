<?php
class DispositivoAllarme implements JsonSerializable{
    protected $id;
    protected $telefono;

    public function __construct($x, $t){
        $this->id = $x;
        $this->telefono = $t;
    }

    public function getId(){
        return $this->id;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'telefono' => $this->telefono
        ];
    }
}