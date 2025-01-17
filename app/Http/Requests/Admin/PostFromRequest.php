<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFromRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            'category_id'=>[
                'required',
                'integer'
            ],
            'name'=>[
                'required',
                'string'
            ],
            'slug'=>[
                'required',
                'string'
            ],
            'description'=>[
                'required'
            ],
            'yt_frame'=>[
                'nullable',
                'string'
            ],
            'meta_title'=>[
                'required',
                'string'
            ],
            'meta_description'=>[
                'nullable',
                'string'
            ],
            'meta_keyword'=>[
                'nullable'
            ],
            'status'=>[
                'nullable'
            ]
            ];
        return $rule;
    }
}
