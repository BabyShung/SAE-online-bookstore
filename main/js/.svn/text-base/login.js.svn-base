$(document).ready(function()
{	
	//自定义验证登录
	$('.smallwin').submit( function(e){
									//登录前的验证
									if($('#smallwinEmail').val()=="您的登录邮箱")
									{
										return false;
									}
									if($('#passwordtmp').val()=="")
									{
										
										return false;
									}	
									$('#submit').css("font-size","12px");							
									$('#submit').val('请稍等');
									$('#errormessage').html("");//清空errormessage
									//$('span.error').remove();
		
		//验证没问题，进行ajax发送
		if($('#comefrom').val()=="admin")
		{
			//登录到Acenter的admin.php
					$.ajax({
					   type: "POST",
					   url: "../main/ADsubmit.php",
					   data: $('.smallwin').serialize(),
					   dataType: 'json',
					   success: function(msg){
								if(msg.status==1){
										//管理员登录成功
										
										$.ajax({
									   type: "POST",
									   url: "../main/ADSession.php",
									   data: "id="+msg.id+"&usr="+msg.usr+"&aStatus="+msg.aStatus+"&power="+msg.power,
									   success: function(){
												$('#errormessage').html("");//清空errormessage
												location.href='admin.php';
												//登录成功后跳转到checkout
										   }});
										
								}
								else {	//失败，输出信息
										$('#submit').val('登录');
										$('#errormessage').html(msg.errors);
										flag=1;
								}
					   }
					});
		}
		else
		{
					$.ajax({
					   type: "POST",
					   url: "../main/submit.php",
					   data: $('.smallwin').serialize(),
					   dataType: 'json',
					   success: function(msg){
								if(msg.status==1){
										//登录成功
										
										$.ajax({
									   type: "POST",
									   url: "../main/index.php",
									   data: "id="+msg.id+"&usr="+msg.usr+"&rememberMe="+msg.rememberMe,
									   success: function(){
												$('#errormessage').html("");//清空errormessage
												location.href=$('#comefrom').val();
												//登录成功后跳转到checkout
										   }});
										
								}
								else {	//失败，输出信息
										$('#submit').val('登录');
										$('#errormessage').html(msg.errors);
										flag=1;
								}
					   }
					});
		}
		return false;
	});

	//登录input的验证
	var tmp;
	$('#smallwinEmail').focus(function(){
			 if($(this).val()=="您的登录邮箱")
			 {
				 tmp=$(this).val();
				 $(this).val('');
			 }
			$(this).css("color","black");
		}).blur(function(){
			if($(this).val()=="")
				$(this).val(tmp);
			$(this).css("color","#999999");
			
	});	
	var tt=$('#texttmp'),pt=$('#passwordtmp');
	tt.focus(function(){   
    	tt.hide(); 
		pt.show().focus().css("color","black");  
	});   
	pt.focus(function(){
								 	if(pt.val()!="")
										pt.css("color","black");
	}).blur(function(){   
		if(pt.val()=="") {   
			tt.show();   
			pt.hide();   
		}   
		pt.css("color","#999999");
	});  

});