<?php
// This file is called when any button on the checkout page (PayPal checkout, update, or empty) is clicked
// Include jcart before session start
		$Aid=$_POST['addradio'];
		$Uid=$_POST['hiddenuid'];


include_once('jcart.php');

$config = $jcart->config;

// The update and empty buttons are displayed when javascript is disabled 
// Re-display the cart if the visitor has clicked either button
if ($_POST['jcartUpdateCart'] || $_POST['jcartEmpty']) {

	// Update the cart
	if ($_POST['jcartUpdateCart']) {
		if ($jcart->update_cart() !== true)	{
			$_SESSION['quantityError'] = true;
		}
	}

	// Empty the cart
	if ($_POST['jcartEmpty']) {
		$jcart->empty_cart();
	}

	// Redirect back to the checkout page
	$protocol = 'http://';
	if (!empty($_SERVER['HTTPS'])) {
		$protocol = 'https://';
	}

	header('Location: ' . $protocol . $_SERVER['HTTP_HOST'] . $config['checkoutPath']);
	exit;
}

// 点击 前往paypal 付款 ！！！！
else {

	////////////////////////////////////////////////////////////////////////////
	/*

	A malicious visitor may try to change item prices before checking out.

	Here you can add PHP code that validates the submitted prices against
	your database or validates against hard-coded prices.

	The cart data has already been sanitized and is available thru the
	$jcart->get_contents() method. For example:

	foreach ($jcart->get_contents() as $item) {
		$itemId	    = $item['id'];
		$itemName	= $item['name'];
		$itemPrice	= $item['price'];
		$itemQty	= $item['qty'];
	}

	*/
	////////////////////////////////////////////////////////////////////////////

	// For now we assume prices are valid
	$validPrices = true;

	////////////////////////////////////////////////////////////////////////////

	// If the submitted prices are not valid, exit the script with an error message
	if ($validPrices !== true)	{
		die($config['text']['checkoutError']);
	}

	// Price validation is complete
	// Send cart contents to PayPal using their upload method, for details see: http://j.mp/h7seqw
	elseif ($validPrices === true) {


//////////////////////////////向数据库生成订单

	//SAE connnection
		$mysql=new SaeMysql();
		//1.插入Aid到Order表
		$sql = "INSERT INTO Order2 SET Aid='".$Aid."'";
		$mysql->runSql($sql);
		//2.提取插入生成的ID
		$Oid=$mysql->lastId();
		//3.插入CustomerOrder表，表示每个用户有多少订单的关系
		$sql2 = "INSERT INTO CustomerOrder SET CustomerID='".$Uid."',OrderID='".$Oid."'";
		$mysql->runSql($sql2);

		//4.插入OrderBook表，表示每张订单有多少书的关系
		$subtotal=0;
		foreach ($jcart->get_contents() as $item) {
		$sql3 = "INSERT INTO OrderBook SET OrderID='".$Oid."',BookID='".$item['id']."',Quan='".$item['qty']."'";
		$subtotal+=$item['subtotal'];
		$mysql->runSql($sql3);
		}

		//更新Amount
		$sql4 = "UPDATE Order2 SET Amount='".$subtotal."' WHERE OrderID='".$Oid."'";
		$mysql->runSql($sql4);
		$mysql->closeDb();
/////////////////////////////////










		// Paypal count starts at one instead of zero
		$count = 1;
		
		// Build the query string
		$queryString  = "?cmd=_cart";
		$queryString .= "&upload=1";
		$queryString .= "&charset=utf-8";
		$queryString .= "&currency_code=" . urlencode($config['currencyCode']);
		$queryString .= "&business=" . urlencode($config['paypal']['id']);
		$queryString .= "&return=" . urlencode($config['paypal']['returnUrl']);
		$queryString .= '&notify_url=' . urlencode($config['paypal']['notifyUrl']);
		$queryString .= "&custom=".$Oid;

		
		foreach ($jcart->get_contents() as $item) {

			$queryString .= '&item_number_' . $count . '=' . urlencode($item['id']);
			$queryString .= '&item_name_' . $count . '=' . urlencode($item['name']);
			$queryString .= '&amount_' . $count . '=' . urlencode($item['price']);
			$queryString .= '&quantity_' . $count . '=' . urlencode($item['qty']);
			
			// Increment the counter
			++$count;
		}

		// Empty the cart
		$jcart->empty_cart();

		// Confirm that a PayPal id is set in config.php
		if ($config['paypal']['id']) {

			// Add the sandbox subdomain if necessary
			$sandbox = '';
			if ($config['paypal']['sandbox'] === true) {
				$sandbox = '.sandbox';
			}

			// Use HTTPS by default
			$protocol = 'https://';
			if ($config['paypal']['https'] == false) {
				$protocol = 'http://';
			}

			// Send the visitor to PayPal
			//@header('Location: ' . $protocol . 'www' . $sandbox . '.paypal.com/cgi-bin/webscr' . $queryString);
			@header('Location: ' . $protocol . 'www.sandbox.paypal.com/cgi-bin/webscr' . $queryString);
		}
		else {
			die('Couldn&rsquo;t find a PayPal ID in <strong>config.php</strong>.');
		}
	}
}

?>