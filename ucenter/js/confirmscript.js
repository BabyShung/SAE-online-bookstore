$(document).ready(function(){

			
	$('.ocontain #Pstate').each(function(){					   
				if($(this).html()=="已支付")
					$(this).css('color','#FF6B21');
								 });
	
	
	$('.ocontain #delete a').click(function(){
		
		var elem = $(this).closest('.ocontain');
		var oid=elem.attr('rel');
		$.confirm({
			'title'		: '订单删除',
			'message'	: '您将要删除此订单。<br />此操作不能恢复，请确认。',
			'buttons'	: {
				'删除'	: {
					'class'	: 'button green medium',
					'action': function(){
						
						$.ajax({
							type: "POST",
							url: "deleteOrder.php",
							data: "Oid="+oid,
							   });
											
						
						elem.slideUp();
					}
				},
				'不删除'	: {
					'class'	: 'button gray medium',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
	});
	
});