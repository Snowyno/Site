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


if(isset($_GET['pricerange'])){
    $_SESSION['pricerange']= $_GET['pricerange'];

    if($_GET['pricerange'] ==  0){
        $_SESSION['pricerange'] = array(
            array("pricerange" => 0, "min" => 0, "max" => 999999999999)
        );
    }
    if($_GET['pricerange'] ==  1){
        $_SESSION['pricerange'] = array(
            array("pricerange" => 1, "min" => 0, "max" => 10)
        );
    }
    if($_GET['pricerange'] ==  2){
        $_SESSION['pricerange'] = array(
            array("pricerange" => 2, "min" => 11, "max" => 20)
        );
    }
    if($_GET['pricerange'] ==  3){
        $_SESSION['pricerange'] = array(
            array("pricerange" => 3, "min" => 21, "max" => 30)
        );
    }
    if($_GET['pricerange'] ==  4){
        $_SESSION['pricerange'] = array(
            array("pricerange" => 4, "min" => 31, "max" => 40)
        );
    }
    if($_GET['pricerange'] ==  5){
        $_SESSION['pricerange'] = array(
            array("pricerange" => 5, "min" => 41, "max" => 60)
        );
    }
    if($_GET['pricerange'] ==  6){
        $_SESSION['pricerange'] = array(
            array("pricerange" => 6, "min" => 61, "max" => 100)
        );
    }
    if($_GET['pricerange'] ==  7){
        $_SESSION['pricerange'] = array(
            array("pricerange" => 7, "min" => 101, "max" => 999999999)
        );
    }

}
else{
    $_SESSION['pricerange'] = array(
        array("pricerange" => 0, "min" => 0, "max" => 999999999999)
    );
}

 ?>
 <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 pb-24 space-y-8 min-h-screen">
    <div class="w-full" x-data="window.xRiqSKhIlmnKtWu" x-init="initialize()" @keydown.window.escape="open = false" x-cloak>
        
        
        <div x-show="open" class="fixed inset-0 flex z-40 lg:hidden" x-ref="dialog" aria-modal="true">
        
            <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." class="fixed inset-0 bg-black bg-opacity-25" @click="open = false" aria-hidden="true" style="display: none;">
            </div>

        
            <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="ml-auto relative max-w-xs w-full h-full bg-white dark:bg-zinc-800 shadow-xl py-4 pb-12 flex flex-col overflow-y-auto" style="display: none;">

                <div class="px-4 flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-200"><?php echo e(__('messages.t_filter')); ?></h2>
                    <button type="button" class="ltr:-mr-2 rtl:-ml-2 w-10 h-10 bg-white dark:bg-zinc-700 p-2 rounded-md flex items-center justify-center text-gray-400 dark:text-gray-300" @click="open = false">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    </button>
                </div>

                
                <div class="mt-4 border-t border-gray-200 dark:border-zinc-700">
               

                
                            <div x-data="{ open: true }" class="py-3">

                                <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                    <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                        <span class="font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_category')); ?></span>
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
                                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat['id']); ?>"><?php echo e($cat['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        
                                        <select class="form-select" name="subcategory" id="subcategory_mob" wire:model.defer="subcategory_id" wire:ignore name="subcategory_id" disabled onchange="habilitasubd_mob();">>
                                        <option value="x" selected>Todas</option>
                                        <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option class="subcategoria sub_parent_<?php echo e($subcat['parent_id']); ?>" value="<?php echo e($subcat['id']); ?>"><?php echo e($subcat['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>


                                        <select class="form-select" name="subcategoryd" id="subcategoryd_mob" wire:model.defer="subcategoryd_id" wire:ignore disabled name="subcategoryd_id">
                                        <option value="x" selected>Todas</option>
                                        <?php $__currentLoopData = $subcategoriasd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcatd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option class="subcategoriad subd_parent_<?php echo e($subcatd['parent_id']); ?>" value="<?php echo e($subcatd['id']); ?>"><?php echo e($subcatd['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


                            
                            <div x-data="{ open: true }" class="py-3">
                                <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                    <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                        <span class="font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_price_range')); ?></span>
                                        <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                            <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                            <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                        </span>
                                    </button>
                                </h3>


                                <div class="pt-6 px-4" x-show="open" style="display: none;">
                                    <div class="space-y-4">
        
                                        <div class="rounded-md shadow-sm -space-y-px">
                                          <select class="form-select" wire:model.defer="pricerange" wire:ignore name="pricerange" id="pricerange">
                                            <option value="0" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 0)? "selected": ""; ?> ><?php echo e(__('messages.t_all')); ?></option>
                                            <option value="1" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 1)? "selected": ""; ?> >$0 - $10</option>
                                            <option value="2" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 2)? "selected": ""; ?> >$11 - $20</option>
                                            <option value="3" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 3)? "selected": ""; ?> >$21 - $30</option>
                                            <option value="4" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 4)? "selected": ""; ?> >$31 - $40</option>
                                            <option value="5" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 5)? "selected": ""; ?> >$41 - $60</option>
                                            <option value="6" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 6)? "selected": ""; ?> >$61 - $100</option>
                                            <option value="7" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 7)? "selected": ""; ?> >> $101</option>
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>


                            </div>   

                    
                    <div x-data="{ open: true }" class="py-3">
                        <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-700 px-4">
                            <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                <span class="font-medium text-gray-900"><?php echo e(__('messages.t_delivery_time')); ?></span>
                                <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                    <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                    <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                </span>
                            </button>
                        </h3>
                        <div class="pt-6 px-4" x-show="open" style="display: none;">
                            <div class="space-y-4">
                                <?php
                                $contador = 0;
                                foreach ($delivery_times as $key => $time){
                                ?>
                                
                                    
                                    <div class="flex items-center">
                                        <input wire:model.defer="delivery_time" id="filter-delivery-time-<?php echo e($key); ?>" value="<?php echo e($time['value']); ?>" name="delivery_time" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300">
                                        <label for="filter-delivery-time-<?php echo e($key); ?>" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            <?php echo e($time['text']); ?>

                                        </label>
                                    </div>
                                <?php
                                $contador++;

                                if($contador == 3){
                                    break;
                                }
                                }
                                ?>
                            
                            </div>
                        </div>
                    </div>

                    
                    <div class="py-6 px-4">

                        
                        <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'filter','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_filter')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>

                        
                        <?php if($rating || $delivery_time || $min_price || $max_price): ?>
                            <span wire:click="resetFilter" class="hover:underline text-xs font-medium text-gray-600 hover:text-gray-800 mt-4 text-center block cursor-pointer"><?php echo e(__('messages.t_reset_filter')); ?></span>
                        <?php endif; ?>
                        
                    </div>

                </div>

            </div>
        
        </div>
        
        
        <main class="px-4 sm:px-6 lg:px-8">

            
            <div class="flex justify-between items-center mb-2 bg-transparent py-2 ltr:pr-6 rtl:pl-6 ltr:border-l-8 rtl:border-r-8 ltr:pl-4 rtl:pr-4 border-primary-600 rounded">

                
                <div>
                    <span class="font-extrabold text-base text-gray-800 dark:text-gray-100 pb-1 block tracking-wider"><?php echo e($q); ?></span>
                    <p class="text-sm text-gray-400"><?php echo e(__('messages.t_search_results_for_q', ['q' => $q])); ?></p>
                </div>

                
                <div>
                    <div class="flex items-center">

                        
                        <div style="padding: 6px 30px 0px 0px;">

                            <div class="form-check form-switch group inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-200">
                                    <input wire:click="isUseronline()" <?php echo (isset($_SESSION['btnfilteronoff']))? $_SESSION['btnfilteronoff'] : ""; ?> 
                                    class="form-check-input" type="checkbox" role="switch" id="showonlyonoffline">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Online Users</label>
                                </div>
                            </div>

                        
                        <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative inline-block ltr:text-left rtl:text-right">



                            
                            <div>
                                <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-200" id="menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                                    <?php echo e(__('messages.t_sort_by')); ?>

                                    <svg class="flex-shrink-0 ltr:-mr-1 rtl:-ml-1 ltr:ml-1 rtl:mr-1 h-5 w-5 text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-200 dark:hover:text-gray-200" x-description="Heroicon name: solid/chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
                                </button>
                            </div>
            
                            
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="ltr:origin-top-right rtl:origin-top-left absolute ltr:right-0 rtl:left-0 mt-2 w-40 rounded-md shadow-sm bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 focus:outline-none z-50" x-ref="menu-items" x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                                <div class="py-1" role="none">

                                    
                                    <button wire:click="$set('sort_by', 'sales')" type="button" class="<?php echo e($sort_by === 'sales' ? 'text-gray-900' : 'text-gray-500'); ?> block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                        <?php echo e(__('messages.t_most_relevant')); ?>

                                    </button>

                                    
                                    <button wire:click="$set('sort_by', 'newest')" type="button" class="<?php echo e($sort_by === 'newest' ? 'text-gray-900' : 'text-gray-500'); ?> block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                        <?php echo e(__('messages.t_newest_first')); ?>

                                    </button>

                                    
                                    <button wire:click="$set('sort_by', 'price_low_high')" type="button" class="<?php echo e($sort_by === 'price_low_high' ? 'text-gray-900' : 'text-gray-500'); ?> block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                        <?php echo e(__('messages.t_price_low_to_high')); ?>

                                    </button>

                                    
                                    <button wire:click="$set('sort_by', 'price_high_low')" type="button" class="<?php echo e($sort_by === 'price_high_low' ? 'text-gray-900' : 'text-gray-500'); ?> block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                        <?php echo e(__('messages.t_price_high_to_low')); ?>

                                    </button>
                                
                                </div>
                            </div>
                        
                        </div>
            
                        
                        <button type="button" class="p-2 -m-2 ltr:ml-4 rtl:mr-4 ltr:sm:ml-6 rtl:sm:mr-6 text-gray-400 hover:text-gray-500 lg:hidden" @click="open = true">
                            <svg class="w-4 h-4" aria-hidden="true" x-description="Heroicon name: solid/filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path> </svg>
                        </button>

                    </div>
                </div>

            </div>

            
            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-10">

                    
                    <div>

                        
                        <div class="hidden lg:block bg-white dark:bg-zinc-700 shadow-sm border rounded-md border-gray-100 dark:border-zinc-600 h-fit">
                            

                            
                            <div x-data="{ open: true }" class="py-3">

                                <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                    <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                        <span class="font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_category')); ?></span>
                                        <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                            <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                            <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                        </span>
                                    </button>
                                </h3>


                                <div class="pt-6 px-4" x-show="open" style="display: none;">
                                    <div class="space-y-4">
        
                                        <div class="rounded-md shadow-sm -space-y-px">


          
                                        <select class="form-select" name="category" id="category" wire:model.defer="category_id" wire:ignore name="category_id" onchange="habilitasub();">
                                        <option value="x" selected>Todas</option>
                                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat['id']); ?>"><?php echo e($cat['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        
                                        <select class="form-select" name="subcategory" id="subcategory" wire:model.defer="subcategory_id" wire:ignore name="subcategory_id"  onchange="habilitasubd();">>
                                        <option value="x" selected>Todas</option>
                                        <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option class="subcategoria sub_parent_<?php echo e($subcat['parent_id']); ?>" value="<?php echo e($subcat['id']); ?>"><?php echo e($subcat['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>


                                        <select class="form-select" name="subcategoryd" id="subcategoryd" wire:model.defer="subcategoryd_id" wire:ignore  name="subcategoryd_id">
                                        <option value="x" selected>Todas</option>
                                        <?php $__currentLoopData = $subcategoriasd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcatd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option class="subcategoriad subd_parent_<?php echo e($subcatd['parent_id']); ?>" value="<?php echo e($subcatd['id']); ?>"><?php echo e($subcatd['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


                            
                            <div x-data="{ open: true }" class="py-3">
                                <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                    <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                        <span class="font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_price_range')); ?></span>
                                        <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                            <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                            <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                        </span>
                                    </button>
                                </h3>


                                <div class="pt-6 px-4" x-show="open" style="display: none;">
                                    <div class="space-y-4">
        
                                        <div class="rounded-md shadow-sm -space-y-px">
                                          <select class="form-select" wire:model.defer="pricerange" wire:ignore name="pricerange" id="pricerange">
                                            <option value="0" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 0)? "selected": ""; ?> ><?php echo e(__('messages.t_all')); ?></option>
                                            <option value="1" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 1)? "selected": ""; ?> >$0 - $10</option>
                                            <option value="2" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 2)? "selected": ""; ?> >$11 - $20</option>
                                            <option value="3" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 3)? "selected": ""; ?> >$21 - $30</option>
                                            <option value="4" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 4)? "selected": ""; ?> >$31 - $40</option>
                                            <option value="5" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 5)? "selected": ""; ?> >$41 - $60</option>
                                            <option value="6" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 6)? "selected": ""; ?> >$61 - $100</option>
                                            <option value="7" <?php echo ($_SESSION['pricerange']['0']['pricerange'] == 7)? "selected": ""; ?> >> $101</option>
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>


                            </div>   
                            
                            
                            
                            <div x-data="{ open: true }" class="py-3">
                                <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                    <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                        <span class="font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_delivery_time')); ?></span>
                                        <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                            <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                            <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                        </span>
                                    </button>
                                </h3>
                                <div class="pt-6 px-4" x-show="open" style="display: none;">
                                    <div class="space-y-4">
                                        <?php
                                        $cnt=0;
                                        foreach ($delivery_times as $key => $time){
                                            ?>
                                                <div class="flex items-center">
                                                    <input wire:model.defer="delivery_time" id="filter-delivery-time-<?php echo e($key); ?>" value="<?php echo e($time['value']); ?>" name="delivery_time" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300">
                                                    <label for="filter-delivery-time-<?php echo e($key); ?>" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                        <?php echo e($time['text']); ?>

                                                    </label>
                                                </div>
                                            <?php
                                            $cnt++;
                                            if($cnt == 3){
                                                break;
                                            }
                                        }
                                    ?>
                                    
                                    </div>
                                </div>
                            </div>
        
                            
                            <div class="py-6 px-4">
        
                                
                                <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'filter','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_filter')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
        
                                
                                <?php if($rating || $delivery_time || $min_price || $max_price): ?>
                                    <span wire:click="resetFilter" class="hover:underline text-xs font-medium text-gray-600 hover:text-gray-800 mt-4 text-center block cursor-pointer"><?php echo e(__('messages.t_reset_filter')); ?></span>
                                <?php endif; ?>
        
                            </div>
                            
                        </div>

                    </div>

                    
                    <div class="lg:col-span-2 xl:col-span-3">
                        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
                            <?php
                            $contatudo = 0;
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                
                                <?php
                                    //VERIFICA SE OWNER ESTA ONLINE
                                    if($gig->owner->isOnline()){
                                        $online = true;
                                        
                                    }
                                    else{
                                        $online = false;
                                    }


                                    if($gig->owner->isOnline() == "" OR $gig->owner->isOnline() == null){
                                        $online = false;
                                    }
                                    
                                    
                                    //SE ESTA OFFLINE e SETADO PARA MOSTRAR SOMENTE ONLINE
                                    if(isset($_SESSION['onlyShowOnline']) AND $_SESSION['onlyShowOnline'] == true AND $online == false){
                                        $onlineClass = 'style="display: none;"';
                                    }
                                    else{
                                        $onlineClass = 'style="display: inline;"';
                                    }
                                
                                if($gig->orders_in_queue > 0 or $gig->counter_sales > 0){
                                    $contatudo++;
                                ?>
                                    <div <?php echo $onlineClass; ?> class="<?php echo $online; ?> col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-6 xl:col-span-4" wire:key="gigs-list-<?php echo e($gig->uid); ?>">
                                    <?php

                                    // Get seller name
                                    $sellerName               = User::where('id', $gig->user_id)->whereIn('status', ['verified', 'active'])->firstOrFail();

                                    ?>
                                    <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-6 xl:col-span-4" >
                                        <div class="gig-card" dir="ltr">
                                            <div id="solOut" style="position: absolute;background-color: red;color: white;margin: 17px 170px 5px;transform: rotate(390deg);padding: 1px 15px 1px 15px;text-transform: uppercase;"><?php echo e(__('messages.t_sold_off')); ?></div>
                                            <div class="bg-white dark:bg-zinc-800 rounded-md shadow-sm ring-1 ring-gray-200 dark:ring-zinc-800">
                                            <center>
                                            <img class="object-contain max-h-52 h-52 w-auto" src="https://p2win.com.br/public/storage/gigs/gallery/small/<?php echo $gig->thumbnail->uid; ?>.webp" data-src="https://p2win.com.br/public/storage/gigs/gallery/small/<?php echo $gig->thumbnail->uid; ?>.webp" alt="Teste" width="200">
                                            <center>
                                            <div class="px-4 pb-2 mt-4">
                                                <div class="w-full mb-4 flex justify-between items-center">
                                                <a href="https://p2win.com.br/profile/<?php echo $sellerName->username; ?>" target="_blank" class="flex-shrink-0 group block">
                                                    <div class="flex items-center">
                                                    <span class="inline-block relative">
                                                        <?php
                                                        if($online){
                                                            echo "<div style='background-color: rgb(49 196 141); width: 13px; min-height: 13px; border-radius: 13px;position: absolute;margin: 0px 16px;border: 2px solid white;'></div>";
                                                        }
                                                        else{
                                                            echo "<div style='background-color: red; width: 13px; min-height: 13px; border-radius: 13px;position: absolute;margin: 0px 16px;border: 2px solid white;'></div>";
                                                        }
                                                        ?>
                                                        <img class="h-6 w-6 rounded-full object-cover" src="https://p2win.com.br/public/storage/default/default-placeholder.jpg" data-src="https://p2win.com.br/public/storage/default/default-placeholder.jpg" alt="<?php echo $sellerName->username; ?>">
                                                    </span>
                                                    <div class="ltr:ml-3 rtl:mr-3">
                                                        <div class="text-gray-500 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300 flex items-center mb-0.5 font-extrabold tracking-wide text-[13px]"> <?php echo $sellerName->username; ?> </div>
                                                    </div>
                                                    </div>
                                                </a> 
                                                </div>
                                                <a href="" class="gig-card-title font-semibold text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-4 !overflow-hidden">
                                                <?php echo $gig->title; ?>
                                                </a>
                                 
                                            </div>
                                            <div class="px-3 py-3 bg-[#fdfdfd] dark:bg-zinc-800 border-t border-gray-50 dark:border-zinc-700 text-right sm:px-4 rounded-b-md flex justify-between">
                                                <div class="flex items-center">
                                                <button wire:click="addToFavorite(\'491df946-15ff-4e41-8\')" wire:target="addToFavorite(\'491df946-15ff-4e41-8\')" wire:loading.attr="disabled" data-tooltip-target="tooltip-add-to-favorites-491df946-15ff-4e41-8" class="h-8 w-8 rounded-full flex items-center justify-center -ml-1 focus:outline-none visited:outline-none">
                                                    <div wire:loading="" wire:target="addToFavorite(\'491df946-15ff-4e41-8\')">
                                                    <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                                    </svg>
                                                    </div>
                                                    <div wire:loading.remove="" wire:target="addToFavorite(\'491df946-15ff-4e41-8\')">
                                                    <svg class="w-5 h-5 text-gray-400 hover:text-gray-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    </div>
                                                </button>
                                                <div id="tooltip-add-to-favorites-491df946-15ff-4e41-8" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1510px, 17px);" data-popper-placement="top" data-popper-reference-hidden=""> Adicionar aos favoritos </div>
                                                </div>
                                                <div class="gig-card-price">
                                                <small class="text-body-3 dark:!text-zinc-400">ESGOTADO</small>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                else{

                                   
                                        $contatudo++;
                                ?>
                                
                                        <div <?php echo $onlineClass; ?> class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-6 xl:col-span-4" wire:key="gigs-list-<?php echo e($gig->uid); ?>">
                                        <div  class="gig-card <?php echo $online; ?>" x-data="window._<?php echo e($gig->uid); ?>" dir="<?php echo e(config()->get('direction')); ?>">
                                            <div class="bg-white dark:bg-zinc-800 rounded-md shadow-sm ring-1 ring-gray-200 dark:ring-zinc-800">

                                                
                                                <a href="<?php echo e(url('service', $gig->slug)); ?>" class="flex items-center justify-center overflow-hidden w-full h-52 bg-gray-100 dark:bg-zinc-700">
                                                    <img class="object-contain max-h-52 lazy h-52 w-auto" width="200" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($gig->thumbnail)); ?>" alt="<?php echo e($gig->title); ?>">
                                                </a>

                                                
                                                <div class="px-4 pb-2 mt-4">

                                                    
                                        
                                                        <div class="w-full mb-4 flex justify-between items-center">
                                                            <a href="<?php echo e(url('profile', $gig->owner->username)); ?>" target="_blank" class="flex-shrink-0 group block">
                                                                <div class="flex items-center">
                                                                    <span class="inline-block relative">
                                                                        <?php
                                                                        if($gig->owner->isOnline()){
                                                                            echo "<div style='background-color: rgb(49 196 141); width: 13px; min-height: 13px; border-radius: 13px;position: absolute;margin: 0px 16px;border: 2px solid white;'></div>";
                                                                        }
                                                                        else{
                                                                            echo "<div style='background-color: red; width: 13px; min-height: 13px; border-radius: 13px;position: absolute;margin: 0px 16px;border: 2px solid white;'></div>";
                                                                        }
                                                                        ?>
                                                                        <img class="h-6 w-6 rounded-full object-cover lazy" src="<?php echo e(placeholder_img()); ?>" data-src="<?php echo e(src($gig->owner->avatar)); ?>" alt="<?php echo e($gig->owner->username); ?>">
                                                                    </span>
                                                                <div class="ltr:ml-3 rtl:mr-3">
                                                                    <div class="text-gray-500 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300 flex items-center mb-0.5 font-extrabold tracking-wide text-[13px]">
                                                                        <?php echo e($gig->owner->username); ?>

                                                                        <?php if($gig->owner->status === 'verified'): ?>
                                                                            <img data-tooltip-target="tooltip-account-verified-<?php echo e($gig->uid); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg')); ?>" alt="<?php echo e(__('messages.t_account_verified')); ?>">
                                                                            <div id="tooltip-account-verified-<?php echo e($gig->uid); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                                <?php echo e(__('messages.t_account_verified')); ?>

                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                            

                                                    
                                                    <a href="<?php echo e(url('service', $gig->slug)); ?>" class="gig-card-title font-semibold text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-4 !overflow-hidden">
                                                        <?php echo e(htmlspecialchars_decode($gig->title)); ?>                                            
                                                    </a>
                                                </div>

                                                
                                                <div class="px-3 py-3 bg-[#fdfdfd] dark:bg-zinc-800 border-t border-gray-50 dark:border-zinc-700 text-right sm:px-4 rounded-b-md flex justify-between">

                                                    <div class="flex items-center">

                                                        
                                                        <!-- btn de add para favorito removido para teste -->



                                                    </div>

                                                    
                                                    <div class="gig-card-price">
                                                        <small class="text-body-3 dark:!text-zinc-200"><?php echo e(__('messages.t_starting_at')); ?></small>
                                                        <span class=" ltr:text-right rtl:text-left dark:!text-white"><?php echo money($gig->price, settings('currency')->code, true); ?></span>
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                        </div>
                                        </div>
                                <?php
                                

                                if($contatudo == 0){
                                    $empty = true;
                                }
                                else{
                                    $empty = false; 
                                }
                            }
                            ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                
                                <div class="col-span-12">
                                    <div class="py-14 px-6 text-center text-sm sm:px-14 border-dashed border-2">
                                        <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                                        <p class="mt-4 font-semibold text-gray-900"><?php echo e(__('messages.no_results_found')); ?></p>
                                        <p class="mt-2 text-gray-500"><?php echo e(__('messages.t_we_couldnt_find_anthing_search_term')); ?></p>
                                    </div>
                                </div>

                            <?php endif; ?>

                            <?php
                            if(!$contatudo AND !isset($_GET['q'])){
                            ?>
                            <div class="col-span-12">
                                <div class="py-14 px-6 text-center text-sm sm:px-14 border-dashed border-2">
                                    <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                                    <p class="mt-4 font-semibold text-gray-900"><?php echo e(__('messages.no_results_found')); ?></p>
                                    <p class="mt-2 text-gray-500"><?php echo e(__('messages.t_we_couldnt_find_anthing_search_term')); ?></p>
                                </div>
                            </div>
                            <?php
                            }

                            ?>

                            
                            <?php if($gigs->hasPages()): ?>
                                <div class="col-span-12">
                                    <div class="flex justify-center pt-12">
                                        <?php echo $gigs->links('pagination::tailwind'); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </section>
        </main>
    </div>
</div>


<?php $__env->startPush('scripts'); ?>

    
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

<?php $__env->stopPush(); ?>

<script>
    
        <?php
        if(isset($_GET['subcategory_id']) AND $_GET['subcategory_id'] >0){
            echo "
            
            habilitasub();
            habilitasub_mob();
            $('#subcategory').prop('disabled', false);
            
            $('.sub_parent_".$_GET['category_id']."').show();
            ";

        }
        else{
            echo "
            
            habilitasub();
            habilitasub_mob();
            $('#subcategory').prop('disabled', true);
           
            ";

        }
        
        if(isset($_GET['subcategoryd_id']) AND $_GET['subcategoryd_id'] >0){
            echo "
            
            habilitasubd();
            habilitasubd_mob();
            $('#subcategoryd').prop('disabled', false);
            
            $('.sub_parent_".$_GET['subcategory_id']."').show();
            $('.subd_parent_".$_GET['subcategory_id']."').prop('disabled', false);
            $('.subd_parent_".$_GET['subcategory_id']."').show();
            
            ";

        }
        else{
            echo "
        
            
            habilitasubd();
            habilitasubd_mob();
            $('#subcategoryd').prop('disabled', true);

            
            ";
        }
        
        ?>
       
</script><?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/categories/category.blade.php ENDPATH**/ ?>