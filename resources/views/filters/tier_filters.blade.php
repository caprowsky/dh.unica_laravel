{
    id: 'nome',
    label: 'Nome',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with']
  },{
    id: 'descrizione',
    label: 'Descrizione',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']
},
{
    id: "documento_id",
    label: "->Documento",
    table: "DocumentuModel",
    tab: "documentus",
    tab:"documentus",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/documentu_filters')
     ]
    },
    operators: ['in','not_in']
  },
  {
    id: "esecutore_id",
    label: "->Esecutore",
    table: "EsecudoriModel",
    tab: "esecudoris",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/esecudori_filters')
     ]
    },
    operators: ['in','not_in']
  },
  
{
    id: "annotazione",
    label: "con (Annotazione)",
    table: "IntervalModel",
    tab: "intervals",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/interval_filters_AL')
     ]
    },
    operators: ['in','not_in']
  }

