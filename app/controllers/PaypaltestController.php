<?php
class Configuration
{
    // For a full list of configuration parameters refer in wiki page (https://github.com/paypal/sdk-core-php/wiki/Configuring-the-SDK)
    public static function getConfig()
    {
        $config = array(
            // values: 'sandbox' for testing
            //		   'live' for production
            "mode" => "sandbox"

            // These values are defaulted in SDK. If you want to override default values, uncomment it and add your value.
            // "http.ConnectionTimeOut" => "5000",
            // "http.Retry" => "2",
        );
        return $config;
    }

    // Creates a configuration array containing credentials and other required configuration parameters.
    public static function getAcctAndConfig()
    {
        $config = array(
            // Signature Credential
            "acct1.UserName" => "roman.raslin-facilitator_api1.gmail.com",
            "acct1.Password" => "1385707828",
            "acct1.Signature" => "A3LVAIvTmCUZXJilr9YaV6PBVEHvAz.GVenmt8U.vD3WVUCgGTzTeDPv",
            "acct1.AppId" => "APP-80W284485P519543T"

            // Sample Certificate Credential
            // "acct1.UserName" => "certuser_biz_api1.paypal.com",
            // "acct1.Password" => "D6JNKKULHN3G5B8A",
            // Certificate path relative to config folder or absolute path in file system
            // "acct1.CertPath" => "cert_key.pem",
            // "acct1.AppId" => "APP-80W284485P519543T"
        );

        return array_merge($config, self::getConfig());;
    }

}


class PaypaltestController extends BaseController {

    public function index()
    {
        return View::make('hello');
    }


    public function pay(){


/*
 * Use the Pay API operation to transfer funds from a sender�s PayPal account to one or more receivers� PayPal accounts. You can use the Pay API operation to make simple payments, chained payments, or parallel payments; these payments can be explicitly approved, preapproved, or implicitly approved.

 Use the Pay API operation to transfer funds from a sender's PayPal account to one or more receivers' PayPal accounts. You can use the Pay API operation to make simple payments, chained payments, or parallel payments; these payments can be explicitly approved, preapproved, or implicitly approved.

 A chained payment is a payment from a sender that is indirectly split among multiple receivers. It is an extension of a typical payment from a sender to a receiver, in which a receiver, known as the primary receiver, passes part of the payment to other receivers, who are called secondary receivers

 * Create your PayRequest message by setting the common fields. If you want more than a simple payment, add fields for the specific kind of request, which include parallel payments, chained payments, implicit payments, and preapproved payments.
 */
//require_once('../PPBootStrap.php');
//require_once('../Common/Constants.php');
define("DEFAULT_SELECT", "- Select -");


    $receiver = array();
    /*
     * A receiver's email address
     */

        $receiver[0] = new Receiver();
        $receiver[0]->email = "roman.raslin-facilitator@gmail.com";
        /*
         *  	Amount to be credited to the receiver's account
         */
        $receiver[0]->amount = "10";
        /*
         * Set to true to indicate a chained payment; only one receiver can be a primary receiver. Omit this field, or set it to false for simple and parallel payments.
         */
        $receiver[0]->primary = true;




        $receiver[1] = new Receiver();
        $receiver[1]->email = "roman.raslin.second@gmail.com";
        /*
         *  	Amount to be credited to the receiver's account
         */
        $receiver[1]->amount = "90";
        /*
         * Set to true to indicate a chained payment; only one receiver can be a primary receiver. Omit this field, or set it to false for simple and parallel payments.
         */
        $receiver[1]->primary = true;


    $receiverList = new ReceiverList($receiver);


/*
 * The action for this request. Possible values are:

    PAY � Use this option if you are not using the Pay request in combination with ExecutePayment.
    CREATE � Use this option to set up the payment instructions with SetPaymentOptions and then execute the payment at a later time with the ExecutePayment.
    PAY_PRIMARY � For chained payments only, specify this value to delay payments to the secondary receivers; only the payment to the primary receiver is processed.

 */
/*
 * The code for the currency in which the payment is made; you can specify only one currency, regardless of the number of receivers
 */
/*
 * URL to redirect the sender's browser to after canceling the approval for a payment; it is always required but only used for payments that require approval (explicit payments)
 */
/*
 * URL to redirect the sender's browser to after the sender has logged into PayPal and approved a payment; it is always required but only used if a payment requires explicit approval
 */
        $payRequest = new PayRequest(new RequestEnvelope("en_US"), 'PAY_PRIMARY', 'http://local.eventustart.com', 'USD', $receiverList, 'http://local.eventustart.com');
        // Add optional params

//if($_POST["memo"] != "") {
  //  $payRequest->memo = $_POST["memo"];
//}


/*
 * 	 ## Creating service wrapper object
Creating service wrapper object to make API call and loading
Configuration::getAcctAndConfig() returns array that contains credential and config parameters
 */
$service = new AdaptivePaymentsService(Configuration::getAcctAndConfig());
try {
    /* wrap API method calls on the service object with a try catch */
    $response = $service->Pay($payRequest);
} catch(Exception $ex) {
    require_once '../Common/Error.php';
    exit;
}
/* Make the call to PayPal to get the Pay token
 If the API call succeded, then redirect the buyer to PayPal
to begin to authorize payment.  If an error occured, show the
resulting errors */


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
    <title>PayPal Adaptive Payments - Pay Response</title>
    <link href="../Common/sdk.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../Common/tooltip.js">
    </script>
</head>

<body>
<div id="wrapper">
    <img src="https://devtools-paypal.com/image/bdg_payments_by_pp_2line.png"/>
    <div id="response_form">
        <h3>Pay - Response</h3>
        <?php
        $ack = strtoupper($response->responseEnvelope->ack);
        if($ack != "SUCCESS") {
            echo "<b>Error </b>";
            echo "<pre>";
            echo "</pre>";
        } else {
            $payKey = $response->payKey;
            $payPalURL = PAYPAL_REDIRECT_URL . '_ap-payment&paykey=' . $payKey;

            echo "<table>";
            echo "<tr><td>Ack :</td><td><div id='Ack'>$ack</div> </td></tr>";
            echo "<tr><td>PayKey :</td><td><div id='PayKey'>$payKey</div> </td></tr>";
            echo "<tr><td><a href=$payPalURL><b>Redirect URL to Complete Payment to \"Primary Receiver\"</b></a></td></tr>";
            echo "<tr><td>To complete payment for secondary receiver, have to make Execute Payment API call after redirection at later point.</td></tr>";
            echo "</table>";
            echo "<pre>";
            print_r($response);
            echo "</pre>";
        }
        $url = $_SERVER["PHP_SELF"];
        $url = preg_replace("/(.*)(adaptivepayments-sdk-php\/samples)(.*)/", "\\1\\2/index.php", $url);

        ?>
        <table id="apiResponse">
            <tr>
                <td>Request:</td>
            </tr>
            <tr>
                <td><textarea rows="10" cols="100"><?php echo htmlspecialchars($service->getLastRequest());?></textarea>
                </td>
            </tr>
            <tr>
                <td>Response:</td>
            </tr>
            <tr>
                <td><textarea rows="10" cols="100"><?php echo htmlspecialchars($service->getLastResponse());?></textarea>
                </td>
            </tr>
        </table>
        <br>
        <a href=<?php echo $url?>>Home</a>

        <script>localStorage.setItem('payKey', '<?php echo $payKey?>');</script>
    </div>
</div>
</body>
</html>



<?
}

}