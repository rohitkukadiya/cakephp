<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
use Cake\Network\Session\DatabaseSession;

/**
 * Events and Offer Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class OrdernowController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('Order');
        $this->set('title','Order');
        $session = $this->request->session();
        $order = $this->Order->newEntity();
        $orgnl_refer = $this->request->referer();
        $order['original_refer'] = $orgnl_refer;
        $order['project_type'] = "";
        $order['total_pages'] = 1;
        $order['responsive'] = "yes";
        $link_array = explode('/',$orgnl_refer);
        $page_name = end($link_array);
        if($page_name == 'psd-to-html'){
            $order['project_type'] = "PSD to HTML";
        }elseif($page_name == 'psd-to-wordpress'){
            $order['project_type'] = "PSD to WordPress";
        }elseif($page_name == 'psd-to-email'){
            $order['project_type'] = "PSD to Email";
        }elseif($page_name == 'custom-development'){
            $order['project_type'] = "Other";
        }

        $homepagedata = $session->read('Orderdetail.order_detail');
        //pr($homepagedata); exit;
        if(isset($homepagedata['home_page']) && $homepagedata['home_page'] == 'yes'){
            if($homepagedata['project_type'] == 'psd-to-html'){
                $order['project_type'] = "PSD to HTML";
            }elseif($homepagedata['project_type'] == 'psd-to-wordpress'){
                $order['project_type'] = "PSD to WordPress";
            }elseif($homepagedata['project_type'] == 'psd-to-email'){
                $order['project_type'] = "PSD to Email";
            }elseif($homepagedata['project_type'] == 'custom-development'){
               // $order['project_type'] = "Other";
            }
           $order['total_pages'] = $homepagedata['page'];
           if(isset($homepagedata['responsive']) && $homepagedata['responsive'] == "yes"){
                $order['responsive'] = "yes";
           }else{
                $order['responsive'] = "no";
           }
        }
        $session->delete('Orderdetail.order_detail');
        if ($this->request->is('post')) {
            //pr($this->request->clientIp()); exit;
            
            $order['project_type'] = $this->request->data['project_type'];
            $order['total_pages'] = $this->request->data['total_pages'];
            $order['turnaround_time'] = $this->request->data['turnaround_time'];
            $order['responsive'] = $this->request->data['responsive'];
            $order['user_name'] = $this->request->data['user_name'];
            $order['email'] = $this->request->data['email'];
            $order['project_detail'] = $this->request->data['instructions'];
            if(!empty($this->request->data['files_url'])){
                $order['files_url'] = implode(',', $this->request->data['files_url']);
            }
            $order['coupon'] = $this->request->data['coupon'];
            $order['final_price'] = $this->request->data['final_price'];
            $order['uploaded_files'] = '';
            $order['portfolio_permission'] = '';
            $order['original_refer'] = $this->request->data['original_refer'];
            $order['site_url'] = Router::url('/', true);
            $order['ip'] = $this->request->clientIp();
            $geodata = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])); 
            if($geodata['geoplugin_countryName'] == null && $geodata['geoplugin_countryName'] == ''){
                $order['country'] = ' ';
            }  else {
                $order['country'] = $geodata['geoplugin_countryName'];
            }
            $order_id = "O".date("ymd").rand(100, 999);
            if($this->checkorderid($order_id)){
                $order['order_id'] = $order_id;
            }else{
                $order_id = "O".date("ymd").rand(100, 999);
            }
             
            $order['created_at'] = date("Y-m-d H:i:s");
            $order['updated_at'] = date("Y-m-d H:i:s");
            
            if ($this->Order->save($order)) {
                //$this->Flash->success(__('Record has been inserted successfully'),'alert alert-success fade in');
                return $this->redirect(['action' => 'checkout',$order_id]);
            } else {
                $this->Flash->error(__('There could be error in save data. Please, try again.'));
            }
        }
        $this->set(compact('order'));
        $this->set('_serialize', ['order']);
    }
    
    public function checkorderid($order_id = NULL)
    {   
        $conn = ConnectionManager::get('default');
        $count = $conn->query("SELECT COUNT(*) FROM orders where order_id = '$order_id'");
        foreach ($count as $key => $value) {
            $count = $value[0];
        }
        if($count >= 1){
            return false;
        }else{
            return true;
        }
    }   
    
    public function checkCoupon($code= null)
    {
        $this->loadModel('Coupon');
        $coupons = $this->Coupon->find('all',['conditions' => ['coupon_code = ' => $code,'coupon_expire >=' => date("Y-m-d H:i:s")]])->first();
        if(empty($coupons)){
            echo "no";
        }else{
            echo json_encode($coupons);
        }
        exit;
    }
    public function checkout($orderid = NULL)
    {
        if($orderid == NULL){
            return $this->redirect(['action' => 'index']);
        }else{
            $conn = ConnectionManager::get('default');
            $count = $conn->query("SELECT COUNT(*) FROM orders where order_id = '$orderid'");
            foreach ($count as $key => $value) {
                $count = $value[0];
            }
            $stmt = $conn->query("select * from orders where order_id = '$orderid'");
            if($count < 1){
                return $this->redirect(['action' => 'index']);
            }
            $this->set('order', $stmt);
        }
        $paypal_url = 'https://www.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
        $paypal_id = 'hello@psd4html.com'; //Business Email
        $this->set(compact('paypal_url'));
        $this->set(compact('paypal_id'));
    }
    public function process($paypal = NULL)
    {
        
	if($paypal=='checkout'){
                $products = [];
		
		$products[0]['ItemName'] = $_POST['itemname']; //Item Name
		$products[0]['ItemPrice'] = $_POST['itemprice']; //Item Price
		$products[0]['ItemNumber'] = $_POST['itemnumber']; //Item Number
		$products[0]['ItemDesc'] = $_POST['itemdesc']; //Item Number
		$products[0]['ItemQty']	= $_POST['itemQty']; // Item Quantity
		
		$charges = [];
		
		//Other important variables like tax, shipping cost
		$charges['TotalTaxAmount'] = 0;  //Sum of tax for all items in this order. 
		$charges['HandalingCost'] = 0;  //Handling cost for this order.
		$charges['InsuranceCost'] = 0;  //shipping insurance cost for this order.
		$charges['ShippinDiscount'] = 0; //Shipping discount for this order. Specify this as negative number.
		$charges['ShippinCost'] = 0; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
		
		$this->SetExpressCheckOut($products, $charges);		
	}
	elseif(_GET('token')!=''&&_GET('PayerID')!=''){
		
		//------------------DoExpressCheckoutPayment-------------------		
		
		//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
		//we will be using these two variables to execute the "DoExpressCheckoutPayment"
		//Note: we haven't received any payment yet.
		
		$paypal->DoExpressCheckoutPayment();
	}
	else{
		
		//order form
		

	}
    }
    public function SetExpressCheckout($products, $charges, $noshipping = '1') {

        //Parameters for SetExpressCheckout, which will be sent to PayPal
        $padata = '&METHOD=SetExpressCheckout';

        $padata .= '&RETURNURL=' . urlencode('https://www.psd4html.com/order-now/thankyou');
        $padata .= '&CANCELURL=' . urlencode('https://www.psd4html.com/order-now/');
        $padata .= '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE");

        foreach ($products as $p => $item) {

            $padata .= '&L_PAYMENTREQUEST_0_NAME' . $p . '=' . urlencode($item['ItemName']);
            $padata .= '&L_PAYMENTREQUEST_0_NUMBER' . $p . '=' . urlencode($item['ItemNumber']);
            $padata .= '&L_PAYMENTREQUEST_0_DESC' . $p . '=' . urlencode($item['ItemDesc']);
            $padata .= '&L_PAYMENTREQUEST_0_AMT' . $p . '=' . urlencode($item['ItemPrice']);
            $padata .= '&L_PAYMENTREQUEST_0_QTY' . $p . '=' . urlencode($item['ItemQty']);
        }

        

        $padata .= '&NOSHIPPING=' . $noshipping; //set 1 to hide buyer's shipping address, in-case products that does not require shipping

        $padata .= '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($this->GetProductsTotalAmount($products));


        $padata .= '&PAYMENTREQUEST_0_AMT=' . urlencode($this->GetGrandTotal($products, $charges));
        $padata .= '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode('USD');

        //paypal custom template

        $padata .= '&LOCALECODE=EN'; //PayPal pages to match the language on your website;
        $padata .= '&LOGOIMG=http://www.psd4html.com/assets/images/brand-logo.png'; //site logo
        $padata .= '&CARTBORDERCOLOR=FFFFFF'; //border color of cart
        $padata .= '&ALLOWNOTE=1';

        ############# set session variable we need later for "DoExpressCheckoutPayment" #######

        $_SESSION['ppl_products'] = $products;
        $_SESSION['ppl_charges'] = $charges;

        $httpParsedResponseAr = $this->PPHttpPost('SetExpressCheckout', $padata);
        
        //Respond according to message we receive from Paypal
        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

            $paypalmode = '';

            //Redirect user to PayPal store with Token received.

            $paypalurl = 'https://www' . $paypalmode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
            
            header('Location: ' . $paypalurl);
        } else {

            //Show error message

            echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';

            echo '<pre>';

            print_r($httpParsedResponseAr);

            echo '</pre>';
        }
        exit;
    }
    public function PPHttpPost($methodName_, $nvpStr_) {

        // Set up your API credentials, PayPal end point, and API version.
        $API_UserName = urlencode('hello_api1.psd4html.com');
        $API_Password = urlencode('DCGC5GV6M99V8QNV');
        $API_Signature = urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31AvNtqryOCV-JBe-gAqX4kIjuJopv');

        $paypalmode = '';

        $API_Endpoint = "https://api-3t" . $paypalmode . ".paypal.com/nvp";
        $version = urlencode('109.0');

        // Set the curl parameters.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        //curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'TLSv1');
        // Turn off the server and peer verification (TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        // Set the API operation, version, and API signature in the request.
        $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

        // Set the request as a POST FIELD for curl.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

        // Get response from the server.
        $httpResponse = curl_exec($ch);
        
        if (!$httpResponse) {
            exit("$methodName_ failed: " . curl_error($ch) . '(' . curl_errno($ch) . ')');
        }

        // Extract the response details.
        $httpResponseAr = explode("&", $httpResponse);

        $httpParsedResponseAr = array();
        foreach ($httpResponseAr as $i => $value) {

            $tmpAr = explode("=", $value);

            if (sizeof($tmpAr) > 1) {

                $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
            }
        }

        if ((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {

            exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
        }
        return $httpParsedResponseAr;
    }

    public function GetItemTotalPrice($item) {

        //(Item Price x Quantity = Total) Get total amount of product;
        return $item['ItemPrice'] * $item['ItemQty'];
    }

    public function GetProductsTotalAmount($products) {

        $ProductsTotalAmount = 0;

        foreach ($products as $p => $item) {

            $ProductsTotalAmount = $ProductsTotalAmount + $this->GetItemTotalPrice($item);
        }

        return $ProductsTotalAmount;
    }

    public function GetGrandTotal($products, $charges) {

        //Grand total including all tax, insurance, shipping cost and discount

        $GrandTotal = $this->GetProductsTotalAmount($products);

        foreach ($charges as $charge) {

            $GrandTotal = $GrandTotal + $charge;
        }

        return $GrandTotal;
    }
    public function DoExpressCheckoutPayment() {

        if (!empty($_SESSION['ppl_products']) && !empty($_SESSION['ppl_charges'])) {

            $products = $_SESSION['ppl_products'];

            $charges = $_SESSION['ppl_charges'];

            $padata = '&TOKEN=' . urlencode($_GET('token'));
            $padata .= '&PAYERID=' . urlencode($_GET('PayerID'));
            $padata .= '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE");

            //set item info here, otherwise we won't see product details later	

            foreach ($products as $p => $item) {

                $padata .= '&L_PAYMENTREQUEST_0_NAME' . $p . '=' . urlencode($item['ItemName']);
                $padata .= '&L_PAYMENTREQUEST_0_NUMBER' . $p . '=' . urlencode($item['ItemNumber']);
                $padata .= '&L_PAYMENTREQUEST_0_DESC' . $p . '=' . urlencode($item['ItemDesc']);
                $padata .= '&L_PAYMENTREQUEST_0_AMT' . $p . '=' . urlencode($item['ItemPrice']);
                $padata .= '&L_PAYMENTREQUEST_0_QTY' . $p . '=' . urlencode($item['ItemQty']);
            }

            $padata .= '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($this->GetProductsTotalAmount($products));
            $padata .= '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($charges['TotalTaxAmount']);
            $padata .= '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($charges['ShippinCost']);
            $padata .= '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($charges['HandalingCost']);
            $padata .= '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($charges['ShippinDiscount']);
            $padata .= '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($charges['InsuranceCost']);
            $padata .= '&PAYMENTREQUEST_0_AMT=' . urlencode($this->GetGrandTotal($products, $charges));
            $padata .= '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode(PPL_CURRENCY_CODE);

            //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.

            $httpParsedResponseAr = $this->PPHttpPost('DoExpressCheckoutPayment', $padata);

            //vdump($httpParsedResponseAr);
            //Check if everything went ok..
            if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

                echo '<h2>Success</h2>';
                echo 'Your Transaction ID : ' . urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);

                /*
                  //Sometimes Payment are kept pending even when transaction is complete.
                  //hence we need to notify user about it and ask him manually approve the transiction
                 */

                if ('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {

                    echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
                } elseif ('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {

                    echo '<div style="color:red">Transaction Complete, but payment may still be pending! ' .
                    'If that\'s the case, You can manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
                }

                $this->GetTransactionDetails();
            } else {

                echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';

                echo '<pre>';

                print_r($httpParsedResponseAr);

                echo '</pre>';
            }
        } else {

            // Request Transaction Details

            $this->GetTransactionDetails();
        }
        return $this->GetTransactionDetails();
        exit;
    }
    public function GetTransactionDetails() {

        // we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
        // GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut

        $padata = '&TOKEN=' . urlencode($_GET['token']);

        $httpParsedResponseAr = $this->PPHttpPost('GetExpressCheckoutDetails', $padata, 'hello_api1.psd4html.com', 'DCGC5GV6M99V8QNV', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AvNtqryOCV-JBe-gAqX4kIjuJopv', 'live');

        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

            
                //pr($httpParsedResponseAr); exit;
              

        } else {

            /*echo '<div style="color:red"><b>GetTransactionDetails failed:</b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';

            echo '<pre>';

            print_r($httpParsedResponseAr);

            echo '</pre>';*/
        }
        return $httpParsedResponseAr;
    }

    public function orderSuccess()
    {   
        $session = $this->request->session();
        if($session->read('Payment.payment_detail')){
            $payment = $session->read('Payment.payment_detail');
            $this->set(compact('payment'));
            $this->set('_serialize', ['payment']);
            $session->delete('Payment.payment_detail');
        }else{
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function thankyou()
    { 
        $data = $this->DoExpressCheckoutPayment();
        $conn = ConnectionManager::get('default');
        if ("SUCCESS" == strtoupper($data["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($data["ACK"])) {
            $this->loadModel('Payment');
            $checkpayment = $this->Payment->find('all')->where(['token'=>urldecode($data['TOKEN'])]);
            if(!$checkpayment->isEmpty()){
                return $this->redirect(['action' => 'index']);
            }
            $payment = $this->Payment->newEntity();
            $payment['token'] = urldecode($data['TOKEN']);
            $payment['ack'] = urldecode($data['ACK']);
            $payment['email'] = urldecode($data['EMAIL']);
            $payment['payer_id'] = urldecode($data['PAYERID']);
            $payment['payment_status'] = urldecode($data['PAYERSTATUS']);
            $payment['currency_code'] = urldecode($data['CURRENCYCODE']);
            $payment['user_name'] = urldecode($data['FIRSTNAME'])." ".urldecode($data['LASTNAME']);
            $payment['amt'] = urldecode($data['L_AMT0']);
            $payment['order_id'] = urldecode($data['L_NUMBER0']);
            if ($this->Payment->save($payment)) {
                //$this->Flash->success(__('Payment successfully'),'alert alert-success fade in');
                //return $this->redirect(['action' => 'checkout',$order_id]);
                
                $count = $conn->query("SELECT COUNT(*) FROM orders where order_id = '".urldecode($data['L_NUMBER0'])."'");
                foreach ($count as $key => $value) {
                    $count = $value[0];
                }
                $stmt = $conn->query("select * from orders where order_id = '".urldecode($data['L_NUMBER0'])."'");
                if($count >= 1){
                    foreach ($stmt as $key => $value) {
                        $payment['name'] = $value['user_name'];
                        $message = "<b>Order Id:</b>" . $value['order_id'] . "<br>";
                        $message .= "<b>Project Type:</b>" . $value['project_type'] . "<br>";
                        $message .= "<b>Total Pages:</b>" . $value['total_pages'] . "<br>";
                        $message .= "<b>Turnaround Time:</b>" . $value['turnaround_time'] . "<br>";
                        $message .= "<b>Responsive: </b>" . $value['responsive'] . "<br>";
                        $message .= "<b>Name:</b>" . $value['user_name'] . "<br>";
                        $message .= "<b>Email:</b>" . $value['email'] . "<br>";
                        $message .= "<b>Instrucation:</b>" . $value['project_detail'] . "<br>";
                        $message .= "<b>Price: </b>" . $value['final_price'] . "<br>";
                        if ($value['files_url'] != "") {
                            $fileslinks = explode(',',$value['files_url']);
                            foreach ($fileslinks as $key => $file_value) {
                                if($key == 0){
                                    $message .= "<b>File Link:</b>" . $file_value."<br>";
                                }else{
                                    $message .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $file_value."<br>";
                                }
                                
                            }
                        }
                        $message .= "<b>Coupon: </b>" . $value['coupon'] . "<br>";
                        $message .= "<b>Original Refer: </b>" . $value['original_refer'] . "<br>";
                        $message .= "<b>IP: </b>" . $value['ip'] . "<br>";
                        $message .= "<b>Country: </b>" . $value['country'] . "<br>";
                        $message .= "<b>Created Date: </b>" . $value['created_at'] . "<br>";
                    }
                    /*$email = new Email('default');
                    $email->from(['smtp@psd4html.com' => 'PSD4HTML'])
                            ->to('hello@psd4html.com')
                            ->subject('New Order Received')
                            ->emailFormat('html')
                            ->send($message);*/
                }
            } else {
                $this->Flash->error(__('There could be error in save data. Please, try again.'));
            }
            $session = $this->request->session();
            $session->write('Payment.payment_detail', $payment);
            return $this->redirect(['action' => 'order-success']);
        }else{
            return $this->redirect(['action' => 'index']);
            $this->Flash->error(__('Payment failed'));
        }
        exit;
    }
    
}
