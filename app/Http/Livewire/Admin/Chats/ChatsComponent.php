<?php

namespace App\Http\Livewire\Admin\Chats;

use App\Models\Chats;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Schema;
use WireUi\Traits\Actions;

class ChatsComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_chats'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.chats.chats', [
            'chats' => $this->chats
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of chats
     *
     * @return object
     */
    public function getChatsProperty()
    {
        return Chats::latest('created_at')->paginate(42);
    }




}
