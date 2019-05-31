function scrollTo(x){
    var aTag = $(x);
   
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
};
function disableForm() {
$("#frmitems input").prop("disabled", true);
$("#frmitems select").prop("disabled", true);
$("#frmitems button").hide();
$("[id^=btn-save_]")[0].innerText="Chiudi"
}
function go() {
	scrollTo('#panel')
}

function fileUp() {
	 $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
       
	$('#fileupload').fileupload({
		dataType: 'json',
		add: function (e, data) {
			$('#loading').text('Uploading...');
			$('#progress .bar').css('width','0%');
			data.submit();
			
		},
		done: function (e, data) {
			
			$('#imagini').attr("src", data.result.file+"?timestamp=" + new Date().getTime());   
			$('#foto_filename').attr("value", data.result.file);
			$('#loading').text('');
			$('#progress .bar').css('width','0%');
		},
		 progressall: function (e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress .bar').css(
				'width',
				progress + '%'
			);
		},
		error: function (e, data) {
		  alert ("Errore :"+e.responseText);
	}
			
	});
        
}
function datePick(form) {
	
	$("input[id*='d_']").datepicker({
		container:'#'+form,
		dateFormat: 'yy-mm-dd',
		showOn: "button",
		buttonText: "Data",
		buttonImage: "https://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
		buttonImageOnly: false,
	}); 
}

function json_modal(data){
	$('#json').html( data );
	
	$('#myModal_json').on("onclick",$('#myModal_json').modal('hide'));
	$('#myModal_json').modal('show');
}

