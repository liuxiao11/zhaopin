/**
 * Created by wang on 2018/12/16.
 */


var html='<table cellspacing="1" width="480" onclick="test()">'+
'<tr>'+
'<th colspan="16">'+'键盘模拟输入密码器'+'</th>'+
'</tr>'+
'<tr>'+
'<td>'+'~'+'</td>'+
'<td>'+'!'+'</td>'+
'<td>'+'@'+'</td>'+
'<td>'+'#'+'</td>'+
'<td>'+'$'+'</td>'+
'<td>'+'%'+'</td>'+
'<td>'+'^'+'</td>'+
'<td>'+'&'+'</td>'+
'<td>'+'*'+'</td>'+
'<td>'+'('+'</td>'+
'<td>'+')'+'</td>'+
'<td>'+'_'+'</td>'+
'<td>'+'+'+'</td>'+
'<td>'+'|'+'</td>'+
'<td rowspan="2" width="120">'+'退格'+'</td>'+
'</tr>'+
'<tr>'+
'<td>'+'`'+'</td>'+
'<td class="num">'+'1'+'</td>'+
'<td class="num">'+'2'+'</td>'+
'<td class="num">'+'3'+'</td>'+
'<td class="num">'+'4'+'</td>'+
'<td class="num">'+'5'+'</td>'+
'<td class="num">'+'6'+'</td>'+
'<td class="num">'+'7'+'</td>'+
'<td class="num">'+'8'+'</td>'+
'<td class="num">'+'9'+'</td>'+
'<td class="num">'+'0'+'</td>'+
'<td>'+'-'+'</td>'+
'<td>'+'='+'</td>'+
'<td>'+'&quot;'+'</td>'+
'</tr>'+
'<tr>'+
'<td>'+'q'+'</td>'+
'<td>'+'w'+'</td>'+
'<td>'+'e'+'</td>'+
'<td>'+'r'+'</td>'+
'<td>'+'t'+'</td>'+
'<td>'+'y'+'</td>'+
'<td>'+'u'+'</td>'+
'<td>'+'i'+'</td>'+
'<td>'+'o'+'</td>'+
'<td>'+'p'+'</td>'+
'<td>'+'{'+'</td>'+
'<td>'+'}'+'</td>'+
'<td>'+'['+'</td>'+
'<td>'+']'+'</td>'+
'<td colspan="2">'+'切换大/小写'+'</td>'+
'</tr>'+
'<tr>'+
'<td>'+'a'+'</td>'+
'<td>'+'s'+'</td>'+
'<td>'+'d'+'</td>'+
'<td>'+'f'+'</td>'+
'<td>'+'g'+'</td>'+
'<td>'+'h'+'</td>'+
'<td>'+'j'+'</td>'+
'<td>'+'k'+'</td>'+
'<td>'+'l'+'</td>'+
'<td>'+':'+'</td>'+
'<td>'+'"'+'</td>'+
'<td>'+';'+'</td>'+
"<td>"+"'"+'</td>'+
'<td colspan="3" rowspan="3">'+'ENTER'+'</td>'+
'</tr>'+
'<tr>'+
'<td>'+'z'+'</td>'+
'<td>'+'x'+'</td>'+
'<td>'+'c'+'</td>'+
'<td>'+'v'+'</td>'+
'<td>'+'b'+'</td>'+
'<td>'+'n'+'</td>'+
'<td>'+'m'+'</td>'+
'<td>'+'<'+'</td>'+
'<td>'+'>'+'</td>'+
'<td>'+'?'+'</td>'+
'<td>'+','+'</td>'+
'<td>'+'.'+'</td>'+
'<td>'+'/'+'</td>'+
'</tr>'+
'</table>';
$('#keyboard').html(html);


var htmlCode = {
  "&" : "&",
  '"' : "\"",
  "<" : "<",
  ">" : ">"
}
function test(){
  /*var input = document.getElementById("input");*/
  var input =$("input[type='text']");
  console.log(input);
  var e = window.event || test.caller.arguments[0];
  var el = e.target || e.srcElement;
  if(el.tagName.toLowerCase() == "td" && el.rowSpan <= 1 && el.colSpan <= 1 ){
    var str = el.innerHTML;
    str = htmlCode[str] || str;
    input.value += str;
  }
  if(el.innerHTML == "退格"){
    input.value = input.value.slice(0,-1);
  }
  if(el.innerHTML == "切换大/小写"){
    var els = document.getElementsByTagName("td");
    for(var i = 0, l = els.length; i < l; i++){
      var str = els[i].innerHTML;
      if(/^[a-z]$/.test(str))
        els[i].innerHTML = str.toUpperCase();
      if(/^[A-Z]$/.test(str))
        els[i].innerHTML = str.toLowerCase();
    }
  }
  if(el.innerHTML == "ENTER"){
    ctrKeyboard();
  }
}
function ctrKeyboard(){
  var el = document.getElementById("keyboard");
  if(el.offsetWidth > 0)
    el.style.display = "none";
  else {
    el.style.display = "block";
    sortNum();
    capsInit();
  }
}
function capsInit(){
  var els = document.getElementsByTagName("td");
  for(var i = 0,j = 0, l = els.length; i < l; i++){
    var str = els[i].innerHTML;
    if(/^[A-Z]$/.test(str))
      els[i].innerHTML = str.toLowerCase();
  }
}
function sortNum (){
  var arr = [0,1,2,3,4,5,6,7,8,9].sort(function(){
    return Math.random() > 0.5?1:-1;
  });
  var els = document.getElementsByTagName("td");
  for(var i = 0,j = 0, l = els.length; i < l; i++){
    var str = els[i].innerHTML;
    if(/^\d$/.test(str))
      els[i].innerHTML = arr[j++];
  }
}































