<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pt-16 pb-24 space-y-8 min-h-screen">
    <main class="w-full" x-data="window.nYpPIEgUauhEVLt">

        
        <div class="fixed top-0 left-0 z-50 bg-black dark:bg-gray-400/50 w-full h-full opacity-80" wire:loading>
            <div class="w-full h-full flex items-center justify-center">
                <div role="status">
                    <svg aria-hidden="true" class="mx-auto w-12 h-12 text-gray-500 dark:text-gray-400 animate-spin fill-white dark:fill-primary-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="text-xs font-medium tracking-wider text-white dark:text-gray-500 mt-4 block"><?php echo e(__('messages.t_please_wait_dots')); ?></span>
                </div>
            </div>
        </div>

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                    
                    <aside class="lg:col-span-3 py-6 hidden lg:block" wire:ignore>
                        <?php if (isset($component)) { $__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3 = $component; } ?>
<?php $component = App\View\Components\Main\Account\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main.account.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Main\Account\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3)): ?>
<?php $component = $__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3; ?>
<?php unset($__componentOriginal6685289ee861d3ee4557d29ddf6c801887849aa3); ?>
<?php endif; ?>
                    </aside>

                    
                    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">

                        
                        <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                            
                            <div class="mb-14">
                                <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_verification_center')); ?></h2>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_verification_center_subtitle')); ?></p>
                            </div>
                            
                            
                            <?php if($verification): ?>
                                
                                 
                                <div class="py-5">
                                    <dl class="grid grid-cols-1 gap-y-8 sm:grid-cols-2">
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500"><?php echo e(__('messages.t_verification_status')); ?></dt>
                                            <?php if($verification->status === 'pending'): ?>
                                                <dd class="mt-1 text-xs font-semibold text-amber-600"><?php echo e(__('messages.t_verification_pending')); ?></dd>
                                            <?php elseif($verification->status === 'verified'): ?>
                                                <dd class="mt-1 text-xs font-semibold text-green-400"><?php echo e(__('messages.t_account_verified')); ?></dd>
                                            <?php elseif($verification->status === 'declined'): ?>
                                                <dd class="mt-1 text-xs font-semibold text-red-400"><?php echo e(__('messages.t_verification_declined')); ?></dd>
                                            <?php endif; ?>
                                        </div>
                                        <div class="sm:col-span-1">
                                            
                                            
                                            <?php if($verification->status === 'verified'): ?>
                                                <dt class="text-sm font-medium text-gray-500"><?php echo e(__('messages.t_verified_at')); ?></dt>
                                                <dd class="mt-1 text-xs text-gray-500"><?php  echo date ( 'd/m/Y h:i:s' ,  strtotime ( $verification->verified_at ));?></dd>
                                            <?php endif; ?>

                                            
                                            <?php if($verification->status === 'pending'): ?>
                                                <dt class="text-sm font-medium text-gray-500"><?php echo e(__('messages.t_verification_date')); ?></dt>
                                                <dd class="mt-1 text-xs text-gray-500"><?php echo date ( 'd/m/Y h:i:s' ,  strtotime ( $verification->created_at ));?> </dd>
                                            <?php endif; ?>

                                            
                                            <?php if($verification->status === 'declined'): ?>
                                                <dt class="text-sm font-medium text-gray-500"><?php echo e(__('messages.t_declined_at')); ?></dt>
                                                <dd class="mt-1 text-xs text-gray-500"><?php echo date ( 'd/m/Y h:i:s' ,  strtotime ( $verification->declined_at ));?> </dd>
                                            <?php endif; ?>
                                            
                                        </div>
                                    </dl>
                                    <br>
                                    <br>
                                    <dl class="grid grid-cols-1 gap-y-8 sm:grid-cols-2">
                                        <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">CPF Informado:</dt>
                                            
                                                <dd class="mt-1 text-xs font-semibold text-amber-600"><?php echo $verification->numCPF; ?></dd>

                                       
                                        </div>
                                    </dl>
                                </div>  
                                
                                
                                <div class="sm:col-span-2 mt-6">
                                    <dt class="text-xs font-medium text-gray-500"><?php echo e(__('messages.t_verification_documents')); ?></dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">


                                            
                                            <li class="ltr:pl-3 rtl:pr-3 ltr:pr-4 rtl:pl-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="ltr:ml-2 rtl:mr-2 flex-1 w-0 truncate text-xs"> 
                                                        <?php if($verification->document_type === 'id'): ?>
                                                            <span class="font-semibold"><?php echo e(__('messages.t_government_issued_id_frontside')); ?></span>
                                                        <?php elseif($verification->document_type === 'driver_license'): ?>
                                                            <span class="font-semibold"><?php echo e(__('messages.t_driver_license_frontside')); ?></span>
                                                        <?php endif; ?>
                                                        - <?php echo e(format_bytes($verification->frontside->file_size)); ?> </span>
                                                </div>
                                                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                                                    <a href="<?php echo e(url( 'uploads/verifications/' . $verification->uid . '/front/' . $verification->file_front_side )); ?>" target="_blank" class="font-medium text-primary-600 hover:text-primary-600 text-xs"> <?php echo e(__('messages.t_download')); ?> </a>
                                                </div>
                                            </li>

                                           
                                        </ul>
                                    </dd>
                                </div>

                            <?php else: ?>

                                
                                <?php if($currentStep === 1): ?>
                                    
                                    <fieldset>
                                        <legend class="text-xs font-medium text-gray-900 dark:text-gray-100 mb-2"><?php echo e(__('messages.t_choose_document_type')); ?></legend>
                                
                                        <div class="mt-1 bg-white dark:bg-zinc-700 rounded-md shadow-sm -space-y-px">

                                            
                                            <label class="rounded-tl-md rounded-tr-md relative border-2 dark:border-zinc-600 p-4 flex cursor-pointer focus:outline-none ">
                                                <input type="radio" name="document_type" value="id" wire:model.defer="document_type" class="h-4 w-4 cursor-pointer text-primary-600 border-gray-300 dark:border-zinc-600 focus:ring-primary-600" aria-labelledby="document_type_id">
                                                <div class="ltr:ml-3 rtl:mr-3 flex flex-col">
                                                    <span id="document_type_id" class="block text-xs font-medium text-gray-900 dark:text-gray-300">
                                                        <?php echo e(__('messages.t_government_issued_id')); ?>

                                                    </span>
                                                </div>
                                            </label>

                                            
                                            <label class="relative border-2 dark:border-zinc-600 border-t-0 p-4 flex cursor-pointer focus:outline-none ">
                                                <input type="radio" name="document_type" value="driver_license" wire:model.defer="document_type" class="h-4 w-4 cursor-pointer text-primary-600 border-gray-300 dark:border-zinc-600 focus:ring-primary-600" aria-labelledby="document_type_driver_license">
                                                <div class="ltr:ml-3 rtl:mr-3 flex flex-col">
                                                    <span id="document_type_driver_license" class="block text-xs font-medium text-gray-900 dark:text-gray-300">
                                                        <?php echo e(__('messages.t_driver_license')); ?>

                                                    </span>
                                                </div>
                                            </label>
                                            <br>
                                            <br>
                                            <div>
                                            <label for="text-input-component-id-numCPF" class="block text-[0.8125rem] font-medium tracking-wide text-gray-700 dark:text-white">CPF</label>
                                            <div class="mt-2 relative">
                                            <input type="text" placeholder="Digite seu CPF (Obrigatório)" wire:model.defer="numCPF" id="text-input-component-id-numCPF" 
                                            required
                                            class="disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500">
                                            <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-4 rtl:pl-4 flex items-center pointer-events-none">
                                            <i class="mdi mdi-key text-gray-400"></i>
                                            </div>
                                            </div>
                                            </div>


                                            
                                        </div>
                                    </fieldset>

                                
                                <?php elseif($currentStep === 2): ?>

                                    
                                    <?php if($document_type === 'id'): ?>
                                        <div class="grid grid-cols-2 gap-4">

                                            
                                            <div>
                                                <div class="flex justify-center items-center w-full">
                                                    <label for="doc_id_frontside" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-zinc-700 hover:bg-gray-100 dark:border-zinc-600 dark:hover:border-zinc-500 dark:hover:bg-zinc-600">
                                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="mb-3 w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                                                </svg>
        
                                                                
                                                                <template x-if="!preview.front">
                                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold"><?php echo e(__('messages.t_upload_doc_front_side')); ?></span></p>
                                                                </template>
        
                                                                
                                                                <template x-if="preview.front">
                                                                    <p class="mb-2 text-sm text-gray-900 dark:text-gray-400 truncate">
                                                                        <span class="font-semibold" x-text="preview.front"></span></p>
                                                                </template>
        
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    <?php echo e(__('messages.t_verification_allowed_mimes_size')); ?>

                                                                </p>
                                                            </div>
        
                                                        <input id="doc_id_frontside" type="file" accept="image/jpg,image/jpeg,image/png"  class="hidden" @change="setFrontSide" wire:model="doc_id.front">
                                                    </label>
                                                </div> 
                                                <?php $__errorArgs = ['front'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="text-xs font-medium text-red-500 pt-1">
                                                        <?php echo e($errors->first('front')); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            
                                            <div>
                                                <div class="flex justify-center items-center w-full">
                                                    <label for="doc_id_backside" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-zinc-700 hover:bg-gray-100 dark:border-zinc-600 dark:hover:border-zinc-500 dark:hover:bg-zinc-600">
                                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="mb-3 w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                                </svg>
        
                                                                
                                                                <template x-if="!preview.back">
                                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold"><?php echo e(__('messages.t_upload_doc_back_side')); ?></span></p>
                                                                </template>
        
                                                                
                                                                <template x-if="preview.back">
                                                                    <p class="mb-2 text-sm text-gray-900 dark:text-gray-400 truncate">
                                                                        <span class="font-semibold" x-text="preview.back"></span></p>
                                                                </template>
        
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    <?php echo e(__('messages.t_verification_allowed_mimes_size')); ?>

                                                                </p>
                                                            </div>
        
                                                        <input id="doc_id_backside" type="file" accept="image/jpg,image/jpeg,image/png" class="hidden" @change="setBackSide" wire:model="doc_id.back">
                                                    </label>
                                                </div>  
                                                <?php $__errorArgs = ['back'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="text-xs font-medium text-red-500 pt-1">
                                                        <?php echo e($errors->first('back')); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                        </div>
                                    <?php elseif($document_type === 'driver_license'): ?>
                                        <div class="grid grid-cols-2 gap-4">

                                            
                                            <div>
                                                <div class="flex justify-center items-center w-full">
                                                    <label for="doc_driver_license_frontside" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-zinc-700 hover:bg-gray-100 dark:border-zinc-600 dark:hover:border-zinc-500 dark:hover:bg-zinc-600">
                                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="mb-3 w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                                                </svg>

                                                                
                                                                <template x-if="!preview.front">
                                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold"><?php echo e(__('messages.t_upload_doc_front_side')); ?></span></p>
                                                                </template>

                                                                
                                                                <template x-if="preview.front">
                                                                    <p class="mb-2 text-sm text-gray-900 dark:text-gray-400 truncate">
                                                                        <span class="font-semibold" x-text="preview.front"></span></p>
                                                                </template>

                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    <?php echo e(__('messages.t_verification_allowed_mimes_size')); ?>

                                                                </p>
                                                            </div>

                                                        <input id="doc_driver_license_frontside" type="file" accept="image/jpg,image/jpeg,image/png"  class="hidden" @change="setFrontSide" wire:model="doc_driver_license.front">
                                                    </label>
                                                </div> 
                                                <?php $__errorArgs = ['front'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="text-xs font-medium text-red-500 pt-1">
                                                        <?php echo e($errors->first('front')); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            
                                            <div>
                                                <div class="flex justify-center items-center w-full">
                                                    <label for="doc_driver_license_backside" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-zinc-700 hover:bg-gray-100 dark:border-zinc-600 dark:hover:border-zinc-500 dark:hover:bg-zinc-600">
                                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="mb-3 w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                                </svg>

                                                                
                                                                <template x-if="!preview.back">
                                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold"><?php echo e(__('messages.t_upload_doc_back_side')); ?></span></p>
                                                                </template>

                                                                
                                                                <template x-if="preview.back">
                                                                    <p class="mb-2 text-sm text-gray-900 dark:text-gray-400 truncate">
                                                                        <span class="font-semibold" x-text="preview.back"></span></p>
                                                                </template>

                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    <?php echo e(__('messages.t_verification_allowed_mimes_size')); ?>

                                                                </p>
                                                            </div>

                                                        <input id="doc_driver_license_backside" type="file" accept="image/jpg,image/jpeg,image/png" class="hidden" @change="setBackSide" wire:model="doc_driver_license.back">
                                                    </label>
                                                </div>  
                                                <?php $__errorArgs = ['back'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="text-xs font-medium text-red-500 pt-1">
                                                        <?php echo e($errors->first('back')); ?>

                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                        </div>
                       
                                    <?php endif; ?>

                               
                                <?php endif; ?>
                                

                            <?php endif; ?>

                        </div>

                        
                        <?php if(!$verification): ?>
                            <div class="bg-gray-50 dark:bg-zinc-700 h-20 flex justify-between">

                                
                                <div>
                                    <?php if($currentStep !== 1): ?>
                                        <div class="py-4 px-4 flex justify-end sm:px-6">
                                            <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'back','text' => ''.e(__('messages.t_back')).'','block' => '0','active' => 'text-gray-900 bg-gray-100 hover:bg-gray-200']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                
                                <div>
                                    
                                    <?php if($currentStep === 1): ?>
                                        <div class="py-4 px-4 flex justify-end sm:px-6">
                                            <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'setDocumentType','text' => ''.e(__('messages.t_next_step')).'','block' => '0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    
                                    <?php if($currentStep === 2): ?>
                                        <div class="py-4 px-4 flex justify-end sm:px-6">
                                        <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'finish','text' => ''.e(__('messages.t_finish')).'','block' => '0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                   
                                </div>

                            </div>
                        <?php elseif($verification && $verification->status === 'declined'): ?>
                            <div class="py-4 px-4 flex justify-end sm:px-6 bg-gray-50 dark:bg-zinc-700">
                                <?php if (isset($component)) { $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'sendFilesAgain','text' => ''.e(__('messages.t_send_files_again')).'','block' => '0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c)): ?>
<?php $component = $__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c; ?>
<?php unset($__componentOriginal49b2fc8ba42c39d638e648b21b88e1b33ae2822c); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>                

                    </div>

                </div>
            </div>
        </div>
    </main>
</div>


<?php $__env->startPush('styles'); ?>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>

    
    <script>
        function nYpPIEgUauhEVLt() {
            return {

                counter: 0,

                preview: {
                    front: null,
                    back : null
                },

                setFrontSide(e) {
                    const source       = e.target.files[0];
                    this.preview.front = source.name
                },

                setBackSide(e) {
                    const source       = e.target.files[0];
                    this.preview.back = source.name
                },

                dataURLtoFile(dataurl, filename) {
 
                    var arr = dataurl.split(','),
                        mime = arr[0].match(/:(.*?);/)[1],
                        bstr = atob(arr[1]), 
                        n = bstr.length, 
                        u8arr = new Uint8Array(n);
                        
                    while(n--){
                        u8arr[n] = bstr.charCodeAt(n);
                    }
                    
                    return new File([u8arr], filename, {type:mime});
                },

                snapshot() {
                    if (this.counter > 5) {
                        window.$wireui.notify({
                            title      : "<?php echo e(__('messages.t_error')); ?>",
                            description: "<?php echo e(__('messages.t_unable_to_take_more_selfies')); ?>",
                            icon       : 'error'
                        });
                        return;
                    }
                    const _this = this;
                    Webcam.snap( function(data_uri) {
                        const file = _this.dataURLtoFile(data_uri, 'selfie.jpg');

                        // Upload a file:
                        window.livewire.find('<?php echo e($_instance->id); ?>').upload('selfie', file)

                        document.getElementById('webcamjs-results').innerHTML = '<img src="'+data_uri+'"/>';
                    } );

                    this.counter += 1;
                }

            }
        }
        window.nYpPIEgUauhEVLt = nYpPIEgUauhEVLt()
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home/u991810173/domains/universalgamer.shop/public_html/resources/views/livewire/main/account/verification/verification.blade.php ENDPATH**/ ?>