<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait Reportable {
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'message' => 'La validación ha fallado.',
            'errors' => $validator->errors()
        ], 422));
    }
}
