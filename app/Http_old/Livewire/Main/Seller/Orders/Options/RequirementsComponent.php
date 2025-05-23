<?php

namespace App\Http\Livewire\Main\Seller\Orders\Options;

use Livewire\Component;
use App\Models\OrderItem;
use WireUi\Traits\Actions;
use App\Notifications\User\Buyer\OrderItemCanceled;
use App\Notifications\User\Buyer\OrderItemInProgress;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class RequirementsComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $item;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get user id
        $user_id    = auth()->id();

        // Get order item
        $item       = OrderItem::where('owner_id', $user_id)->where('uid', $id)->firstOrFail();

        // Check if buyer sent any requirements
        if ($item->requirements()->count() === 0) {
            return redirect('seller/orders');
        }

        // Set order
        $this->item = $item;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_requirements') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.seller.orders.options.requirements')->extends('livewire.main.seller.layout.app')->section('content');
    }


    /**
     * Cancel order 
     *
     * @return void
     */
    public function cancel()
    {
        // Get item
        $item = OrderItem::where('uid', $this->item->uid)->where('owner_id', auth()->id())->whereIn('status', ['pending', 'proceeded']);

        // Remove item price from seller balance
        $item->owner()->update([
            'balance_pending' => $item->owner->balance_pending - $item->profit_value
        ]);

        // Add item price to buyer balance
        $item->order->buyer()->update([
            'balance_available' => $item->order->buyer->balance_available + $item->total_value
        ]);

        // Update item
        $item->status      = 'canceled';
        $item->canceled_by = 'seller';
        $item->canceled_at = now();
        $item->is_finished = true;
        $item->save();

        // Decrement orders in queue
        $item->gig()->decrement('orders_in_queue');

        // Send notification to buyer
        $item->order->buyer->notify( (new OrderItemCanceled($item))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_seller_has_canceled_ur_order',
            'action'  => url('account/orders'),
            'user_id' => $item->order->buyer_id,
            'params'  => ['seller' => auth()->user()->username]
        ]);

        // Refresh item
        $this->item->refresh();

        // success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_order_has_been_successfully_canceled'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Progress order 
     *
     * @param string $id
     * @return void
     */
    public function progress()
    {
        // Get item
        $item = OrderItem::where('uid', $this->item->uid)->where('owner_id', auth()->id())->where('status', 'pending')->firstOrFail();

        // Update item
        $item->status       = 'proceeded';
        $item->proceeded_at = now();
        $item->save();

        // Send notification to buyer
        $item->order->buyer->notify( (new OrderItemInProgress($item))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_seller_has_started_ur_order',
            'action'  => url('account/orders'),
            'user_id' => $item->order->buyer_id,
            'params'  => ['seller' => auth()->user()->username]
        ]);

        // Refresh item
        $this->item->refresh();

        // success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_order_has_been_successfully_marked_progress'),
            'icon'        => 'success'
        ]);
    }
    
}