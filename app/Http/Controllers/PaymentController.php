<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;


class PaymentController extends Controller
{

    private $_api_context;
    public function __construct()
    {


        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function PayPalPayment($id)
    {
        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal('1.00');
        $amount->setCurrency('USD');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $callback = url('/paypal-status', ['id' => $id]);
        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl($callback)
            ->setCancelUrl($callback);

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);
        try {
            $payment->create($this->_api_context);

            return redirect()->away($payment->getApprovalLink());
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }

    public function PayPalStatus(Request $request, $id)
    {
        $paymentId = $request->input('paymentId');
        $token = $request->input('token');
        $PayerID = $request->input('PayerID');

        if (!$paymentId || !$token || !$PayerID) {
            return redirect()->to(route('buyCurso.show', ['id' => $id]));
        }

        $payment = Payment::get($paymentId, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId($PayerID);


        // Execte Payment

        $result = $payment->execute($execution, $this->_api_context);
        // si el pago es correcto
        if ($result->getState() == "approved") {
            return redirect(route('detalleCurso.show',  ['id' => $id]))->with(['status' => 'success', 'mensage' => "Pago realizado Correctamente"]);
        }
        // si el pago no es correcto

        return redirect(route('buyCurso.show',  ['id' => $id]))->with(['status' => 'error', 'mensage' => "Error al realizar el Pago"]);
    }
}
