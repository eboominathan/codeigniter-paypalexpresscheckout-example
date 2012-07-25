<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>
<body>

	<form action="<?php echo site_url('payment/express_checkout');?>" method="POST">
     <center>
           <table width =400>
            <tr>
                <td><b>Order Total:</b></td>
                <td>
                  <?php echo $currencyCodeType;?> <? echo $paymentAmount;?></td>
            </tr>
            <tr>
                <td class="thinfield">
                     <input type="submit" value="Pay" />
                </td>
            </tr>
        </table>
    </center>
        </form>
</body>
</html>