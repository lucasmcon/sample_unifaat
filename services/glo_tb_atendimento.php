<?php
    include('ConnDB.php');

    class glo_tb_atendimento{

        public function contAtendAbertos($user_in_id, $user_st_tipo){
            
            $ConnDB = new ConnDB();
            $arrSetor = $this->buscaSetoresUser($user_in_id);

			if($user_st_tipo == 'a'){
				$StrSQL = "SELECT COUNT(at_in_id) AS 'at_in_id' FROM glo_tb_atendimento WHERE at_in_status IN (1) AND D_E_L_E_T_E !='*'";
			}else{
				$StrSQL = "SELECT COUNT(at_in_id) AS 'at_in_id' "; 
				$StrSQL.= "FROM glo_tb_atendimento WHERE at_in_status IN (1) AND D_E_L_E_T_E != '*' AND set_in_id IN(".implode(',',$arrSetor).")";    
			}
			$Total = $ConnDB->Consult($StrSQL);
            return $Total;
        }

        public function contAtendTransferidos($user_in_id, $user_st_tipo){

            $ConnDB = new ConnDB();
            $arrSetor = $this->buscaSetoresUser($user_in_id);

			if($user_st_tipo == 'a'){
				$StrSQL = "SELECT COUNT(at_in_id) AS 'at_in_id' FROM glo_tb_atendimento WHERE at_in_status IN (5) AND D_E_L_E_T_E !='*'";
			}else{
				$StrSQL = "SELECT COUNT(at_in_id) AS 'at_in_id' "; 
				$StrSQL.= "FROM glo_tb_atendimento WHERE at_in_status IN (5) AND D_E_L_E_T_E != '*' AND set_in_transf IN(".implode(',',$arrSetor).")";    
			}
			$Total = $ConnDB->Consult($StrSQL);
            return $Total;

        }

        public function buscaSenhaPrinter(){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT at_st_senha, at_dt_cad FROM v_atendimentos ";
            $StrSQL.= "ORDER BY at_in_id DESC LIMIT 1";

            $Rs = $ConnDB->Consult($StrSQL);

            return $Rs;
        }


        public function buscaSetoresUser($user_in_id){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT set_in_id FROM sys_tb_user_setor WHERE user_in_id = $user_in_id";

            $Rs = $ConnDB->Consult($StrSQL);
            $countRs = count($Rs);
            $setores = array();

            for($i=0; $i<$countRs; $i++){
                array_push($setores, $Rs[$i]['set_in_id']);
            }
            return $setores;
        }

        public function buscaSetoresDescUser($user_in_id){////Função para listar usuários existentes na tela de cadastro de usuários, utilizando a VIEW v_busca_usuarios e obter os setores desse usuário para exibição em relatório


            $ConnDB = new ConnDB();
            $StrSQL = "SELECT set_st_desc FROM sys_tb_user_setor AS A INNER JOIN cad_tb_setor AS B ON B.set_in_id = A.set_in_id WHERE A.user_in_id = $user_in_id";

            $Rs = $ConnDB->Consult($StrSQL);
            $countRs = count($Rs);
            $setores = '';

            for($i=0; $i<$countRs; $i++){
                //array_push($setores, $Rs[$i]['set_st_desc']);
                $setores.= $Rs[$i]['set_st_desc'].'; ';
            }
            return $setores;
        }

        public function buscaPrefixoSetor($set_in_id){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT set_st_prefixo FROM cad_tb_setor WHERE set_in_id=$set_in_id";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function geraStringSenhaAtendimento($set_in_id, $prefixo){ //Função para gerar string da senha por setor selecionado
            
            date_default_timezone_set('America/Sao_Paulo'); 
            $ConnDB = new ConnDB();
            $StrSQL = "SELECT CASE WHEN at_st_senha IS NULL THEN '--' WHEN at_st_senha IS NOT NULL THEN at_st_senha END AS at_st_senha, DATE_FORMAT(at_dt_cad, '%Y-%m-%d') AS at_dt_cad ";
            $StrSQL.= "FROM glo_tb_atendimento WHERE set_in_id=$set_in_id ";
            $StrSQL.= "ORDER BY at_in_id DESC LIMIT 1";

            $Rs = $ConnDB->Consult($StrSQL);

            $current_date = date_create(date('Y-m-d', time()));
            $at_dt_cad = date_create($Rs[0]['at_dt_cad']);
            $interval = date_diff($current_date, $at_dt_cad);
            $date_diff = $interval->format('%d');
        

            if($Rs[0]['at_st_senha'] == '--'){
                $StrSenha = $prefixo.'1';
            }else{
                $explode = explode('_', $Rs[0]['at_st_senha']);
                $numeroSenha = $explode[1]+1;
                if($numeroSenha > '999'){
                    $StrSenha = $prefixo.str_pad('1', 3, 0, STR_PAD_LEFT);
                }else if($date_diff >= 1){
                    $StrSenha = $prefixo.str_pad('1', 3, 0, STR_PAD_LEFT);
                }else{
                    $StrSenha = $prefixo.str_pad($numeroSenha, 3, 0, STR_PAD_LEFT);
                }    
            }
            return $StrSenha;
            
        }

        public function gerarSenhaAtendimento($documento, $set_in_id, $solicitante, $at_st_tipo, $prioritario){
           
            $ConnDB = new ConnDB();
            $prefixo = $this->buscaPrefixoSetor($set_in_id); // Busca o prefixo do setor selecionado
            $StrSenha = $this->geraStringSenhaAtendimento($set_in_id, $prefixo[0]['set_st_prefixo']); // String da senha prefixo+numero
            
            //Insert na tabela de atendimentos
            $StrSQL = "INSERT INTO glo_tb_atendimento (at_st_senha, at_st_tipo, at_in_status, set_in_id, at_in_prioridade) ";
            $StrSQL.= "VALUES ('".$StrSenha."', '".$at_st_tipo."', 1, ".$set_in_id.", ".$prioritario.")";
            $ConnDB->Execute($StrSQL);
            //Select do at_in_id do insert acima
            $StrSQL_2 = "SELECT MAX(at_in_id) AS at_in_id FROM glo_tb_atendimento";
            $at_in_id = $ConnDB->Consult($StrSQL_2);
            //Insert na tabela 1:1 com dados do solicitante do atendimento, utilizando o at_in_id do select acima
            $StrSQL_3 = "INSERT INTO glo_tb_dados_solicitante (at_in_id, sol_st_documento, sol_st_nome) ";
            $StrSQL_3.= "VALUES (".$at_in_id[0]['at_in_id'].", '".$documento."', '".$solicitante."')";
            $ConnDB->Execute($StrSQL_3);
        }

        public function atualizaDadosVisitante($at_in_id, $at_st_nome, $at_st_documento){

            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE glo_tb_dados_solicitante SET sol_st_documento='".$at_st_documento."', sol_st_nome='".$at_st_nome."' ";
            $StrSQL.= "WHERE at_in_id=$at_in_id";
            $ConnDB->Execute($StrSQL);
        }
        
        public function buscaAtendimentos($user_in_id, $user_st_tipo){
        //ESTUDAR MELHOR MANEIRA DE ORDENAR ATENDIMENTOS PRIORITARIOS
            $ConnDB = new ConnDB();
            $arrSetor = $this->buscaSetoresUser($user_in_id);

            if($user_st_tipo == 'a'){
                $StrSQL = "SELECT * FROM v_atendimentos WHERE at_in_status IN(1,2,5) ";
                //$StrSQL.= "ORDER BY ";
                //$StrSQL.= "CASE ";
                //$StrSQL.= "WHEN at_in_prioridade != 0 THEN at_in_prioridade ";
                //$StrSQL.= "END DESC";
                
            }else{
                $StrSQL = "SELECT * FROM v_atendimentos ";
                $StrSQL.="WHERE at_in_status IN(1,2,5) AND set_in_id IN(".implode(',',$arrSetor).") ";
                $StrSQL.= "OR set_in_transf IN(".implode(',',$arrSetor).") AND at_in_status IN (1,2,5) ";
                //$StrSQL.= "ORDER BY ";
                //$StrSQL.= "CASE ";
                //$StrSQL.= "WHEN at_in_prioridade != 0 THEN at_in_prioridade ";
                //$StrSQL.= "END DESC";
            }

            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaAtendimentosFinalizados($user_in_id, $user_st_tipo){

            $ConnDB = new ConnDB();
            $arrSetor = $this->buscaSetoresUser($user_in_id);

            if($user_st_tipo == 'a'){
                $StrSQL = "SELECT * FROM v_atendimentos WHERE at_in_status IN(3,4) LIMIT 100";
            }else{
                $StrSQL = "SELECT * FROM v_atendimentos ";
                $StrSQL.="WHERE at_in_status IN(3,4) AND set_in_id IN(".implode(',',$arrSetor).") LIMIT 100";
            }

            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaAtendimentosFinalizadosComFiltros($set_in_id, $user_in_id, $dt_inicial, $dt_final){

            $ConnDB = new ConnDB();
            
            $AND = $user_in_id == '' ? ' ' : 'AND at_in_atendente='.$user_in_id.' ';

            if($dt_inicial == '' && $dt_final != ''){
                $AND_2 = 'AND at_dt_cad_diff < STR_TO_DATE("'.$dt_final.' 23:59:59","%d-%m-%Y %H:%i:%s") ';
            }else if($dt_final == '' && $dt_inicial != ''){
                $AND_2 = 'AND at_dt_cad_diff > STR_TO_DATE("'.$dt_inicial.' 00:00:00","%d-%m-%Y %H:%i:%s") ';
            }else if($dt_inicial == '' && $dt_final == '') {
                $AND_2 = ' ';
            }else{
                $AND_2 = 'AND at_dt_cad_diff BETWEEN STR_TO_DATE("'.$dt_inicial.' 00:00:00","%d-%m-%Y %H:%i:%s") AND STR_TO_DATE("'.$dt_final.' 23:59:59", "%d-%m-%Y %H:%i:%s") ';
            }

            $AND_3 = $set_in_id == '' ? ' ' : 'AND set_in_id='.$set_in_id.' OR set_in_transf ='.$set_in_id.' '.$AND.$AND_2;

            $StrSQL = "SELECT * FROM v_atendimentos WHERE at_in_status IN(3,4) ";
            $StrSQL.= $AND;
            $StrSQL.= $AND_2;
            $StrSQL.= $AND_3;
            $StrSQL.= ' LIMIT 100';

            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaUserTipo($user_in_id){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT user_st_tipo FROM cad_tb_user WHERE user_in_id=$user_in_id";
            $Rs = $ConnDB->Consult($StrSQL);
            $user_st_tipo = $Rs[0]['user_st_tipo'];

            return $user_st_tipo;
        }

        public function buscaMeusAtendimentosFinalizados($user_in_id, $user_st_tipo){

            $ConnDB = new ConnDB();
            $arrSetor = $this->buscaSetoresUser($user_in_id);

            if($user_st_tipo == 'a'){
                $StrSQL = "SELECT * FROM v_atendimentos WHERE at_in_status IN(3,4) AND at_in_atendente = $user_in_id";
            }else{
                $StrSQL = "SELECT * FROM v_atendimentos ";
                $StrSQL.="WHERE at_in_status IN(3,4) AND set_in_id IN(".implode(',',$arrSetor).") AND at_in_atendente = $user_in_id ";
                $StrSQL.= "OR set_in_transf IN(".implode(',',$arrSetor).") AND at_in_atendente = $user_in_id";
            }

            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaMeusAtendimentosPendentes($user_in_id, $user_st_tipo){

            $ConnDB = new ConnDB();
            $arrSetor = $this->buscaSetoresUser($user_in_id);

            if($user_st_tipo = 'a'){
                $StrSQL = "SELECT * FROM v_atendimentos WHERE at_in_status IN(2,5) AND at_in_atendente = $user_in_id";
            }else{
                $StrSQL = "SELECT * FROM v_atendimentos ";
                $StrSQL.="WHERE at_in_status IN(2,5) AND set_in_id IN(".implode(',',$arrSetor).") AND at_in_atendente = $user_in_id";
            }

            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;

        }

        public function buscaAtendimentoDet($at_in_id){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT * FROM v_atendimento WHERE at_in_id=$at_in_id";
            $Rs = $ConnDB->Consult($StrSQL); 
            return $Rs;
        }

        public function buscaAtendenteTransf($at_in_transf){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT user_in_id, user_st_nome ";
            $StrSQL.= "FROM cad_tb_user WHERE user_in_id=$at_in_transf";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function chamaAtendimento($at_in_id, $user_in_id){

            $buscaConfig = $this->buscaConfig();

            $tempoEspera = $buscaConfig[0]['config_in_tempo_espera'];

            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE glo_tb_atendimento SET at_in_tentativas = at_in_tentativas + 1, ";
            $StrSQL.= "at_in_atendente=$user_in_id, at_in_status=2, at_dt_chamada = NOW() WHERE at_in_id=$at_in_id";
            
            $ConnDB->Execute($StrSQL);

            $StrSQL_2 = "SELECT at_st_senha FROM glo_tb_atendimento WHERE at_in_id=$at_in_id";
            $Rs = $ConnDB->Consult($StrSQL_2);
            
            $StrSQL_3 = "SELECT at_in_id FROM glo_tb_atendimento WHERE at_st_senha='".$Rs[0]['at_st_senha']."'";
            $Rs_2 = $ConnDB->Consult($StrSQL_3);

            $countRs_2 = count($Rs_2);
            $idChamadas = array();

            for($i=0; $i<$countRs_2; $i++){
                array_push($idChamadas, $Rs_2[$i]['at_in_id']);
            }

            $StrSQL_4 = "DELETE FROM glo_tb_chamada WHERE at_in_id IN(".implode(',',$idChamadas).")";
            $ConnDB->Execute($StrSQL_4);

            if($this->filaChamada($at_in_id) <= 2){
                //echo "<script type='text/javascript'> $('#senhaFilaEspera').modal('show');</script>";
                sleep($tempoEspera);

                $StrSQL_5 = "INSERT INTO glo_tb_chamada (at_in_id) ";
                $StrSQL_5.= "VALUES ($at_in_id)";
    
                $ConnDB->Execute($StrSQL_5);

            }else{
                $StrSQL_5 = "INSERT INTO glo_tb_chamada (at_in_id) ";
                $StrSQL_5.= "VALUES ($at_in_id)";
    
                $ConnDB->Execute($StrSQL_5);
            }      
        }

        public function filaChamada($at_in_id){ // 3 | 2
            
            $ConnDB = new ConnDB();

            $StrSQL = "SELECT at_in_id FROM glo_tb_chamada "; // 
            $StrSQL.= "ORDER BY cha_in_id DESC ";
            $StrSQL.= "LIMIT 1";
            $Rs = $ConnDB->Consult($StrSQL);
            
            $idUltimaSenhaChamada = $Rs[0]['at_in_id'];
            //ID DA ULTIMA SENHA CHAMADA
            
            $StrSQL_2 = "SELECT at_dt_chamada FROM glo_tb_atendimento WHERE at_in_id='".$idUltimaSenhaChamada."'";
            $Rs_2 = $ConnDB->Consult($StrSQL_2);
            //DATA DA CHAMADA DA ULTINHA SENHA CHAMADA

    
            $StrSQL_3 = "SELECT at_dt_chamada FROM glo_tb_atendimento WHERE at_in_id='".$at_in_id."'";
            $Rs_3 = $ConnDB->Consult($StrSQL_3);
            //DATA DA SENHA QUE ESTA SENDO CHAMADA NESSE PROCESSO

            $dtCadUltimaSenhaChamada = date_create(date($Rs_2[0]['at_dt_chamada']));
            $dtCadSenhaFila = date_create(date($Rs_3[0]['at_dt_chamada']));
            $interval = date_diff($dtCadUltimaSenhaChamada, $dtCadSenhaFila);
            $date_diff = $interval->format('%s');
            
            return $date_diff;
        }

        public function buscaConfig(){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT config_in_limite_chamada, config_in_tempo_espera FROM sys_tb_config";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function updateConfig($config_in_limite_chamada, $config_in_tempo_espera){

            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE sys_tb_config SET config_in_limite_chamada=$config_in_limite_chamada, config_in_tempo_espera=$config_in_tempo_espera";

            $ConnDB->Execute($StrSQL);
        }

        public function finalizaAtendimento($at_in_id, $user_in_id, $at_st_obs){

            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE glo_tb_atendimento SET at_in_status=3, at_in_fin=$user_in_id, at_dt_fin=NOW(), at_st_obs='".$at_st_obs."' ";
            $StrSQL.= "WHERE at_in_id=$at_in_id";

            $ConnDB->Execute($StrSQL);
        }

        public function naoComparaceuAtendimento($at_in_id, $user_in_id){

            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE glo_tb_atendimento SET at_in_status=4, at_in_fin=$user_in_id, at_dt_fin=NOW(), at_st_obs='Não compareceu.' ";
            $StrSQL.= "WHERE at_in_id=$at_in_id";

            $ConnDB->Execute($StrSQL);
        }

        public function transfereAtendimento($at_in_id, $user_in_id, $set_in_transf, $at_st_obs){

            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE glo_tb_atendimento SET at_in_status=5, at_in_transf=$user_in_id, set_in_transf=$set_in_transf, at_st_obs='".$at_st_obs."' ";
            $StrSQL.= "WHERE at_in_id=$at_in_id";

            $ConnDB->Execute($StrSQL);
        }

        public function relTotalAtendFinSetor($dt_inicial, $dt_final){
            
            $ConnDB = new ConnDB();

            if($dt_inicial == $dt_final){
                $StrSQL = "SELECT COUNT(at_in_id) AS at_qtd, set_st_desc FROM v_rel_tot_at_setores ";
                $StrSQL.= "WHERE DATE_FORMAT(at_dt_cad, '%Y-%m-%d') = STR_TO_DATE('".$dt_inicial."', '%d-%m-%Y')";
                $StrSQL.= "GROUP BY set_st_desc ";
                $StrSQL.= "ORDER BY set_st_desc";
            }else{
                $StrSQL = "SELECT COUNT(at_in_id) AS at_qtd, set_st_desc FROM v_rel_tot_at_setores ";
                $StrSQL.= "WHERE at_dt_cad BETWEEN STR_TO_DATE('".$dt_inicial."','%d-%m-%Y') AND STR_TO_DATE('".$dt_final."','%d-%m-%Y') ";
                $StrSQL.= "GROUP BY set_st_desc ";
                $StrSQL.= "ORDER BY set_st_desc";
            }

            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function relTotalAtendFinAtendente($dt_inicial, $dt_final){
            
            $ConnDB = new ConnDB();
            
            if($dt_inicial == $dt_final){
                $StrSQL = "SELECT user_st_nome, set_st_desc, at_in_qtd ";
                $StrSQL.= "FROM v_rel_tot_at_atendente ";
                $StrSQL.= "WHERE DATE_FORMAT(at_dt_cad, '%Y-%m-%d') = STR_TO_DATE('".$dt_inicial."', '%d-%m-%Y')";
            }else{
                $StrSQL = "SELECT user_st_nome, set_st_desc, at_in_qtd ";
                $StrSQL.= "FROM v_rel_tot_at_atendente ";
                $StrSQL.= "WHERE at_dt_cad BETWEEN STR_TO_DATE('".$dt_inicial."', '%d-%m-%Y') AND STR_TO_DATE('".$dt_final."','%d-%m-%Y') ";
            }
           
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function relTotalAtendFinAtendenteV2($dt_inicial, $dt_final){
            
            $ConnDB = new ConnDB();

            if($dt_inicial == $dt_final){
                $StrSQL = "SELECT at_in_atendente, user_st_nome, COUNT(at_in_id) AS 'at_in_qtd' FROM v_rel_tot_at_atendente_v2 ";
                $StrSQL.= "WHERE at_dt_cad BETWEEN STR_TO_DATE('".$dt_inicial." 00:00:00', '%d-%m-%Y %H:%i:%s') AND STR_TO_DATE('".$dt_final." 23:00:00', '%d-%m-%Y %H:%i:%s') ";
                $StrSQL.= "GROUP BY at_in_atendente ";
                $StrSQL.= "ORDER BY at_in_qtd DESC";
            }else{
                $StrSQL = "SELECT at_in_atendente, user_st_nome, COUNT(at_in_id) AS 'at_in_qtd' FROM v_rel_tot_at_atendente_v2 ";
                $StrSQL.= "WHERE at_dt_cad BETWEEN STR_TO_DATE('".$dt_inicial."', '%d-%m-%Y') AND STR_TO_DATE('".$dt_final."', '%d-%m-%Y') ";
                $StrSQL.= "GROUP BY at_in_atendente ";
                $StrSQL.= "ORDER BY at_in_qtd DESC";
                
            }

            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaUltimaSenhaChamada(){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT * FROM v_busca_utima_senha_chamada";
            $Rs = $ConnDB->Consult($StrSQL);

            return $Rs;
        }

        public function buscaHisticoSenhaChamada(){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT * FROM v_busca_historico_senha_chamada";
            $Rs = $ConnDB->Consult($StrSQL);

            return $Rs;
        }

        public function  buscaUsuariosAtivos(){//Função para listar usuários existentes na tela de cadastro de usuários, utilizando a VIEW <v_busca_usuarios

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT * FROM v_busca_usuarios WHERE user_in_status = 1 GROUP BY user_in_id";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaSetores(){//Função para listar setores existentes na tela de cadstro de setor.

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT set_in_id, set_st_desc, set_st_prefixo, set_in_status, DATE_FORMAT(set_dt_cad, '%d/%m/%Y') AS set_dt_cad, ";
            $StrSQL.= "CASE ";
            $StrSQL.= "     WHEN set_dt_edit IS NULL THEN ' -- ' ";
            $StrSQL.= "     WHEN set_dt_edit IS NOT NULL THEN DATE_FORMAT(set_dt_edit, '%d/%m/%Y - %H:%i')" ;
            $StrSQL.= "END AS 'set_dt_edit' ";
            $StrSQL.= "FROM cad_tb_setor ";
            $StrSQL.= "WHERE D_E_L_E_T_E != '*'";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaSetoresAtivos(){//Função para listar setores na tela de geração de senha

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT set_in_id, set_st_desc, set_st_prefixo, set_in_status, DATE_FORMAT(set_dt_cad, '%d/%m/%Y') AS set_dt_cad, ";
            $StrSQL.= "CASE ";
            $StrSQL.= "     WHEN set_dt_edit IS NULL THEN ' -- ' ";
            $StrSQL.= "     WHEN set_dt_edit IS NOT NULL THEN DATE_FORMAT(set_dt_edit, '%d/%m/%Y - %H:%i')" ;
            $StrSQL.= "END AS 'set_dt_edit' ";
            $StrSQL.= "FROM cad_tb_setor ";
            $StrSQL.= "WHERE D_E_L_E_T_E != '*' AND set_in_status = 1";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaSetoresAtend(){//Função para listar todos os setores possíveis para transferencia e vinculo ao cadastro de usuário

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT set_in_id, set_st_desc, set_st_prefixo, set_in_status, DATE_FORMAT(set_dt_cad, '%d/%m/%Y') AS set_dt_cad, ";
            $StrSQL.= "CASE ";
            $StrSQL.= "     WHEN set_dt_edit IS NULL THEN ' -- ' ";
            $StrSQL.= "     WHEN set_dt_edit IS NOT NULL THEN DATE_FORMAT(set_dt_edit, '%d/%m/%Y - %H:%i')" ;
            $StrSQL.= "END AS 'set_dt_edit' ";
            $StrSQL.= "FROM cad_tb_setor ";
            $StrSQL.= "WHERE D_E_L_E_T_E != '*' AND set_in_status IN (1,2)";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function consultaVisitante($cpf){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT vis_st_cpf, vis_st_nome ";
            $StrSQL.= "FROM glo_tb_visitante WHERE vis_st_cpf = '".$cpf."' LIMIT 1";

            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function gravaVisitante($cpf, $visitante){

            $ConnDB = new ConnDB();
            $StrSQL = "INSERT INTO glo_tb_visitante (vis_st_cpf, vis_st_nome) ";
            $StrSQL.= "VALUES ('".$cpf."', '".$visitante."')";
            $ConnDB->Execute($StrSQL);
        }
    }
?>