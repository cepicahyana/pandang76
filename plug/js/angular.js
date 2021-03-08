 function loading(id=null) {
	if(id==null)
	{
		  $.blockUI({ 
		  message: 'Loading...',
			css: { 
            border: '2px solid  white', 
            padding: '10px', 
			top: '200px',
			width:'250px',
			backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
			} 
		}); 
	}else{
		blok(id);
	}
          
         
}

function blok(id)
{
	  $('#'+id).block({ 
	 message: '<div><span class="spinner-border spinner-border-sm" role="status"></span> Loading...</div>',
			
	   centerY: 0, 
		css: { 
            border: '1px solid  #483D8B', 
            padding: '10px', 
			top: '10px',
			left: '',
			right: '10px',
			width:'250px',
			backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } 
		}); 
}

function progress(id)
{
	  $('#'+id).block({ 
	  message: '<h4><img alt="&nbsp;" src="plug/img/load.gif"/> Mohon Tunggu...</h4><span id="progressBar"></span>',
	   centerY: 0, 
		css: { 
            border: '1px solid  #483D8B', 
            padding: '10px', 
			top: '10px',
			left: '',
			right: '10px',
			width:'250px',
			backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } 
		}); 
}


function unblock(id=null)
{
	if(id==null)
	{
		 $.unblockUI();
	}else{
		$('#'+id).unblock(); 
	}
}

