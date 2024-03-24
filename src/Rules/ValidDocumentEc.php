<?php

namespace Tonystore\LaravelValidateEc\Rules;

use Error;
use Tavo\ValidadorEc;
use Illuminate\Contracts\Validation\Rule;

class ValidDocumentEc  implements Rule
{
    private array $types = [
        'ci' => 'validarCedula',
    ];
    public function __construct(
        private string $parameter,
    ) {
    }
    /**
     * Check base64.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $validator = new ValidadorEc();
        try {
            return  $validator->{$this->types[$this->parameter]}($value);
        } catch (\Exception $exception) {
            throw new Error("Custom validation rule ecuador:{$this->parameter} does not exist");
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return  __('validation::validate.document_ec');
    }
}
