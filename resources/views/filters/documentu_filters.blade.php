@include ('filters/documentu_filters_AL')
,{
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
		foreach (App\AcapiuModel::getTipiIt() as $i=>$v)
		echo $i.": '".$v."',";
		
		@endphp
    },
    operators: ['equal']
},{
    id: 'acapiu',
    label: '->A documento (relazione)',
    table: 'DocumentuModel',
    tab: "documentus",
    subquery: {
   
     display_empty_filter: false,
     filters: [
     @include ('filters/documentu_filters_AL')
     ]
    },
    operators: ['in','not_in']
},
{
    id: 'acapiau',
    label: '->Da documento (relazione)',
    table: 'DocumentuModel',
    tab: "documentus",
    subquery: {
   
     display_empty_filter: false,
     filters: [
     @include ('filters/documentu_filters_AL')
     ]
    },
    operators: ['in','not_in']
},
{
    id: "tier",
    label: "con Tier",
    table: "TierModel",
    tab: "tiers",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/tier_filters_AL')
     ]
    },
    operators: ['in','not_in']
}
