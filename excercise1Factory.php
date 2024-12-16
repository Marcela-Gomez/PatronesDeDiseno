<?php 
    abstract class Personaje{
        abstract public function crearPersonaje();
    } 

    class Esqueleto extends Personaje{
        private $nombre = "Esqueleto";
        private $velocidad = "10km/h";
        private $tipoDeAtaque = "golpes";
        private $poder = "10";

        public function crearPersonaje(){
            echo "Personaje: $this->nombre \nVelocidad: $this->velocidad \nTipo de ataque: $this->tipoDeAtaque \nPoder: $this->poder";
        }
    }
       
    class Zombi extends Personaje{
        private $nombre = "Zombi";
        private $velocidad = "20km/h";
        private $tipoDeAtaque = "mordida";
        private $poder = "20";

        public function crearPersonaje(){
            echo "Personaje: $this->nombre \nVelocidad: $this->velocidad \nTipo de ataque: $this->tipoDeAtaque \nPoder: $this->poder";
        }
    }

    class FabricaPersonaje{
        public function obtenerLogistica($nivel){
            if($nivel == 'nivel1'){
                return new Esqueleto();
            }else if($nivel == 'nivel2'){
                return new Zombi();
            }else{
                throw new Exception('El nivel no existe');
            }
        }
    }

    $nivel = 'nivel2';
    $fabrica = new FabricaPersonaje();
    $personaje = $fabrica->obtenerLogistica($nivel);
    $personaje->crearPersonaje();
?>