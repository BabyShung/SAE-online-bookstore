
	var tmp="";
	(function($) {

		$.suggest = function(input, options) {
	
			var $input = $(input).attr("autocomplete", "off");
			var $results;

			var timeout = false;		// hold timeout ID for suggestion results to appear	
			var prevLength = 0;			// last recorded length of $input.val()
			var cache = [];				// cache MRU list
			var cacheSize = 0;			// size of cache in chars (bytes?)
			var keyword = "请输入书名";
			var tmp="";
			
			if($.trim($input.val())=='' || $.trim($input.val())=='请输入书名') $input.val('请输入书名').css('color','#CCCCCC');
			if( ! options.attachObject )
				options.attachObject = $(document.createElement("ul")).appendTo('body');

			$results = $(options.attachObject);
			$results.addClass(options.resultsClass);
			
			resetPosition();
			$(window)
				.load(resetPosition)		// just in case user is changing size of page while loading
				.resize(resetPosition);

			$input.blur(function() {	
										//失焦点，延迟hide
				if($(this).val() == ""){
					$(this).val(keyword).css('color','#CCCCCC');
				}
				setTimeout(function() { $results.hide() }, 200);
			});			
			
			$input.focus(function(){
				resetPosition();
				$(window)
				.load(resetPosition)		// just in case user is changing size of page while loading
				.resize(resetPosition);
				if($.trim($(this).val())=='请输入书名'){
					$(this).val('').css('color','#333');
				}
				if($.trim($(this).val())==''){

					displayItems('');//显示热门城市列表
				}
				else
				{
					tmp=$.trim($(this).val());
					displayItems(tmp);
				}
			});
			$input.click(function(){
				var q=$.trim($(this).val());
				displayItems(q);
				$(this).select();
			});
						
			// help IE users if possible
			try {
				$results.bgiframe();
			} catch(e) { }

			$input.keyup(processKey);//
			
			function resetPosition() {
				// requires jquery.dimension plugin
				var offset = $input.offset();
				$results.css({
					top: (offset.top + input.offsetHeight) + 'px',
					left: offset.left + 'px'
				});
			}
			
			
			function processKey(e) {
				
				// handling up/down/escape requires results to be visible
				// handling enter/tab requires that AND a result to be selected
				if ((/27$|38$|40$/.test(e.keyCode) && $results.is(':visible')) ||
					(/^13$|^9$/.test(e.keyCode) && getCurrentResult())) {
		            
		            if (e.preventDefault)
		                e.preventDefault();
					if (e.stopPropagation)
		                e.stopPropagation();

	                e.cancelBubble = true;
	                e.returnValue = false;
				
					switch(e.keyCode) {
	
						case 38: // up
							prevResult();
							break;
				
						case 40: // down
							nextResult();
							break;
						case 13: // return
							selectCurrentResult();
							break;
							
						case 27: //	escape
							$results.hide();
							break;
	
					}
					
				} else if ($input.val().length != prevLength) {

					if (timeout) 
						clearTimeout(timeout);
					timeout = setTimeout(suggest, options.delay);
					prevLength = $input.val().length;
					
				}			
					
				
			}
			
			function suggest() {
			
				var q = $.trim($input.val());
				displayItems(q);
			}		
			
			function displayItems(items) {
				var html = '';
				var j=0;
				var i=0;
				var reg = new RegExp('^' + items + '.*$', 'im');
				
				if (items=='') {  //若textbox为空
					$results.removeClass("ac_results");
				}
				else {
					//当用户输入时进行的匹配------------------------------------------
					
					for (i = 0; i < options.source.length; i++) 
					{
						
						if (reg.test(options.source[i][0]) || reg.test(options.source[i][1]) || reg.test(options.source[i][2]) || reg.test(options.source[i][3])) //从返回来的array里进行正则表达式的匹配
						{
							//输出哈哈！！！！！！！！！！！！！！
							$results.addClass("ac_results");
						html += '<li rel="' + options.source[i][0] + '" style="padding:0px; margin:0px; border:0px; text-align:left;"><a href="#' + i + '" style=" font-weight:normal; width:415px;color:#424444; padding-top:10px;padding-left:3px; margin:0px;border:0px; text-align:left;-webkit-border-radius: 0px;-moz-border-radius: 0px;border-radius: 0px;">' + options.source[i][1] + '</a></li>';
						j++;
						}
					}
					html =  '<ul style="padding:0px; margin:0px;border:0px; text-align:left;">' + html + '</ul>';

					if(j==0)//什么也没匹配到
					{
							$results.removeClass("ac_results");			
					}
					else	//j>0	有匹配
					{
						j=0;//为下一次准备
					}
				}

				$results.html(html).show();
			//	$results.children('ul').children('li:first-child').addClass(options.selectClass);
			//	$results.children('ul').children('li:first-child').children('a').css("background-color","#F90");
			//	$results.children('ul').children('li:first-child').children('a').addClass(options.selectClass);
				
				
				//注册mouseover事件
				$results.children('ul')
					.children('li').children('a')
					.mouseover(function() {
						$results.children('ul').children('li').children('a').removeClass(options.selectClass);
						$(this).addClass(options.selectClass);
					})
					.click(function(e) {
						e.preventDefault(); 
						e.stopPropagation();
						selectCurrentResult();
					});
			}
						
			function getCurrentResult() {
			
				if (!$results.is(':visible'))
					return false;
			
				var $currentResult = $results.children('ul').children('li').children('a.' + options.selectClass);
				if (!$currentResult.length)
					$currentResult = false;
					
				return $currentResult;

			}
			
			function selectCurrentResult() {
			
				$currentResult = getCurrentResult();
			
				if ($currentResult) {
					$input.val($currentResult.html().replace(/<span>.+?<\/span>/i,''));
					$results.hide();

					if( $(options.dataContainer) ) {
						$(options.dataContainer).val($currentResult.attr('rel'));
					}
	
					if (options.onSelect) {
						options.onSelect.apply($input[0]);
					}
				}
			
			}
			
			function nextResult() {
			
				$currentResult = getCurrentResult();
			
				if ($currentResult)
				{
					$currentResult
						.removeClass(options.selectClass).parent('li')
						.next().children('a')
							.addClass(options.selectClass);
							
						if($currentResult.parent('li').next()!="")
							$input.val($currentResult.parent('li').next().children('a').html());
						else
							$input.val(tmp);
				}
				else
				{
					$results.children('ul').children('li:first-child').children('a').addClass(options.selectClass);
					$input.val($results.children('ul').children('li:first-child').children('a').html());

				}
			
			}
			
			function prevResult() {
			
				$currentResult = getCurrentResult();
			
				if ($currentResult)
				{
					$currentResult
						.removeClass(options.selectClass).parent('li')
						.prev().children('a')
							.addClass(options.selectClass);
							
						if($currentResult.parent('li').prev()!="")
						$input.val($currentResult.parent('li').prev().children('a').html());	
						else
						$input.val(tmp);
				}
				else
				{
					$results.children('ul').children('li:last-child').children('a').addClass(options.selectClass);
					$input.val($results.children('ul').children('li:last-child').children('a').html());
				}
			
			}
	
		}
/////////////////////////suggest函数		
		$.fn.suggest = function(source, options) {
		
			if (!source)
				return;
		
			options = options || {};
			options.source = source;
			options.hot_list=options.hot_list || [];
			options.delay = options.delay || 0;
			options.resultsClass = options.resultsClass || 'ac_results';
			options.selectClass = options.selectClass || 'ac_over';
			options.matchClass = options.matchClass || 'ac_match';
			options.minchars = options.minchars || 1;
			options.delimiter = options.delimiter || '\n';
			options.onSelect = options.onSelect || false;
			options.dataDelimiter = options.dataDelimiter || '\t';
			options.dataContainer = options.dataContainer || '#SuggestResult';
			options.attachObject = options.attachObject || null;//suggest显示框所要显示出来CSS的ID（#）
	
			this.each(function() {
				new $.suggest(this, options);
			});
	
			return this;
			
		};
		
	})(jQuery);