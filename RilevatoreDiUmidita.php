<?php
class RilevatoreDiUmidita extends Rilevatore{
    protected $posizione; #booleano true = aria; false = terra;

    public function __construct($x, $id,$s,$c, $m){
        parent::__construct($id,"%",$s,$c, $m);
        $this->posizione = $x;
    }
}