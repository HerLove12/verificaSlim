<?php
class RilevatoreDiPressione extends Rilevatore{
    protected $tipologia; #booleano true = acqua; false = gas;

    public function __construct($x, $id,$s,$c, $m){
        parent::__construct($id,"bar",$s,$c, $m);
        $this->posizione = $x;
    }

}