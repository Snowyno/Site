<?php

namespace App\Http\Livewire\Admin\Refunds;

use App\Models\Refund;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class RefundsComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_refunds'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.refunds.refunds', [
            'refunds' => $this->refunds
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of refunds
     *
     * @return object
     */
    public function getRefundsProperty()
    {
        if(isset($_GET['filterStatus'])){

            //SE não mandou filtro
            if($_GET['filterStatus'] == ''){
                return Refund::latest()->paginate(42);
            }

            //SE accepted_by_admin
            else if($_GET['filterStatus'] == '1'){
                return Refund::latest() ->where('status', 'like', '%accepted_by_admin%')->paginate(42);
            }

            //SE accepted_by_seller	
            else if($_GET['filterStatus'] == '2'){
                return Refund::latest() ->where('status', 'like', '%accepted_by_seller%')->paginate(42);
            }

            //SE pending
            else if($_GET['filterStatus'] == '3'){
                return Refund::latest() ->where('status', 'like', '%pending%')->paginate(42);
            }

            //SE rejected_by_admin
            else if($_GET['filterStatus'] == '4'){
                return Refund::latest() ->where('status', 'like', '%rejected_by_admin%')->paginate(42);
            }

            //SE rejected_by_seller	
            else if($_GET['filterStatus'] == '5'){
                return Refund::latest() ->where('status', 'like', '%rejected_by_seller%')->paginate(42);
            }

            else{
                return Refund::latest()->paginate(42);
            }
        }
        else{
            return Refund::latest()->paginate(42);
        }
    }
        
    
}
