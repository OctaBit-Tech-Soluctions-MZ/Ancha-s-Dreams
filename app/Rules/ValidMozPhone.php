<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidMozPhone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = preg_replace('/[^0-9]/', '', $value);

        if (!(strlen($value) === 9 && in_array(substr($value, 0, 2), ['84', '85', '86', '87']))) {
            $fail('O campo ' . $attribute . ' não contém um número de telefone moçambicano válido.');
        }
    }
}
