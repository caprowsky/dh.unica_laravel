{
    id: 'titolo',
    label: 'Titolo',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','regexp']

  },
  {
    id: 'titolo_alt',
    label: 'Titoli alternativi',
    type: 'string',
    operators: ['contains', 'not_contains','regexp']

  },  {
    id: 'soggetto',
    label: 'Soggetto',
    type: 'string',
     operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null','regexp']
},
  {
    id: 'descrizione',
    label: 'Descrizione',
    type: 'string',
     operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null','regexp']
},{
	id: 'data',
	label: 'Data',
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
    id: 'data_note',
    label: 'Annotazioni data',
    type: 'string',
     operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null','regexp']
},{
    id: 'tipo',
    label: 'Tipo',
    type: 'integer',
    input: 'checkbox',
    values: {
		@php
		$tipi=App\DocumentuModel::getTipi();
		for ($i=0;$i<count($tipi);$i++)
		echo $i.": '".$tipi[$i]."',";
		
		@endphp
    },
    operators: ['equal', 'not_equal','in','not_in']
},{
	id: 'formato',
	label: 'Formato',
	type: 'string'
},{
	id: 'lingua',
	label: 'Lingua',
	type: 'string',
	operators: ['contains', 'not_contains','is_null','is_not_null','regexp']
},
{
	id: 'identificatore',
	label: 'Identificatore',
	type: 'string',
	operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null','regexp']

},
{
	id: 'diritti',
	label: 'Diritti',
	type: 'string',
	operators: ['contains', 'not_contains','is_null','is_not_null','regexp']
},
{
    id: "collezione_id",
    label: "->Collezione",
    table: "ColletzioniModel",
    tab:"colletzionis",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/colletzioni_filters')
     ]
    },
    operators: ['in','not_in']
},
{
    id: "evento_id",
    label: "->Evento",
    table: "EventuModel",
    tab: "eventus",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/eventu_filters')
     ]
    },
    operators: ['in','not_in']
}
,{
    id: 'agenti',
    label: '->Agente',
    table: 'EsecDocumentuModel',
    subquery: {
   
     display_empty_filter: false,
     filters: [
     @include ('filters/esec_documentu_filters')
     ]
    },
    operators: ['in','not_in']
}
