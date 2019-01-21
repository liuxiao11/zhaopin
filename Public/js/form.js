/**
 * Created by wang on 2018/12/17.
 */

/*类型选择*/
$('.hide').click(function(){
  $('.chose_job').hide();
});
$('.chose_job td span').click(function(){
  $(this).toggleClass('c');
  var l=$('.c').length;
  console.log(l);
  if(l > 5){
    $(this).removeClass('c');
    alert('最多选五个职位类别');
  }
});

$('#job_style').focus(function(){
  $('.chose_job').show();
});
$('#confirm').click(function(){
  var l=$('.c').length;
  var str='';
  for(var i = 0;i<l; i++){
    str += $('.c')[i].innerHTML+'、';
  }
  str=str.substring(0,str.length-1);
  console.log(str);
  $('#job_style').val(str);
  $('.chose_job').hide();
});

function getMyArr(){
  var numArr = [];
  var l1 = $('input').length;
  var l2 = $('textarea').length;
  var l3 = $('select').length;
  for(var i = 0;i < l1; i++){
    numArr.push($('input').eq(i).val());
  }
  if(l2>0){
    for(var j = 0;j < l2; j++){
      numArr.push($('textarea').eq(j).val());
    }
  }
  if(l3>0){
    for(var n = 0;n < l3; n++){
      numArr.push($('select').eq(j).val());
    }
  }
  console.log(numArr);
};
$('#publish').click(function(){

  getMyArr();
});












