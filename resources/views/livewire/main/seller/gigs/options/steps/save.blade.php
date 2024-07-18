<?php
/*EDIT STEP*/


/*

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/


//BANCO
define( 'MYSQL_HOST', 'localhost');
define( 'MYSQL_USER', 'u991810173_thunderuzeus'); 
define( 'MYSQL_PASSWORD', 'M@rcello31598893');
define( 'MYSQL_DB_NAME', 'u991810173_teste');


//### BANCO DE DADOS ### 
class BancoDeDados {
	
	public function conectar() {
		try
		{
			$PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
			$PDO->exec("set names utf8");
			return $PDO;
		}
		catch ( PDOException $e )
		{
			echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
			return $e;
		}

		return false;
	}
    
    
}



//Instanciando objeto da classe BancoDeDados
$login = new BancoDeDados();
$conex = $login->conectar();


echo "<pre>";
print_r($_POST);
echo "<hr />";
print_r($_FILES);
echo "</pre>";


//Pega Dado por dado
$gig_id = $_POST['gid'];
$USERID = $_POST['user_id'];
$UID = $_POST['uid'];
$NOME = $_POST['text-input-component-id-title'];
$DESCRICAO = $_POST['textarea-component-id-description'];
$CATEGORIA = $_POST['idcateg'];
$SUBCATEGORIA = $_POST['idscateg'];
$SUBCATEGORIAD = $_POST['idscategd'];
$PRECO = $_POST['text-input-component-id-price'];


if($PRECO == ""){
    $PRECO = 0;
}
//remove letras e outros do valor
//$PRECO = preg_replace("/[^0-9.]/", "", $PRECO );
$PRECO = str_replace(" ","",$PRECO); //CHAR INVISIVEL MAS DA PROBLEMA
$PRECO = str_replace("R$","",$PRECO);
$PRECO = str_replace(" ","",$PRECO);
$PRECO = str_replace(".","",$PRECO);
$PRECO = str_replace(",",".",$PRECO);
$PRECO = str_replace(" ","",$PRECO);

$ENTREGA = $_POST['text-input-component-id-delivery_time'];



//Imagens tem seu proprio UID, inseridas em ordem na tabela file_manager
//ids gerados lá são informados na gigs_images
$fl = 1;

if($_FILES['uploader_images']['error'][0] != 4){
foreach($_FILES['uploader_images']['tmp_name'] as $tempfile){
//for($aa=0; $aa<1; $aa++){
 
    if($tempfile != ""){
        
        echo "FILE ".$fl.": ".$tempfile."<br><br>";


        //SMALL//
        $random = microtime();
        $random = str_replace(".","",$random);
        $random = str_replace(" ","",$random);
        $filename = $random.".webp";
        $folderSmall = "../../../../../../../../public/storage/gigs/gallery/small/".$filename;  
        move_uploaded_file($tempfile, $folderSmall);

        $sql = "INSERT INTO file_manager (uid, file_folder, file_size, file_mimetype, file_extension) VALUES ('".$random."', 'gigs/gallery/small', '1864', 'image/png', 'webp');";
        $stmt = $conex->prepare($sql);	
        $stmt->execute();
        $result = $stmt->fetchAll();
        $count = $stmt->rowCount(); 
        $id_small = $conex->lastInsertId();
        


        //MEDIUM//
        usleep(100);
        $random2 = microtime();
        $random2 = str_replace(".","",$random2);
        $random2 = str_replace(" ","",$random2);
        $filename = $random2.".webp";
        $folderMedium = "../../../../../../../../public/storage/gigs/gallery/medium/".$filename;  
        move_uploaded_file($tempfile, $folderMedium);

        $sql = "INSERT INTO file_manager (uid, file_folder, file_size, file_mimetype, file_extension) VALUES ('".$random2."', 'gigs/gallery/medium', '1864', 'image/png', 'webp');";
        $stmt = $conex->prepare($sql);	
        $stmt->execute();
        $result = $stmt->fetchAll();
        $count = $stmt->rowCount(); 
        $id_medium = $conex->lastInsertId();
        


        //LARGE//
        usleep(500);
        $random3 = microtime();
        $random3 = str_replace(".","",$random3);
        $random3 = str_replace(" ","",$random3);
        $filename = $random3.".webp";
        $folderLarge = "../../../../../../../../public/storage/gigs/gallery/large/".$filename;
        move_uploaded_file($tempfile, $folderLarge);


        $sql = "INSERT INTO file_manager (uid, file_folder, file_size, file_mimetype, file_extension) VALUES ('".$random3."', 'gigs/gallery/large', '1864', 'image/png', 'webp');";
        $stmt = $conex->prepare($sql);	
        $stmt->execute();
        $result = $stmt->fetchAll();
        $count = $stmt->rowCount(); 
        $id_large = $conex->lastInsertId();
        
        /*
        $id_small =149;
        $id_medium =150;
        $id_large = 151;
        */

        if($fl == 1){
            //Salva tudo no banco
            //tratando a slug (remove espaçoi)
            $SLUG  = preg_replace("/[^a-zA-Z]+/", "", $NOME);

            /*
            $sql = "
            INSERT INTO gigs (uid, user_id, title, slug, description, price, delivery_time, category_id, subcategory_id, image_thumb_id, image_medium_id, image_large_id, status, counter_visits, counter_impressions, counter_sales, counter_reviews, rating, orders_in_queue, has_upgrades, has_faqs, video_link, video_id, deleted_at, created_at, updated_at)
            VALUES ('".$UID."', ".$USERID.", '".$NOME."', '".$SLUG."', '".$DESCRICAO."', '".$PRECO."' , '".$ENTREGA."', ".$CATEGORIA.", ".$SUBCATEGORIA.", ".$id_small.", ".$id_medium.", ".$id_large.", 1, '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL);"
            ;
            */

            $sql = "
            SET foreign_key_checks = 0;

            UPDATE gigs SET 
            title= '".$NOME."', slug = '".$SLUG."', description = '".$DESCRICAO."', price = '".$PRECO."' , delivery_time = '".$ENTREGA."', category_id = ".$CATEGORIA.", subcategory_id = ".$SUBCATEGORIA.", subcategoryd_id = ".$SUBCATEGORIAD.",
            image_thumb_id = ".$id_small.", image_medium_id = ".$id_medium.", image_large_id = ".$id_large.", 
            status = 1 WHERE id = ".$gig_id.";";

            echo "<br><br>".$sql."<br><br>";

            $stmt = $conex->prepare($sql);	
            $stmt->execute();
            $result = $stmt->fetchAll();
            $count = $stmt->rowCount(); 

          
        }
        
        
        $sql = "
        SET FOREIGN_KEY_CHECKS = 0;

        INSERT INTO gig_images (gig_id, img_thumb_id, img_medium_id, img_large_id)
        VALUES (".$gig_id.", ".$id_small.", ".$id_medium.", ".$id_large.")";
        $stmt = $conex->prepare($sql);	
        $stmt->execute();
        $result = $stmt->fetchAll();
        $count = $stmt->rowCount(); 
        $id_large = $conex->lastInsertId();
        
        

        $fl++;
    }
}
}
else{
    //Salva tudo no banco
    //tratando a slug (remove espaçoi)
    $SLUG  = preg_replace("/[^a-zA-Z]+/", "", $NOME);

    $sql = "
    SET foreign_key_checks = 0;

    UPDATE gigs SET 
    title= '".$NOME."', slug = '".$SLUG."', description = '".$DESCRICAO."', price = '".$PRECO."' , delivery_time = '".$ENTREGA."', category_id = ".$CATEGORIA.", subcategory_id = ".$SUBCATEGORIA.", subcategoryd_id = ".$SUBCATEGORIAD.",
    status = 1 WHERE id = ".$gig_id.";";

    echo "<br><br>".$sql."<br><br>";

    $stmt = $conex->prepare($sql);	
    $stmt->execute();
    $result = $stmt->fetchAll();
    $count = $stmt->rowCount(); 
}

//echo "<br> <a href='https://p2win.com.br/service/asd".$UID."'> SERVICO </a><br>";
header('location: https://p2win.com.br/seller/gigs/?saved');


