<?php
if(isset($_GET['category_id']) AND $_GET['category_id'] == 'x'){
    header('Location: search');
    die();
}
if(isset($_GET['category_id']) AND $_GET['category_id'] != 'x' AND $_GET['category_id'] != ''){
    $this->category_id= $_GET['category_id'];
}

if(isset($_GET['subcategory_id']) AND $_GET['subcategory_id'] != 'x' AND $_GET['subcategory_id'] != ''){
    $this->subcategory_id= $_GET['subcategory_id'];
}

if(isset($_GET['subcategoryd_id']) AND $_GET['subcategoryd_id'] != 'x' AND $_GET['subcategoryd_id'] != ''){
    $this->subcategoryd_id= $_GET['subcategoryd_id'];
}
?>

<?php
use App\Models\User;


@session_start();


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


@if (session('message'))

    <div id="alert_error_esgotado" class="alert alert-danger alert-dismissible fade show mt-2">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="fa fa-times mr-1"></i>
        {{ session('message') }}
    </div>

@endif


<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 pb-24 space-y-8 min-h-screen" x-data="window.xRiqSKhIlmnKtWu" x-init="initialize()" @keydown.window.escape="open = false" x-cloak>


    
    {{-- Mobile filters --}}
    <div x-show="open" class="fixed inset-0 flex z-40 lg:hidden" x-ref="dialog" aria-modal="true">
    
        <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." class="fixed inset-0 bg-black bg-opacity-25" @click="open = false" aria-hidden="true" style="display: none;">
        </div>

    
        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="ml-auto relative max-w-xs w-full h-full bg-white dark:bg-zinc-800 shadow-xl py-4 pb-12 flex flex-col overflow-y-auto" style="display: none;">

            <div class="px-4 flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-200">{{ __('messages.t_filter') }}</h2>
                <button type="button" class="ltr:-mr-2 rtl:-ml-2 w-10 h-10 bg-white dark:bg-zinc-700 p-2 rounded-md flex items-center justify-center text-gray-400 dark:text-gray-300" @click="open = false">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                </button>
            </div>

            {{-- Filter --}}
                <div class="mt-4 border-t border-gray-200 dark:border-zinc-700">
               

                {{-- Categ subcateg e subcated --}}
                            <div x-data="{ open: true }" class="py-3">

                                <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                    <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                        <span class="font-medium text-gray-900 dark:text-gray-300">{{ __('messages.t_category') }}</span>
                                        <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                            <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                            <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                        </span>
                                    </button>
                                </h3>


                                <div class="pt-6 px-4" x-show="open" style="display: none;">
                                    <div class="space-y-4">
        
                                        <div class="rounded-md shadow-sm -space-y-px">

          
                                        <select class="form-select" name="category" id="category_mob" wire:model.defer="category_id" wire:ignore name="category_id" onchange="habilitasub_mob();">
                                        <option value="x" selected>Todas</option>
                                        @foreach ($categorias as $cat)
                                            <option value="{{$cat['id']}}">{{ $cat['name'] }}</option>
                                        @endforeach
                                        </select>
                                        
                                        <select class="form-select" name="subcategory" id="subcategory_mob" wire:model.defer="subcategory_id" wire:ignore name="subcategory_id" disabled onchange="habilitasubd_mob();">>
                                        <option value="x" selected>Todas</option>
                                        @foreach ($subcategorias as $subcat)
                                            <option class="subcategoria sub_parent_{{$subcat['parent_id']}}" value="{{$subcat['id']}}">{{ $subcat['name'] }}</option>
                                        @endforeach
                                        </select>


                                        <select class="form-select" name="subcategoryd" id="subcategoryd_mob" wire:model.defer="subcategoryd_id" wire:ignore disabled name="subcategoryd_id">
                                        <option value="x" selected>Todas</option>
                                        @foreach ($subcategoriasd as $subcatd)
                                            <option class="subcategoriad subd_parent_{{$subcatd['parent_id']}}" value="{{$subcatd['id']}}">{{ $subcatd['name'] }}</option>
                                        @endforeach
                                        </select>

                                        </div>
                                    
                                    </div>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                                <script>
                                    function habilitasub_mob(){
                                        var valorCat_mob = $("#category_mob").val();
                                        //alert(valorCat);

                                        if(valorCat_mob != "x"){
                                            $("#subcategory_mob").prop("selectedIndex", 0);
                                            $("#subcategoryd").prop("selectedIndex", 0);
                                            habilitasubd_mob();
                                            $('#subcategory_mob').prop("disabled", false);
                                            $(".subcategoria").hide();
                                            $(".sub_parent_"+valorCat_mob).show();
                                        }
                                        else{
                                            $("#subcategory_mob").prop("selectedIndex", 0);
                                            $('#subcategory_mob').prop("disabled", true);
                                            $(".subcategoria").hide();  

                                            $("#subcategory_mob").prop("selectedIndex", 0);
                                            $('#subcategory_mob').prop("disabled", true);
                                            $(".subcategoriad").hide();  
                                        }
                                    }

                                    function habilitasubd_mob(){
                                        var valorSub_mob = $("#subcategory_mob").val();
                                        //alert(valorSub);

                                        if(valorSub_mob != "x"){
                                            $("#subcategoryd_mob").prop("selectedIndex", 0);
                                            $('#subcategoryd_mob').prop("disabled", false);
                                            $(".subcategoriad").hide();
                                            $(".subd_parent_"+valorSub_mob).show();
                                        }
                                        else{
                                            $("#subcategoryd_mob").prop("selectedIndex", 0);
                                            $('#subcategoryd_mob').prop("disabled", true);
                                            $(".subcategoriad").hide();  
                                        }
                                    }



                                    

                                </script>


                            </div>   


                            {{-- Personalized Price --}}
                <div x-data="{ open: true }" class="py-3">
                    <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-700 px-4">
                        <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                            <span class="font-medium text-gray-900">{{ __('messages.t_price') }}</span>
                            <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6 px-4" x-show="open" style="display: none;">
                        <div class="space-y-4">

                            <div class="rounded-md shadow-sm -space-y-px">
                                <div>
                                    <input type="integer" wire:model.defer="min_price" minlength="1" min="1" maxlength="999999999" max="999999999" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="{{ __('messages.t_min_price') }}">
                                </div>
                                <div>
                                    <input type="integer" wire:model.defer="max_price" minlength="1" min="1" maxlength="999999999" max="999999999" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="{{ __('messages.t_max_price') }}">
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>

                {{-- Delivery time --}}
                <div x-data="{ open: true }" class="py-3">
                    <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-700 px-4">
                        <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                            <span class="font-medium text-gray-900">{{ __('messages.t_delivery_time') }}</span>
                            <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6 px-4" x-show="open" style="display: none;">
                        <div class="space-y-4">

                            <?php
                                foreach ($delivery_times as $key => $time){
                                    if($time['value'] == 3){
                                        echo'
                                        <div class="flex items-center">
                                        <input wire:model.defer="delivery_time" id="filter-delivery-time-'.$key.'" value="'.$time['value'].'" name="delivery_time" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300">
                                        <label for="filter-delivery-time-'.$key.'" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            '.$time['text'].'
                                        </label> 
                                        </div>';
                                    }
                                }
                            ?>
                        
                        </div>
                    </div>
                </div>

                {{-- Action buttons --}}
                <div class="py-6 px-4">

                    {{-- Filter --}}
                    <x-forms.button action="filter" :text="__('messages.t_filter')" :block="true" />


                    
                </div>

            </div>

        </div>
    
    </div>
    
    {{-- Category Container --}}
    <main class="px-4 sm:px-6 lg:px-8">

        {{-- Section title --}}
        <div class="flex justify-between items-center mb-2 bg-transparent py-2 ltr:pr-6 rtl:pl-6 ltr:border-l-8 rtl:border-r-8 ltr:pl-4 rtl:pr-4 border-primary-600 rounded">

            {{-- Search term --}}
            <div>
                <span class="font-extrabold text-base text-gray-800 dark:text-gray-100 pb-1 block tracking-wider">{{ $q }}</span>
                <p class="text-sm text-gray-400">{{ __('messages.t_search_results_for_q', ['q' => $q]) }}</p>
            </div>

            {{-- Actions --}}
            <div>

                <div class="form-check form-switch group inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-200">
                    <input onclick="$('.userOffline').toggle();"
                    class="form-check-input" type="checkbox" role="switch" id="showonlyonoffline">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Online Users</label>
                </div>

                <div class="flex items-center">

                    


                    {{-- Sort by --}}
                    <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative inline-block ltr:text-left rtl:text-right">

                        {{-- Sort by button --}}
                        <div>
                            <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-200" id="menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                                {{ __('messages.t_sort_by') }}
                                <svg class="flex-shrink-0 ltr:-mr-1 rtl:-ml-1 ltr:ml-1 rtl:mr-1 h-5 w-5 text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-200 dark:hover:text-gray-200" x-description="Heroicon name: solid/chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
                            </button>
                        </div>
        
                        {{-- Sort by menu --}}
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="ltr:origin-top-right rtl:origin-top-left absolute ltr:right-0 rtl:left-0 mt-2 w-40 rounded-md shadow-sm bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 focus:outline-none z-50" x-ref="menu-items" x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                            <div class="py-1" role="none">
                            
                                {{-- Best selling --}}
                                <button wire:click="$set('sort_by', 'sales')" type="button" class="{{ $sort_by === 'sales' ? 'text-gray-900' : 'text-gray-500' }} block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                    {{ __('messages.t_most_selling') }}
                                </button>

                                {{-- Newest first --}}
                                <button wire:click="$set('sort_by', 'newest')" type="button" class="{{ $sort_by === 'newest' ? 'text-gray-900' : 'text-gray-500' }} block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                    {{ __('messages.t_newest_first') }}
                                </button>

                                {{-- Price: Low to High --}}
                                <button wire:click="$set('sort_by', 'price_low_high')" type="button" class="{{ $sort_by === 'price_low_high' ? 'text-gray-900' : 'text-gray-500' }} block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                    {{ __('messages.t_price_low_to_high') }}
                                </button>

                                {{-- Price: High to Low --}}
                                <button wire:click="$set('sort_by', 'price_high_low')" type="button" class="{{ $sort_by === 'price_high_low' ? 'text-gray-900' : 'text-gray-500' }} block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                    {{ __('messages.t_price_high_to_low') }}
                                </button>
                            
                            </div>
                        </div>
                    
                    </div>
        
                    {{-- Filter (Mobile) --}}
                    <button type="button" class="p-2 -m-2 ltr:ml-4 rtl:mr-4 ltr:sm:ml-6 rtl:sm:mr-6 text-gray-400 hover:text-gray-500 lg:hidden" @click="open = true">
                        <svg class="w-4 h-4" aria-hidden="true" x-description="Heroicon name: solid/filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path> </svg>
                    </button>

                </div>
            </div>

        </div>

        {{-- Section content --}}
        <section aria-labelledby="products-heading" class="pt-6 pb-24">
            <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-10">

                {{-- Filter --}}
                <div>

                {{-- Filters --}}
                        <div class="hidden lg:block bg-white dark:bg-zinc-700 shadow-sm border rounded-md border-gray-100 dark:border-zinc-600 h-fit">
                            

                            {{-- Categ subcateg e subcated --}}
                            <div x-data="{ open: true }" class="py-3">

                                <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                    <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                        <span class="font-medium text-gray-900 dark:text-gray-300">{{ __('messages.t_category') }}</span>
                                        <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                            <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                            <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                        </span>
                                    </button>
                                </h3>


                                <div class="pt-6 px-4" x-show="open" style="display: none;">
                                    <div class="space-y-4">
        
                                        <div class="rounded-md shadow-sm -space-y-px">


          
                                        <select class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" 
                                        name="category" id="category" wire:model.defer="category_id" wire:ignore name="category_id" onchange="habilitasub();">
                                        <option value="x" selected>Todas</option>
                                        @foreach ($categorias as $cat)
                                            <option value="{{$cat['id']}}">{{ $cat['name'] }}</option>
                                        @endforeach
                                        </select>
                                        
                                        <select class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" 
                                        name="subcategory" id="subcategory" wire:model.defer="subcategory_id" wire:ignore name="subcategory_id"  onchange="habilitasubd();">>
                                        <option value="x" selected>Todas</option>
                                        @foreach ($subcategorias as $subcat)
                                            <option class="subcategoria sub_parent_{{$subcat['parent_id']}}" value="{{$subcat['id']}}">{{ $subcat['name'] }}</option>
                                        @endforeach
                                        </select>


                                        <select class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600"
                                         name="subcategoryd" id="subcategoryd" wire:model.defer="subcategoryd_id" wire:ignore  name="subcategoryd_id">
                                        <option value="x" selected>Todas</option>
                                        @foreach ($subcategoriasd as $subcatd)
                                            <option class="subcategoriad subd_parent_{{$subcatd['parent_id']}}" value="{{$subcatd['id']}}">{{ $subcatd['name'] }}</option>
                                        @endforeach
                                        </select>

                                        </div>
                                    
                                    </div>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                                <script>
                                    function habilitasub(){
                                        var valorCat = $("#category").val();
                                        //alert(valorCat);

                                        if(valorCat != "x"){
                                            $("#subcategory").prop("selectedIndex", 0);
                                            $("#subcategoryd").prop("selectedIndex", 0);
                                            habilitasubd();
                                            $('#subcategory').prop("disabled", false);
                                            $(".subcategoria").hide();
                                            $(".sub_parent_"+valorCat).show();
                                        }
                                        else{
                                            $("#subcategory").prop("selectedIndex", 0);
                                            $('#subcategory').prop("disabled", true);
                                            $(".subcategoria").hide();  

                                            $("#subcategoryd").prop("selectedIndex", 0);
                                            $('#subcategoryd').prop("disabled", true);
                                            $(".subcategoriad").hide();  
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
                                        }
                                        else{
                                            $("#subcategoryd").prop("selectedIndex", 0);
                                            $('#subcategoryd').prop("disabled", true);
                                            $(".subcategoriad").hide();  
                                        }
                                    }


                                    //tratando filtro
                                    const urlParams = new URLSearchParams(window.location.search);
                                    const category_id = urlParams.get('category_id');

                                    const subcategory_id = urlParams.get('subcategory_id');
                                   
                                    if(category_id != "" && category_id != null){
                                        $("#category").val(category_id);
                                        habilitasub();
                                        habilitasub_mob();
                                    }

                                    if(subcategory_id != "" && subcategory_id != null){
                                        $("#subcategory").val(subcategory_id);
                                        habilitasubd();
                                        habilitasubd_mob();
                                    }


                                  

                                    

                                </script>


                            </div>   


                            {{-- Personalized Price --}}
                        <div x-data="{ open: true }" class="py-3">
                            <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                    <span class="font-medium text-gray-900 dark:text-gray-300">{{ __('messages.t_price') }}</span>
                                    <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                        <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                        <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                    </span>
                                </button>
                            </h3>
                            <div class="pt-6 px-4" x-show="open" style="display: none;">
                                <div class="space-y-4">
    
                                    <div class="rounded-md shadow-sm -space-y-px">
                                        <div>
                                            <input type="integer" wire:model.defer="min_price" minlength="1" min="1" maxlength="999999999" max="999999999" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="{{ __('messages.t_min_price') }}">
                                        </div>
                                        <div>
                                            <input type="integer" wire:model.defer="max_price" minlength="1" min="1" maxlength="999999999" max="999999999" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="{{ __('messages.t_max_price') }}">
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
    
                        {{-- Delivery time --}}
                        <div x-data="{ open: true }" class="py-3">
                            <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                    <span class="font-medium text-gray-900 dark:text-gray-300">{{ __('messages.t_delivery_time') }}</span>
                                    <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                        <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                        <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                    </span>
                                </button>
                            </h3>
                            <div class="pt-6 px-4" x-show="open" style="display: none;">
                                <div class="space-y-4">
    
        
                                    <?php
                                        foreach ($delivery_times as $key => $time){
                                            if($time['value'] == 3){
                                                echo'
                                                <div class="flex items-center">
                                                <input wire:model.defer="delivery_time" id="filter-delivery-time-'.$key.'" value="'.$time['value'].'" name="delivery_time" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300">
                                                <label for="filter-delivery-time-'.$key.'" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                    '.$time['text'].'
                                                </label> 
                                                </div>';
                                            }
                                        }
                                    ?>

                                
                                </div>
                            </div>
                        </div>
    
                        {{-- Action buttons --}}
                        <div class="py-6 px-4">
    
                            {{-- Filter --}}
                            <x-forms.button action="filter" :text="__('messages.t_filter')" :block="true" />
    
    
                        </div>
                        
                    </div>

                </div>

                {{-- List of gigs --}}
                <div class="lg:col-span-2 xl:col-span-3">
                    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                        @forelse ($gigs as $gig)

                            <?php
                            if($gig->owner->isOnline()){
                                $online = '';
                            }
                            else{
                                $online =  'userOffline';
                            }

                            if($gig->owner->isOnline() == "" OR $gig->owner->isOnline() == null){
                                $online =  'userOffline';
                            }
                            ?>
                            
                            <?php
                            if($gig->orders_in_queue == 0 AND $gig->counter_sales == 0){
                            ?>
                            {{-- Gig item --}}
                            <div class="<?php echo $online; ?> col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-6 xl:col-span-4" wire:key="gigs-list-{{ $gig->uid }}">
                                @livewire('main.cards.gig', ['gig' => $gig], key("gig-item-" . $gig->uid))
                            </div>
                            <?php
                            }
                            ?>

                        @empty
                            
                            <div class="col-span-12">
                                <div class="py-14 px-6 text-center text-sm sm:px-14 border-dashed border-2">
                                    <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                                    <p class="mt-4 font-semibold text-gray-900">{{ __('messages.no_results_found') }}</p>
                                    <p class="mt-2 text-gray-500">{{ __('messages.t_we_couldnt_find_anthing_search_term') }}</p>
                                </div>
                            </div>

                        @endforelse


                        @forelse ($gigs as $gig)

                            <?php
                            if($gig->owner->isOnline()){
                                $online = '';
                            }
                            else{
                                $online =  'userOffline';
                            }

                            if($gig->owner->isOnline() == "" OR $gig->owner->isOnline() == null){
                                $online =  'userOffline';
                            }
                            ?>
                            
                            <?php
                            if($gig->orders_in_queue > 0 OR $gig->counter_sales > 0){
                            ?>
                            {{-- Gig item --}}
                            <div class="<?php echo $online; ?> col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-6 xl:col-span-4" wire:key="gigs-list-{{ $gig->uid }}">
                                @livewire('main.cards.gig', ['gig' => $gig], key("gig-item-" . $gig->uid))
                            </div>
                            <?php
                            }
                            ?>

                        @empty
                            
                            <div class="col-span-12">
                                <div class="py-14 px-6 text-center text-sm sm:px-14 border-dashed border-2">
                                    <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                                    <p class="mt-4 font-semibold text-gray-900">{{ __('messages.no_results_found') }}</p>
                                    <p class="mt-2 text-gray-500">{{ __('messages.t_we_couldnt_find_anthing_search_term') }}</p>
                                </div>
                            </div>

                        @endforelse

                        {{-- Pages --}}
                        @if ($gigs->hasPages())
                            <div class="col-span-12">
                                <div class="flex justify-center pt-12">
                                    {!! $gigs->links('pagination::tailwind') !!}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </section>
    </main>
</div>


<!--
//MOSTRANDO MENSAGEM AO INICAR O ATENDIMENTO DO PRODUTO 
POR ALTASIS EM 03/07/2023
-->
<script>
    document.addEventListener("DOMContentLoaded", function(){
        <?php 
        if(isset($_SESSION['message'])){
        ?>
            ///livewire mostra notificações usando a func abaixo com js
            window.$wireui.notify({title: '@lang('messages.t_attention_needed')', description: '@lang('messages.t_item_sold_off')',icon: 'error'});
        <?php
        unset($_SESSION['message']);
        }
        ?>

    });
</script>


@push('scripts')

    {{-- AlpineJs --}}
    <script>
        function xRiqSKhIlmnKtWu() {
            return {

                open: false,

                // Init component
                initialize() {
                    
                }

            }
        }
        window.xRiqSKhIlmnKtWu = xRiqSKhIlmnKtWu();
    </script>

@endpush





<!--<script src="{{url('public/altasis/tempoRestante.js')}}"> </script>-->