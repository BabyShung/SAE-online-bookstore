<?php
if(!$_POST['hiddenoid'])die('sorry');

$Oid=$_POST['hiddenoid'];

//////////////////////////////向数据库提取订单内容
include_once('../bInfo/jcart/jcart.php');

$config = $jcart->config;

	//SAE connnection
		$mysql=new SaeMysql();
		$sql = "select * from Bookq a,Order2 b,OrderBook c where a.BookID=c.BookID and b.OrderID=c.OrderID and  b.OrderID ='".$Oid."'";
	    $data = $mysql->getData( $sql );


		// Paypal count starts at one instead of zero
		$count = 1;
		
		// Build the query string
		$queryString  = "?cmd=_cart";
		$queryString .= "&upload=1";
		$queryString .= "&charset=utf-8";
		$queryString .= "&currency_code=" . urlencode($config['currencyCode']);
		$queryString .= "&business=" . urlencode($config['paypal']['id']);
		$queryString .= "&custom=".$Oid;

		if($data)
		{
			foreach ($data as $item) {

				$queryString .= '&item_number_' . $count . '=' . urlencode($item['BookID']);
				$queryString .= '&item_name_' . $count . '=' . urlencode($item['Bname']);
				$queryString .= '&amount_' . $count . '=' . urlencode($item['SalePrice']);
				$queryString .= '&quantity_' . $count . '=' . urlencode($item['Quan']);
				
				// Increment the counter
				++$count;
			}
		}




			// Use HTTPS by default
			$protocol = 'https://';
			if ($config['paypal']['https'] == false) {
				$protocol = 'http://';
			}

			// Send the visitor to PayPal
			//@header('Location: ' . $protocol . 'www' . $sandbox . '.paypal.com/cgi-bin/webscr' . $queryString);
			@header('Location: ' . $protocol . 'www.sandbox.paypal.com/cgi-bin/webscr' . $queryString);





		$mysql->closeDb();


?>