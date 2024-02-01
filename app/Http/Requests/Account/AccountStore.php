<?php

namespace App\Http\Requests\Account;

use App\Rules\ImageMimeTypeRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AccountStore extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' =>[
              'required',
              Rule::unique('accounts')->where(function($query){
                return $query->where('user_id', Auth::guard('web')->user()->id);
              })
            ],
            'image' => [
              'nullable',
              $this->hasFile('image') ? new ImageMimeTypeRule():''
            ],
            'package' => 'required'
        ];
    }
}
