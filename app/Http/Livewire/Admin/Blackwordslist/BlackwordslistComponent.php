<?php

namespace App\Http\Livewire\Admin\Blackwordslist;

use App\Models\Blackwordslist;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\SettingsFooter;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class BlackwordslistComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_bwl'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blackwordslist.blackwordslist', [
            'blackwordslists' => $this->blackwordslists
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of blackwordslist
     *
     * @return object
     */
    public function getBlackwordslistsProperty()
    {
        return Blackwordslist::orderBy('palvra', 'asc')->paginate(42);
    }


    /**
     * Delete blackwordslist
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        
        // Get blackwordslist
        $blackwordslist = Blackwordslist::where('id', $id)->firstOrFail();


        // Delete blackwordslist
        $blackwordslist->delete();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }



    
    
}
