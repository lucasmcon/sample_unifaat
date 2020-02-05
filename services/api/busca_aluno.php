<?php 
    include('unifaat.php');
    $unifaat = new unifaat();
    
    $ra = $_POST['ra'];

    if($unifaat->connVerify()){

        $Rs = $unifaat->consultaAluno($ra);
        $decoded = json_decode($Rs);
        
        if(!property_exists($decoded, 'errors')){    
            
            $explode = explode(' ', $decoded->aluno_nome);
            $artigo = array('DA','DE', 'DI', 'DO', 'DU', 'DAS', 'DES', 'DOS', 'DUS');
            $verif_artigo = array_intersect($explode, $artigo);
    
            if(!empty($verif_artigo) && !in_array($explode[2], $artigo)){
                $aluno_nome = $explode[0].' '.$explode[2];
            }else{
                $aluno_nome = $explode[0].' '.$explode[1];
            }
            
            $form = '<div class="form-group">';
            $form.= '<label>Nome:</label>';
            $form.= '<input class="form-control" value="'.$aluno_nome.'" readonly="yes" id="nome_aluno" name="nome_aluno">';
            $form.= '</div>';
            $form.= '<div class="form-group">';
            $form.= '<label>Curso:</label>';
            $form.= '<input class="form-control" value="'.$decoded->curso.'" readonly="yes" name="curso" id="curso">';
            $form.= '</div>';
    
            echo $form;
            
        }else{
            $form = '<div class="form-group">';
            $form.= '<label>Nome:</label>';
            $form.= '<input class="form-control text-center" value="RA não encontrado" readonly="yes" id="nome_aluno" name="nome_aluno">';
            $form.= '</div>';
            echo $form;
        }
    }else{
        $form = '<div class="form-group">';
        $form.= '<label>Nome:</label>';
        $form.= '<input class="form-control text-center" value="Senha padrão" readonly="yes" id="nome_aluno" name="nome_aluno">';
        $form.= '</div>';
        echo $form;
    }


?>
