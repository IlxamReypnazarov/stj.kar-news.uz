<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            
            'room_name' => 'required|max:50',
            'room_number' => 'required|unique:rooms,room_number',
            'capacity'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'room_name.required'=>'Xana atı bos bolmawı kerek! ',
            'room_number.unique' =>'Xana nomeri qaytalanbawı kerek! ',
            'room_number.required'=>'Xana nomeri bos bolmasın!',
            'capacity'=>'Siyimlılıǵı bos bolmasın!'
        ];
    }            
}
