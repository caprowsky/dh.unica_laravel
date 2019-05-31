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
	id: 'evento_id',
	label: '->Evento',
	table: "EventuModel",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/eventu_filters_AL')
     ]
    },
    operators: ['in','not_in']
  }

