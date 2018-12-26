<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) {
            return Auth::user()->is_admin ;
        }
         return false ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->handleBooleanFields();

        return [
            'subject' => 'required',
            'content' => 'required',
        ];
    }

    private function handleBooleanFields()
    {
        // to update a filed that comes from request we should use merge method
        if($this->get('is_published')) {
            $this->merge(['is_published' => true]);
        } else {
            $this->merge(['is_published' => false]);
        }
    }
}
