{
    id: 'nome',
    label: 'Nome/Denom',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with']
  },
  {
    id: 'cognome',
    label: 'Cognome',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with']
  }, 
  {
    id: 'alias',
    label: 'Alias',
    type: 'string',
    operators: ['contains', 'not_contains']
  },
   {
    id: 'descrizione',
    label: 'Descrizione',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']

},{
    id: 'tipo',
    label: 'Tipo',
    type: 'integer',
    input: 'select',
    values: {
		@php
		foreach (App\EsecudoriModel::getTipi() as $i=>$v)
		echo $i.": '".$v."',";
		
		@endphp
    },
    operators: ['equal','not_equal']
},{
    id: 'sesso',
    label: 'Sesso',
    type: 'string',
    input: 'select',
    values: {
		@php
		foreach (App\EsecudoriModel::getSex() as $i=>$v)
		echo $v.": '".$v."',";
		
		@endphp
    },
    operators: ['equal','not_equal']
},{
	id: 'nascita',
	label: 'Data di nascita',
	type: 'date',
	validation: {
      format: 'YYYY/MM/DD'
    },
	plugin: 'datepicker',
    plugin_config: {
      format: 'yyyy/mm/dd',
      todayBtn: 'linked',
      todayHighlight: true,
      autoclose: true
    }
},{
    id: 'datan_note',
    label: 'Annotazioni data nascita',
    type: 'string',
     operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']
},{
	id: 'morte',
	label: 'Data di morte',
	type: 'date',
	validation: {
      format: 'YYYY/MM/DD'
    },
	plugin: 'datepicker',
    plugin_config: {
      format: 'yyyy/mm/dd',
      todayBtn: 'linked',
      todayHighlight: true,
      autoclose: true
    }
},{
    id: 'datam_note',
    label: 'Annotazioni data morte',
    type: 'string',
     operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']
},
{
	id: 'logus',
	label: '->Luogo',
	table: "LoguModel",
	tab: "logus",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/logu_filters')
     ]
    },
    operators: ['in','not_in']
  },
  {
	id: 'logus_desc',
	label: '->Luogo(Annotazione)',
	type: 'string'
}
