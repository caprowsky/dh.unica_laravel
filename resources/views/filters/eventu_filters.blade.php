@include ('filters/eventu_filters_AL')
,{
	id: 'partecipantis',
	label: '<->Ha partecipante (esecutore)',
	table: "PartecipatModel",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/partecipat_filters')
     ]
    },
    operators: ['in','not_in']
  }
