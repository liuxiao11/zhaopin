$.fn.major = function(shenfen,chengshi,quyu){
	var sfp = shenfen+' p';
	var csp = chengshi+' p';
	var qyp = quyu+' p';
	var sfs = shenfen+' .m_zlxg2';
	var css = chengshi+' .m_zlxg2';
	var qys = quyu+' .m_zlxg2';
	var sfli = shenfen+' ul li';
	var csli = chengshi+' ul li';
	var qyli = quyu+' ul li';
	$('.m_zlxg').click(function(){
		$(this).find('.m_zlxg2').slideDown(200);
	});
	$('.m_zlxg').mouseleave(function(){
		$(this).find('.m_zlxg2').slideUp(200);
	});
	var sfgsmr = typeList;
	var csgsmr = typeList[0].majorList;
	var qygsmr = typeList[0].majorList[0].areaList;
	var kuandu = new Array();
	
	
	$(sfp).text(sfgsmr[0].name);
	$(csp).text(csgsmr[0].name);
	$(qyp).text(qygsmr[0]);
	//默认城市
	for(a=0;a<sfgsmr.length;a++){
		var sfmcmr = sfgsmr[a].name;
		var sfnrmr = "<li>"+sfmcmr+"</li>";
		$(shenfen).find('ul').append(sfnrmr);
	}
	for(b=0;b<csgsmr.length;b++){
		var csmcmr = csgsmr[b].name;
		
		var csnrmr = "<li>"+csmcmr+"</li>";
		$(chengshi).find('ul').append(csnrmr);
		kuandu[b] =csmcmr.length*14+20;
	}
	for(c=0;c<qygsmr.length;c++){
		var qymcmr = qygsmr[c];
		var qynrmr = "<li>"+qymcmr+"</li>";
		$(quyu).find('ul').append(qynrmr);
	}
	Array.max=function(array)
		{
    		return Math.max.apply(Math,array);
		}
	var max_kd = Array.max(kuandu); 
		if(max_kd<118){
			$(css).width('118px');
		}
			else{
					$(css).width(max_kd);	
			}
	
/*---------------------------------------------------------------------*/

	$(sfli).click(function(){
		var dqsf = $(this).text();
		$(shenfen).find('p').text(dqsf);
		$(shenfen).find('p').attr('title',dqsf);
		var sfnum = $(this).index();
		
	var csgs = typeList[sfnum].majorList;
	var csgs2 = typeList[sfnum].majorList[0].areaList;
	$(chengshi).find('ul').text('');
	var kuandu = new Array();
	for(i=0;i<csgs.length;i++){
		var csmc = csgs[i].name;
		var csnr = "<li>"+csmc+"</li>";
		$(chengshi).find('ul').append(csnr);
		kuandu[i] =csmc.length*14+20;
	}
Array.max=function(array)
{
    return Math.max.apply(Math,array);
}
var max_kd = Array.max(kuandu); 
if(max_kd<91){
	$(css).width('91px');
	}
	else{
	$(css).width(max_kd);	
	}
	var qygsdqmr = typeList[sfnum].majorList[0].areaList;
	$(quyu).find('ul').text('');
	for(j=0;j<qygsdqmr.length;j++){
		var qymc = qygsdqmr[j];
		var qynr = "<li>"+qymc+"</li>";
		$(quyu).find('ul').append(qynr);
	}		
	$(csp).text(csgs[0].name);
	$(qyp).text(csgs2[0]);
	$('#sfdq_num1').val(sfnum);

/*------------------*/
	$(csli).click(function(){
		var dqcs = $(this).text();
		var dqsf_num = $('#sfdq_num1').val();
		if(dqsf_num==""){
			dqsf_num=0;
			}
			else{
			var dqsf_num = $('#sfdq_num1').val();
			}
		$(chengshi).find('p').text(dqcs);
		$(chengshi).find('p').attr('title',dqcs);
		var csnum = $(this).index();
	var qygs = typeList[dqsf_num].majorList[csnum].areaList;
	$(quyu).find('ul').text('');
	for(j=0;j<qygs.length;j++){
		var qymc = qygs[j];
		var qynr = "<li>"+qymc+"</li>";
		$(quyu).find('ul').append(qynr);
	}
	
$(qyp).text(qygs[0]);
	$('#csdq_num1').val(csnum);
	
	$(this).parents('.m_zlxg2').width(kuandu);
	$(qyli).click(function(){
	var dqqy = $(this).text();
		$(quyu).find('p').text(dqqy);
		$(quyu).find('p').attr('title',dqqy);
			
})//区级
	})	//市级
/*------------------*/	
$(qyli).click(function(){
	var dqqy = $(this).text();
		$(quyu).find('p').text(dqqy);
		$(quyu).find('p').attr('title',dqqy);
			
})//区级


		})//省级
/*---------------------------------------------------------------------*/		
		
		
		
	$(csli).click(function(){
		var dqcs = $(this).text();
		var dqsf_num = $('#sfdq_num').val();
		if(dqsf_num==""){
			dqsf_num=0;
			}
			else{
			var dqsf_num = $('#sfdq_num').val();
			}
		$(chengshi).find('p').text(dqcs);
		$(chengshi).find('p').attr('title',dqcs);
		var csnum = $(this).index();
	var qygs = typeList[dqsf_num].majorList[csnum].areaList;
	$(quyu).find('ul').text('');
	for(j=0;j<qygs.length;j++){
		var qymc = qygs[j];
		var qynr = "<li>"+qymc+"</li>";
		$(quyu).find('ul').append(qynr);
	}
$(qyp).text(qygs[0]);
	$('#csdq_num').val(csnum);
	/*------------------*/
	$(qyli).click(function(){
	var dqqy = $(this).text();
		$(quyu).find('p').text(dqqy);
		$(quyu).find('p').attr('title',dqqy);

			
})//区级
	})	//市级
/*---------------------------------------------------------------------*/	
	
$(qyli).click(function(){
	var dqqy = $(this).text();
		$(quyu).find('p').text(dqqy);
		$(quyu).find('p').attr('title',dqqy);

			
})//区级

/*---------------------------------------------------------------------*/
$('.m_zlxg').click(function(){
	$('#sfdq_tj1').val($(sfp).text());
	$('#csdq_tj1').val($(csp).text());
	$('#qydq_tj1').val($(qyp).text());
	})//表单传值获取

}


var typeList = [
{name:'一级建造师', majorList:[
{name:'建筑工程', areaList:[]},
{name:'铁路工程', areaList:[]},
{name:'市政公用', areaList:[]},
{name:'水利水电', areaList:[]},
{name:'机电工程', areaList:[]},
{name:'公路工程', areaList:[]},
{name:'矿业工程', areaList:[]},
{name:'通信与广电', areaList:[]},
{name:'民航机场', areaList:[]},
{name:'港口与航道', areaList:[]}
]},
{name:'二级建造师', majorList:[
	{name:'建筑工程', areaList:[]},
	{name:'公路工程', areaList:[]},
	{name:'市政公用', areaList:[]},
	{name:'水利水电', areaList:[]},
	{name:'矿业工程', areaList:[]},
	{name:'机电工程', areaList:[]}
]},
{name:'注册建筑师', majorList:[
	{name:'一级建筑师', areaList:[]},
	{name:'二级建筑师', areaList:[]}
]},
{name:'电气工程师', majorList:[
	{name:'供配电', areaList:[]},
	{name:'发输变电', areaList:[]}
]},
{name:'结构工程师', majorList:[
	{name:'一级结构师', areaList:[]},
	{name:'二级结构师', areaList:[]}
]},
	{name:'土木工程师', majorList:[
		{name:'水利水电', areaList:[]},
		{name:'注册岩土', areaList:[]},
		{name:'港口航道', areaList:[]}
	]},
	{name:'监理工程师', majorList:[
		{name:'建设部', areaList:[]},
		{name:'水利部', areaList:[]},
		{name:'交通部', areaList:[]}
	]},
	{name:'造价工程师', majorList:[
		{name:'建设部', areaList:[]},
		{name:'水利部', areaList:[]},
		{name:'交通部', areaList:[]}
	]},
	{name:'公共设备工程师', majorList:[
		{name:'动力', areaList:[]},
		{name:'暖通空调', areaList:[]},
		{name:'给水排水', areaList:[]}
	]},
	{name:'注册咨询师', majorList:[
		{name:'环境工程', areaList:[]},
		{name:'城市规划', areaList:[]},
		{name:'市政公用工程', areaList:[]},
		{name:'火电/水电/核电', areaList:[]},
		{name:'建筑工程/建筑材料', areaList:[]}
	]},
	{name:'八大员', majorList:[
		{name:'安全员', areaList:[]},
		{name:'造价员', areaList:[]},
		{name:'施工员', areaList:[]},
		{name:'机械员', areaList:[]},
		{name:'质量员', areaList:[]},
		{name:'劳务员', areaList:[]},
		{name:'材料员', areaList:[]},
		{name:'资料员', areaList:[]}
	]},
];
