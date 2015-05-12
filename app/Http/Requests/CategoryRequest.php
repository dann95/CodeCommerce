<?php namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class CategoryRequest extends Request {

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
			'name' => 'required|alpha_num|min:3|max:80|unique:categories',
            'description' => 'required|min:3'
		];
	}
    public function messages()
    {
        return [
          'name.unique' => 'A category with this name already exists',
        ];
    }

}
