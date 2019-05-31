@include ('filters/esecudori_filters_AL')

,{
	id: 'evento',
	label: '<->Ha partecipato (evento)',
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
    id: 'acapius',
    label: '<->Relazione con (esecutore)',
    table: 'AcapiuEsecModel',
    subquery: {
   
     display_empty_filter: false,
     filters: [
     @include ('filters/es_acapiu_filters')
     ]
    },
    operators: ['in','not_in']
},
{
	id: 'ruolo_doc',
	label: '<->Ha ruolo (documento)',
	type: 'string'
}

