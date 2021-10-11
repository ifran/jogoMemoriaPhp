<?php
    class Carta extends Database
    {
        function insert($sSql) 
        {
            $this->exec($sSql);
        }

        function nivelValor($iNivel) 
        {
            $aNivel = array();
            
            if ($iNivel == 1) 
            {
                $aNivel['sLimit'] = '0,' . NIVEL_FACIL_PAR; 
                $aNivel['iTimer'] = NIVEL_FACIL_TEMPO;
                $aNivel['iParCorreto'] = NIVEL_FACIL_PAR;
            } 
            else if ($iNivel == 2) 
            {
                $aNivel['sLimit'] = '0,' . NIVEL_MEDIO_PAR; 
                $aNivel['iTimer'] = NIVEL_MEDIO_TEMPO;
                $aNivel['iParCorreto'] = NIVEL_MEDIO_PAR;
            } 
            else 
            {
                $aNivel['sLimit'] = '0,' . NIVEL_DIFICIL_PAR; 
                $aNivel['iTimer'] = NIVEL_DIFICIL_TEMPO;
                $aNivel['iParCorreto'] = NIVEL_DIFICIL_PAR;
            }

            return $aNivel;
        }

        function selectCartas($iNivel) 
        {
            $aNivel = $this->nivelValor($iNivel);
            $sLimit = $aNivel['sLimit'];

            $aRetorno = parent::select('SELECT DISTINCT carta_img, carta_id 
                                        FROM carta 
                                        ORDER BY RAND() 
                                        LIMIT ' . $sLimit);

            $aImagem = array();
            for ($i=1;$i<=2;$i++) {
                foreach ($aRetorno as $oItem) {
                    $aImagem[] = $oItem;
                }
            }
            
            shuffle($aImagem);

            return $aImagem;
        }
    }
?>