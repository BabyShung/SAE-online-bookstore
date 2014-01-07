	var ran1=Math.round(Math.random()*10);
	var ran2=Math.round(Math.random()*10);
		var rresult=0;

$(document).ready(function()
{
	//自定义验证小窗口
	$('.smallwin').submit( function(e){				
									
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

		$.ajax({
		   type: "POST",
		   url: "../main/submit.php",//不同路径！
		   data: $('.smallwin').serialize(),
		   dataType: 'json',
		   success: function(msg){
					if(msg.status==1){
							//登录成功
							
							$.ajax({
						   type: "POST",
						   url: "../main/index.php",//不同路径！
						   data: "id="+msg.id+"&usr="+msg.usr+"&rememberMe="+msg.rememberMe,
						   success: function(){
							   		$('#errormessage').html("");//清空errormessage
									location.href="../main/index.php";  //不同路径！
							   }});
							
					}
					else {	//失败，输出信息
							$('#submit').val('登录');
							$('#errormessage').html(msg.errors);
							flag=1;
					}
		   }
		});

		return false;
	});
	////////////////////////////////////////////////
	
	
	//注册提交SUMBIT   验证加法
	$('.registerform').submit( function () {
										$('#hiddenprovince').val($('#province option:selected').html());
										$('#hiddencity').val($('#city option:selected').html());

									if($('#rresult').val()=="")
									{
										$('#calcu').removeClass("Validform_right");
										$('#calcu').addClass("Validform_wrong");
										$('#calcu').html("请输入答案");
										return false;
									}						
  									else if($('#rresult').val()!=rresult)
									{	
										
										$('#calcu').removeClass("Validform_right");
										$('#calcu').addClass("Validform_wrong");
										$('#calcu').html("您计算错误");
										return false;
									}
									else
									{
										$('#calcu').html("");
										$('#calcu').removeClass("Validform_wrong");
										$('#calcu').addClass("Validform_right");
									}
	} );
	
	
	//自定义验证控件XD  验证加法

	$('#r1').html(ran1);
	$('#r2').html(ran2);

	rresult=ran1+ran2;
	$('#rresult').blur(function(){
									if($(this).val()=="")
									{
										$('#calcu').removeClass("Validform_right");
										$('#calcu').addClass("Validform_wrong");
										$('#calcu').html("请输入答案");
									}
									else if($(this).val()!=rresult)
									{	
										
										$('#calcu').removeClass("Validform_right");
										$('#calcu').addClass("Validform_wrong");
										$('#calcu').html("您计算错误");
									}
									else
									{
										$('#calcu').html("");
										$('#calcu').removeClass("Validform_wrong");
										$('#calcu').addClass("Validform_right");
									}
								});
		/////////////////////////////////////////////////////////////////

	//省份的插件
	$(".ChinaArea").jChinaArea();
		/////////////////////////////////////////////////////////////////


	//注册表格->移到textbox的效果
	$('.registerform input').mouseover(function(){
				$(this).css("border-color","#F6A828");	
		}).mouseout(function(){
			$(this).css("border-color","#A5AEB6");
		}).focus(function(){
				$(this).css("border-color","#F6A828");	
		}).blur(function(){
			$(this).css("border-color","#A5AEB6");	
	});	
	/////////////////////////////////////////////////////////////////

	//弹出小窗口的textbox效果
	var tmp;
	$('.WLDiv input[type=text]').focus(function(){
			 if($(this).val()=="您的登录邮箱")
			 {
				 tmp=$(this).val();
				 $(this).val("");
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
	/////////////////////////////////////////////////////////////////

	
	//点击textbox显示提示信息 qtip
	$('.registerform input[type=text],.registerform input[type=password]').each(function()
	{
		// We make use of the .each() loop to gain access to each element via the "this" keyword...
		$(this).qtip(
		{
			content: {
				  text: function(api) {
					 // Retrieve content from custom attribute of the $('.selector') elements.
					 return $(this).attr('title');
				  }
			},
			position: {
				at: 'top center', // Position the tooltip above the link
				my: 'bottom center',
				viewport: $(window), // Keep the tooltip on-screen at all times
				effect: false // Disable positioning animation
			},
			show: {
				event: 'click',
				solo: true // Only show one tooltip at a time
			},
			hide:{delay: 3000},
		})
	})

	// Make sure it doesn't follow the link when we click it
	.click(function(event) { event.preventDefault(); });
		/////////////////////////////////////////////////////////////////

	//小窗口的弹出  qtip
	$('#loginBtn').qtip(
	{
		id: 'modal', // Since we're only creating one modal, give it an ID so we can style it
		content: {
			text: $('#WinLogin'),
			title: {
				text: '书擎网欢迎您',
				button: true
			}
		},
		position: {
			my: 'center', // ...at the center of the viewport
			at: 'center',
			target: $(window)
		},
		show: {
			event: 'click', // Show it on click...
			solo: true, // ...and hide all other tooltips...
			modal: true // ...and make it modal
		},
		hide: false,
		style: 'ui-tooltip-light ui-tooltip-rounded'
	});
		/////////////////////////////////////////////////////////////////


	//验证
	$(".registerform:last").Validform({
		tiptype:2,
		ajaxPost:true,
		callback:function(data){
			//返回数据data是json格式，{"info":"demo info","status":"y"}
			//info: 输出提示信息;
			//status: 返回提交数据的状态,是否提交成功。如可以用"y"表示提交成功，"n"表示提交失败，在ajax_post.php文件返回数据里自定字符，主要用在callback函数里根据该值执行相应的回调操作;
			//你也可以在ajax_post.php文件返回更多信息在这里获取，进行相应操作；
			
			//这里执行回调操作;
			if(data.status=="y"){
				setTimeout(function(){
					$.Hidemsg(); //公用方法关闭信息提示框;
				},2000);
			}
		}
	});
		/////////////////////////////////////////////////////////////////



});