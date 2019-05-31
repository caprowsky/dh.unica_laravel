{
	id: 'ruolo',
	label: 'Ruolo',
	type: 'string'
},
{
	id: 'descrizione',
	label: 'Descrizione',
	type: 'string'
},
{
	id: 'esecutore_id',
	label: '->Esecutore',
	table: "EsecudoriModel",
	tab: "esecudoris",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/esecudori_filters_AL')
     ]
    },
    operators: ['in','not_in']
  }

