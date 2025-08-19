<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidNumbers implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $numbers = array_map('trim', explode(',', $value));
        $allowedPrefixes = ['013', '017', '014', '018','015'];

        foreach ($numbers as $num) {
            if (!preg_match('/^01[3-9][0-9]{8}$/', $num)) {
                $fail("$num is not a valid mobile number.");
            }

            $prefix = substr($num, 0, 3);
            if (!in_array($prefix, $allowedPrefixes)) {
                $fail("$num must be from an allowed mobile operator.");
            }
        }
    }
}
