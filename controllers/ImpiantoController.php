<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once "Impianto.php";
require_once "DispositivoAllarme.php";
require_once "Rilevatore.php";
require_once "RilevatoreDiUmidita.php";
require_once "RilevatoreDiPressione.php";
require_once "Misurazione.php";

class ImpiantoController{
    function index(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        #$d1 = new DispositivoAllarme("id-allarme-1", "3808378473");
        #$d2 = new DispositivoAllarme("id-allarme-2", "3234275419");

        #$r1 = new RilevatoreDiUmidita(true,"id-rilevatoreU-1", "soglia1", "codseriale", array(new Misurazione("1-marzo", "50"), new Misurazione("3-gennaio", "80")));

        #$impianto->aggiungiDispositivo($d1);
        #$impianto->aggiungiDispositivo($d2);

        #$impianto->aggiungiRilevatoreUmidita($r1);
        
        $response->getBody()->write(json_encode($impianto->JsonSerialize()));
        return $response->withHeader('Content-Type', 'application/json');
    }

    function dispositiviAllarme(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        $d1 = new DispositivoAllarme("id-allarme-1", "3808378473");
        $d2 = new DispositivoAllarme("id-allarme-2", "3234275419");

        $impianto->aggiungiDispositivo($d1);
        $impianto->aggiungiDispositivo($d2);

        $dispositivi = $impianto->getDispositivi();
    
        foreach($dispositivi as $disp){
            $response->getBody()->write(json_encode($disp));
        }
        return $response->withHeader('Content-Type', 'application/json');
    }

    function dispositiviAllarmeById(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        $d1 = new DispositivoAllarme("id-allarme-1", "3808378473");
        $d2 = new DispositivoAllarme("id-allarme-2", "3234275419");

        $impianto->aggiungiDispositivo($d1);
        $impianto->aggiungiDispositivo($d2);

        $dispositivi = $impianto->getDispositivi();
        $idx = $args['id'];

    
        foreach($dispositivi as $disp){
            if($disp->getId() == $idx){
                $response->getBody()->write(json_encode($disp));
            }
        }
        return $response->withHeader('Content-Type', 'application/json');
    }

    #--------------------------------------------------------------------------------------------------------------------------------

    function rilevatoriDiPressione(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        $m1 = new Misurazione("1-marzo", "50");
        $m2 = new Misurazione("3-gennaio", "80");

        $misurazioni = array($m1, $m2);

        $r1 = new RilevatoreDiPressione(true,"id-rilevatoreP-1", "soglia1", "codseriale1", $misurazioni);
        $r2 = new RilevatoreDiPressione(False,"id-rilevatoreP-2", "soglia2", "codseriale2", $misurazioni);

        $impianto->aggiungiRilevatorePressione($r1);
        $impianto->aggiungiRilevatorePressione($r2);

        $rilevatori = $impianto->getRilevatoriPressione();
    
        foreach($rilevatori as $disp){
            $response->getBody()->write(json_encode($disp));
        }
        return $response->withHeader('Content-Type', 'application/json');
    }

    function rilevatoriDiPressioneById(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        $m1 = new Misurazione("1-marzo", "50");
        $m2 = new Misurazione("3-gennaio", "80");

        $misurazioni = array($m1, $m2);

        $r1 = new RilevatoreDiPressione(true,"id-rilevatoreP-1", "soglia1", "codseriale1", $misurazioni);
        $r2 = new RilevatoreDiPressione(False,"id-rilevatoreP-2", "soglia2", "codseriale2", $misurazioni);

        $impianto->aggiungiRilevatorePressione($r1);
        $impianto->aggiungiRilevatorePressione($r2);

        $rilevatori = $impianto->getRilevatoriPressione();
        $idx = $args['id'];
    
        foreach($rilevatori as $disp){
            if($disp->getId() == $idx){
                $response->getBody()->write(json_encode($disp));
            }
        }
        return $response->withHeader('Content-Type', 'application/json');
    }

    function rilevatoriDiPressioneByIdM(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        $m1 = new Misurazione("1-marzo", "50");
        $m2 = new Misurazione("3-gennaio", "80");

        $misurazioni = array($m1, $m2);

        $r1 = new RilevatoreDiPressione(true,"id-rilevatoreP-1", "soglia1", "codseriale1", $misurazioni);
        $r2 = new RilevatoreDiPressione(False,"id-rilevatoreP-2", "soglia2", "codseriale2", $misurazioni);

        $impianto->aggiungiRilevatorePressione($r1);
        $impianto->aggiungiRilevatorePressione($r2);

        $rilevatori = $impianto->getRilevatoriPressione();
        $idx = $args['id'];
    
        foreach($rilevatori as $disp){
            if($disp->getId() == $idx){
                $response->getBody()->write(json_encode($disp->getMisurazioni()));
            }
        }
        return $response->withHeader('Content-Type', 'application/json');
    }

    function rilevatoriDiPressioneByIdMM(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        $m1 = new Misurazione("1-marzo", "50");
        $m2 = new Misurazione("3-gennaio", "80");

        $misurazioni = array($m1, $m2);

        $r1 = new RilevatoreDiPressione(true,"id-rilevatoreP-1", "soglia1", "codseriale1", $misurazioni);
        $r2 = new RilevatoreDiPressione(False,"id-rilevatoreP-2", "soglia2", "codseriale2", $misurazioni);

        $impianto->aggiungiRilevatorePressione($r1);
        $impianto->aggiungiRilevatorePressione($r2);

        $rilevatori = $impianto->getRilevatoriPressione();
        $idx = $args['id'];
        $val = $args['val'];
    
        foreach($rilevatori as $disp){
            if($disp->getId() == $idx){
                $msr = $disp->getMisurazioni();
                foreach($msr as $m){
                    if($m->getValore() > $val){
                        $response->getBody()->write(json_encode($m));
                    }
                }
            }
        }
        return $response->withHeader('Content-Type', 'application/json');
    }

    #----------------------------------------------------------------------------------------------------------------------------------------------
    
    function rilevatoriDiUmidita(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        $m1 = new Misurazione("1-marzo", "50");
        $m2 = new Misurazione("3-gennaio", "80");

        $misurazioni = array($m1, $m2);

        $r1 = new RilevatoreDiUmidita(true,"id-rilevatoreU-1", "soglia1", "codseriale1", $misurazioni);
        $r2 = new RilevatoreDiUmidita(False,"id-rilevatoreU-2", "soglia2", "codseriale2", $misurazioni);

        $impianto->aggiungiRilevatoreUmidita($r1);
        $impianto->aggiungiRilevatoreUmidita($r2);

        $rilevatori = $impianto->getRilevatoriUmidita();
    
        foreach($rilevatori as $disp){
            $response->getBody()->write(json_encode($disp));
        }
        return $response->withHeader('Content-Type', 'application/json');
    }

    function rilevatoriDiUmiditaById(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        $m1 = new Misurazione("1-marzo", "50");
        $m2 = new Misurazione("3-gennaio", "80");

        $misurazioni = array($m1, $m2);

        $r1 = new RilevatoreDiUmidita(true,"id-rilevatoreU-1", "soglia1", "codseriale1", $misurazioni);
        $r2 = new RilevatoreDiUmidita(False,"id-rilevatoreU-2", "soglia2", "codseriale2", $misurazioni);

        $impianto->aggiungiRilevatoreUmidita($r1);
        $impianto->aggiungiRilevatoreUmidita($r2);

        $rilevatori = $impianto->getRilevatoriUmidita();
        $idx = $args['id'];
    
        foreach($rilevatori as $disp){
            if($disp->getId() == $idx){
                $response->getBody()->write(json_encode($disp));
            }
        }
        return $response->withHeader('Content-Type', 'application/json');
    }

    function rilevatoriDiUmiditaByIdM(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        $m1 = new Misurazione("1-marzo", "50");
        $m2 = new Misurazione("3-gennaio", "80");

        $misurazioni = array($m1, $m2);

        $r1 = new RilevatoreDiUmidita(true,"id-rilevatoreU-1", "soglia1", "codseriale1", $misurazioni);
        $r2 = new RilevatoreDiUmidita(False,"id-rilevatoreU-2", "soglia2", "codseriale2", $misurazioni);

        $impianto->aggiungiRilevatoreUmidita($r1);
        $impianto->aggiungiRilevatoreUmidita($r2);

        $rilevatori = $impianto->getRilevatoriUmidita();
        $idx = $args['id'];
    
        foreach($rilevatori as $disp){
            if($disp->getId() == $idx){
                $response->getBody()->write(json_encode($disp->getMisurazioni()));
            }
        }
        return $response->withHeader('Content-Type', 'application/json');
    }

    function rilevatoriDiUmiditaByIdMM(Request $request, Response $response, $args){
        $impianto = new Impianto("impianto-1", "la423234", "lo4234534");

        $m1 = new Misurazione("1-marzo", "50");
        $m2 = new Misurazione("3-gennaio", "80");

        $misurazioni = array($m1, $m2);

        $r1 = new RilevatoreDiUmidita(true,"id-rilevatoreP-1", "soglia1", "codseriale1", $misurazioni);
        $r2 = new RilevatoreDiUmidita(False,"id-rilevatoreP-2", "soglia2", "codseriale2", $misurazioni);

        $impianto->aggiungiRilevatoreUmidita($r1);
        $impianto->aggiungiRilevatoreUmidita($r2);

        $rilevatori = $impianto->getRilevatoriUmidita();
        $idx = $args['id'];
        $val = $args['val'];
    
        foreach($rilevatori as $disp){
            if($disp->getId() == $idx){
                $msr = $disp->getMisurazioni();
                foreach($msr as $m){
                    if($m->getValore() > $val){
                        $response->getBody()->write(json_encode($m));
                    }
                }
            }
        }
        return $response->withHeader('Content-Type', 'application/json');
    }
}