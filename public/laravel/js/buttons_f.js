// Logus

function addLogu() {
	AjaxCreate('/logus', function (){
		var formData=$('form[name=logu_edit]').serialize();	
		AjaxPP('/logus',formData,0,addItemL);
	});
}

function addItemL(data,id) {
	
	$('#logu_id').append($('<option>', {value:data.id, text:data.nome}));
	$('#logu_id').val(data.id);
}

function getLogu()
{
	id=$('#logu_id').val();
	AjaxGET('/logus/'+id);
}


// Nuovo aggregatore
// ****************
function addAcorradori() {
	AjaxCreate('/acorradoris', function (){
		var formData=$('form[name=acorradori_edit]').serialize();	
		AjaxPP('/acorradoris',formData,0,addItemA);
	});
}

function getAcorradori()
{
	id=$('#acorradori_id').val();
	AjaxGET('/acorradoris/'+id);
}

// Aggiorna

function addItemA(data,id) {
	
	$('#acorradori_id').append($('<option>', {value:data.id, text:data.nome}));
	$('#acorradori_id').val(data.id);
}

//

function addEventu() {
	AjaxCreate('/eventus', function (){
		var formData=$('form[name=eventu_edit]').serialize();
		AjaxPP('/eventus',formData,0,addItemE);
	});
}
function addItemE(data,id) {
	
	$('#eventu_id').append($('<option>', {value:data.id, text:data.nome}));
	$('#eventu_id').val(data.id);
}

function getEventu()
{
	id=$('#eventu_id').val();
	AjaxGET('/eventus/'+id);
}


function addColletzioni() {
	AjaxCreate('/colletzionis', function (){
		var formData=$('form[name=eventu_edit]').serialize();
		AjaxPP('/colletzionis',formData,0,addItemC);
	});
}
function addItemC(data,id) {
	
	$('#colletzioni_id').append($('<option>', {value:data.id, text:data.nome}));
	$('#colletzioni_id').val(data.id);
}

function getColletzioni()
{
	id=$('#colletzioni_id').val();
	AjaxGET('/colletzionis/'+id);
}





