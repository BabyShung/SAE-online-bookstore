<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>  
    <title>Test Paypal</title>  
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    </head>  
    <body>  
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank" id="book1">  
    <input type="text" name="item_name" value="Test Papers">  
    <input type="text" name="amount" value="4">  
    <input type="text" name="quantity_1" value="1">  
     <input type="text" name="quantity_2" value="3">  
     <input type="text" name="quantity_3" value="3"> 
    
    <input type="hidden" name="cmd" value="_cart">  
    <input type="hidden" name="add" value="1">  
    <input type="hidden" name="business" value="seller_1330946186_biz@qq.com">  
    <input type="hidden" name="cancel_return" value="http://1.lab1.sinaapp.com/Papers.php">  
    <input type="hidden" name="lc" value="US">  
    <input type="hidden" name="item_name_1" value="Paper Item">  
    <input type="hidden" name="item_name_2" value="Cup Item">  
    <input type="hidden" name="amount_1" value="1">  
    <input type="hidden" name="amount_2" value="3">  
    <input type="hidden" name="currency_code" value="USD">  
    <input type="hidden" name="return" value="http://1.lab1.sinaapp.com/backdeal.php">  
    <input type="hidden" name="no_note" value="1">  
    <input type="hidden" name="no_shipping" value="1">  
    <input type="hidden" name="rm" value="2">  
    <input type="hidden" name="cbt" value="download the Papers!">  
    <input type="hidden" name="item_number_1" value="233223"> 
        <input type="hidden" name="item_number_2" value="178721"> 
        <input type="hidden" name="item_name_3" value="XXup Item">  
               <input type="hidden" name="item_number_3" value="178721"> 
          <input type="text" name="quantity_3" value="3">
            <input type="hidden" name="amount_3" value="3">  
    <input type="hidden" name="custom" value="88">  
    
    <input type="submit" value="Add Cart"/>  
    
    
    </form>  
    </body>  
    </html>  