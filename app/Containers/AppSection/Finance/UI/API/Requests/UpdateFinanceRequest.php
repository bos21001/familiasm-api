<?php

namespace App\Containers\AppSection\Finance\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateFinanceRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        //'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'name' => 'min:2|max:60',
            'type' => 'in:debt,income',
            'value' => 'gte:0',
            'description' => 'max:300',
            'repeats' => 'boolean',
            'business_day_only' => 'boolean',
            'repeat_every' => 'gte:1',
            'repetition_period' => 'in:day,week,month,year',
            'ends' => 'date|after_or_equal:today'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
