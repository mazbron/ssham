<?php

namespace SSHAM\Http\Requests;

use SSHAM\Http\Requests\Request;

class UserUpdateRequest extends Request
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
     * Overrides the parent's getValidatorInstance() to sanitize user input before validation
     *
     * @return mixed
     */
    protected function getValidatorInstance() {
        $this->sanitize();
        return parent::getValidatorInstance();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->route('users');

        return [
            'username'  => 'sometimes|max:255|unique:users,username,' . $user->id,
            'create_rsa_key' => 'required|boolean',
            'public_key' => 'required_if:create_rsa_key,0|rsa_key:public',
            'enabled'   => 'required|boolean',
        ];
    }

    /**
     * Sanitizes user input. In special 'public_key' to remove carriage returns
     */
    public function sanitize()
    {
        $input = $this->all();

        // Removes carriage returns from 'public_key' input
        if (isset($input['public_key'])) {
            $input['public_key'] = str_replace(["\n", "\t", "\r"], '', $input['public_key']);
        }

        $this->replace($input);
    }

}
