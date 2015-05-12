<?php namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class ProductUpdateRequest extends Request {

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
            'name' => 'required|min:3|max:80',
            'description' => 'required|min:3',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
        ];
    }

}
