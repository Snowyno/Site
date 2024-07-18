<?php

namespace App\Http\Validators\Admin\Pages;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EditValidator
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
                'word'   => 'required|max:100'
            ];

            // Set errors messages
            $messages = [
                'word.required'  => __('messages.t_validator_required')
            ];

            // Set data to validate
            $data     = [
                'word'   => $request->word
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
