{{-- ANTILOOP: po evitai s'inclusioni esecudori -> eventu -> esecudori  --}}
{
    id: 'nome',
    label: 'Nome',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with']

  }, {
    id: 'descrizione',
    label: 'Descrizione',
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']

},{
	id: 'inizio',
	label: 'Data inizio',
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
    id: 'datai_note',
    label: 'Annotazioni data inizio',
    type: 'string',
     operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']
},
{
	id: 'fine',
	label: 'Data fine',
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
    id: 'dataf_note',
    label: 'Annotazioni data fine',
    type: 'string',
     operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']
},

{
    id: "aggregatore_id",
    label: "->Aggregatore",
    table: "AcorradoriModel",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/acorradori_filters')
     ]
    },
    operators: ['in','not_in']
  }
,
{
    id: "luogo_id",
    label: "->Luogo",
    table: "LoguModel",
    subquery: {
     
     display_empty_filter: false,
     filters: [
     @include ('filters/logu_filters')
     ]
    },
    operators: ['in','not_in']
  },{
    id: 'luogo_note',
    label: 'Annotazioni luogo',
    type: 'string',
     operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']
}
