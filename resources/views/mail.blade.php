<h1>Olá adm!</h1>
<p>Nova(s) palavra(s) usada(s) em chat de {{ $type }}:</p>

<b>{{ $palavra }}</b>
<br>
<br>


@if ($type == 'order')
    Se estiler logado, use o link abaixo para visualizar:<Br>
    <a href="https://p2win.com.br/dashboard/orders/details/{{ $orderid }}">Ver pedido</a>

@else
    Se estiler logado, use o link abaixo para visualizar:<Br>
    <a href="https://p2win.com.br/dashboard/chats/details/{{ $orderid }}">Ver CHAT</a>
@endif 

<br>
<br>
<b>Painel admin</b><br>
P2WIN Blacklist words system