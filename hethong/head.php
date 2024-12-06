<?php require_once('config.php');?>
<?php
if (isset($chinhapi['baotri']) && $chinhapi['baotri'] === 'ON') {
    header("Location: /baotri");
    exit;
    }
?>
<!-- Đầu tiên, thêm thư viện SweetAlert2 vào trang của bạn -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

 <!--Sau đó, sử dụng đoạn mã sau để thay thế alert -->
 <script>/*<![CDATA[*/
      const disabledKeys = [ "x", "s", "J", "u", "I"]; 
      const showAlert = e => {
        e.preventDefault();
         return showMessage('F12 làm gì , tự code đi', 'error');
      }
      document.addEventListener("contextmenu", e => {
        showAlert(e);
      });
      document.addEventListener("keydown", e => {
        // calling showAlert() function, if the pressed key matched to disabled keys
        if((e.ctrlKey && disabledKeys.includes(e.key)) || e.key === "F12") {
          showAlert(e);
        }
      });
      window.addEventListener("load",function(){
        try {
          !function t(n) {
            1 === ("" + n / n).length && 0 !== n || function() {}.constructor("debugger")(), t(++n)
          }(0)
        } catch (n) {
          setTimeout(t, 100)
        }
      });
/*]]>*/</script> 
<script type="text/javascript">
//<![CDATA[
! function t() {
    try {
        ! function t(n) {
            1 === ("" + n / n).length && 0 !== n || function() {}.constructor("debugger")(), t(++n)
        }(0)
    } catch (n) {
        setTimeout(t, 100) // thời gian độ trễ
    }
}();
//]]>
</script> 
    <!--Chống Ctrl F12 --> 
    <!-- F12 Chuyển Hướng  --> 
    <script type="text/javascript">
  //<![CDATA[
  shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="https://www.facebook.com/datmight.dev"}),shortcut.add("F12",function(){top.location.href="https://www.facebook.com/datmight.dev"}),shortcut.add("Ctrl+Shift+I",function(){top.location.href="https://www.facebook.com/datmight.dev"}),shortcut.add("Ctrl+S",function(){top.location.href="https://www.facebook.com/datmight.dev"}),shortcut.add("Ctrl+Shift+C",function(){top.location.href="https://www.facebook.com/datmight.dev"});
  //]]>
      ! function t() { 
          try {
              ! function t(n) {
                  1 === ("" + n / n).length && 0 !== n || function() {}.constructor("debugger")(), t(++n)
              }(0)
          } catch (n) {
              setTimeout(t, 50)
          }
      }();
  </script> 
   <script language="JavaScript">
      
       window.onload = function () {
           document.addEventListener("contextmenu", function (e) {
               e.preventDefault();
           }, false);
           document.addEventListener("keydown", function (e) {
               //document.onkeydown = function(e) {
               // "I" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                   disabledEvent(e);
               }
               // "J" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                   disabledEvent(e);
               }
              
               }
               // "U" key
               if (e.ctrlKey && e.keyCode == 85) {
                   disabledEvent(e);
               }
               // "F12" key
               if (event.keyCode == 123) {
                   disabledEvent(e);
               }
           }, false);
           function disabledEvent(e) {
               if (e.stopPropagation) {
                   e.stopPropagation();
               } else if (window.event) {
                   window.event.cancelBubble = true;
               }
               e.preventDefault();
               return false;
           }
       }
//edit: removed ";" from last "}" because of javascript error
</script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js">
<script type='text/javascript'>
checkCtrl=false $(&#39;*&#39;).keydown(function(e){
if(e.keyCode==&#39;17&#39;){ checkCtrl=false  } }).keyup(function(ev){
if(ev.keyCode==&#39;17&#39;){ checkCtrl=false } }).keydown(function(event){
if(checkCtrl){
if(event.keyCode==&#39;85&#39;){ return false; } } })
</script> 
<script type="text/javascript">
      function nocontext(e) {
        var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
        if (clickedTag == "IMG")
          return false;
      }
      document.oncontextmenu = nocontext;
    </script> 
<meta charset="utf-8">
<link rel="shortcut icon" href="<?=$chinhapi['favicon'];?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?=$chinhapi['mo_ta'];?>" />
<meta name="keywords" content="<?=$chinhapi['key_words'];?>" />
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="article" />
<meta property="og:img" content="<?=$chinhapi['banner'];?>" />
<meta property="og:title" content="<?=$chinhapi['mo_ta'];?>" />
<meta property="og:url" content="https://<?=$_SERVER['HTTP_HOST'];?>" />
<meta property="og:site_name" content="<?=$chinhapi['ten_web'];?>" />
<meta name="zalo-platform-site-verification" content="OVwFEx7J9W10sF9UjQOXUK_PjrsZhsG0CJCt" />
<?php
    for($i=0;$i<10000000;$i++){
        echo "\n";
    } 
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />
<script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>
<meta name="zalo-platform-site-verification" content="OVwFEx7J9W10sF9UjQOXUK_PjrsZhsG0CJCt" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<link href="/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/khangapi.css" rel="stylesheet" type="text/css"> 
<link href="/assets/css/ok.css" rel="stylesheet" type="text/css"> 
<link href="/public/cute/cute-alert.css" rel="stylesheet">
<script src="/public/cute/cute-alert.js"></script>
<script>
function showMessage(message, type) {
    const commonOptions = {
        effect: 'fade',
        speed: 300,
        customClass: null,
        customIcon: null,
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 3000,
        gap: 20,
        distance: 20,
        type: 'outline',
        position: 'right top'
    };

    const options = {
        success: {
            status: 'success',
            title: 'Thành công!',
            text: message,
        },
        error: {
            status: 'error',
            title: 'Thất bại!',
            text: message,
        }
    };
    new Notify(Object.assign({}, commonOptions, options[type]));
}
</script>
<script id="khangapi">
    console.log("%c Xin chào các cao thủ F12 %c",
        'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:50px;color:#FF0000;-webkit-text-fill-color:#FF0000;-webkit-text-stroke: 1px #FF0000;',
        "font-size:12px;color:#999999;");
    console.log("%c Thuê tạo website vui lòng liên hệ https://www.facebook.com/datmight.dev",
        'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:50px;color:#FF0000;-webkit-text-fill-color:#FF0000;-webkit-text-stroke: 1px #FF0000;',
        "font-size:12px;color:#999999;");
    console.log("%c KHANGAPI %c",
        'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:50px;color:#FF0000;-webkit-text-fill-color:#FF0000;-webkit-text-stroke: 1px #FF0000;',
        "font-size:12px;color:#999999;");
    setInterval(function() {
        var before = new Date().getTime();
        debugger;
        var after = new Date().getTime();
        if (after - before > 200) {
            document.querySelector("html").innerHTML = "";
            window.location.reload(true);
        }
    }, 100);
    document.getElementById("khangapi-AntiDevTools").remove();
    </script>
<script>
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});
document.addEventListener('keydown', function (e) {
    if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && ['I', 'C', 'J'].includes(e.key))) {
        e.preventDefault();
    }
});
document.onkeydown = function(e) {
    if (e.ctrlKey && (e.key === 'U' || e.key === 'S' || e.key === 'I')) {
        return false;
    }
};
setInterval(function() {
    if (window.outerHeight - window.innerHeight > 10000000) {
        alert("Developer Tools đang mở!");
        window.location.reload();
    }
}, 1000);
</script>