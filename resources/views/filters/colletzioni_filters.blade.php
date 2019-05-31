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
},
{
	id: 'data',
	label: 'Data',
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
    id: 'data_note',
    label: 'Annotazioni data',
    type: 'string',
     operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']
},{
    id: "luogo_id",
    label: "->Luogo",
    table: "LoguModel",
    tab: "logus",
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
