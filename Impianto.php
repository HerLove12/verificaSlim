<?php
class Impianto implements JsonSerializable{
    protected $nome;
    protected $latitudine;
    protected $longitudine;

    protected $dispositiviAllarme;
    protected $rilevatoriUmidita;
    protected $rilevatoriPressione;

    function __construct($n, $la, $lo){
        $this->nome = $n;
        $this->latitudine = $la;
        $this->longitudine = $lo;

        $this->dispositiviAllarme = array();
        $this->rilevatoriUmidita = array();
        $this->rilevatoriPressione = array();
    }

    public function aggiungiDispositivo($a){
        array_push($this->dispositiviAllarme,$a);
    }

    public function aggiungiRilevatoreUmidita($x){
        array_push($this->rilevatoriUmidita,$x);
    }

    public function aggiungiRilevatorePressione($x){
        array_push($this->rilevatoriPressione,$x);
    }

    function getNome(){
        return $this->nome;
    }

    function getLatitudine(){
        return $this->latitudine;
    }

    function getLongitudine(){
        return $this->longitudine;
    }

    function setNome($n){
        $this->nome = $n;
    }

    function getDispositivi(){
        return $this->dispositiviAllarme;
    }
    function getRilevatoriUmidita(){
        return $this->rilevatoriUmidita;
    }
    function getRilevatoriPressione(){
        return $this->rilevatoriPressione;
    }

    public function jsonSerialize() {
        return [
            'nome' => $this->nome,
            'latitudine' => $this->latitudine,
            'longitudine' => $this->longitudine
        ];
    }
}