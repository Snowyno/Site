<?php

namespace App\Http\Validators\Admin\Cupons;

use Illuminate\Support\Facades\Validator;

class CreateValidator
{
    
    /**
     * Validate form
     *
     * @param object $request
     * @return void
     */
    static function validate($request)
    {
        try {

            // Set rules
            $rules    = [
                'title'   => 'required|max:100',
                'cod'    => 'required|max:30|unique:cupons',
                'is_percentage' => 'boolean',
                'value'    => 'required|nullable|max:120',
                'column'  => 'required|in:1,2,3,4',
            ];

            // Set errors messages
            $messages = [
                'title.required'  => __('messages.t_validator_required'),
                'title.max'       => __('messages.t_validator_max', ['max' => 100]),
                'cod.required'   => __('messages.t_validator_required'),
                'cod.max'        => __('messages.t_validator_max', ['max' => 30]),
                'cod.unique'     => __('messages.t_validator_unique'),
                'is_percentage.boolean' => __('messages.t_validator_boolean')
               
            ];

            // Set data to validate
            $data     = [
                'title'   => $request->title,
                'cod'    => $request->cod,
                'value' => $request->value,
                'is_percentage' => $request->is_percentage
         
            ];

            // Validate data
            Validator::make($data, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
