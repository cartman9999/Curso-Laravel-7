<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExampleVationRequest extends FormRequest
{
    /** 
     * The controller action to redirect to if validation fails.
     */
    protected $redirectAction = 'RequestValidationController@validatorFailure';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {        
        return true;
    }

    /*
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        info('Este es el titulo:');

        $this->title = 'Titulo: ' . $this->title;

        info($this->title);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
                'title' => 'titulo',
                'json' => 'Contenido'
            ];
    }

    /**
     * Messages in case of failure
     * @param
     * @return
     */
    public function messages()
    {
        return [
                    '*.required' => 'El :attribute es requerido',
                    // 'title.required' => 'Falta titulo',
                    'title.max'     => 'La longitud maxima es de 40 caracteres.'
                    // 'json.required' => 'Debes agregar un json'
                ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     => 'required|max:255',
            'number'    => [
                                'required',
                                'numeric',
                                'digits:10'
                            ],
            'json'      => [
                                'required',
                                function ($attribute, $value, $fail) {
                                    if (json_decode($value) == null) {
                                        $fail('Contenido no es JSON válido.');
                                    }
                                }
                            ],
        ];
    }
}
