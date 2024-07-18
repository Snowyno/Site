<?php
   use Illuminate\Support\Str;

   $uuid = Str::uuid()->toString();

   
if(!isset($_GET['finished'])){

 
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


//Pegando categorias
$sql = "SELECT id, name from categories where is_visible = 1;";
$stmt = $conex->prepare($sql);	
$stmt->execute();
$categorias = $stmt->fetchAll();


//Pegando subcategorias
$sql = "SELECT id, parent_id, name from subcategories";
$stmt = $conex->prepare($sql);	
$stmt->execute();
$subcategorias = $stmt->fetchAll();


//Pegando subcategoriasd
$sql = "SELECT id, parent_id, name from subcategoriesd";
$stmt = $conex->prepare($sql);	
$stmt->execute();
$subcategoriasd = $stmt->fetchAll();



?>
<form id="frmCreate" action="resources/views/livewire/main/create/steps/save.blade.php" method="POST" enctype="multipart/form-data">     



<div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">
        <!-- FOTOS -->
        <div class="divisionTitle w-full px-8 py-2">
            <span class="font-extrabold tracking-wide leading-8 text-black dark:text-white" style="font-size: 1.2rem !important;">
            Capturas de Tela / Fotos </span>
        </div>  

        <div class="w-full mb-6 px-8 py-6">

            
            <div wire:ignore>
                <span class="mb-2 text-xs font-semibold tracking-wide flex items-center text-gray-700 dark:text-gray-100"><?php echo e(__('messages.t_upload_gig_images')); ?></span>
                <?php if (isset($component)) { $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59 = $component; } ?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'images','id' => 'uploader_images','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['jpg', 'jpeg', 'png']),'accept' => 'image/jpg, image/jpeg, image/png','size' => ''.e(settings('publish')->max_image_size).'','max' => ''.e(settings('publish')->max_images).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59)): ?>
<?php $component = $__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59; ?>
<?php unset($__componentOriginal9eb2600c2d12964ae30115ef6c121fa79fa74a59); ?>
<?php endif; ?>
            </div>

        </div>

        <!-- NOME E DESCRIÇAO -->
        <div class="divisionTitle w-full px-8 py-2">
            <span class="font-extrabold tracking-wide leading-8 text-black dark:text-white" style="font-size: 1.2rem !important;">
            Nome e Descrição</span>
        </div> 

        <div class="w-full mb-6 px-8 py-6">

            
            <div class="col-span-12">
            <input required type="text" placeholder="fazer algo em que sou realmente bom (Max 30 chars)" wire:model.defer="title" 
            id="text-input-component-id-title" name="text-input-component-id-title" maxlength="30"
            onfocus="" onblur="validaInserts();"  onkeyup="validaInserts();" 
            class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500">
            </div>
                    
            
            <div class="col-span-12 mt-2">
                <textarea maxlength="250" onblur="validaInserts();"  onkeyup="validaInserts();" required style="width: 100% !important;" placeholder="Descreva aqui seu item (Max 250 chars)" 
                class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal 
                placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent 
                focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500"
                id="textarea-component-id-description" name="textarea-component-id-description"
                rows="4" cols="50"></textarea>
            </div>

            <!-- Categoria, subcategoria e subcategoria-->
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 py-6">
                
                <div class="col-span-12 md:col-span-6">
                    <label class="mb-3 block text-xs font-medium <?php echo e($errors->first('category') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-200'); ?>"><?php echo e(__('messages.t_choose_parent_category')); ?></label>
                    <div class="min-w-0">



                    <select class="form-select" name="category" id="category" required onchange="habilitasub();">
                    <option value="x" selected>Escolha</option>
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option onclick="selecionaCategoria(<?php echo $cat['id']; ?>);"  value="<?php echo e($cat['id']); ?>"><?php echo e($cat['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>


                    </div>
      
                </div>
            
                
                <div class="col-span-12 md:col-span-6">

                    <label class="mb-3 block text-xs font-medium <?php echo e($errors->first('subcategory') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-200'); ?>"><?php echo e(__('messages.t_choose_subcategory')); ?></label>
                    <div class="min-w-0">

                    <select class="form-select disabled:cursor-not-allowed" name="subcategory" id="subcategory" disabled onchange="habilitasubd();">>
                    <option value="x" selected>Escolha</option>
                    <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option onclick="selecionaSubCategoria(<?php echo $subcat['id']; ?>);"  class="subcategoria sub_parent_<?php echo e($subcat['parent_id']); ?>" value="<?php echo e($subcat['id']); ?>"><?php echo e($subcat['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    

                    </div>

                </div>



                
                <div class="col-span-12 md:col-span-6">

                    <label class="mb-3 block text-xs font-medium <?php echo e($errors->first('subcategoryd') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-200'); ?>"><?php echo e(__('messages.t_choose_subcategory_detail')); ?></label>
                  
                    <div class="min-w-0" id="subcategddiv">

                    <select class="form-select disabled:cursor-not-allowed" name="subcategoryd" id="subcategoryd" disabled onchange="setavalorsubcategoriad();">
                    <option value="x" selected>Escolha</option>
                    <?php $__currentLoopData = $subcategoriasd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcatd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option onclick="selecionaSubCategoriad(<?php echo $subcatd['id']; ?>);" class="subcategoriad subd_parent_<?php echo e($subcatd['parent_id']); ?>" value="<?php echo e($subcatd['id']); ?>"><?php echo e($subcatd['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>


                </div>



            </div>
        </div>

        <!-- PREÇOO E ENTREGA -->
        <div class="divisionTitle w-full px-8 pt-2">
            <span class="font-extrabold tracking-wide leading-8 text-black dark:text-white" style="font-size: 1.2rem !important;">
            Preço e entrega</span>
        </div> 

        <div class="w-full mb-6 px-8">
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 px-8 py-6">
                
                <div class="col-span-12 md:col-span-6">
                    <div>
                        <label for="text-input-component-id-price" class="block text-[0.8125rem] font-medium tracking-wide text-gray-700 dark:text-white">Preço</label>
                        <div class="mt-2 relative">
                        <input  onblur="validaInserts();"   required onInput="mascaraMoeda(event);" type="text" placeholder="0,00" wire:model.defer="price" 
                        id="text-input-component-id-price" name="text-input-component-id-price"  
                        class="money disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 
                        rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] 
                        dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white 
                        rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500">
                        </div>
                    </div>
                </div>

                
                <div class="col-span-12 md:col-span-6">
                <label for="text-input-component-id-delivery_time" class="block text-[0.8125rem] font-medium tracking-wide text-gray-700 dark:text-white">Prazo de Entrega</label>
                    <div class="mt-2 relative">
                        <select  required 
                        class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500" 
                        name="text-input-component-id-delivery_time" id="text-input-component-id-delivery_time">
                            <option value="1">1 dia</option>
                            <option value="2">2 dias</option>
                            <option value="3">3 dias</option>
                        </select>
                    </div> 
                </div>
            </div>
        </div>


        <!-- Estimativas de custo -->
        <div class="divisionTitle w-full px-8 py-2">
            <span class="font-extrabold tracking-wide leading-8 text-black dark:text-white" style="font-size: 1.2rem !important;">
            Estimativa de taxas e receita</span>
        </div> 

        <div class="w-full px-8 py-6 row">
            <div class="col-12">
            Taxa de transferência digital: R$<span id="ttd">0.00</span> <br>
            Taxa de comissão: R$<span id="tdc">0.00</span> <br>
            Você faz: R$<span id="tvf">0.00</span>  <br>
            </div>
        </div>
</div>


<div class="flex justify-between mb-5" id="btn_save_dis" style="display: inline;">


    <button disabled style="background-color: var(--bs-secondary-bg); color: black !important;"
    class="disabled:cursor-not-allowed text-[13px] font-semibold flex justify-center bg-secondary-600 hover:bg-secondary-700 text-white py-4 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer">
        Salvar Item
    </button>

</div>



<div class="flex justify-between mb-5" id="btn_save_ok" style="display: none;">


    
    <button wire:click="save" wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray-500 dark:bg-zinc-600 dark:text-zinc-400 cursor-not-allowed " wire:loading.class.remove="bg-primary-600 hover:bg-primary-700 text-white cursor-pointer" wire:loading.attr="disabled" class=" text-[13px] font-semibold flex justify-center bg-primary-600 hover:bg-primary-700 text-white py-4 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer">

    
    <div wire:loading="" wire:target="save">
        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
        </svg>
    </div>

    
    <div wire:loading.remove="" wire:target="save">
        Salvar Item
    </div>
 

</button>


</div> 

<input type="hidden" value="<?php echo Auth::id(); ?>" name="user_id" id="user_id" />
<input type="hidden" value="<?php echo $uuid; ?>" name="uid" id="uid" />
<input type="hidden" class="disabled:cursor-not-allowed focus:!ring-1 "  style="border: none;background-color: #f5f5f500;" name="categoria" id="categoria"  />
<input type="hidden"  class="disabled:cursor-not-allowed focus:!ring-1 " style="border: none;background-color: #f5f5f500;"  name="subcategoria" id="subcategoria" />
<input type="hidden" class="disabled:cursor-not-allowed focus:!ring-1 " style="border: none;background-color: #f5f5f500;" name="subcategoriad" id="subcategoriad"  />
</form>

    <!--
    //MOSTRANDO MENSAGEM PRODUTO SEM DADOS 
    POR ALTASIS EM 28/07/2023
    -->
    <script>

 


        document.addEventListener("DOMContentLoaded", function(){
            <?php 
            if(isset($_GET['nullOrEmpty'])){
            ?>
                ///livewire mostra notificações usando a func abaixo com js
                window.$wireui.notify({title: '<?php echo app('translator')->get('messages.t_success'); ?>', description: '<?php echo app('translator')->get('messages.t_order_has_been_successfully_marked_progress'); ?>',icon: 'success'});
            <?php
            }
            ?>
        });

    </script>
    <!--<script src="<?php echo e(url('public/altasis/tempoRestante.js')); ?>"> </script>-->


    <script>

    function mascaraMoeda(event) {
    const onlyDigits = event.target.value
        .split("")
        .filter(s => /\d/.test(s))
        .join("")
        .padStart(3, "0")
    const digitsFloat = onlyDigits.slice(0, -2) + "." + onlyDigits.slice(-2)
    event.target.value = maskCurrency(digitsFloat)
    
    calculaTaxa(digitsFloat);

    }

    function maskCurrency(valor, locale = 'pt-BR', currency = 'BRL') {
        return new Intl.NumberFormat(locale, {
            style: 'currency',
            currency
        }).format(valor)
    }
    




    function calculaTaxa(valor){

        //var valor = $("#text-input-component-id-price").val();
       // console.log("Valor para calc taxa:".valor);

        var valortransf = 0.10 * parseFloat(valor);
        var valorcomissao = valortransf;
        var valorfinal = parseFloat(valor) - parseFloat(valortransf);

        $("#ttd").html(Math.round(valortransf));
        $("#tdc").html(Math.round(valorcomissao));
        $("#tvf").html(Math.round(valorfinal));

        //console.log("Valor valortransf:".valortransf);
        //console.log("Valor valorcomissao:".valorcomissao);
        //console.log("Valor valorfinal:".valorfinal);
    }

    function validaMins(){
        var valor = $("#text-input-component-id-price").val();
        var result = valor.slice(2);
        result = result.replace(".", "");
        result = result.replace(",", ".");

        //result = parseFloat(result);
        var min = parseFloat('0.10');
        var max = parseFloat('10000.01');

        if(result < min){
            alert("Valor menor que o permitido.");
            $("#text-input-component-id-price").val('');
            console.log("result: "+result);
            console.log("max: "+max);
            console.log("min: "+min);

            $("#btn_save_dis").show();
            $("#btn_save_ok").hide();
            console.log("INPUTS NAO OK!");

            return false;
        }
        else if(result > max){
            alert("Valor maior que o permitido.");
            $("#text-input-component-id-price").val('');

            $("#btn_save_dis").show();
            $("#btn_save_ok").hide();
            console.log("INPUTS NAO OK!");

            console.log("result: "+result);
            console.log("max: "+max);
            console.log("min: "+min);

            return false;
        }
        else{
            return true;
        }

       

    }


    function habilitasub(){
        var valorCat = $("#category").val();
        //alert(valorCat);

        if(valorCat != "x"){

            validaInserts();

            console.log("categoria selecionada");
            $("#subcategory").prop("selectedIndex", 0);
            $("#subcategoryd").prop("selectedIndex", 0);

            $('#subcategory').prop("disabled", false);
            $(".subcategoria").hide();
            $(".sub_parent_"+valorCat).show();

            $("#categoria").val(valorCat);
        }
        else{

            validaInserts();

            console.log("categoria selecionada");
            $("#subcategory").prop("selectedIndex", 0);
            $('#subcategory').prop("disabled", true);
            $(".subcategoria").hide();   

            $("#subcategoryd").prop("selectedIndex", 0);
            $('#subcategoryd').prop("disabled", true);
            $(".subcategoriad").hide();  

            $("#categoria").val();
            
        }
    }

    function habilitasubd(){
        var valorSub = $("#subcategory").val();
        //alert(valorSub);

        if(valorSub != "x"){
            $("#subcategoryd").prop("selectedIndex", 0);
            $('#subcategoryd').prop("disabled", false);
            $(".subcategoriad").hide();
            $(".subd_parent_"+valorSub).show();

            $("#subcategoria").val(valorSub);
        }
        else{
            console.log("subcategoria selecionada");
            $("#subcategoryd").prop("selectedIndex", 0);
            $('#subcategoryd').prop("disabled", true);
            $(".subcategoriad").hide();  

            $("#subcategoria").val();
        }
    }


    function setavalorsubcategoriad(){
        var valorSubd = $("#subcategoryd").val();
 

        if(valorSubd != "x"){
            $("#subcategoriad").val(valorSubd);
        }
        else{
            $("#subcategoriad").val();
        }
       
    }    





    function selecionaCategoria(id){
        
        $("#categoria").val(id);
        console.log('categ: '+id);
        document.getElementById('categoria').value = id;

        $("#categoria").val($( "#category" ).val());
        document.getElementById('categoria').value = $( "#category" ).val();

    }

    function selecionaSubCategoria(id){
        $("#subcategoria").val(id);
        console.log('scateg: '+id);
        document.getElementById('subcategoria').value = id;
    }

    function selecionaSubCategoriad(id){
        $("#subcategoriad").val(id);
        console.log('scategd: '+id);
        document.getElementById('subcategoriad').value = id;
    }


    function validaInserts(){
        console.log("validando inputs...");


       if( $("#text-input-component-id-title").val() != "" &&
        $("#textarea-component-id-description").val() != "" &&
        $("#category").val() != "x" &&
        $("#text-input-component-id-price").val() != ""){
            if(validaMins()){
                $("#btn_save_dis").hide();
                $("#btn_save_ok").show();
            }
            else{
                $("#btn_save_dis").show();
                $("#btn_save_ok").hide();
                console.log("INPUTS NAO OK!");
            }

        }
        else{
            $("#btn_save_dis").show();
            $("#btn_save_ok").hide();
            console.log("INPUTS NAO OK!");
        }
    }
</script>


<?php
}
?><?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/create/steps/overview.blade.php ENDPATH**/ ?>