<?php

namespace App\Rules\Personstruture;

use Illuminate\Contracts\Validation\Rule;

class ValidEstado implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if(empty($value) || $value == null ){
            $value = null;
            return false;
        }else{
            return true;
        }




        

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Debe Ingresar el Estado';
    }
}
