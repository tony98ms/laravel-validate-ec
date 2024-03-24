<?php

namespace Tonystore\LaravelValidateEc;

use Error;
use Tavo\ValidadorEc;

class LaravelValidateEc
{
    private array $types = [
        'ci' => 'validarCedula',
    ];
    private $messages = [
        'ci'        => 'Cédula',
    ];
    public function validate($attribute, $value, $parameters, $validator)
    {
        $validator = new ValidadorEc();
        try {
            return  $validator->{$this->types[$parameters[0]]}($value);
        } catch (\Exception $exception) {
            throw new Error("Custom validation rule ecuador:{$parameters[0]} does not exist");
        }
    }

    public function replace($message, $attribute, $rule, $parameters)
    {
        return str_replace(':type', $this->messages[$parameters[0]], __('validation::validate.document_ec'));
    }
}
