<?php

namespace App\Http\Validators\Main\Seller\Gigs\Edit;
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
                'tags'            => $request->tags,
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
                'tags.required'        => __('messages.t_validator_required'),
                'tags.array'           => __('messages.t_validator_array'),
                'tags.min'             => __('messages.t_validator_min_array', ['min' => 1]),
                'tags.max'             => __('messages.t_validator_max_array', ['max' => settings('publish')->max_tags]),
                'tags.*.required'      => __('messages.t_validator_required'),
                'tags.*.max'           => __('messages.t_validator_max', ['max' => 20]),
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


class GalleryValidator
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
            
            // Get publish settings
            $settings          = settings('publish');

            // Get maximum image size
            $max_image_size    = $settings->max_image_size * 1024;

            // Get maximum images per gig
            $max_images        = $settings->max_images;

            // Get maximum documents allowed
            $max_documents     = $settings->max_documents;

            $max_document_size = $settings->max_document_size * 1024;

            // Set rules
            $rules    = [
                'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png',
                'images'      => "nullable|array|max:$max_images",
                'images.*'    => "nullable|image|mimes:jpeg,jpg,png|max:$max_image_size",
                'documents'   => "nullable|array|max:$max_documents",
                'documents.*' => "nullable|mimetypes:application/pdf|mimes:pdf|max:$max_document_size"
            ];

            // Set inputs
            $inputs   = [
                'thumbnail' => $request->thumbnail,
                'images'    => $request->images,
                'documents' => $request->documents,
            ];

            // Set messages
            $messages = [
                'thumbnail.image'       => __('messages.t_validator_image'),
                'thumbnail.mimes'       => __('messages.t_validator_mimes'),
                'images.array'          => __('messages.t_validator_array'),
                'images.max'            => __('messages.t_validator_max_array', ['max' => $max_images]),
                'images.*.image'        => __('messages.t_validator_image'),
                'images.*.mimes'        => __('messages.t_validator_mimes'),
                'images.*.max'          => __('messages.t_validator_max_size', ['max' => human_filesize($max_image_size)]),
                'documents.array'       => __('messages.t_validator_array'),
                'documents.max'         => __('messages.t_validator_max_array', ['max' => $max_documents]),
                'documents.*.mimetypes' => __('messages.t_validator_mimes'),
                'documents.*.mimes'     => __('messages.t_validator_mimes'),
                'documents.*.max'       => __('messages.t_validator_max_size', ['max' => human_filesize($max_document_size)]),
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
