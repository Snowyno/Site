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
                'title'           => 'required|max:100',
                'category'        => 'required|exists:categories,id',
                'subcategory'     => 'required|exists:subcategories,id',
                'description'     => 'nullable',
                'seo_title'       => 'nullable|max:100',
                'seo_description' => 'nullable|max:150',
                'faqs'            => 'nullable|array',
                'faqs.*.question' => 'max:100',
                'faqs.*.answer'   => 'max:300',
            ];

            // Set inputs
            $inputs   = [
                'title'           => $request->title,
                'category'        => $request->category,
                'subcategory'     => $request->subcategory,
                'description'     => $request->description,
                'seo_title'       => $request->seo_title,
                'seo_description' => $request->seo_description,
                'faqs'            => $request->faqs
            ];

            // Set messages
            $messages = [
                'title.required'       => __('messages.t_validator_required'),
                'title.max'            => __('messages.t_validator_max', ['max' => 100]),
                'category.required'    => __('messages.t_validator_required'),
                'category.exists'      => __('messages.t_validator_exists'),
                'subcategory.required' => __('messages.t_validator_required'),
                'subcategory.exists'   => __('messages.t_validator_exists'),
                'description.required' => __('messages.t_validator_required'),
                'seo_title.max'        => __('messages.t_validator_max', ['max' => 100]),
                'seo_description.max'  => __('messages.t_validator_max', ['max' => 150]),
                'faqs.array'           => __('messages.t_validator_array'),
                'faqs.*.question.max'  => __('messages.t_validator_max', ['max' => 100]),
                'faqs.*.answer.max'    => __('messages.t_validator_max', ['max' => 300]),
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

}
