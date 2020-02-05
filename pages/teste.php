<?php

    $artigo = array('DA','DE', 'DI', 'DO', 'DU', 'DAS', 'DES', 'DOS', 'DUS');
    $nome = 'lucas menezes conceicao';

    $explode = explode(' ', $nome);

    if(in_array($explode[2], $artigo)){
      print $explode[0].' '.$explode[1];
    }else{
      print $explode[0].' '.$explode[1];
    }

?>