{
    id: 'nota',
    label: 'Annotazione',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']

  },{
    id: 'inizio',
    label: 'Inizio',
    type: 'time'
},
{
    id: 'fine',
    label: 'Fine',
    type: 'time'
},
{
    id: 'seq',
    label: 'N. sequenza',
    type: 'integer'
},
{
    id: "tier_id",
    label: "->Tier",
    table: "TierModel",
    tab: "tiers",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/tier_filters')
     ]
    },
    operators: ['in','not_in']
  }
