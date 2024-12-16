<?php
    interface EstrategiaSalida {
        public function mostrar($mensaje);
    }

    class SalidaConsola implements EstrategiaSalida {
        public function mostrar($mensaje) {
            echo "Usando SalidaConsola: $mensaje\n";
        }
    }

    class SalidaJSON implements EstrategiaSalida {
        public function mostrar($mensaje) {
            echo "Usando SalidaJSON: " . json_encode(["mensaje" => $mensaje]) . "\n";
        }
    }

    class SalidaArchivoTXT implements EstrategiaSalida {
        public function mostrar($mensaje) {
            echo "Usando SalidaArchivoTXT: El mensaje se escribiría en un archivo TXT con el contenido: \"$mensaje\"\n";
        }
    }

    class ImpresoraMensajes {
        private $estrategia;

        public function establecerEstrategia(EstrategiaSalida $estrategia) {
            $this->estrategia = $estrategia;
        }

        public function imprimirMensaje($mensaje) {
            $this->estrategia->mostrar($mensaje);
        }
    }

    $mensaje = "Hola, este es un mensaje de prueba";

    $impresora = new ImpresoraMensajes();

    $impresora->establecerEstrategia(new SalidaConsola());
    $impresora->imprimirMensaje($mensaje);

    $impresora->establecerEstrategia(new SalidaJSON());
    $impresora->imprimirMensaje($mensaje);

    $impresora->establecerEstrategia(new SalidaArchivoTXT());
    $impresora->imprimirMensaje($mensaje);
?>
