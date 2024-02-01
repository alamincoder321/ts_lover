<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageHeadingRequest extends FormRequest
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
    return [
      'contact_page_title' => 'required',
      'error_page_title' => 'required',
      'forget_password_page_title' => 'required',
      'login_page_title' => 'required',
      'signup_page_title' => 'required',
    ];
  }
}
