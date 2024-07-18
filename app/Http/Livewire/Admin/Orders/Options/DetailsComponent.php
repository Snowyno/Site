<?php

namespace App\Http\Livewire\Admin\Orders\Options;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

//Used to show chat in admin
use App\Models\OrderItemWorkConversation;



class DetailsComponent extends Component
{
    use SEOToolsTrait;
    
    public $order;
    public $blacklistwords;

    public $seller;

    //Used to show chat in admin
    public $message;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get order
        $order       = Order::where('uid', $id)->firstOrFail();

        // Set order
        $this->order = $order;


        // Get Black listed words
        $blw = DB::table('wordblacklist')->get();

        // Set Black listed words
        $this->blacklistwords = $blw;


        // Get SELLER
        $sll = DB::table('users')
        ->where('id', '=', 16)
        ->get();

        // Set SELLER
        $this->seller = $sll;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_order_details'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.orders.options.details')->extends('livewire.admin.layout.app')->section('content');
    }

    
    
}
