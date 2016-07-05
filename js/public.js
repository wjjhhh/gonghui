var glist=document.getElementById("glist");
var glistUl=glist.getElementsByTagName("ul")[0];
var loading=document.getElementById("loading");
var eLen=4;//每次加载个数为5个
var start=0;
var end=start+eLen;
var timer=null;
var scrollTimer=null;
var rocket=document.getElementById('rocketUp');
var nav=document.getElementById('nav');
rocket.style.backgroundPositionX='0%';
// var lens=10;	
    // $.getJSON('./test.php?',{"method":"init","success":"e"},function(data){    
    //     lens=data;
    //     alert(data);
    // });	
// 监听滚动
window.onscroll=scrollLoad;
function scrollLoad(){
	(scrollTimer)&&(clearTimeout(scrollTimer));
	rocket_up();
	(timer)&&(clearTimeout(timer));
	if( $(window).scrollTop()+$(window).height()>=$(document).height()){
		console.log('触底加载');	
	        loading.style.display="block";
	        timer=setTimeout(function(){
	        	loading.style.display="none";
	        	// console.log(start+" "+end);
	        	requestList(start,end);
				start=end+1;
				end+=eLen+1;
	        },500);	        
	}
}
var loop=1;
function rocket_up(){
	// (loop)&&(return;);
	var loop=true;
	console.log(loop);
	if(loop==false){
		return false;
	}
	var loop=false;
	if($(window).scrollTop()>=nav.offsetTop){
		rocket.style.display="block";
	}
	else{
		rocket.style.display="none";
	}	
}
//游戏系统样式
function systemDeal(sys){
	switch(sys){
		case 'H5':
		return ' h5';
		break;
		case '安卓':
		return ' android';
		break;
		default:
		return ' ios';	
	}
}
function slideDown(gameInfo,_start,_end){
	   // []=>[name,icon,system,type,size,login];
	    var len=gameInfo.length;
		var oFragmeng = document.createDocumentFragment();
		for(var i=0;i<len;++i){
			var li=document.createElement("li");
			//添加游戏icon
			var oSi=document.createElement("span");
			oSi.setAttribute("class","icon");
			var oSimg=document.createElement("img");
			oSimg.src=gameInfo[i].icon;
			oSi.appendChild(oSimg);
			li.appendChild(oSi);
			//添加游戏名称和游戏系统
			var lh=document.createElement("div");
			lh.setAttribute("class","lh");
				//添加游戏名称
				var oSn=document.createElement("span");
				oSn.setAttribute("class","name");
				var temp=gameInfo[i].name;
				var oSnt=document.createTextNode(temp);
				oSn.appendChild(oSnt);
				lh.appendChild(oSn);
				//添加游戏系统
				var oSS=document.createElement("span");
				oSS.setAttribute("class","system");
				var temp=gameInfo[i].system;
				oSS.className+=systemDeal(temp);
				var oSSt=document.createTextNode(temp);
				oSS.appendChild(oSSt);
				lh.appendChild(oSS);
				li.appendChild(lh);
			//添加游戏类型和大小
			var lb=document.createElement("div");
			lb.setAttribute("class","lb");
				//添加游戏类型
				var oSt=document.createElement("span");
				oSt.setAttribute("class","type");
				var temp=gameInfo[i].type;
				var oStt=document.createTextNode(temp);
				oSt.appendChild(oStt);
				lb.appendChild(oSt);
				//添加大小
				var oSz=document.createElement("span");
				oSz.setAttribute("class","size");
				var temp=gameInfo[i].size+"MB";
				var oSzt=document.createTextNode(temp);
				oSz.appendChild(oSzt);
				lb.appendChild(oSz);
				li.appendChild(lb);
			//添加按钮
			 var oSl=document.createElement("span");
			 oSl.setAttribute("class","login");
			 var temp=gameInfo[i].login;
			 var oSlt=document.createTextNode(temp);
			 oSl.appendChild(oSlt);
			 li.appendChild(oSl);			 
			oFragmeng.appendChild(li);
		}
				glistUl.appendChild(oFragmeng);
}

     function requestList(_start,_end){
		  $.getJSON('./test.php?',{"method":"request","start":_start,"end":_end},function(data){		  
		    var len=_end-_start;
		   // slideDown(_.unzip(data),_start,_end);
		   // console.log(_.unzip(data));
		   if(data==0){
		   	window.onscroll=null;
		   }
		   slideDown(data,_start,_end); 	   
		  });     	
     } 

// 兼容ajax
        // function ajaxFunction() {  
        //     var xmlHttp = false;  
        //     try {  
        //         xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); // ie msxml3.0+（IE7.0及以上）  
        //     } catch (e) {  
        //         try {  
        //             xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); //ie msxml2.6（IE5/6）  
        //         } catch (e2) {  
        //             xmlHttp = false;  
        //         }  
        //     }  
        //     if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {// Firefox, Opera 8.0+, Safari  
        //         xmlHttp = new XMLHttpRequest();  
        //     }  
        //     return xmlHttp;  
        // }  
        
// 点击火箭返回上层
rocket.onclick=function(){ 
	rocket.style.backgroundPositionX='100%';
	$('html,body').animate({scrollTop: nav.offsetTop}, 800,function(){
		rocket.className='rockRun';	
	});
	
}
// 监听transition兼容
function whichTransitionEvent(){  
    var t;  
    var el = document.createElement('fakeelement');  
    var transitions = {  
      'transition':'transitionend',  
      'OTransition':'oTransitionEnd',  
      'MozTransition':'transitionend',  
      'WebkitTransition':'webkitTransitionEnd',  
      'MsTransition':'msTransitionEnd'  
    }  
  
    for(t in transitions){  
        if( el.style[t] !== undefined ){  
            return transitions[t];  
        }  
    }  
}    
/* 监听 transition! */  
var transitionEvent = whichTransitionEvent();  
transitionEvent && rocket.addEventListener(transitionEvent, function() {  
   rocketUp.className='';
   rocketUp.style.backgroundPositionX='0%';
   rocketUp.style.display="none";
});

