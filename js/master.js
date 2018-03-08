$(document).ready(function() {
  /*
	$('body').css('min-height', $(window).height());
	if (window.innerWidth == screen.width && window.innerHeight == screen.height) {
    	console.log('fullscreen enabled!');
    	$('body').css('min-height', $(window).height());
	}else{
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $('#fullscreen-button').show();
			$('body').append("<div id=\"fullscreen-ask\" class=\"modal fade\" role=\"dialog\">\
  <div class=\"modal-dialog\">\
    <!-- Modal content-->\
    <div class=\"modal-content\">\
      <div class=\"modal-header\">\
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>\
        <h4 class=\"modal-title\">Para melhor experiencia abra em fullscreen</h4>\
      </div>\
      <div class=\"modal-footer\">\
      	<button type=\"button\" class=\"btn btn-success\" onclick=\"toggleFullScreen()\" data-dismiss=\"modal\">Abrir em Fullscreen</button>\
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Não quero</button>\
      </div>\
    </div>\
  </div>\
</div>");
		}
		$("#fullscreen-ask").modal();
	}
});
function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }*/
});