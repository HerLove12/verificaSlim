<?php
class Misurazione implements JsonSerializable{
    protected $data;
    protected $valore;

    public function __construct($d, $v){
        $this->data = $d;
        $this->valore = $v;
    }

    public function getData(){
        return $this->data;
    }
    public function getValore(){
        return $this->valore;
    }

    public function jsonSerialize() {
        return [
            'data' => $this->data,
            'valore' => $this->valore,
        ];
    }
}