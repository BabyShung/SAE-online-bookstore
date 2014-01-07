var default_content="";
var lasturl="";
$(document).ready(function()
{	




	//防止搜索栏直接点击
	$('#searchformx').submit( function(e){
										if($('#booksuggest').val()=="请输入书名")
										return false;
									});

	 
	///////////////////////////////////////////////////
	
	$('#page1').css('background-color','#FFF').css('font-weight','bold');
	

	
	//自定义验证小窗口+登录
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
		   url: "submit.php",
		   data: $('.smallwin').serialize(),
		   dataType: 'json',
		   success: function(msg){
					if(msg.status==1){
							//登录成功
							$.ajax({
						   type: "POST",
						   url: "index.php",
						   data: "id="+msg.id+"&usr="+msg.usr+"&rememberMe="+msg.rememberMe,
						   success: function(){
							   		$('#errormessage').html("");//清空errormessage
									location.href="index.php";
							   }});
							
					}
					else {	//失败，输出信息
							$('#submit').val('登录');
							$('#errormessage').html(msg.errors);
					}
		   }
		});

		return false;
	});
	
	
	//小窗口
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
	//小窗口的弹出
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
	/////////////////////////////////////////////////////
	
		//菜单效果
	$('#navigation2').delegate('a.subtitle', 'mouseover', function(event) {
		var self = $(this),
			qtip = '.qtip.ui-tooltip',
			container = $(event.delegateTarget || event.liveFired),
			submenu = self.next('ul'),

		// Determine whether this is a top-level menu
		isTopMenu = self.parents(qtip).length < 1;

		// If it's not a top level and we can't find a sub-menu... return
		if(isTopMenu && !submenu.length) { return false; }

		/*
		 * Top-level menus will be placed below the menu item, all others
		 * will be placed to the right of each other, top aligned.
		 */
		position = isTopMenu ?
			{ my: 'top left', at: 'bottom left' } :
			{ my: 'top left', at: 'right top' }
	
		// Create the tooltip
		self.qtip({
			overwrite: false, // Make sure we only render one tooltip
			content: {
				text: self.next('ul') // Use the submenu as the qTip content
			},
			position: $.extend(true, position, {
				// Append the nav tooltips to the #navigation element (see show.solo below)
				container: container,

				// We'll make sure the menus stay visible by shifting/flipping them back into the viewport
				viewport: $(window), adjust: { method: 'shift flip' }
			}),
			show: {
				event: event.type, // Make sure to sue the same event as above
				ready: true, // Make sure it shows on first mouseover

				/*
				 * If it's a top level menu, make sure only one is shown at a time!
				 * We'll pass the container element through too so it doesn't hide
				 * tooltips unrelated to the menu itself
				 */
				solo: isTopMenu ? container : false
			},
			hide: {
				delay: 100,
				event: 'unfocus mouseleave',
				fixed: true // Make sure we can interact with the qTip by setting it as fixed
			},
			style: {
				classes: 'ui-tooltip-nav', // Basic styles
				tip: false // We don't want a tip... it's a menu duh!
			},
			events: {
				/*
				 * If you'd like to hide ALL parent menus when we mouse out of this menu
				 * simply uncomment the code below!
				 *
				 *	hide: function(event, api) {
				 *		var oEvent = event.originalEvent || event,
				 *			parentMenu = api.elements.target.parents(qtip),
				 *			ontoMenu = $(oEvent.relatedTarget || oEvent.target).closest(qtip).length;
				 *
				 * 	if(!ontoMenu) { parentMenu.qtip('hide', oEvent); }
				 * },
				 */

				// Toggle an active class on each menus activator
				toggle: function(event, api) {
					api.elements.target.toggleClass('active', event.type === 'tooltipshow');
				}
			}
		});
	});
	
	
	



	///////////////////////////////////////////


});



/////////////////////

//最后获取 text 文本框的值
//$("#text").val($("#").html());