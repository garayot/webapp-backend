<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    // InvoicesRequest.php

    public function rules()
    {
        return [
            'order_id' => 'required|exists:orders,order_id',
            'car_id' => 'required|exists:units,car_id',
        ];
    }
}
