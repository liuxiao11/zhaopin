$(function(){
	window.start=true;
	$(window).ajaxStart(function(){
		if(start==false){
			return;
		}
		start=false;
		$("body",parent.document).find('.loading').hide();
		$("body",parent.document).find('.loading').show();
	})
	$(window).ajaxStop(function(){
		$("body",parent.document).find('.loading').hide();
		start=true;
	})
	
	/*弹出框*/
	var alertClick=true;
	$.alert = function(msg,status,time,fn){
		if(fn==undefined){
			fn=function(){}
		}else{
			fn=fn;
		}
		if(alertClick==false){
			return;	
		}
		alertClick=false;
		if(time==undefined){
			time='1000';
		}
		if(status==undefined || status==true){
			t='#3D9140';
		}else{
			t='#666';
		}
		var html='<div class="poins">';
		html+='<div class="alert" style="background:'+t+'" >';
		html+=msg;
		html+='</div>';
		html+='</div>';
		$('body').append(html)
		$('.poins').fadeIn(function(){
			setTimeout(function(){
				$('.poins').fadeOut(function(){
					$(this).remove()
					fn();
					postData=true;
					alertClick=true;
					confClick=true;
					delClick=true;
					sortClick=true;
					confDemo=true;
				})
			},time)
		})
	}
	
	/*确认提示*/
	var confirmClick=true;
	$.confirm = function(title,msg,truefun,falsefun){
		if(confirmClick==false){
			return;	
		}
		var pexg=/.*[\u4e00-\u9fa5]+.*$/;
		if(pexg.test(msg)){
			var s=true
		}else{
			var s=false
		}
		
		
		confirmClick=false;
		var html='<div class="poin">';
		html+='<div class="confirm">';
		html+='<div class="header"><h1>'+title+'</h1><a class="abtn false falsebtn"></a></div>'
		html+='<div class="msg">';
		if(s==true){
			html+='<div class="msg_msg">';
			html+= msg
			html+= '</div>';
		}else{
			html+= '<div class="irfm" style="overflow:hidden;overflow-y:auto" id="irfm">';
			html+= '<div class="temp">加载中...</div>';
			html+= '</div>';
		}
		
		html+= '</div>';
		html+= '<div class="footer">';
		html+= '<a class="btn btn_green" id="truebtn">确认</a>';
		html+= '<a class="btn btn_yello falsebtn">取消</a>';
		html+='</div>';
		html+='</div>;'
		html+='</div>';
		html+='<div class="cover"></div>';
		$('body').append(html);
		$('.poin').fadeIn()
		if(s==false){  /*当加载url的时候计算高度*/
			$.async(msg,'',function(w){
				$('#irfm').html(w.info)
				postData=true;
			},'get');
			var wh = $(window).height();
		    var irfm = document.getElementById("irfm");
			h = wh - 90 + "px";
			irfm.style.maxHeight = h;
		}
		$('#truebtn').bind('click',function(){
			if(truefun()){
				$.distory()
			}
		});
		$('.falsebtn').bind('click',function(){
			if(falsefun!=undefined){
				if(falsefun()){
					$.distory()
				};
			}else{
				$.distory()
			}
			delClick=true;
		})
		
	}
	$.distory = function(){
		$('.poin').fadeOut();
		$('.cover').fadeOut(function(){
			$('.poin').remove();
			$('.cover').remove();
			postData=true;
			alertClick=true;
			confirmClick=true;
			confClick=true;
			sortClick=true;
			confDemo=true;
			//window.location.reload();	//liangfeng 	取消刷新
		})
	}
	
	
	/* 简化 ajax  url:异步请求链接  data:数据  fn:回调函数  type:get/post */
	window.postData=true;
	$.async = function(url,data,fn,type){
		if(start==false || postData==false){
			return;
		}
		postData=false;
		var type=(typeof(type)=='undefined'||type=='post')?'post':'get';
		var fn=fn=='undefined'?function(){}:fn;
		$.ajax({
			type:type,
			url:url,
			data:data+'&ajax=1',
			dataType:'json',
			async:false,
			success:function(res){
				if(res.is_login==false){
					location.reload();
				}
				fn(res);
			}
		});
	}
	
	/* 添加 ||修改  */
	var addflag=true;
	window.editor=false;
	$(".addData").click(function(){
		var that=$(this);
	    var t=that.attr('title');
		var url=that.attr('url');
		var fun=eval(that.attr('fun'));
		$.confirm(t,url,function(){
			if(addflag==true){
				if(typeof(UE) != 'undefined' ){
					//var content = UE.getEditor('container').getPlainTxt();
					var content = UE.getEditor('container').getContent();
					//$('#form').append("<input type='hidden' name='content' value='"+content+"' / >");
				}

				var data=$("#form").serialize();

				//alert(content);
				//alert(data);
				console.log(data);

				$.async(url,data,function(res){
					addflag=true;

					if(res.status != 1 || res.status != '1'){
						res.status = 0;
					}

					fun(res);
				});
			}
		})
		/*新增加载编译器方法*/
		if(editor==true){
			kineditorload();
		}
		/*end*/
	})
	

	window.addClick=true;
	$.addDataClick = function(url,fun){
		if(addClick==false){
			return;
		}
		addClick=false;
		var data=$("#form").serialize();
		$.async(url,data,fun)
	}

	
	
	/* 删除真实数据  */
	window.delClick=true;
	$('.delData').click(function(){
		if(delClick==false){
			return;
		}
		delClick=false;
		var that=$(this);
		var t=that.attr('title');
		var url=that.attr('url');
		var msg=that.attr('msg')!=undefined?that.attr('msg'):'确认删除吗？';
		var fun=eval(that.attr('fun'));
		$.confirm(t,msg,function(){
			$.async(url,'',function(res){
				fun(res);
			});
		})
	})
	
	/* 排序修改  */
	window.sortClick=true;
	$('.updatesort').click(function(){
		if(sortClick==false){
			return;
		}
		sortClick=false;
		var u_url=$(this).attr('url');
		var u_data=$('#updatesortForm').serialize();
		$.async(u_url,u_data,function(res){			
			if(res.status==1){
				$.alert(res.info,true,1000,function(){
					window.location.reload(true);
				});
			}else{
				$.alert(res.info,false);
			}
		});
	})
	
	/* 配置AJAX操作 */
	window.confClick=true;
	$('.ajaxsubmit').click(function(){

		if(confClick==false){
			return;
		}
		confClick=false;
		var _t=$(this);
		var data=$('#ajaxForm').serialize();
		var url=_t.attr('url');
		var fun=eval(_t.attr('fun'));
		$.async(url,data,function(res){
			if(fun==undefined){
				$.alert(res.info,true)
			}else{
				fun(res);
			}
		})
		
	})
	
	/* 测试邮箱，手机通道 */
	window.confDemo=true;
	$('.ajaxtest').click(function(){
		if(confDemo==false){
			return;
		}
		confDemo=false;
		var num=$('#testnumber').val();
		var url=$(this).attr('url');
		var fun=eval($(this).attr('fun'));
		$.async(url,'num='+num,function(res){
			fun(res);
		})
		
	})
	
	/*刷新*/
	$('.refresh').click(function(){
		document.getElementById('iframe').contentWindow.location.reload(true);
	})
	
	
	/*删除回调函数*/
	function delfun(res){
		$.distory();
		if(res.status==1){
			window.location.reload();
		}else{
			$.alert(res.info,false);
		}
	}
	/*添加修改回掉函数*/
	function callbackFun(res){

		if(res.status=='0'){
			$.alert(res.info,false);
		}else{
			window.location.reload();
		}
	}
	
	/*发送测试验证码*/
	function testfun(res){
		if(res.status==1){
			$.alert(res.info);
		}else{
			$.alert(res.info,false);
		}
	}
	
	/*配置文件回掉函数*/
	function func(res){
		if(res.status==1){
			$.alert(res.info,true,'',function(){
				window.location.reload(true);
			});
		}else{
			$.alert(res.info,false);
		}
	}
	
	
	
	/* 确认对方已打款  */
	$('.paid').click(function(){
		
		var that=$(this);
		var t=that.attr('title');
		var url=that.attr('url');
		var msg=that.attr('msg')!=undefined?that.attr('msg'):'确认对方已打款？';
		var fun=eval(that.attr('fun'));
		$.confirm(t,msg,function(){
			$.async(url,'',function(res){
				fun(res);
			});
		})
	})
	
	
	/* 确认已发货  */
	$('.sent').click(function(){
		
		var that=$(this);
		var t=that.attr('title');
		var url=that.attr('url');
		var msg=that.attr('msg')!=undefined?that.attr('msg'):'确认已发货？';
		var fun=eval(that.attr('fun'));
		$.confirm(t,msg,function(){
			$.async(url,'',function(res){
				fun(res);
			});
		})
	})
	
	
	/* 导出excel */
	$('.outputexcel').click(function(){
		var uri=$(this).attr('uri');
		var s='<div class="cover"></div>';
		s+='<ul class="ExcelBox">';
		s+='<form method="get" action="'+uri+'">';
		s+='<li>起始时间: <input type="text" onclick="WdatePicker()" readonly="readonly" name="starttime"></li>';
		s+='<li>结束时间: <input type="text" onclick="WdatePicker()" readonly="readonly" name="endtime"></li>';
		s+='<li><input class="ExcelBox_btn_l" onclick="cancelExcel(this)" type="button" value="取消"></input><input class="ExcelBox_btn_r" type="submit" value="导出"></input></li>';
		s+='</form></ul>';
		$('body').append(s);
		
	})
	
})
/* remove 删除导出excel的弹框  */
function cancelExcel(that){
	$('.ExcelBox').remove();
	$('.cover').remove();
} 



