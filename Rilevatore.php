<?php
class Rilevatore implements JsonSerializable{
    protected $id;
    protected $misurazioni;
    protected $unita;
    protected $sogliaAllarme;
    protected $codiceSeriale;

    public function __construct($x,$u,$s,$c, $m){
        $this->id = $x;
        $this->unita = $u;
        $this->sogliaAllarme = $s;
        $this->codiceSeriale = $c;

        $this->misurazioni = $m;
    }

    public function aggiungiMisurazione($a){
        array_push($this->misurazioni,$a);
    }

    public function getMisurazioni(){
        return $this->misurazioni;
    }

    public function getId(){
        return $this->id;
    }

    public function getUnita(){
        return $this->unita;
    }
    public function getSoglia(){
        return $this->sogliaAllarme;
    }
    public function getCodice(){
        return $this->codiceSeriale;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'unita' => $this->unita,
            'sogliaAllarme' => $this->sogliaAllarme,
            'codiceSeriale' => $this->codiceSeriale,
        ];
    }
}