{
	id: 'descrizione',
	label: 'Descrizione',
	type: 'string',
	operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']

},{
    id: 'tipo',
    label: 'Tipo relazione',
    type: 'integer',
    input: 'select',
    values: {
		@php
		foreach (App\AcapiuEsecModel::getTipiIt() as $i=>$v)
		echo (App\AcapiuEsecModel::getTipoInv($i)).": '".$v."',";
		
		@endphp
    },
    operators: ['equal']
},
{
    id: 'esecudori',
    label: '->Esecutore',
    table: 'EsecudoriModel',
    tab: "esecudoris",
    subquery: {
   
     display_empty_filter: false,
     filters: [
     @include ('filters/esecudori_filters_AL')
     ]
    },
    operators: ['in','not_in']
}
