$(document).ready(function(){
	var title;
	var message;
	var flag;
	var fremsg;
	var a;
	$('li#confirm a').click(function(){
		if($(this).html()=="账号冻结")
		{
			title="账号冻结";		
			message="您将要冻结此用户<br />请确认";
			flag=1;
			fremsg="账号已冻结";
			a="账号解冻";
		}
		else
		{
			title="账号解冻";		
			message="您将要解冻此用户<br />请确认";
			flag=0;
			fremsg="账号正常";
			a="账号冻结";
		}
		var elem = $(this).closest('.webResult');
		var uid=elem.attr('rel');
		var fre = $(this).closest('#fre');
		$.confirm({
			'title'		: title,
			'message'	: message,
			'buttons'	: {
				'确定'	: {
					'class'	: 'button green medium',
					'action': function(){
						
						$.ajax({
							type: "POST",
							url: "freeze.php",
							data: "uid="+uid+"&flag="+flag,
							success: function(){
									$(this).html(a);
									fre.html(fremsg);
								}

							   });
											
						
					}
				},
				'取消'	: {
					'class'	: 'button gray medium',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
	});
	
});