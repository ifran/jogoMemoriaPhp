<?php
    class Nivel
    {
        public static function pontosPar($iNivel)
        {
            if ($iNivel == 1) {
                return NIVEL_FACIL_PONTOS_PAR;
            } else if ($iNivel == 2) {
                return NIVEL_MEDIO_PONTOS_PAR;
            } else if ($iNivel == 3) {
                return NIVEL_DIFICIL_PONTOS_PAR;
            }
        }

        public static function pontos($iNivel)
        {
            if ($iNivel == 1) {
                return NIVEL_FACIL_PONTOS;
            } else if ($iNivel == 2) {
                return NIVEL_MEDIO_PONTOS;
            } else if ($iNivel == 3) {
                return NIVEL_DIFICIL_PONTOS;
            }
        }

        public static function tempo($iNivel)
        {
            if ($iNivel == 1) {
                return NIVEL_FACIL_TEMPO;
            } else if ($iNivel == 2) {
                return NIVEL_MEDIO_TEMPO;
            } else if ($iNivel == 3) {
                return NIVEL_DIFICIL_TEMPO;
            }
        }

        public static function name($iNivel)
        {
            if ($iNivel == 1) {
                return 'F&aacute;cil';
            } else if ($iNivel == 2) {
                return 'M&eacute;dio';
            } else if ($iNivel == 3) {
                return 'Dif&iacute;cil';
            }
        }  
        
        public static function par($iNivel)
        {
            if ($iNivel == 1) {
                return NIVEL_FACIL_PAR;
            } else if ($iNivel == 2) {
                return NIVEL_MEDIO_PAR;
            } else if ($iNivel == 3) {
                return NIVEL_DIFICIL_PAR;
            }
        }

        public static function divName($iNivel)
        {
            if ($iNivel == 1) {
                return 'mainDivFacil';
            } else if ($iNivel == 2) {
                return 'mainDivMedio';
            } else if ($iNivel == 3) {
                return 'mainDivDificil';
            }
        }
    }
?>