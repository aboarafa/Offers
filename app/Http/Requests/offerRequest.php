<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class offerRequest extends FormRequest
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
				'title_ar'   => 'required|unique:offers,title_ar',
				'title_en'   => 'required|unique:offers,title_en',
				'details_ar' => 'required|unique:offers,details_ar',
				'details_en' => 'required|unique:offers,details_en',
				'price'      => 'required|max:5',
				'img'        => 'required',
			
		];
	}
	  public function messages()
	{
		return [
	      'title_ar.required'  => __('messages.title_arRequired'),
	      'title_en.required'  => __('messages.title_enRequired'),
	      'title_ar.unique'    => __('messages.title_arUnique'),
	      'title_en.unique'    => __('messages.title_enUnique'),
	      'details_ar.required'=> __('messages.details_arRequired'),
	      'details_en.required'=> __('messages.details_enRequired'),
	      'details_ar.unique'  => __('messages.details_arUnique'),   
	      'details_en.unique'  => __('messages.details_enUnique'),   
          'price.required'     => __('messages.priceRequired'),
          'price.max'          => __('messages.pricemax'),
          'img.required'       => __('messages.imgrequired'),
		];
	}
}
