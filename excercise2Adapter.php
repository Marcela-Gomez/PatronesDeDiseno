<?php
    class Windows7{
        public function abrirConWindwos7(){
            echo "Abriendo archivo con Windows 7\n";
        }
    }

    class Windows10{
        public function abrirConWindwos10(){
            echo "Abriendo archivo con Windows 10\n";
        }
    }


    class AdaptadorWindows{
        private $Windows;

        public function __construct(Windows7 $Windows){
            $this->Windows = $Windows;
        }

        public function abrirConWindwos10(){
            $this->Windows->abrirConWindwos7();
        }
    }

    class Windows{
        public function abrir(AdaptadorWindows $Windows){
            $Windows->abrirConWindwos10();
        }
    }

    $windows7 = new Windows7();
    $adaptador = new AdaptadorWindows($windows7);
    $windows = new Windows();
    $windows->abrir($adaptador);
?>