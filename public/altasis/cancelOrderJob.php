
<?php
//#################################################################
//#   POR ALTASIS                                                 #
//#   EM 09/05/2023                                               #
//#   https://altasis.com.br                                      #
//#                                                               #
//#                                                               #
//#   O script vai ser incluído nas páginas home e orders do      # 
//#   seller, para todas vez que forem acessadas, ser verificado  #
//#   se existem orders com mais de 72horas de iniciadas.         #
//#   Se sim, mudar seu status para canceled.                     #
//#                                                               #
//#   UPDATE 09/04/2024                                           #
//#   Criada pagina no admin para controlar a execução em minutos #
//#   Este script vai rodar via crontab                           #
//#                                                               #
//#   UPDATE 26/04/2024                                           #
//#   Depois que o vendedor marcar entregue, o comprador tem time #
//#   out de 7 dias, se passar os 7 dias do time out e o comprador# 
//#   nao iniciou disputa ou nao confirmou o pedido, o pedido     # 
//#   finaliza como concluido                                     #
//#                                                               #
//#   Timeout da disputa (vendedor), apos abertura de disputa, o  #
//#   vendedor tem 7 dias para fazer o reembolso ou recusar o     #
//#   reembolso, caso nao tenha nenhuma ação nos 7 dias, o        #
//#   reembolso para o comprador é aprovado.                      #
//#                                                               #
//#   Timeout da disputa (comprador), caso o vendedor recuse o    #
//#   reembolso, o comprador tem 7 dias para poder iniciar disputa# 
//#   com o site, caso passe 7 dias e ele nao faça nenhuma ação, o# 
//#   reembolso se torna cancelado e pedido concluido.            #
//#################################################################


//setando o timezone para -3 (Rio, São Paulo, etc...)
date_default_timezone_set('America/Sao_Paulo');

// connect to database
$db['host'] = 'localhost';
$db['database'] = 'u991810173_teste';
$db['username'] = 'u991810173_thunderuzeus';
$db['password'] = 'M@rcello31598893';



//Pegar data atual e contar 72 horas para trás, considerando o horário
//$dataMenos3 = Date('Y-m-d H:i:s', strtotime('-3 days'));

//Pegando tempo de timeout da ação no banco, tabela settings_timeouts
$conn1 = new PDO('mysql:host='.$db['host'].'; dbname='.$db['database'].'', $db['username'], $db['password']);
$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dataTimeouts = $conn1->query("Select * from settings_timeouts where id=1");

foreach($dataTimeouts as $theTimeOut) {
    $tOut_conf_rec = $theTimeOut['timeoutVenda'];
    $tOut_disp_veb = $theTimeOut['timeoutEntrega'];
    $tOut_disp_com = $theTimeOut['timeoutResposta'];

    echo "Timeout de confirmação de recebimento (Comprador): ".$theTimeOut['timeoutVenda']."<br>";
    echo "Timeout de Disputa (Vendedor): ".$theTimeOut['timeoutVenda']."<br>";
    echo "Timeout de confirmação de recebimento (Comprador): ".$theTimeOut['timeoutVenda']."<br>";
}

$newTime = strtotime('-'.$tOut_conf_rec.' minutes');
$dataLimete_conf_rec =  date('Y-m-d H:i:s', $newTime);

$newTime = strtotime('-'.$tOut_disp_veb.' minutes');
$dataLimete_disp_veb =  date('Y-m-d H:i:s', $newTime);

$newTime = strtotime('-'.$tOut_disp_com.' minutes');
$dataLimete_disp_com =  date('Y-m-d H:i:s', $newTime);




//### SITUAÇÃO 1 -> PEDIDOS COM CONFIRMAÇÃO DE RECEBIMENTO ABERTA (status WAIT) ####
//tenta-se a conexão, e então verifica-se os dados obtidos.
 try {
     $conn = new PDO('mysql:host='.$db['host'].'; dbname='.$db['database'].'', $db['username'], $db['password']);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


     //TRATAMOS OS PEDIDOS COM CONFIRMAÇÃO DE RECEBIMENTO ABERTA (status WAIT)
     $data = $conn->query("Select * from order_items where proceeded_at <= '".$dataLimete_conf_rec."'AND status = 'waiting'");

    //iteramos o resultado em busca de algum dado 
     foreach($data as $row) {
         echo "ORDER ID: ".$row['id']." | STATUS: ".$row['status']."<br><br>";
     }

     //Se houver um array de dados, temos pedidos em wait a mais de 7 dias. Mudar seu status para delivered.
     if(isset($row)){
        if(sizeof($row) > 0){
            $data = $conn->query("UPDATE order_items set status = 'delivered' where proceeded_at <= '".$dataLimete_conf_rec."' AND status = 'waiting'");
            echo "Mais 1 dataLimete confirmação de recebimento <br>";
         }
     }
     else{
        echo "nenhuma ordem para executar<br><br>";
     }

 } 
 catch(PDOException $e) {
    //Mostar erro na execução, se necessário
    echo 'ERROR: ' . $e->getMessage();
 }



//### SITUAÇÃO 2 -> Timeout da disputa (vendedor)  ####
//tenta-se a conexão, e então verifica-se os dados obtidos.
 try {
    $conn = new PDO('mysql:host='.$db['host'].'; dbname='.$db['database'].'', $db['username'], $db['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //TRATAMOS OS PEDIDOS COM CONFIRMAÇÃO DE RECEBIMENTO ABERTA (status WAIT)
    $data = $conn->query("Select * from refunds where created_at <= '".$dataLimete_disp_veb."'AND status = 'pending'");

   //iteramos o resultado em busca de algum dado 
    foreach($data as $row) {
        echo "ORDER ID: ".$row['id']." | STATUS: ".$row['status']."<br><br>";
    }

    //Se houver um array de dados, temos pedidos em wait a mais de 7 dias. Mudar seu status para delivered.
    if(isset($row)){
       if(sizeof($row) > 0){
           $data = $conn->query("UPDATE refunds set status = 'accepted_by_seller' where created_at <= '".$dataLimete_disp_veb."' AND status = 'pending'");
           echo "Mais 1 dataLimete confirmação de recebimento <br>";
        }
    }
    else{
       echo "nenhuma ordem para executar<br><br>";
    }

} 
catch(PDOException $e) {
   //Mostar erro na execução, se necessário
   echo 'ERROR: ' . $e->getMessage();
}



//### SITUAÇÃO 3 -> Timeout da disputa (comprador)  ####
//tenta-se a conexão, e então verifica-se os dados obtidos.
try {
    $conn = new PDO('mysql:host='.$db['host'].'; dbname='.$db['database'].'', $db['username'], $db['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //TRATAMOS OS PEDIDOS COM CONFIRMAÇÃO DE RECEBIMENTO ABERTA (status WAIT)
    $data = $conn->query("Select * from refunds where created_at <= '".$dataLimete_disp_veb."'AND status = 'rejected_by_seller'");

   //iteramos o resultado em busca de algum dado 
    foreach($data as $row) {
        echo "ORDER ID: ".$row['id']." | STATUS: ".$row['status']."<br><br>";
    }

    //Se houver um array de dados, temos pedidos em wait a mais de 7 dias. Mudar seu status para delivered.
    if(isset($row)){
       if(sizeof($row) > 0){
           $data = $conn->query("UPDATE refunds set status = 'closed' where created_at <= '".$dataLimete_disp_veb."' AND status = 'rejected_by_seller'");
           echo "Mais 1 dataLimete confirmação de recebimento <br>";
        }
    }
    else{
       echo "nenhuma ordem para executar<br><br>";
    }

} 
catch(PDOException $e) {
   //Mostar erro na execução, se necessário
   echo 'ERROR: ' . $e->getMessage();
}


