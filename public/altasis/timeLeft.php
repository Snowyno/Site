<?php


    //Pegando tempo de timeout da ação no banco, tabela settings_timeouts
    $conn1 = new PDO('mysql:host='.$db['host'].'; dbname='.$db['database'].'', $db['username'], $db['password']);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dataTimeouts = $conn1->query("Select * from settings_timeouts where id=1");

    foreach($dataTimeouts as $theTimeOut) {
        $minutosSetados = $theTimeOut['timeoutVenda'];
       
    }

    $dateTime = new DateTime($_POST['placed_at']);
    $placed->modify('+'.$minutosSetados.' minutes');


    $tagora = date("Y-m-d H:i:s");
                         
    $from_time = strtotime($placed); 
    $to_time = strtotime($tagora); 
    
    $diff_minutes = round(abs($from_time - $to_time) / 60,2);
    
    //$temporestante = 10080-$diff_minutes;
    $temporestante = $minutosSetados-$diff_minutes;

    $horas = floor($temporestante / 60);
    
    if($horas > 24){
        $horas = round($horas/24,0);
        $diaOuHora = ' dias';
    }
    else{
        $diaOuHora = ' horas';
    }
    
    $minutos = $temporestante % 60;
    
    $tempoQueFalta = $horas.$diaOuHora." e ".$minutos." minutos";

    if($tempoQueFalta >0){
        echo $tempoQueFalta;
    }
    else{
        //libera valor para cliente
        //echo "Tempo Esgotado - Valor liberado. id: ". $_POST['id_order'];
        echo "Tempo Esgotado - Valor liberado";
    }
    
?>