 <html>
 <head>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://querybuilder.js.org/assets/js/docs.min.js"></script>
 <script src="http://querybuilder.js.org/assets/js/script.js"></script>
 <script src="https://unpkg.com/jQuery-QueryBuilder@2.4.3/dist/js/query-builder.standalone.min.js"></script>
 <link href="https://unpkg.com/jQuery-QueryBuilder@2.4.3/dist/css/query-builder.default.min.css" rel="stylesheet"></link>
 
 </head>
 
 <body>
 
 <div id="builder"></div>

<script>
  $('#builder').queryBuilder({
  filters: [{
    id: 'titolo',
    label: 'Titolo',
    type: 'string'
  }, {
    id: 'descrizione',
    label: 'Descrizione',
    type: 'string'
},{
	id: 'data',
	label: 'Data',
	type: 'date'
},{
    id: 'tipo',
    label: 'Tipo',
    type: 'integer',
    input: 'select',
    values: {
      1: 'Non definito',
      2: 'Immagine',
      3: 'Video',
      4: 'Audio',
      5: 'Testo',
      6: 'Oggetto',
      7: 'Altro'
      
    },
    operators: ['equal', 'not_equal']
},{
	id: 'formato',
	label: 'Formato',
	type: 'string'
},{
	id: 'creatore',
	label: 'Creatore',
	type: 'string',
	operators: ['contains', 'not_contains']
},{
	id: 'soggetto',
	label: 'Soggetto',
	type: 'string',
	operators: ['contains', 'not_contains']
},{
	id: 'editore',
	label: 'Editore',
	type: 'string',
	operators: ['contains', 'not_contains']
},{
	id: 'contributore',
	label: 'Contributore',
	type: 'string',
	operators: ['contains', 'not_contains']
},
{
	id: 'lingua',
	label: 'Lingua',
	type: 'string',
	operators: ['contains', 'not_contains']
},
{
	id: 'identificatore',
	label: 'Identificatore',
	type: 'string'
},
{
	id: 'diritti',
	label: 'Diritti',
	type: 'string',
	operators: ['contains', 'not_contains']
}


  ]

 
});

 
</script>
 
 </body>
 </html>
 
