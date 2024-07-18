
<?php

$topSeller = DB::table('order_items')
             ->join('users', 'users.id', '=', 'order_items.owner_id')
             ->select(DB::raw('users.username, users.avatar_id as avatarid, owner_id, count(order_items.owner_id)'))
             ->groupBy('owner_id')
             ->get();
?>

<!--
select users.username, order_items.owner_id, count(order_items.owner_id) 
from order_items, users WHERE users.id = order_items.owner_id 
group by owner_id
-->

<div class="container-fluid" style="background-color: #f8f9fa !important;">
    <div class="container">
        <div class="row">
            <div class="col-12 py-4">
                <span class="titulo">Vendedores em Destaque</span>
                <!--<span class="seta float-end"><i class="bi bi-arrow-right"></i></span>-->
            </div>
        </div>
        <div class="row d-flex justify-content-center">

            <?php
           
                $contador = 0;

                foreach($topSeller as $tpss){

                    $avtrUidnam = "default-placeholder";
                    $avtrUidext = "jpg";
                    $avtrUid = "public/storage/default/".$avtrUidnam.".".$avtrUidext;

                    // Get avatar
                    if($tpss->avatar_id =! null){

                        $avatarUid = DB::table('file_manager')
                        ->where('id', '=', $tpss->avatarid)
                        ->get();

                        foreach($avatarUid as $avatar){
                            $avtrUidnam = $avatar->uid;
                            $avtrUidext = $avatar->file_extension;
                        }

                        $avtrUid = "public/storage/avatars/".$avtrUidnam.".".$avtrUidext;
                        
                    }
                    else{
                        $avtrUidnam = "default-placeholder";
                        $avtrUidext = "jpg";
                        $avtrUid = "public/storage/default/".$avtrUidnam.".".$avtrUidext;
                    }
               
                    //echo $avtrUid;
                 

                    echo'
                    <div class="col-6 col-md-2 py-2">
                        <div class="image-container" onclick="document.location.href = \'profile/'.$tpss->username.'\'">
                            <center>
                                <img src="'.$avtrUid.'" class="img-fluid" 
                                style="min-width: 150px !important; min-height: 150px !important
                                max-width: 150px !important; max-height: 150px !important"/>
        
                                <div class="image-caption">
                                    <p>'.$tpss->username.'</p>
                                </div>
                                
                            </center>
                        </div>  
                    </div>
                    ';
                    
                    $contador++;

                    if($contador == 12){
                        break;
                    }
                }

               //echo $contador;
            
            ?>
            
        </div>

        <div class="row">
            <div class="col-12 py-5 text-center">
            <p>Cheque ofertas de vendedores com melhores avaliações</p>
            </div>
        </div>
    
    </div>
</div>    