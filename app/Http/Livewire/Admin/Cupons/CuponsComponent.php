<?php

namespace App\Http\Livewire\Admin\Cupons;

use App\Models\Cupon;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\SettingsFooter;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CuponsComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_cupon'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.cupons.cupons', [
            'cupons' => $this->cupons
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of cupon
     *
     * @return object
     */
    public function getCuponsProperty()
    {
        return Cupon::orderBy('title', 'asc')->paginate(42);
    }


    /**
     * Delete cupon
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        
        // Get cupon
        $cupon = Cupon::where('id', $id)->firstOrFail();


        // Delete cupon
        $cupon->delete();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Retrieve User data
     *
     * @param array $id
     * @return object
     */
    public function getCuponUsers($ids){
        return  User::whereIn('id', $ids)->get();
        //return $test->all(); 
    }
    
    
}
