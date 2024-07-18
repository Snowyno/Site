<?php

// Turn off all error reporting
error_reporting(0);


    use Livewire\WithFileUploads;
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
<div class="w-full" x-data="window.HtBWuUxgpMyrQEM" x-init="initialize">
    <form action="https://p2win.com.br/resources/views/livewire/main/seller/gigs/options/steps/save.blade.php" method="POST" enctype="multipart/form-data">      
    <input type="hidden" value="<?php echo Auth::id(); ?>" name="user_id" id="user_id" />
    <input type="hidden" value="<?php echo $uuid; ?>" name="uid" id="uid" />
    <input type="hidden" value="<?php echo $gig->id;?>" name="gid" id="gid" />

    {{-- Loading --}}
    <div wire:loading>
        <div class="fixed inset-0 flex items-end overflow-hidden justify-center sm:items-center z-50">
            <div class="w-full h-full flex items-center justify-center">
                <div class="app-preloader fixed z-50 grid h-full w-full place-content-center inset-0 bg-secondary-400 bg-opacity-60 transform transition-opacity dialog-backdrop backdrop-blur-sm dark:bg-secondary-700 dark:bg-opacity-60">
                    <div class="app-preloader-inner relative inline-block h-32 w-32"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
        
        {{-- Success --}}
        @if (session()->has('success'))
            <div class="col-span-12">
                <div class="rounded-md bg-green-100 dark:bg-zinc-700 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400 dark:text-zinc-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <p class="text-sm font-medium text-green-800 dark:text-zinc-400">{{ session()->get('success') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        @endif

        {{-- Images / Docs --}}
        <div class="col-span-12 lg:col-span-12" wire:key="section_images">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6 dark:bg-zinc-800 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="mb-14 flex justify-between items-center">
                    <div>
                        <h2 class="text-[15px] mb-1 tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100">
                            {{ __('messages.t_images') }}</h2>
                        <p class="text-[13px] text-gray-500 dark:text-gray-300">{{ __('messages.t_get_noticed_by_right_buyers_images') }}</p>
                    </div>

                </div>

                {{-- Section content --}}
                <div class="w-full mb-10">

                    {{-- Images uploader --}}
                    <div wire:ignore>
                        <x-forms.uploader model="images" id="uploader_images" :extensions="['jpg', 'jpeg', 'png']"
                            accept="image/jpg, image/jpeg, image/png" size="{{ settings('publish')->max_image_size }}"
                            max="{{ settings('publish')->max_images }}" />
                    </div>

                </div>

                {{-- Section title --}}
                <div class="mt-14 mb-6">
                    <h2 class="text-[15px] mb-1 tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('messages.t_gig_gallery') }}</h2>
                    <p class="text-[13px] text-gray-500 dark:text-gray-300">{{ __('messages.t_if_u_upload_new_images_below_will_be_deleted') }}
                    </p>
                </div>

               
                {{-- Old images --}}
                <div class="fileuploader fileuploader-theme-thumbnails">
                    <div class="fileuploader-items">
                        <ul class="!grid !grid-cols-12 sm:!gap-x-6 gap-y-6 !m-auto fileuploader-items-list">

                            @foreach ($gig->images as $img)
                                <li
                                    wire:key="gallery-image-item-{{ $img->id }}"
                                    class="!col-span-12 sm:!col-span-6 md:!col-span-4 lg:!col-span-3 !w-full h-24 !m-auto fileuploader-item file-type-image file-ext-png file-has-popup rounded-[6px]">
                                    <div class="fileuploader-item-inner">
                                        <div class="type-holder">{{ $img->large->file_extension }}</div>
                                        <div class="actions-holder">
                                            <button type="button"
                                                x-on:click="confirm('{{ __('messages.t_are_u_sure_delete_this_image') }}') ? $wire.removeImage('{{ $img->id }}') : ''" 
                                                wire:loading.attr="disabled" 
                                                wire:target="removeImage('{{ $img->id }}')"
                                                class="fileuploader-action fileuploader-action-remove"
                                                title="{{ __('messages.t_delete') }}">
                                                <i class="fileuploader-icon-remove"></i>
                                            </button>
                                        </div>
                                        <div class="thumbnail-holder">
                                            <div class="fileuploader-item-image">
                                                <img class="lazy" src="{{ placeholder_img() }}" data-src="{{ src($img->small) }}" draggable="false">
                                            </div>
                                            <span class="fileuploader-action-popup"></span>
                                        </div>
                                        <div class="content-holder">
                                            <span>{{ human_filesize($img->large->file_size) }}</span>
                                        </div>
                                        <div class="progress-holder"></div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                

    <!-- NOME E DESCRIÇAO -->
    <div class="divisionTitle w-full px-8 py-2">
        <span class="font-extrabold tracking-wide leading-8 text-black dark:text-white" style="font-size: 1.2rem !important;">
        Nome e Descrição</span>
    </div> 

    <div class="w-full mb-6 px-8 py-6">
        <?php
        //print_r($gig);
        ?>

        {{-- Service title --}}
        <div class="col-span-12">
        <input required type="text" placeholder="fazer algo em que sou realmente bom (Max 30 chars)" 
       
        id="text-input-component-id-title" name="text-input-component-id-title" maxlength="30"
        
        class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500"
        value="<?php echo $gig->title;?>">
        </div>
                
        {{-- Desciption --}}
        <div class="col-span-12 mt-2">
            <textarea maxlength="250" style="width: 100% !important;" :placeholder="__('messages.t_briefly_describe_ur_gig') Max 250 chars"
            class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500"
            id="textarea-component-id-description" name="textarea-component-id-description"
            rows="4" cols="50" required><?php echo $gig->description;?></textarea>
        </div>

            <!-- Categoria, subcategoria e subcategoria-->
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 py-6">
            {{-- Category --}}
            <div class="col-span-12 md:col-span-6">
                    <label class="mb-3 block text-xs font-medium {{ $errors->first('category') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-200' }}">{{ __('messages.t_choose_parent_category') }}</label>
                    <div class="min-w-0">
                    <select 
                    class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500"name="category" id="category" required onchange="habilitasub();">
                    <option class="dark:bg-zinc-700" value="x" selected>Escolha</option>
                    @foreach ($categorias as $cat)
                        <?php
                        if($category == $cat['id']){ 
                        ?>
                        <option class="dark:bg-zinc-700" onclick="selecionaCategoria(<?php echo $cat['id']; ?>);"  value="{{$cat['id']}}" selected>{{ $cat['name'] }}</option>
                        <?php
                        }
                        else{
                        ?>
                        <option class="dark:bg-zinc-700" onclick="selecionaCategoria(<?php echo $cat['id']; ?>);"  value="{{$cat['id']}}">{{ $cat['name'] }}</option>
                        <?php
                        }
                        ?>
                    @endforeach
                    </select>


                    </div>
      
                </div>
            
                {{-- Subcategory --}}
                <div class="col-span-12 md:col-span-6">

                    <label class="mb-3 block text-xs font-medium {{ $errors->first('subcategory') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-200' }}">{{ __('messages.t_choose_subcategory') }}</label>
                    <div class="min-w-0">

                    <select class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500 disabled:cursor-not-allowed" name="subcategory" id="subcategory" disabled onchange="habilitasubd();">>
                    <option class="dark:bg-zinc-700" value="x" selected>Escolha</option>
                    @foreach ($subcategorias as $subcat)
                       <?php
                        if($subcategory == $subcat['id']){ 
                        ?>
                           <option class="dark:bg-zinc-700" onclick="selecionaSubCategoria(<?php echo $subcat['id']; ?>);"  class="subcategoria sub_parent_{{$subcat['parent_id']}}" value="{{$subcat['id']}}" selected>{{ $subcat['name'] }}</option>
                        <?php
                        }
                        else{
                        ?>
                          <option class="dark:bg-zinc-700" onclick="selecionaSubCategoria(<?php echo $subcat['id']; ?>);"  class="subcategoria sub_parent_{{$subcat['parent_id']}}" value="{{$subcat['id']}}">{{ $subcat['name'] }}</option>
                        <?php
                        }
                        ?>

                    @endforeach
                    </select>
                    

                    </div>

                </div>



                {{-- Subcategoryd --}}
                <div class="col-span-12 md:col-span-6">

                    <label class="mb-3 block text-xs font-medium {{ $errors->first('subcategoryd') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-200' }}">{{ __('messages.t_choose_subcategory_detail') }}</label>
                  
                    <div class="min-w-0" id="subcategddiv">

                    <select class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500 disabled:cursor-not-allowed" name="subcategoryd" id="subcategoryd" disabled onchange="setavalorsubcategoriad();">
                    <option class="dark:bg-zinc-700" value="x" selected>Escolha</option>
                    @foreach ($subcategoriasd as $subcatd)
                        <?php
                        if($subcategoryd == $subcatd['id']){ 
                        ?>
                           <option class="dark:bg-zinc-700" onclick="selecionaSubCategoriad(<?php echo $subcatd['id']; ?>);" class="subcategoriad subd_parent_{{$subcatd['parent_id']}}" value="{{$subcatd['id']}}" selected>{{ $subcatd['name'] }}</option>
                        <?php
                        }
                        else{
                        ?>
                           <option class="dark:bg-zinc-700" onclick="selecionaSubCategoriad(<?php echo $subcatd['id']; ?>);" class="subcategoriad subd_parent_{{$subcatd['parent_id']}}" value="{{$subcatd['id']}}">{{ $subcatd['name'] }}</option>
                        <?php
                        }
                        ?>
                    @endforeach
                    </select>
                    </div>


                </div>


   

                <input type="hidden" name="idcateg" id="idcateg"     value="<?php echo $category; ?>" />
                <input type="hidden" name="idscateg" id="idscateg"   value="<?php echo $subcategory; ?>" />
                <input type="hidden" name="idscategd" id="idscategd" value="<?php echo $subcategoryd; ?>" />


            </div>
    </div> 

    <!-- PREÇOO E ENTREGA -->
    <div class="divisionTitle w-full px-8 pt-2">
        <span class="font-extrabold tracking-wide leading-8 text-black dark:text-white" style="font-size: 1.2rem !important;">
        Preço e entrega</span>
    </div> 

    <div class="w-full mb-6 px-8">
        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 px-8 py-6">
            {{-- Service price --}}
            <div class="col-span-12 md:col-span-6">
                <div>
                    <label for="text-input-component-id-price" class="block text-[0.8125rem] font-medium tracking-wide text-gray-700 dark:text-white">Preço</label>
                    <div class="mt-2 relative">
                    <input 
                    value="<?php 
                    //echo $gig->price;

                    $number = $gig->price;
                    echo number_format($number,2,",",".");
                     
                    
                    ?>"
                    required onInput="mascaraMoeda(event);"  onblur="validaMins();" type="text" placeholder="0,00"
                    id="text-input-component-id-price" name="text-input-component-id-price" 
                    class="money disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 
                    placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800
                     dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500">
                    </div>
                </div>
            </div>

            {{-- Delivery time --}}
            <div class="col-span-12 md:col-span-6">
            <label for="text-input-component-id-delivery_time" class="block text-[0.8125rem] font-medium tracking-wide text-gray-700 dark:text-white">Prazo de Entrega</label>
                <div class="mt-2 relative">
                    <?php
                    $sel1 ="";
                    $sel2 ="";
                    $sel3 ="";
                    if($gig->delivery_time == 1){
                        $sel1 ="selected";
                    }else if($gig->delivery_time == 2){
                        $sel2 ="selected";
                    }else if($gig->delivery_time == 3){
                        $sel3 ="selected";
                    }
                    ?>

                    <select 
                    class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500" 
                    name="text-input-component-id-delivery_time" id="text-input-component-id-delivery_time">
                        <option class="dark:bg-zinc-700" value="1" <?php echo $sel1;?>>1 dia</option>
                        <option class="dark:bg-zinc-700" value="2" <?php echo $sel2;?>>2 dias</option>
                        <option class="dark:bg-zinc-700" value="3" <?php echo $sel3;?>>3 dias</option>
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

    <div class="w-full px-8 py-6 row dark:text-white">
        <div class="col-12 dark:text-white">
        Taxa de transferência digital: R$<span id="ttd"><?php echo 0.10*$gig->price;?></span> <br>
        Taxa de comissão: R$<span id="tdc"><?php echo 0.10*$gig->price;?></span> <br>
        Você faz: R$<span id="tvf"><?php echo $gig->price -(0.10*$gig->price);?></span>  <br>
        </div>
    </div>

    </div>

    {{-- Actions --}}
<div class="flex justify-between mb-5" id="btn_save_dis" style="display: none;">


    <button disabled style="background-color: var(--bs-secondary-bg); color: gray !important; border: 1px solid gray;"
    class="disabled:cursor-not-allowed text-[13px] font-semibold flex justify-center bg-secondary-600 hover:bg-secondary-700 text-white py-4 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer">
        Salvar Item
    </button>

</div>

<div class="flex justify-between mb-5" id="btn_save_ok" style="display: inline;">
    <button action="back" text="{{ __('messages.t_back') }}" active="bg-white dark:bg-zinc-700 dark:hover:zinc-800 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-gray-300"  />

    
    <button type="submit" wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray-500 dark:bg-zinc-600 dark:text-zinc-400 cursor-not-allowed " 
    wire:loading.class.remove="bg-primary-600 hover:bg-primary-700 text-white cursor-pointer" 
    wire:loading.attr="disabled" class=" text-[13px] font-semibold flex justify-center bg-primary-600 hover:bg-primary-700 text-white py-4 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer">

    
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

</form>

</div>

</div>

@push('scripts')
    {{-- AlpineJS --}}
    <script>
        function HtBWuUxgpMyrQEM() {
            return {

                initialize() {}

            }
        }
        window.HtBWuUxgpMyrQEM = HtBWuUxgpMyrQEM();
    </script>
@endpush


<script src=" https://cdn.jsdelivr.net/npm/simple-mask-money@3.0.1/lib/simple-mask-money.min.js "></script>
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


    // A $( document ).ready() block.
    $( document ).ready(function() {
        calculaTaxa();
    });


    function selecionaCategoria(id){
        $("#idcateg").val(id);
    }

    function selecionaSubCategoria(id){
        $("#idscateg").val(id);
    }

    function selecionaSubCategoriad(id){
        $("#idscategd").val(id);
    }


    function calculaTaxa(valor){

        //var valor = $("#text-input-component-id-price").val();

        var valortransf = 0.10 * parseFloat(valor);
        var valorcomissao = valortransf;
        var valorfinal = parseFloat(valor) - parseFloat(valortransf);



        $("#ttd").html(Math.round(valortransf));
        $("#tdc").html(Math.round(valorcomissao));
        $("#tvf").html(Math.round(valorfinal));
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
        }
        
        if(result > max){
            alert("Valor maior que o permitido.");
            $("#text-input-component-id-price").val('');
        }

        console.log("result: "+result);
        console.log("max: "+max);
        console.log("min: "+min);

    }

    function habilitasub(){
        var valorCat = $("#category").val();
        //alert(valorCat);

        if(valorCat != "x"){

            $("#btn_save_dis").hide();
            $("#btn_save_ok").show();

            console.log("categoria selecionada");
            $("#subcategory").prop("selectedIndex", 0);
            $("#subcategoryd").prop("selectedIndex", 0);

            $('#subcategory').prop("disabled", false);
            $(".subcategoria").hide();
            $(".sub_parent_"+valorCat).show();

            $("#idcateg").val(valorCat);
            $("#idscateg").val(0);
            $("#idscategd").val(0);
        }
        else{

            $("#btn_save_dis").show();
            $("#btn_save_ok").hide();

            console.log("categoria selecionada");
            $("#subcategory").prop("selectedIndex", 0);
            $('#subcategory').prop("disabled", true);
            $(".subcategoria").hide();   

            $("#subcategoryd").prop("selectedIndex", 0);
            $('#subcategoryd').prop("disabled", true);
            $(".subcategoriad").hide();  

            $("#idcateg").val(0);
            $("#idscateg").val(0);
            $("#idscategd").val(0);
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

            $("#idscateg").val(valorSub);
            $("#idscategd").val(0);
        }
        else{
            console.log("subcategoria selecionada");
            $("#subcategoryd").prop("selectedIndex", 0);
            $('#subcategoryd').prop("disabled", true);
            $(".subcategoriad").hide();  

            $("#idscateg").val(0);
            $("#idscategd").val(0);
        }
    }


    function setavalorsubcategoriad(){
        var valorSubd = $("#subcategoryd").val();
 

        if(valorSubd != "x"){
            $("#idscategd").val(valorSubd);
        }
        else{
            $("#idscategd").val(0);
        }
       
    }    
</script>
<?php
}
?> 