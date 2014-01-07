$(document).ready(function(){	
						   
						   	 //付款前必须要有地址
						   	$('.topaypal').submit( function () {
															 if($('#noaddr').html()=="您还没有收货地址，添加后才能付款")
															 {alert('请您先添加地址');
															 	return false;
															 }
															 //button disabled
   														     $('#jcart-paypal-checkout').val("请稍等··");
															 $('#jcart-paypal-checkout').attr("disabled","disabled");
						    });

						   //提交新地址表单前
						   	$('.addressform').submit( function () {
										$('#hiddenprovince').val($('#province option:selected').html());
										$('#hiddencity').val($('#city option:selected').html());
										$('#hiddendis').val($('#county option:selected').html());
																 }
						   );
						   
	//改变首选地址效果

		$('#addrcontent li:first #addradio').click();

	
	
	
	$(".ChinaArea").jChinaArea();
	
	
	
		//小窗口的弹出
	$('#addrr').qtip(
	{
		id: 'modal', // Since we're only creating one modal, give it an ID so we can style it
		content: {
			text: $('.addressform'),
			title: {
				text: '添加新地址',
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
	/////////////////////////////////////////////////////
	//验证
	$(".addressform:last").Validform({
		tiptype:2
	});
		/////////////////////////////////////////////////////////////////

});