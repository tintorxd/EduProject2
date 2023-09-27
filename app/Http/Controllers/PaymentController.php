<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EstudiantesInscritosController;
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
use App\Providers\CurrencyProvider;

class PaymentController extends Controller
{

    private $_api_context;
    public function __construct()
    {


        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function PayPalPayment($id, $monto)
    {
        // Primero se hara la convercion de BS a USD
        $Currency =  new CurrencyProvider; //Proveedor del tipo de cambio actual
        $BOB = $Currency->CurrencyChange("USD", "BOB"); //El tipo de Cambio Boliviano a Dolar

        $amount_changed = round($monto / $BOB, 2);

        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($amount_changed);
        $amount->setCurrency('USD');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $callback = url('/paypal-status', ['id' => $id, 'id_est' => auth('students')->user()->id, $amount_changed]);
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

    public function  PayPalStatus(Request $request, $id, $id_est, $amount_changed)
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


        // Execute Payment

        $result = $payment->execute($execution, $this->_api_context);
        // si el pago es correcto
        if ($result->getState() == "approved") {

            $guardar_compra = new EstudiantesInscritosController();
            $resultado = $guardar_compra->create($id, $id_est, $amount_changed);


            return redirect(route('webestu.cursos',  ['id' => $id]))->with(['status' => 'success', 'mensage' => "Pago realizado Correctamente"]);
        } else {
            // si el pago no es correcto
            return redirect(route('buyCurso.show',  ['id' => $id]))->with(['status' => 'error', 'mensage' => "Error al realizar el Pago"]);
        }
    }
}
