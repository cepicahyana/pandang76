 
 
function notif_error(msg)
{
 $.notify({
			title : 'Info',
			icon : 'fa fa-bell',
            message: '<b style="font-size:13px; ">'+msg+'</b>'
			
        }, {
           
            allow_dismiss: true,
            label: 'Cancel',
			type: 'warning',
            placement: {
                from: 'top',
                align: 'right'
            },
			 
            delay: 3500,
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            },
            offset: {
                x: 10,
                y: 10
            }
        });
}

function notif_success(message)
{
	 $.notify({
			title : 'Info',
			icon : 'fa fa-bell',
            message: '<b style="font-size:13px; ">'+message+'</b>'
			
        }, {
           type: 'primary',
            allow_dismiss: true,
            label: 'Cancel',
       
            placement: {
                from: 'top',
                align: 'right'
            },
			 
            delay: 3500,
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            },
            offset: {
                x: 10,
                y: 10
            }
        });
}

function berhasil_disimpan()
{
	  notif_success("  Berhasil disimpan ");
}

function sukses()
{
	  notif_success("  Success! ");
}
 
 
 
    function notif(message, type='primary') {
        $.notify({
			title : 'Info',
			icon : 'fa fa-bell',
             message: '<b style="font-size:13px; ">'+message+'</b>'
        }, {
			  z_index: 999999,
			  type: type,
            type: type,
            allow_dismiss: true,
            label: 'Cancel',
            className: 'btn-xs btn-inverse',
            placement: {
                from: 'top',
                align: 'right'
            },
            delay: 2500,
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            },
            offset: {
                x: 30,
                y: 30
            }
        });
    };
  
 function notify(msg, align="right", icon="feather icon-bell", type="warning", animIn="fadeInRight", animOut="fadeOutRight") {
        $.notify({
            icon: icon,
            title: ' Notif <br>',
            message: msg,
            url: ''
        }, {
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: "top",
                align: align
            },
            offset: {
                x: 30,
                y: 30
            },
            spacing: 10,
            z_index: 999999,
            delay: 2500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: "animated "+ animIn,
                exit: animOut
            },
            icon_type: 'class',
				template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
							'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">Ã—</button>' +
							'<span data-notify="icon"></span> ' +
							'<span data-notify="title">{1}</span> ' +
							'<span data-notify="message">{2}</span>' +
							'<div class="progress" data-notify="progressbar">' +
								'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
							'</div>' +
							'<a href="{3}" target="{4}" data-notify="url"></a>' +
						'</div>'
        });
    };

$(document).ready(function() {
    function notif(from, align, icon, type, animIn, animOut) {
        $.notify({
            icon: icon,
            title: ' Bootstrap notify ',
            message: 'Turning standard Bootstrap alerts into awesome notifications',
            url: ''
        }, {
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 30,
                y: 30
            },
            spacing: 10,
            z_index: 999999,
            delay: 2500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            icon_type: 'class',
				template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
							'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">Ã—</button>' +
							'<span data-notify="icon"></span> ' +
							'<span data-notify="title">{1}</span> ' +
							'<span data-notify="message">{2}</span>' +
							'<div class="progress" data-notify="progressbar">' +
								'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
							'</div>' +
							'<a href="{3}" target="{4}" data-notify="url"></a>' +
						'</div>'
        });
    };
    // [ notification-button ]
    $('.notifications.btn').on('click', function(e) {
        e.preventDefault();
        var nFrom = $(this).attr('data-from');
        var nAlign = $(this).attr('data-align');
        var nIcons = $(this).attr('data-notify-icon');
        var nType = $(this).attr('data-type');
        var nAnimIn = $(this).attr('data-animation-in');
        var nAnimOut = $(this).attr('data-animation-out');
        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
    });
});