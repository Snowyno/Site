<?php

namespace App\Http\Validators\Main\Create;

use Illuminate\Support\Facades\Validator;

class OverviewValidator
{
    
    /**
     * Validate all form
     *
     * @param object $request
     * @return void
     */
    static function all($request)
    {
        try {
            
            // Set rules
            $rules    = [
                'title'           => 'required|max:100'
                
                
            ];

            // Set inputs
            $inputs   = [
                'title'           => $request->title
            ];

            // Set messages
            $messages = [
                'title.required'       => __('messages.t_validator_required'),
                'title.max'            => __('messages.t_validator_max', ['max' => 100])
                
            ];

            // Validate data
            Validator::make($inputs, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }



}
