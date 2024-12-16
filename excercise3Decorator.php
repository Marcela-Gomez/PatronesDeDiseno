<?php
    interface IPersonaje {
        public function getDaño();
        public function getDescription();
    }

    class Personaje1 implements IPersonaje {
        public function getDaño() {
            return 10;
        }

        public function getDescription() {
            return "Este es un Arquero";
        }
    }

    class Personaje2 implements IPersonaje {
        public function getDaño() {
            return 15;
        }
        public function getDescription() {
            return "Este es un Soldado";
        }
    }

    class PersonajeDecorator implements IPersonaje {
        protected $Personaje;

        public function __construct(IPersonaje $Personaje) {
            $this->Personaje = $Personaje;
        }

        public function getDescription() {
            return $this->Personaje->getDescription();
        }

        public function getDaño() {
            return $this->Personaje->getDaño();
        }
    }

    class ArcoDecorator extends PersonajeDecorator {
        public function getDescription() {
            return $this->Personaje->getDescription() . " con arco";
        }

        public function getDaño() {
            return $this->Personaje->getDaño() + 10;
        }
    }

    class GranadaDecorator extends PersonajeDecorator {
        public function getDescription() {
            return $this->Personaje->getDescription() . " con granadas";
        }

        public function getDaño() {
            return $this->Personaje->getDaño() + 20;
        }
    }

    class CuchilloDecorator extends PersonajeDecorator {
        public function getDescription() {
            return $this->Personaje->getDescription() . " con cuchillo";
        }

        public function getDaño() {
            return $this->Personaje->getDaño() + 5;
        }
    }

    $arquero = new Personaje1();
    $arquero = new ArcoDecorator($arquero);
    $arquero = new GranadaDecorator($arquero);

    $soldado = new Personaje2();
    $soldado = new CuchilloDecorator($soldado);
    $soldado = new GranadaDecorator($soldado);

    echo $arquero->getDescription() . " con daño: " . $arquero->getDaño() . "\n";
    echo $soldado->getDescription() . " con daño: " . $soldado->getDaño() . "\n";

?>