<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>书擎网：查询页</title>

<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
<input type="hidden" name="hiddenbn" value="<?php if($_GET['bn'])echo $_GET['bn']; ?>" id="hiddenbn"/>
<input type="hidden" name="hiddenca" value="<?php if($_GET['Ca'])echo $_GET['Ca']; ?>" id="hiddenca"/>
<div id="page">
 	<div id="container">
         <div id="loadingdiv"><a href="../main/index.php"><img src="../main/images/Hrbanner.jpg" alt="loading" border="0" /></a></div>
            <form id="searchForm" method="get">
                    <div class="searchbox">
                    <div id="inputbox">
                    <input type="text" name="booksuggest" value="请输入书名" class="birds" id="booksuggest" />
                    <div id='suggest2' class="ac_results"></div>
                    </div>
                    <input type="submit" value="搜索" id="submitButton" />
					</div>
           </form>      
       		 <div id="loading"><img src="../main/images/panelloading.gif" alt="loading"   /></div>
            <div id="resultsDiv"></div>
    </div>
</div>
    
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/j.suggest.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript">
$(function(){
	//suggest应用
	$.ajax({
						   url: "../main/getbook.php",
				   		   dataType: 'json',
						   success: function(msg){
							  		 var data=new Array();
									//返回的JSON再转化成数组
									$.each(msg, function(i){
											data[i]=new Array(msg[i].BookListID,msg[i].Bname,msg[i].Bpinyin,msg[i].Bsuoxie);
									});
											$("#booksuggest").suggest(data,{attachObject:"#suggest2"});
					//$("#arrcity").suggest(data,{onSelect:function(){$("#city2").click();},attachObject:'#suggest'});	
			}});
});
</script>
</body>
</html>
