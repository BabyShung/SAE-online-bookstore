    <?php  
//IPN处理，实际上，当你在PAYPAL支付后，PAYPAL就会把IPN的这些信息发送到你需要处理这些数据的一个PHP文件，
//例如客户支付后，我这边需要根据IPN提供的信息进行插入数据库的订单表
    
	$paper_id = $_POST['item_number1'];  
    $num_cart_items = $_POST['num_cart_items'];  
    $status = $_POST['payment_status'];  //交易状态
	$Oid=$_POST['custom'];//OrderID
   // if ($status == "Completed")echo 'success</br>';

    if ($status == "Completed")
	{											 //付费成功
    
		$mysql=new SaeMysql();
		//1.修改订单状态
		$sql = "UPDATE Order2 SET State='已支付' WHERE OrderID='".$Oid."'";
		$mysql->runSql($sql);
		//2.修改书籍的销售数目
		
		$sql2="SELECT count(*) FROM `OrderBook` WHERE OrderID='".$Oid."'";//根据某一订单号判断此订单买了多少书
		$total=$mysql->getVar($sql2);

		for($count = 1;(int)$count<=(int)$total;$count++)
		{
		$sql3 = "UPDATE Bookq SET saled=saled+'".$_POST['quantity'.$count]."' WHERE BookID='".$_POST['item_number'.$count]."'";
		$mysql->runSql($sql3);
		}


		$mysql->closeDb();
    }  
    else if ($status == "Pending") 
	{								 //款项在途，目前Paypal有可能出现状态为Pending，实际上已经支付成功的情况。  
	    echo $_POST['pending_reason'];  
      
    }  
    //输出$_POST的所有数据。  
    foreach($_POST as $key => $value)  
    {  
      echo "POST Data: $key => $value <br>";  
     }  
    ?>  