<?php

namespace App\Http\Validators\Main\Account\Orders;

use Illuminate\Support\Facades\Validator;

class FilesCheckBox
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
            $rules = [
                'terms' => 'required', // adicione uma regra de validação para a checkbox
            ];

            // Set errors messages
            $messages = [
                'terms.required' => 'Você deve concordar com os termos e condições',
            ];

            // Set data to validate
            $data = [
                 'terms' => $request->terms, 
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
