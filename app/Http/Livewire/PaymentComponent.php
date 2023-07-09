<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PaymentComponent extends Component
{

    public $amount;
    public $phone_number;
    public $name;
    private $msg_resp;
    public $resp;
    public $status;
    public $errorss;
    public function updated($field)
    {
        $this->validateOnly($field, [
            'phone_number' => ['required', 'string', 'size:12', 'regex:/^254/'],
            'amount' => ['required', 'numeric', 'min:5'],
            'name' => ['required', 'string', 'regex:/^[A-Za-z]+\s[A-Za-z]+/'],
        ]);
    }
    protected function validationRules()
    {
        return [
            'phone_number' => ['required', 'string', 'size:12', 'regex:/^254/'],
            'amount' => ['required', 'numeric', 'min:5'],
            'name' => ['required', 'string', 'regex:/^[A-Za-z]+\s[A-Za-z]+/'],
        ];
    }

    public function startPayment()
    {
        $this->validate($this->validationRules());

        // Your payment processing logic here
        $this->payNow();
        session()->flash('msg', 'Payment request initiated');
    }


    public function payNow()
    {
        $accountNo = 'Mcomps Enterprises'; // Enter account number (optional)
        $url = 'https://tinypesa.com/api/v1/express/initialize';
        $data = [
            'amount' => $this->amount, //Amount from form
            'msisdn' => $this->phone_number, //Phone number you're paying from
            'account_no' => $accountNo //Acount number
        ];
        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'ApiKey: ' . env('MPESA_API_KEY') // Retrieve the API key from .env
        ];
        $info = http_build_query($data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $resp = curl_exec($curl);

        // Check for CURL errors
        if ($resp == false) {
            $status = "CURL ERROR: " . curl_error($curl);
        } else {
            $msg_resp = json_decode($resp);

            // Check if the request was successful
            if ($msg_resp->success == true) {
                // $status = "✔✔ TinyPesa transaction initialized successfully. With request id " . $msg_resp->request_id . ".";
                $status = "✔✔ We have sent you an STK push. Enter PIN to complete transaction.";
            } else {
                // Handle any errors returned by the API
                $status = "ERROR: " . $resp;
            }
        }

        // Update the component's properties with the response
        $this->msg_resp = $msg_resp;
        $this->status = $status;
        // Close the CURL session
        curl_close($curl);
    }

    public function render()
    {
        return view('livewire.payment-component')->layout('layouts.base');
    }
}
