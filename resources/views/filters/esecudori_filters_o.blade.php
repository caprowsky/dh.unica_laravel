@include ('filters/esecudori_filters_AL')

,{
	id: 'evento',
	label: '->Ha partecipato',
	table: "PartecipatModel",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/ev_partecipat_filters')
     ]
    },
    operators: ['in','not_in']
  },
  {
	id: 'relazione_desc',
	label: 'Descrizione (Relazione)',
	type: 'string',
	operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']

},{
    id: 'relazione_tipo',
    label: 'Tipo (Relazione)',
    type: 'integer',
    input: 'select',
    values: {
		@php
		foreach (App\AcapiuEsecModel::getTipiIt() as $i=>$v)
		echo $i.": '".$v."',";
		
		@endphp
    },
    operators: ['equal']
},{
    id: 'acapiu',
    label: '->A esecutore (relazione)',
    table: 'EsecudoriModel',
    subquery: {
   
     display_empty_filter: false,
     filters: [
     @include ('filters/esecudori_filters_AL')
     ]
    },
    operators: ['in','not_in']
},
{
    id: 'acapiau',
    label: '->Da esecutore (relazione)',
    table: 'EsecudoriModel',
    subquery: {
   
     display_empty_filter: false,
     filters: [
     @include ('filters/esecudori_filters_AL')
     ]
    },
    operators: ['in','not_in']
},{
	id: 'ruolo_doc',
	label: '->Ruolo(documento)',
	type: 'string'
}

