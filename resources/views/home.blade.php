@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-md-3">
			<div class="list-group menu" id="nav">
				<a href="/documentus" class="list-group-item">Documenti<span class="badge">{{$n_doc}}</span></a>
				<a href="/colletzionis" class="list-group-item">Collezioni<span class="badge">{{$n_col}}</span></a>
				<a href="/eventus" class="list-group-item">Eventi<span class="badge">{{$n_eve}}</span></a>
				<a href="/esecudoris" class="list-group-item">Esecutori<span class="badge">{{$n_ese}}</span></a>
				<a href="/acorradoris" class="list-group-item">Aggregatori<span class="badge">{{$n_aco}}</span></a>
				<a href="/logus" class="list-group-item">Luoghi<span class="badge">{{$n_log}}</span></a>	
				<a href="/tiers" class="list-group-item">Tiers<span class="badge">{{$n_tie}}</span></a>	
				<a href="/intervals" class="list-group-item">Annotazioni<span class="badge">{{$n_int}}</span></a>	
				<a href="/queries" class="list-group-item">Ricerche<span class="badge">{{$n_ric}}</span></a>	
				@hasrole('super-admin')
				<a href="/users" class="list-group-item">Utenti<span class="badge">{{$n_use}}</span></a>	
				@endhasrole			
			</div> 
		</div>
		
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Pannello</div>

                <div class="panel-body table-responsive">
                   Benvenuto {{ Auth::user()->name }}
                  
                 
                   <center>
					<img class="img-responsive" src="img/er.png" width="400px"/>
                   </center>
                </div>
            </div>
          
        </div>
        
    </div>
    <div class="row">
		<div class="panel panel-default">
			<div class="panel-body" id="panel"></div>
        </div>           
    </div>
    <div class="modal fade" id="myModal_search" tabindex="-1" role="dialog" ></div>
</div>
<script type="text/javascript">
	
    $(function(){
		$('#nav a').click(function(e) { 
				$('#loading').show();
			  $('#panel').load( $(this).attr('href') , function(){
					 $('#panel').show();
					$('#loading').hide();
					scrollTo('#panel');
					
			  })
			  return false
		})
	});


</script>
@endsection
