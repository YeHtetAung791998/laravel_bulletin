<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\User;
class uniqueEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where('email', $value)
        ->whereNotNull('deleted_at');

    if (!$user) {
        // The email is either not unique or not associated with a soft-deleted user
        $fail("The $attribute is duplicate.");
    }
    }

    

 

}
