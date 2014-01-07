$(document).ready(function()
{	
	//接受用户的回复消息
	if($('#hiddenuid').val())
	{
		$.ajax({
		   type: "POST",
		   url: "../main/getreplies.php",
		   data: "uid="+$('#hiddenuid').val(),
		   dataType: 'json',
		   success: function(msg){
			   	if(msg.status==0)//没有回复
				{
							//设置一个Interval，让它根据一定时间一直去查回复
							var t=setInterval(function(){
							$.ajax({
						   type: "POST",
						   url: "../main/getreplies.php",
						   data: "uid="+$('#hiddenuid').val(),
						   dataType: 'json',
						   success: function(msg){
								if(msg.status==0)//没有回复
								{
								}
								else//有回复
								{
									createGrowl2(true,msg);
									clearInterval(t);
								}
				
						   }
								   });
							 },60000);
				}
				else//有回复
				{
					createGrowl2(true,msg);
				}

		   }
				   });


	}
	//返回顶部tip
	$('<a href="#" id="retop">返回顶部</a>').appendTo('body').fadeOut().click(function(){
		$(document).scrollTop(0);
		$(this).fadeOut();
		return false
	});
	var $retop = $('#retop');
	function backTopLeft(){
		var btLeft = $(window).width() / 2 + 538;
		if (btLeft <= 1010){
			$retop.css({ 'left': 1015 })
		}else{
			$retop.css({ 'left': btLeft }) 
		}
	}
	backTopLeft();
	$(window).resize(backTopLeft);
	$(window).scroll(function(){
		if ($(document).scrollTop() === 0){
			$retop.fadeOut()
		}else{
			$retop.fadeIn()
		}
		if ($.browser.msie && $.browser.version == 6.0 && $(document).scrollTop() !== 0){
			$retop.css({ 'opacity': 1 })
		} 
	});
///////////////////////////////



	//ajax获取公告
	var msglength;
	$.ajax({
		   type: "POST",
		   url: "../main/getnews.php",
		   data: "getnews=1",
		   dataType: 'json',
		   success: function(msg){
			   	if(msg.status==0)//没有今天的公告
				{
								$('#news').html("");
							$('#newswrap').contents().unwrap();
				}
				else//今天有公告
				{
					if(msg.length==0)
					{
								$('#news').html("");
							$('#newswrap').contents().unwrap();
					}else 
					{
					msglength=msg.length;
					$('#news').append('<span id="ss1">(</span><span id="ss2" style="color:#F6A828">'+msglength+'</span><span id="ss3">)</span>');

					$('#news').click(function(e){
							$.each(msg, function(i){
										createGrowl(false,msg[i].Header,msg[i].Message,msg[i].url,msg[i].dt);
							});
							$('#news').unbind("click");
							$('#news').html("");
							$('#newswrap').contents().unwrap();


											  });
					}
				}
		   }
	});


	//注册公告事件
	window.createGrowl = function(persistent,head,msgg,uul,ddt) {
		// Use the last visible jGrowl qtip as our positioning target
		var target = $('.qtip.jgrowl:visible:last');
		//if uul is NULL
		var a='';
		var b='';
		if(!uul)
		{	
		}
		else
		{
			a='<a target="_blank" href="'+uul+'">';
			b='</a>';
		}
		// Create your jGrowl qTip...
		$(document.body).qtip({
			// Any content config you want here really.... go wild!
			content: {
				text: a+msgg+b+'<div style="padding-top:5px;text-align:right">'+ddt+'</div>',
				title: {
					text: '公告：'+head,
					button: true
				}
			},
			position: {
				my: 'top right', // Not really important...
				at: (target.length ? 'bottom' : 'top') + ' right', // If target is window use 'top right' instead of 'bottom right'
				target: target.length ? target : $(document.body), // Use our target declared above
				adjust: { y: 5 }, // Add some vertical spacing
				effect: function(api, newPos) {
                // Animate as usual if the window element is the target
                $(this).animate(newPos, {
                        duration: 200,
                        queue: false
                    });

                    // Store the final animate position
                    api.cache.finalPos = newPos; 
                }
			},
			show: {
				event: false, // Don't show it on a regular event
				ready: true, // Show it when ready (rendered)
				effect: function() { $(this).stop(0,1).fadeIn(700); }, // Matches the hide effect
				delay: 0, // Needed to prevent positioning issues
				
				// Custom option for use with the .get()/.set() API, awesome!
				persistent: persistent
			},
			hide: {
				event: false, // Don't hide it on a regular event
				effect: function(api) { 
					// Do a regular fadeOut, but add some spice!
					$(this).stop(0,1).fadeOut(600).queue(function() {
						// Destroy this tooltip after fading out
						api.destroy();

						// Update positions
						updateGrowls();
					})
				}
			},
			style: {
				classes: 'jgrowl ui-tooltip-dark ui-tooltip-rounded', // Some nice visual classes
				tip: false // No tips for this one (optional ofcourse)
			},
			events: {
				render: function(event, api) {
					// Trigger the timer (below) on render
					timer.call(api.elements.tooltip, event);
				}
			}
		})
		.removeData('qtip');
	};
	//注册回复growl
	window.createGrowl2 = function(persistent,count) {
		// Use the last visible jGrowl qtip as our positioning target
		var target = $('.qtip.jgrowl:visible:last');

		// Create your jGrowl qTip...
		$(document.body).qtip({
			// Any content config you want here really.... go wild!
			content: {
				text: '<div id="jgrowldiv" style="padding-top:5px;text-align:center"><a href="../ucenter/user.php?in=reply">您有'+count+'条新评论</a></div>',
				title: {
					text: '温馨提示',
					button: true
				}
			},
			position: {
				my: 'top right', // Not really important...
				at: (target.length ? 'bottom' : 'top') + ' right', // If target is window use 'top right' instead of 'bottom right'
				target: target.length ? target : $(document.body), // Use our target declared above
				adjust: { y: 5 }, // Add some vertical spacing
				effect: function(api, newPos) {
                // Animate as usual if the window element is the target
                $(this).animate(newPos, {
                        duration: 200,
                        queue: false
                    });

                    // Store the final animate position
                    api.cache.finalPos = newPos; 
                }
			},
			show: {
				event: false, // Don't show it on a regular event
				ready: true, // Show it when ready (rendered)
				effect: function() { $(this).stop(0,1).fadeIn(700); }, // Matches the hide effect
				delay: 0, // Needed to prevent positioning issues
				
				// Custom option for use with the .get()/.set() API, awesome!
				persistent: persistent
			},
			hide: {
				event: false, // Don't hide it on a regular event
				effect: function(api) { 
					// Do a regular fadeOut, but add some spice!
					$(this).stop(0,1).fadeOut(600).queue(function() {
						// Destroy this tooltip after fading out
						api.destroy();

						// Update positions
						updateGrowls();
					})
				}
			},
			style: {
				classes: 'jgrowl ui-tooltip-red ui-tooltip-rounded', // Some nice visual classes
				tip: false // No tips for this one (optional ofcourse)
			},
			events: {
				render: function(event, api) {
					// Trigger the timer (below) on render
					timer.call(api.elements.tooltip, event);
				}
			}
		})
		.removeData('qtip');
	};

	// Make it a window property see we can call it outside via updateGrowls() at any point
    window.updateGrowls = function() {
        // Loop over each jGrowl qTip
        var each = $('.qtip.jgrowl'),
            width = each.outerWidth(),
            height = each.outerHeight(),
            gap = each.eq(0).qtip('option', 'position.adjust.y'),
            pos;

        each.each(function(i) {
            var api = $(this).data('qtip');

            // Set target to window for first or calculate manually for subsequent growls
            api.options.position.target = !i ? $(window) : [
                pos.left + width, pos.top + (height * i) + Math.abs(gap * (i-1))
            ];
            api.set('position.at', 'top right');
            
            // If this is the first element, store its finak animation position
            // so we can calculate the position of subsequent growls above
            if(!i) { pos = api.cache.finalPos; }
        });
    };

    // Setup our timer function
    function timer(event) {
        var api = $(this).data('qtip'),
            lifespan = 10000; // 10 second lifespan
        
        // If persistent is set to true, don't do anything.
        if (api.get('show.persistent') === true) { return; }

        // Otherwise, start/clear the timer depending on event type
        clearTimeout(api.timer);
        if (event.type !== 'mouseover') {
            api.timer = setTimeout(api.hide, lifespan);
        }
    }

	// Utilise delegate so we don't have to rebind for every qTip!
	$(document).delegate('.qtip.jgrowl', 'mouseover mouseout', timer);
	//////////////////////////////////////////////////////////////

});