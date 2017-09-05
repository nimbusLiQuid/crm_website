function changetime(){
    var ary = Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
    var Timehtml = document.getElementById('CurrentTime');
    var date = new Date();
    Timehtml.innerHTML = ''+date.toLocaleString()+'   '+ary[date.getDay()];
}
window.onload = function(){
    changetime();
    setInterval(changetime,1000);
}
