<h1>Olá adm!</h1>
<p>Nova(s) palavra(s) usada(s) em chat de pedido:</p>

<b><?php echo e($palavra); ?></b>
<br>
<br>
<?php
if($type == 'order'){
    echo
    'Se estiler logado, use o link abaixo para visualizar:<Br>
    <a href="https://p2win.com.br/dashboard/orders/details/{{ $orderid }}">Ver pedido</a>';
}
else{
    'Se estiler logado, use o link abaixo para visualizar:<Br>
    <a href="https://p2win.com.br/dashboard/chats/details/{{ $orderid }}">Ver CHAT</a>';
}
?>
<br>
<br>
<b>Painel admin</b>
P2WIN Blacklist words system<?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/mail.blade.php ENDPATH**/ ?>