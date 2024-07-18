<style>
.txt-img-centered {

top: 35%;
width: 100%;
}

.breve:hover{
    filter: grayscale(1) !important;
}
</style>


<div class="container-fluid bg-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 py-4">
            <span class="titulo">Categorias Populares</span>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="grow" onclick="document.location.href = 'search?category_id=1&subcategory_id=&subcategoryd_id='">
                <center>
                <img src="public/img/home/popular/Icone Itens de Jogos.png"  class="img-fluid" 
                style="border-radius: 25px; width: 270px"/>
                <p><b>Itens de Jogos</b></p>
                </center>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 image-container">
                <div class="grow breve">
                <center>
                <img src="public/img/home/popular/Icone giftcard.png" class="img-fluid" 
                style="border-radius: 25px; width: 270px"/>
                    <div class="image-caption breve1" style="margin-left: 50%;margin-top: -30%;">
                        <p>EM<br>BREVE</p>
                    </div>
                <p><b>Cartões de Presente</b></p>
                </center>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4 image-container">
                <div class="grow breve">
                <center>
                <img src="public/img/home/popular/Icone Jogos.png" class="img-fluid" 
                style=" border-radius: 25px; width: 270px"/>
                    <div class="image-caption breve1" style="margin-left: 50%;margin-top: -30%;">
                        <p>EM<br>BREVE</p>
                    </div>
                <p><b>Jogos</b></p>
                </center>
                </div>
            </div>
        </div>


    </div>
</div>

<!--
    <div class="container-fluid bg-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 py-4">
            <span class="titulo">{{ __('messages.t_popular_categories') }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="grow" onclick="document.location.href = 'search?q=Itens+de+Jogos'">
                <center>
                <img src="public/img/home/popular/popular_roblox.png"  class="img-fluid" style="min-width:350px; max-width: 350px; min-height:350px; max-height:350px; "/>/>
                <p><b>{{ __('messages.t_game_itens') }}</b></p>
                </center>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="grow" onclick="document.location.href = 'search?q=cartões+de+Presente'">
                <center>
                <img src="public/img/home/popular/popular_giftcards.png" class="img-fluid" style="min-width:350px; max-width: 350px; min-height:350px; max-height:350px; "/>/>
                <p><b>{{ __('messages.t_gift_cards') }}</b></p>
                </center>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="grow" onclick="document.location.href = 'search?q=Blockchain+Itens'">
                <center>
                <img src="public/img/home/popular/popular_nft.png" class="img-fluid" style="min-width:350px; max-width: 350px; min-height:350px; max-height:350px; "/>/>
                <p><b>{{ __('messages.t_blockchain_itens') }}</b></p>
                </center>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="grow" onclick="document.location.href = 'search?q=Jogos'">
                <center>
                <img src="public/img/home/popular/popular_games.png" class="img-fluid" style="min-width:350px; max-width: 350px; min-height:350px; max-height:350px; "/>/>
                <p><b>{{ __('messages.t_title_games') }}</b></p>
                </center>
                </div>
            </div>
        </div>


    </div>
</div>
-->