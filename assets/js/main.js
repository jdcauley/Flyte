/* Author:

*/

!function(d,s,id){
    var js,fjs=d.getElementsByTagName(s)[0];
    if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
    js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");

(function (w, d, load) {
 var script, 
 first = d.getElementsByTagName('SCRIPT')[0],  
 n = load.length, 
 i = 0,
 go = function () {
   for (i = 0; i < n; i = i + 1) {
     script = d.createElement('SCRIPT');
     script.type = 'text/javascript';
     script.async = true;
     script.src = load[i];
     first.parentNode.insertBefore(script, first);
   }
 }
 if (w.attachEvent) {
   w.attachEvent('onload', go);
 } else {
   w.addEventListener('load', go, false);
 }
}(window, document, 
 ['//assets.pinterest.com/js/pinit.js']
));    

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// This adds 'placeholder' to the items listed in the jQuery .support object. 
jQuery(function() {
   jQuery.support.placeholder = false;
   test = document.createElement('input');
   if('placeholder' in test) jQuery.support.placeholder = true;
});
// This adds placeholder support to browsers that wouldn't otherwise support it. 
$(function() {
   if(!$.support.placeholder) { 
      var active = document.activeElement;
      $(':text').focus(function () {
         if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
            $(this).val('').removeClass('hasPlaceholder');
         }
      }).blur(function () {
         if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
            $(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
         }
      });
      $(':text').blur();
      $(active).focus();
      $('form:eq(0)').submit(function () {
         $(':text.hasPlaceholder').val('');
      });
   }
});

    
    
    