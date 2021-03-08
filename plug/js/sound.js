var url="http://localhost/siakad/";
function set_effect(){
	
		var s = $("#sound_effect").val();
		if(s=="on")
		{ $("#sound_effect").val("off"); 
		 document.cookie =url+"sound=off";
		} else { $("#sound_effect").val("on"); 
		 document.cookie =url+"sound=on";
		}
}



$(document).on('click', 'button,.sound', function (event, messages) {
			var x=$("#sound_effect").val();
			var audio = new Audio(url+"sound/click.mp3");
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
		
		if(x=="on"){ audio.play(); }
});

$(document).on('click', 'input', function (event, messages) {
			var x=$("#sound_effect").val();
			var audio = new Audio(url+"sound/input.mp3");
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
			if(x=="on"){ audio.play(); }
});

$(document).on('click', '.dropdown-menu li', function (event, messages) {
			var x=$("#sound_effect").val();
			var audio = new Audio(url+"sound/click.mp3");
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
			if(x=="on"){ audio.play(); }
});

$(document).on('keypress', 'input', function (event, messages) {
			var x=$("#sound_effect").val();	
			var audio = new Audio(url+"sound/ketik.mp3");
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
			if(x=="on"){ audio.play(); }
});

$(document).on('click', '.ml-menu li,.list li', function (event, messages) {
			var x=$("#sound_effect").val();
			var audio = new Audio(url+"sound/ketik.mp3");
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
			if(x=="on"){ audio.play(); }
});

 
  