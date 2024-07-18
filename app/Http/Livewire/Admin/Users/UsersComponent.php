<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Notifications\User\Everyone\AccountActivated;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class UsersComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_users'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.users.users', [
            'users' => $this->users
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of users
     *
     * @return object
     */
    public function getUsersProperty()
    {
  


        if(isset($_GET['filterStatus'])){

            //SE não mandou filtro
            if($_GET['filterStatus'] == ''){
                return User::latest()->paginate(42);
            }

            //SE active
            else if($_GET['filterStatus'] == '1'){
                return User::latest() ->where('status', 'like', '%active%')->paginate(42);
            }

            //SE verified	
            else if($_GET['filterStatus'] == '2'){
                return User::latest() ->where('status', 'like', '%verified%')->paginate(42);
            }

            //SE pending
            else if($_GET['filterStatus'] == '3'){
                return User::latest() ->where('status', 'like', '%pending%')->paginate(42);
            }

            //SE banned
            else if($_GET['filterStatus'] == '4'){
                return User::latest() ->where('status', 'like', '%banned%')->paginate(42);
            }

            else{
                return User::latest()->paginate(42);
            }
        }
        else{
            return User::latest()->paginate(42);
        }
    }


    /**
     * Ban selected user
     *
     * @param integer $id
     * @return void
     */
    public function ban($id)
    {
        // Update user
        User::where('id', $id)->where('status', '!=', 'banned')->update([
            'status' => 'banned'
        ]);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_user_has_been_banned_success'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Delete user
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Delete user
        User::where('id', $id)->delete();
    }


    /**
     * Activate account
     *
     * @param integer $id
     * @return void
     */
    public function activate($id)
    {
        // Get user
        $user = User::where('id', $id)->where('status', 'pending')->firstOrFail();

        // Send notification to user
        $user->notify( (new AccountActivated)->locale(config('app.locale')) );

        // Activate account
        $user->status = "active";
        $user->save();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_user_has_been_activated_success'),
            'icon'        => 'success'
        ]);
    }
    
}
