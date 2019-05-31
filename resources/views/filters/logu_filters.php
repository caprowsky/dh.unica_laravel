{
    id: 'nome',
    label: {
		it: 'Nome',
		en: 'Name'
	},
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with']
  }, {
    id: 'descrizione',
    label: {
		it: 'Descrizione',
		en: 'Description'
	},
    type: 'string',
    operators: ['equal', 'not_equal', 'contains', 'not_contains', 'begins_with', 'not_begins_with','ends_with', 'not_ends_with','is_null','is_not_null']
},{
	id: 'lat',
	label: {
		it: 'Latitudine',
		en: 'Latitude'
	},
	type: 'double',
	operators: ['between']
},{
	id: 'lng',
	label: {
		it: 'Longitudine',
		en: 'Longitude'
	},
	type: 'double',
	operators: ['between']
}
