 
 function AjaxEdit(url,id,cb,mod) {
		
	AjaxGET(url+'/' + id+'/edit',cb,mod)
 };
 
 function AjaxCreate(url,cb,mod) {
	 
	 AjaxGET(url+'/create',cb,mod)
 };
 
 function AjaxShow(url,id,cb,mod) {
	 
	 AjaxGET(url+'/' + id,cb,mod)
 };
 
function AjaxDelete(url,id,cb) {
   
	   if (confirm('Cancello?')) {
			$("#loading").show();	
			$.ajax({
				headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
							},
				type: "DELETE",
				url: url + '/' + id,
				success: function (data) {
					console.log(data);					
					$("#loading").hide();
					cb(id);
					
				},
				error: function (data) {
					console.log('Error:', data);
					alert ("ERRORE: "+data.responseText);
					$("#loading").hide();
				}
			});
		}
		
	};
	
function AjaxGET(url,cb,mod,data) {
		  
		var m;
		if (mod==null) m=url.split('/')[1];
			else m=mod;		
		$("#loading").show();		   
        $.ajax({

            type: "GET",
            url: url,
            data: data,
            dataType: 'html',
            success: function (data) {
               
                $('#myModal_'+m).html(data);                        
                $('#myModal_'+m).modal('show');
				$('#btn-save_'+m).on("click",cb);
				$("#loading").hide();	
            },
            error: function (data) {
				
                console.log('Error:', data);
                
                $("#loading").hide();
                alert(data.responseText);	
            }
        });
	
        
    }
    

function AjaxGETinPanel(url,cb,mod,data) {
		  
		var m;
		if (mod==null) m=url.split('/')[1];
			else m=mod;		
		$("#loading").show();			   
        $.ajax({

            type: "GET",
            url: url,
            data: data,
            dataType: 'html',
            success: function (data) {
               
               
                $('#panel').hide();           
                $('#panel').html(data);                        
                $('#panel').show();
                $("#loading").hide();
                cb();
				
            },
            error: function (data) {
				$("#loading").hide();
				alert("Errore");
                console.log('Error:', data.responseText);
            }
        });
	
        
    }
    
 function AjaxPP(url,formData,id,cb,mod) {
	 
	var m;
		
	if (mod==null) m=url.split('/')[1];
			else m=mod;
	
	if (id!=0) {
		type = "PUT";
	}
	else
	{
		type = "POST";
	}
	
	
	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
    $("#loading").show();	
	$.ajax({
			type: type,
            url: url,
            data: formData,
            //processData: false,
			//contentType: false,
            dataType: 'json',
            success: function(data) {
				console.log(data);
               			         
                $('#myModal_'+m).modal('hide')
                $("#loading").hide();
                cb(data,id);
				
				},
            error: function (data) {
                console.log('Error:', data);
				var j=JSON.parse(data.responseText);
				j=j.errors;
				var x=Object.keys(j);
				
				$('.error').remove();
				for (var i=0;i<x.length;i++){				
					$('[id$=_'+x[i]+']').after("<font color=red class='error'>"+j[x[i]]+"</font>");
				}
				$("#loading").hide();
               
            }
        });
 
 }
 function AjaxAudio(url) {
	$.ajax({
            url: url,
            success: function( data ) {
                console.log(data);
                $('audio #source').attr('src', data);
                $('audio').get(0).load();
                $('audio').get(0).play();
            }
        });
 }
	 

