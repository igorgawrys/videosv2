<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function __construct()
     {
     	$this->middleware('auth');
     }
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
        return [
            'content' => 'required|max:255',
        ];
    }
       public function messages(){
        return [
            'content.required'=> 'Pole komentarza jest wymagane',
             //'content.max'=>'Pole komentarz nie możę przekracząć 255 znaków'
        ];
    }
}
