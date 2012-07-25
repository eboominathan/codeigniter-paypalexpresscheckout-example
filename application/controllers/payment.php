<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {
	public function index() {
		$this->load->view('form');
	}

	public function revieworder() {
		//load the payment library
		$this->load->spark('codeigniter-payments/dev/');

		$paymentMethod = 'paypal_expresscheckout';

		//configure the parameters for the payment request
		$paymentParameters = array(
		    'amt'           => '2.00',
			'currency_code' => 'EUR',
    		'return_url' => site_url('payment/getExpressCheckoutDetails'),
    		'cancel_url' => site_url('payment'),
		);

		// make the call
		$paymentResponse = $this->payments->request_express_checkout($paymentMethod, $paymentParameters);

		// print the response
		// print_r($paymentResponse);
		$token = $paymentResponse->details->gateway_response->TOKEN;
		$payPalURL = PAYPAL_EXPRESS_CHECKOUT_URL.$token;
		header("Location: ".$payPalURL);
	}

	public function getExpressCheckoutDetails() {
		$token = $this->input->get('token');
		$payerId = $this->input->get('PayerID');

		// Save token and payerId in session for the next step
		$this->session->set_userdata(array(
			'paymentToken' => $token,
			'paymentPayperId' => $payerId
		));

		$data = array (
			'paymentAmount' => '2.00',
			'currencyCodeType' => 'EUR'
		);

		$this->load->view('confirmation', $data);
	}

	public function express_checkout() {

		//load the payment library
		$this->load->spark('codeigniter-payments/dev/');

		$paymentMethod = 'paypal_expresscheckout';
		$token = $this->session->userdata('paymentToken');
		$payerId = $this->session->userdata('paymentPayperId');

		//configure the parameters for the payment request
		$paymentParameters = array(
			'token' => $token,
			'payer_id' => $payerId,
		    'amt'           => '2.00',
			'currency_code' => 'EUR',
			'ip_address' => '127.0.0.1'
		);
		// print_r($paymentParameters);
		//make the call
		$paymentResponse = $this->payments->do_express_checkout($paymentMethod, $paymentParameters);

		//print the response
		print_r($paymentResponse);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */