<?php

namespace App\Http\Validators\Admin\Gigs\Edit;

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
                'title'                 => 'required|max:100',
                'description'           => 'required'
                            ];

            // Set inputs
            $inputs   = [
                'title'           => $request->title,
                'description'     => $request->description
            ];

            // Set messages
            $messages = [
                'title.required'       => __('messages.t_validator_required'),
                'title.max'            => __('messages.t_validator_max', ['max' => 100]),
                'description.required' => __('messages.t_validator_required')
            ];

            // Validate data
            Validator::make($inputs, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Validate add faq form
     *
     * @param object $request
     * @return void
     */
    static function faq($request)
    {
        try {
            
            // Set rules
            $rules    = [
                'question' => 'required|max:100',
                'answer'   => 'required|max:300'
            ];

            // Set inputs
            $inputs   = [
                'question' => $request->question,
                'answer'   => $request->answer
            ];

            // Set messages
            $messages = [
                'answer.required'   => "Answer is required",
                'answer.max'        => "Max 300 characters",
                'question.required' => "Question is required",
                'question.max'      => "Max 100 characters"
            ];

            // Validate data
            Validator::make($inputs, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Validate tag
     *
     * @param string $tag
     * @return void
     */
    static function tag($tag)
    {
        try {
            
            // Set rules
            $rules    = [
                'tag' => 'required|max:20|regex:/(^[A-Za-z0-9 ]+$)+/'
            ];

            // Set inputs
            $inputs   = [
                'tag' => $tag,
            ];

            // Set messages
            $messages = [
                'tag.required' => "Tag is required",
                'tag.max'      => "Maximum is 20",
                'tag.regex'    => "Invalid tag",
            ];

            // Validate data
            Validator::make($inputs, $rules, $messages)->validate();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
