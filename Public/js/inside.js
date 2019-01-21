/**
 * Created by wang on 2018/12/21.
 */
  /*限制固定字数*/
  function strLength(obj,n){
    var objStr=obj.text();
    var objLth = obj.text().length;
    if(objLth > n){
      $(obj).text(objStr.substring(0,n) + '...');
    }
  }
  $(function(){
    strLength($('.slide-list a'),10);
    strLength($('.detail-cont .introduce p'),260);
    strLength($('.slide-title'),14);
    strLength($('.txt'),80);
  });
