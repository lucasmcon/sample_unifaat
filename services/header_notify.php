<?php

    include('ConnDB_2.php');

    class header_notify{

        public function contAtendAbertos($user_in_id, $user_st_tipo){
            
            $Conn = new ConnDB_2();
            $arrSetor = $this->buscaSetoresUser($user_in_id);

			if($user_st_tipo == 'a'){
				$StrSQL = "SELECT COUNT(at_in_id) AS 'at_in_id' FROM glo_tb_atendimento WHERE at_in_status IN (1) AND D_E_L_E_T_E !='*'";
			}else{
				$StrSQL = "SELECT COUNT(at_in_id) AS 'at_in_id' "; 
				$StrSQL.= "FROM glo_tb_atendimento WHERE at_in_status IN (1) AND D_E_L_E_T_E != '*' AND set_in_id IN(".implode(',',$arrSetor).")";    
			}
			$Total = $Conn->Consult($StrSQL);
            return 
            
            $Total;
        }

        public function contAtendTransferidos($user_in_id, $user_st_tipo){

            $Conn = new ConnDB();
            $arrSetor = $this->buscaSetoresUser($user_in_id);

			if($user_st_tipo == 'a'){
				$StrSQL = "SELECT COUNT(at_in_id) AS 'at_in_id' FROM glo_tb_atendimento WHERE at_in_status IN (5) AND D_E_L_E_T_E !='*'";
			}else{
				$StrSQL = "SELECT COUNT(at_in_id) AS 'at_in_id' "; 
				$StrSQL.= "FROM glo_tb_atendimento WHERE at_in_status IN (5) AND D_E_L_E_T_E != '*' AND set_in_transf IN(".implode(',',$arrSetor).")";    
			}
			$Total = $Conn->Consult($StrSQL);
            return $Total;

        }

        public function buscaSetoresUser($user_in_id){

            $Conn = new ConnDB();
            $StrSQL = "SELECT set_in_id FROM sys_tb_user_setor WHERE user_in_id = $user_in_id";

            $Rs = $Conn->Consult($StrSQL);
            $countRs = count($Rs);
            $setores = array();

            for($i=0; $i<$countRs; $i++){
                array_push($setores, $Rs[$i]['set_in_id']);
            }
            return $setores;
        }
    }
?>