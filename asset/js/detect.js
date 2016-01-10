$(document).ready(function() {
   // Stuff to do as soon as the DOM is ready
   var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
       // Opera 8.0+ (UA detection to detect Blink/v8-powered Opera)
   var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
   var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
       // At least Safari 3+: "[object HTMLElementConstructor]"
   var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
   var isIE = /*@cc_on!@*/false || !!document.documentMode;   // At least IE6
   if(isFirefox==true){
     $(".notSupport").html('<div class="alert alert-warning"><strong>Warning!</strong>Sorry! Change type is not support for firefox, we are recommend to use Google Chrome! </div>');
   }
});
