<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFloorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:50|unique:floors,name',
            'floor_number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Etaj atı bos bolmaw kerek! ',
            'name.unique' =>'Etaj atı  qaytalanbaw kerek! ',
            'floor_number'=>'Etaj nomeri bos bolmasın!'
        ];
    }
}
