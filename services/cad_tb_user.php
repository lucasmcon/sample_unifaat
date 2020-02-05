<?php
    include('ConnDB.php');
    class cad_tb_user{   
        
        public function verifLogin($login, $senha){//Função dentro do processo de validação do login, verifica se os dados informados estão corretos/existem.
                      
            $ConnDB = new ConnDB();
            $StrSQL = "SELECT * FROM v_verif_login ";
            $StrSQL.= "WHERE user_st_login='".$login."' AND user_st_senha='".$senha."'";
            $Rs = $ConnDB->Consult($StrSQL);      
            return $Rs;
        }

        public function recuperaSenha($user_st_login){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT user_st_login FROM cad_tb_user WHERE user_st_login='".$user_st_login."'";
            $Rs = $ConnDB->Consult($StrSQL);

            if($Rs == ''){
                return 'ERROR';
            }else{
                $chars = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvXxZz1234567890";
                $novaSenha = substr(str_shuffle($chars), 0,20);
                $StrSQL_2 = "UPDATE cad_tb_user ";
                $StrSQL_2.= "SET user_st_senha='".sha1(md5($novaSenha))."' WHERE user_st_login='".$user_st_login."'";
                $ConnDB->Execute($StrSQL_2);

                $Rs_2 = array('SUCCESS', $novaSenha);
                return $Rs_2;
            }
        }
        
        public function  buscaUsuarios(){//Função para listar usuários existentes na tela de cadastro de usuários, utilizando a VIEW <v_busca_usuarios

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT * FROM v_busca_usuarios GROUP BY user_in_id";
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

        public function buscaSetoresAtivos(){//Função para listar setores ativos no totem, para geração de senhas

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


        public function  buscaUsuario($user_in_id){//Função para buscar e exibir dados de usuário específico na tela de edição de cadsatro de usuário.

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT * FROM v_busca_usuario WHERE user_in_id=".$user_in_id;
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function  buscaSetor($set_in_id){//Função para buscar e exibir dados de setor específico na tela de edição de cadastro de setor.

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT set_in_id, set_st_desc, set_st_prefixo, set_in_status ";
            $StrSQL.= "FROM cad_tb_setor ";
            $StrSQL.= "WHERE D_E_L_E_T_E != '*' AND set_in_id=".$set_in_id;
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaHorarioAtivoSetor($set_in_id){

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT * FROM sys_tb_set_horario WHERE set_in_id=$set_in_id";
            
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }
        

        public function buscaGuiches(){ //Função buscar todos os Guiches cadastrados no sistema 

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT gui_in_id, gui_st_desc, gui_in_status, DATE_FORMAT(gui_dt_cad, '%d/%m/%Y') AS gui_dt_cad,";
            $StrSQL.= "CASE ";
            $StrSQL.= "     WHEN gui_dt_edit IS NULL THEN ' -- ' ";
            $StrSQL.= "     WHEN gui_dt_edit IS NOT NULL THEN DATE_FORMAT(gui_dt_edit, '%d/%m/%Y - %H:%i') ";
            $StrSQL.= "END AS gui_dt_edit ";
            $StrSQL.= "FROM cad_tb_guiche ";
            $StrSQL.= "WHERE D_E_L_E_T_E != '*'";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaGuichesAtivos(){ //Função buscar todos os Guiches cadastrados no sistema 

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT gui_in_id, gui_st_desc, gui_in_status, DATE_FORMAT(gui_dt_cad, '%d/%m/%Y') AS gui_dt_cad,";
            $StrSQL.= "CASE ";
            $StrSQL.= "     WHEN gui_dt_edit IS NULL THEN ' -- ' ";
            $StrSQL.= "     WHEN gui_dt_edit IS NOT NULL THEN DATE_FORMAT(gui_dt_edit, '%d/%m/%Y - %H:%i') ";
            $StrSQL.= "END AS gui_dt_edit ";
            $StrSQL.= "FROM cad_tb_guiche ";
            $StrSQL.= "WHERE D_E_L_E_T_E != '*' AND gui_in_status = 1";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function buscaGuiche($gui_in_id){ //Função para buscar guiche específico

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT gui_in_id, gui_st_desc, gui_in_status ";
            $StrSQL.= "FROM cad_tb_guiche ";
            $StrSQL.= "WHERE D_E_L_E_T_E != '*' AND gui_in_id =".$gui_in_id;
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function listaSetores(){//Função para listar setores existentes na tela de cadastro de setores.

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT set_in_id, set_st_desc FROM cad_tb_setor WHERE set_in_status IN (1,2) AND D_E_L_E_T_E != '*'";
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function cadastraUsuario($user_st_nome, $user_st_login, $user_st_senha, $user_in_cad, $user_in_status, $set_in_id, $user_st_tipo, $gui_in_id){
        //Função para inserir novo usuário no banco.
            $ConnDB = new ConnDB();
    
            $StrSQL = "INSERT INTO cad_tb_user (user_st_nome, user_st_login, user_st_senha, user_in_cad, user_in_status, user_st_tipo, gui_in_id) ";
            $StrSQL.= "VALUES ('".$user_st_nome."', '".$user_st_login."', '".sha1(md5($user_st_senha))."', ".$user_in_cad.", ".$user_in_status.", '";
            $StrSQL.= $user_st_tipo."', ".$gui_in_id.")";
            $ConnDB->Execute($StrSQL);

            //$setorQtd = count($set_in_id);
            $setorQtd = $set_in_id == '' ? '' : count($set_in_id);

            if($setorQtd != ''){
                for($i=0; $i<$setorQtd; $i++){

                    $StrSQL_2 = "INSERT INTO sys_tb_user_setor (user_in_id, set_in_id) ";
                    $StrSQL_2.= "VALUES ((SELECT user_in_id FROM cad_tb_user ORDER BY user_in_id DESC LIMIT 1), ".$set_in_id[$i].")";
                    $ConnDB->Execute($StrSQL_2);
                }
            }
        }

        public function cadastraSetor($set_st_desc, $set_in_cad, $set_in_status, $set_st_prefixo){//Função para inserir novo setor no banco.
        
            $ConnDB = new ConnDB();
            $StrSQL = "INSERT INTO cad_tb_setor (set_st_desc, set_in_cad, set_in_status, set_st_prefixo) ";
            $StrSQL.= "VALUES ('".$set_st_desc."', ".$set_in_cad.", ".$set_in_status.", '".$set_st_prefixo."')";
            $ConnDB->Execute($StrSQL);
        }

        public function cadastraGuiche($gui_st_desc, $gui_in_cad, $gui_in_status){//Função para insierir novo guichê no banco.

            $ConnDB = new ConnDB();
            $StrSQL = "INSERT INTO cad_tb_guiche (gui_st_desc, gui_in_cad, gui_in_status, gui_dt_cad) ";
            $StrSQL.= "VALUES ('".$gui_st_desc."',".$gui_in_cad.", ".$gui_in_status.", NOW())";
            $ConnDB->Execute($StrSQL);
        }

        public function cadastraHorarioAtivo($set_in_id, $user_in_cad, $hora){

            $ConnDB = new ConnDB();
            $StrSQL = "INSERT INTO sys_tb_set_horario (set_in_id, user_in_cad, hor_dt_cad, seg_hr_ini_1, seg_hr_fin_1, seg_hr_ini_2, seg_hr_fin_2, ";
            $StrSQL.= "ter_hr_ini_1, ter_hr_fin_1, ter_hr_ini_2, ter_hr_fin_2, qua_hr_ini_1, qua_hr_fin_1, qua_hr_ini_2, qua_hr_fin_2, qui_hr_ini_1, ";
            $StrSQL.= "qui_hr_fin_1, qui_hr_ini_2, qui_hr_fin_2, sex_hr_ini_1, sex_hr_fin_1, sex_hr_ini_2, sex_hr_fin_2, sab_hr_ini_1, sab_hr_fin_1, ";
            $StrSQL.= "sab_hr_ini_2, sab_hr_fin_2) VALUES ";
            $StrSQL.= "($set_in_id, $user_in_cad, NOW(), '".$hora[0]."','".$hora[1]."','".$hora[2]."','".$hora[3]."','".$hora[4]."','".$hora[5]."', ";
            $StrSQL.= "'".$hora[6]."','".$hora[7]."','".$hora[8]."','".$hora[9]."','".$hora[10]."','".$hora[11]."', ";
            $StrSQL.= "'".$hora[12]."','".$hora[13]."','".$hora[14]."','".$hora[15]."','".$hora[16]."','".$hora[17]."', ";
            $StrSQL.= "'".$hora[18]."','".$hora[19]."','".$hora[20]."','".$hora[21]."','".$hora[22]."','".$hora[23]."')";            

            $ConnDB->Execute($StrSQL);
        }

        public function editaHorarioAtivo($set_in_id, $user_in_edit, $hora){

            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE sys_tb_set_horario SET user_in_edit=$user_in_edit, hor_dt_edit=NOW(), seg_hr_ini_1='".$hora[0]."', seg_hr_fin_1='".$hora[1]."', ";
            $StrSQL.= "seg_hr_ini_2='".$hora[2]."', seg_hr_fin_2='".$hora[3]."', ter_hr_ini_1='".$hora[4]."', ter_hr_fin_1='".$hora[5]."', ter_hr_ini_2='".$hora[6]."', ";
            $StrSQL.= "ter_hr_fin_2='".$hora[7]."', qua_hr_ini_1='".$hora[8]."', qua_hr_fin_1='".$hora[9]."', qua_hr_ini_2='".$hora[10]."', ";
            $StrSQL.= "qua_hr_fin_2='".$hora[11]."', qui_hr_ini_1='".$hora[12]."', qui_hr_fin_1='".$hora[13]."', qui_hr_ini_2='".$hora[14]."', ";
            $StrSQL.= "qui_hr_fin_2='".$hora[15]."', sex_hr_ini_1='".$hora[16]."', sex_hr_fin_1='".$hora[17]."', sex_hr_ini_2='".$hora[18]."', ";
            $StrSQL.= "sex_hr_fin_2='".$hora[19]."', sab_hr_ini_1='".$hora[20]."', sab_hr_fin_1='".$hora[21]."', sab_hr_ini_2='".$hora[22]."', ";
            $StrSQL.= "sab_hr_fin_2='".$hora[23]."' WHERE set_in_id=$set_in_id";

            $ConnDB->Execute($StrSQL);
        }

        public function editaUsuario($user_in_id, $user_st_nome, $user_st_login, $user_st_senha, $user_in_edit, $user_in_status, $gui_in_id, $set_in_id, $user_st_tipo){
        //Função para realizar update em usuário cadastrado.
            $ConnDB = new ConnDB();          
            $StrSQL = "UPDATE cad_tb_user SET ";
            $StrSQL.= "user_st_nome='".$user_st_nome."', user_st_login='".$user_st_login."', ";
            $StrSQL.= "user_st_senha='".$user_st_senha."', user_in_edit=".$user_in_edit.", ";
            $StrSQL.= "user_in_status=".$user_in_status.", gui_in_id=".$gui_in_id.", ";
            $StrSQL.= "user_st_tipo='".$user_st_tipo."', user_dt_edit=NOW() ";
            $StrSQL.= "WHERE user_in_id=".$user_in_id;
            $ConnDB->Execute($StrSQL);

            if($set_in_id != ''){
                $setorQtd = count($set_in_id);
                $deleteSetor = "DELETE FROM sys_tb_user_setor WHERE user_in_id=$user_in_id";
                $ConnDB->Execute($deleteSetor);
                
                for($i=0; $i<$setorQtd; $i++){
                    
                    $StrSQL_2 = "INSERT INTO sys_tb_user_setor (user_in_id, set_in_id) ";
                    $StrSQL_2.= "VALUES ($user_in_id, ".$set_in_id[$i].")";
                    $ConnDB->Execute($StrSQL_2);
                }
            }else{
                $deleteSetor = "DELETE FROM sys_tb_user_setor WHERE user_in_id=$user_in_id";
                $ConnDB->Execute($deleteSetor);
            }
        }

        public function getSetLastId(){

            $ConnDB= new ConnDB();
            $StrSQL = "SELECT set_in_id, set_in_cad FROM cad_tb_setor ORDER BY set_in_id DESC";
            $Rs = $ConnDB->Consult($StrSQL);

            return $Rs;
        }

        public function alteraGuiche($user_in_id, $gui_in_id){
            
            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE cad_tb_user SET gui_in_id=$gui_in_id WHERE user_in_id=$user_in_id";
            $ConnDB->Execute($StrSQL);
        }

        public function editaMeusDados($user_in_id, $user_st_senha){//Função para atualizar senha do usuario (tela 'Meus dados')
        
            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE cad_tb_user ";
            $StrSQL.= "SET user_st_senha='".sha1(md5($user_st_senha))."', user_in_edit=".$user_in_id.",";
            $StrSQL.= "user_dt_edit= NOW() ";
            $StrSQL.= "WHERE user_in_id=".$user_in_id;
            $ConnDB->Execute($StrSQL);
        }

        public function editaSetor($set_in_id, $set_st_desc, $set_st_prefixo, $set_in_edit, $set_in_status){
        //Função para realizar upate em setor cadastrado.
            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE cad_tb_setor SET ";
            $StrSQL.= "set_st_desc='".$set_st_desc."', set_st_prefixo='".$set_st_prefixo."', set_in_edit=".$set_in_edit.", set_in_status=".$set_in_status.", ";
            $StrSQL.= "set_dt_edit=NOW()";
            $StrSQL.= "WHERE set_in_id=".$set_in_id;
            $ConnDB->Execute($StrSQL);
        }

        public function editaGuiche($gui_in_id, $gui_st_desc, $gui_in_status, $user_in_id){//Função para realizar update no guiche selecionado

            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE cad_tb_guiche SET ";
            $StrSQL.= "gui_st_desc='".$gui_st_desc."', gui_in_status=".$gui_in_status.", gui_dt_edit=NOW(), gui_in_edit=".$user_in_id." ";
            $StrSQL.= "WHERE gui_in_id=".$gui_in_id;
            $ConnDB->Execute($StrSQL);
        }

        public function deletaUsuario($user_in_id, $user_in_delete){//Função para realizar exclusão lógica em usuário.
        
            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE cad_tb_user SET D_E_L_E_T_E = '*', user_dt_delete = NOW(), user_in_delete=$user_in_delete WHERE user_in_id=".$user_in_id;
            $ConnDB->Execute($StrSQL);
        }

        public function deletaSetor($set_in_id, $set_in_delete){//Função para realizar exclusão lógica em setor.
        
            if($this->verifDeleteSetor($set_in_id) != ''){
                return 'ERROR';
            }else{
                $ConnDB = new ConnDB();
                $StrSQL = "UPDATE cad_tb_setor SET D_E_L_E_T_E = '*', set_dt_delete = NOW(), set_in_delete=$set_in_delete WHERE set_in_id=$set_in_id";
                $ConnDB->Execute($StrSQL);        
                return 'SUCCESS';
            }
        }

        public function verifDeleteSetor($set_in_id){//Função para verificar se setor está vinculado à algum usuário antes da exclusão lógica

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT set_in_id FROM sys_tb_user_setor WHERE set_in_id=".$set_in_id;         
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function deletaGuiche($gui_in_id, $gui_in_delete){//FUnção para realizar exclusão lógica em guiche

            if($this->verifDeleteGuiche($gui_in_id) != ''){
                return 'ERROR';
            }else{
                $ConnDB = new ConnDB();
                $StrSQL = "UPDATE cad_tb_guiche SET D_E_L_E_T_E = '*', gui_dt_delete = NOW(), gui_in_delete=".$gui_in_delete." WHERE gui_in_id=".$gui_in_id;
                $ConnDB->Execute($StrSQL);
                return 'SUCCESS';
            }
        }

        public function verifDeleteGuiche($gui_in_id){//Função para verificar se guiche está associado à algum usuário antes da exclusão logica

            $ConnDB = new ConnDB();
            $StrSQL = "SELECT B.gui_in_id FROM cad_tb_user AS A ";
            $StrSQL.= "INNER JOIN cad_tb_guiche AS B ON B.gui_in_id = A.gui_in_id ";
            $StrSQL.= "WHERE B.gui_in_id=".$gui_in_id;
            $Rs = $ConnDB->Consult($StrSQL);
            return $Rs;
        }

        public function cadastraEmail($con_st_desc, $con_st_email, $con_st_senha, $con_st_smtp, $con_in_porta, $con_in_tls, $con_in_cad){
        //Função para cadatrar conta de e-mail responsável por disparos automáticos de e-mail
            $ConnDB = new ConnDB();
            $StrSQL = "INSERT INTO sys_tb_conta_email (con_st_desc, con_st_email, con_st_senha, con_st_smtp, con_in_porta, con_in_tls, con_in_cad) ";
            $StrSQL.= "VALUES ('".$con_st_desc."','".$con_st_email."','".$con_st_senha."','".$con_st_smtp."',".$con_in_porta.",".$con_in_tls.",".$con_in_cad.")";
            
            $ConnDB->Execute($StrSQL);
        }

        public function buscaEmailCadastrado(){
        //Função para buscar e exibir e-mail cadastrado na tela 'Emails' - visualização geral
            $ConnDB = new ConnDB();
            $StrSQL = "SELECT * FROM v_busca_email_cadastrado LIMIT 1  ";
            $Rs = $ConnDB->Consult($StrSQL);

            return $Rs;
        }
        
        public function buscaEmail($con_in_id){
        //Função para buscar e-mail exibi-lo na tela de edição do e-maul cadastrado
            $ConnDB = new ConnDB();
            $StrSQL = "SELECT * FROM sys_tb_conta_email WHERE con_in_id=$con_in_id";
            $Rs = $ConnDB->Consult($StrSQL);

            return $Rs;
        }

        public function editaEmail($con_st_desc, $con_st_email, $con_st_senha, $con_st_smtp, $con_in_porta, $con_in_tls, $con_in_edit){
        //Função para realizar UPDATE no e-mail cadastrado
            $ConnDB = new ConnDB();
            $StrSQL = "UPDATE sys_tb_conta_email SET con_st_desc='".$con_st_desc."', con_st_email='".$con_st_email."', ";
            $StrSQL.= "con_st_senha='".$con_st_senha."', con_st_smtp='".$con_st_smtp."', con_in_porta=".$con_in_porta.", ";
            $StrSQL.= "con_in_tls=".$con_in_tls.", con_in_edit=".$con_in_edit.", con_dt_edit=NOW() WHERE con_in_id=1";

            $ConnDB->Execute($StrSQL);
        }
    }
?>