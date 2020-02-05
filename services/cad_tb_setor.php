<?php
    include('ConnDB.php');
    class cad_tb_setor{

        public function buscaSetores(){

            $ConnDB = new ConnDB(); 
            $StrSQL = "SELECT set_in_id, set_st_desc, set_st_prefixo FROM cad_tb_setor WHERE set_in_status = 1 AND D_E_L_E_T_E != '*'";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }
    }
?>