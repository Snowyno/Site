<h1>Olá adm!</h1>
<p>Nova(s) palavra(s) usada(s) em chat de <?php echo e($type); ?>:</p>

<b><?php echo e($palavra); ?></b>
<br>
<br>


<?php if($type == 'order'): ?>
    Se estiler logado, use o link abaixo para visualizar:<Br>
    <a href="https://p2win.com.br/dashboard/orders/details/<?php echo e($orderid); ?>">Ver pedido</a>

<?php else: ?>
    Se estiler logado, use o link abaixo para visualizar:<Br>
    <a href="https://p2win.com.br/dashboard/chats/details/<?php echo e($orderid); ?>">Ver CHAT</a>
<?php endif; ?> 

<br>
<br>
<b>Painel admin</b><br>
P2WIN Blacklist words system<?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/mail.blade.php ENDPATH**/ ?>