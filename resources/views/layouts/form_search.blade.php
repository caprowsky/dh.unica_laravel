<div class="modal-dialog modal-lg" id="query_modal">
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<h3 class="modal-title">Ricerca <span class="text-warning">@yield('title')</span></h3>
		</div>
		<div class="modal-body">
			<div id="builder" data-field-id="{{$rules}}"></div>
		</div>
		<div class="modal-footer">
			<div style="float:left">
					<button class="btn btn-info btn-xs" onClick="test()"><span class="glyphicon glyphicon-eye-open"></span>Test</button>
					<button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal_qsave" onClick="save()"><span class="glyphicon glyphicon-save"></span>Salva</button>
					<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_qload" onClick="load('@yield('table')','#builder','@yield('title')')"><span class="glyphicon glyphicon-open"></span>Carica</button>
					<button class="btn btn-alert btn-xs" onClick="reset()"><span class="glyphicon glyphicon-trash"></span>Reset</button>	
			</div>
			<div style="float:right">
				
				
				<button class="btn btn-primary btn-s" onClick="sendQuery()"><span class="glyphicon glyphicon-search"></span>Cerca</button>
				<button class="btn btn-warning btn-s" data-dismiss="modal">Annulla</button>	
			</div>
		</div>
	</div>
	
</div>
<div id="myModal_qsave" class="modal fade" role="dialog">
@include ('query_save')
</div>
<div id="myModal_qload" class="modal fade" role="dialog">
@include ('query_load')
</div>

<script src="{{asset('jqb/moment.min.js')}}"></script>
<script src="{{asset('jqb/docs.min.js')}}"></script>
<script src="{{asset('jqb/script.js')}}"></script>
<script src="{{asset('jqb/interact.min.js')}}"></script>
<script src="{{asset('jqb/bootstrap-select.min.js')}}"></script>
<script src="{{asset('jqb/bootstrap-datepicker.min.js')}}"></script>

<link href="{{asset('jqb/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
<link href="{{asset('jqb/docs.min.css')}}" rel="stylesheet">
<link href="{{asset('jqb/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
<link href="{{asset('jqb/css/query-builder.default.min.css')}}" rel="stylesheet"></link>

<script>
	

function sendQuery()
{	
	var _rules = $('#builder').queryBuilder('getRules'); 
	var _json = JSON.stringify( _rules );
    var datatablesRequest = { rules: _json };
        
	if (!$.isEmptyObject(_rules)) {	
		AjaxGETinPanel("/@yield('table')",close(),null,datatablesRequest);
	}
}

function close() {
	//$('#myModal_'+"@yield('table')").modal('hide');
	//$('.modal-backdrop').remove();
	
	$('#myModal_search').modal('hide');
	
	scrollTo("#panel");
	
	//$('.modal-backdrop').remove();
}

function reset() {		
	var rules = $('#builder').queryBuilder('getRules');
	$('#builder').queryBuilder('reset');
};

function test() {		
	var rules = $('#builder').queryBuilder('getRules');
	alert (JSON.stringify(rules));
};
	
$(document).ready(function() {
   
   var rules = $('#builder').data("field-id");
   
	$('#builder').queryBuilder({
			plugins: {
			'bt-checkbox':null,'subquery':{load_modal: 'myModal_qload',load_func: function (tab,dest,title) { load(tab,dest,title);}}
			},
			filters: [ @yield('filters') ],
			lang_code: "it",
			allow_empty: true,
			
			operators: $.fn.queryBuilder.constructor.DEFAULTS.operators.concat([
                { type: 'regexp',    nb_inputs: 1, multiple: false, apply_to: ['string'] }
               
            ]),
            lang: {
                operators: {
                    regexp: 'regexp'
                    
                }
            },
            sqlOperators: {
                regexp: { op: 'REGEXP' }
            }
            
 		});
 		/*
        $('#builder').on('afterApplyRuleFlags.queryBuilder afterCreateRuleFilters.queryBuilder', function () {
            $("[name$='_filter']").each(function () {

            });
        }).on('ruleToSQL.queryBuilder.filter', function (e, rule) {
            if (rule.operator === 'regexp') {
                e.value+= ' \'' + rule.value + '\'';
            }
            e.value = "%"+e.value;
        });
 		*/
	if (rules!="{}") {
		console.log(rules);
		$('#builder').queryBuilder('setRules', rules);};
	}

);
function caricaSQ(tabella)
{
	alert(tabella);
}
 
</script>
