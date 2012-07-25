<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>
<body>

    <center>
	<form action="<?php echo site_url('payment/revieworder');?>" method="POST">
	<input type="hidden" name="paymentType" value='Sale' >

	<span id=apiheader>SetExpressCheckout</span>

    <table class="api">

        <tr>
           <td colspan="2">
                <center></br>
                You must be logged into <a href="https://developer.paypal.com" id="PayPalDeveloperCentralLink"  target="_blank">Developer
                    Central<br / </a> </br>
                </center>
            </td>
        </tr>
        <tr>
            <td class="field">
                Amount:</td>
            <td>
                <input type="text" name="paymentAmount" size="5" maxlength="7" value="1.00" />
                <select name="currencyCodeType">
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
                <option value="EUR">EUR</option>
                <option value="JPY">JPY</option>
                <option value="CAD">CAD</option>
                <option value="AUD">AUD</option>
                </select>
                (Required)</td>
        </tr>
        <tr>
            <td> </br></br>
                <input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" />
            </td>
            <td>
                Save time. Pay securely without sharing your financial information.
            </td>
        </tr>
    </table>
    </center>

</body>
</html>