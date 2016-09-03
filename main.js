'use strict';

var urls = {
	register: 'php/register.php',
	login: 'php/login.php',
	logout: 'php/logout.php'
};

var alertNum = 0;
var alertType = {
	's': 'alert-success',
	'i': 'alert-info',
	'w': 'alert-warning',
	'e': 'alert-danger'
};
function log(msg, type, timeout){
	timeout = timeout || 5000;
	$('.alertCont').append('<div id="alertBox'+alertNum+'" class="alert '+alertType[type]+' alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+msg+'</div>');
	setTimeout(function(){
		$('#alertBox'+alertNum).alert('close');
	}, timeout);
	console.log(msg);
}

function submitForm(submitType){
	var curData = {};
	$('#'+submitType+'Form input, #'+submitType+'Form select').each(function(){
		curData[$(this).attr('name')] = $(this).val();
	});
	$.ajax({
		url: urls[submitType],
		method: 'post',
		data: curData
	}).done(function(ret){
		log(ret.msg, ret.status);
		if(ret.status == 's'){
			$('#'+submitType+'-modal').modal('hide');
			$('#'+submitType+'Form input, #'+submitType+'Form select').each(function(){
				$(this).val('');
			});
		}
	});
}

function setDomEvents(){
	/*
	$('.navbar a').on('click', function(e) {
		e.preventDefault();
		var hash = this.hash;
		$('html, body').animate({
			scrollTop: $(hash).offset().top
		}, 500, function(){
			window.location.hash = hash;
		});
	});
	*/
	//$(document).click(function(e){ e.preventDefault(); });
	$('#registerSubmitButton').click(function(){ submitForm('register') });
	$('#loginSubmitButton').click(function(){ submitForm('login') });
}

$(document).ready(function(){
	setDomEvents();
});


