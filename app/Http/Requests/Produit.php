<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class Produit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    { 

        if (request()->user_id != 0){
            $imageRule = 'image|required';
        }else{
            $imageRule = 'image|sometimes';
        }
        return [
            'title' => ['required'],
            'image' => $imageRule,
            'category' => 'required',
            'description' => 'required',
            'price' => ['numeric', 'required'],
            'localisation' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        if($this->image == null){
            $this->request->remove('image');
        }
    }
}
