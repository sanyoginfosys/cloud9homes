'use strict';
// Class definition

var KTDatatableDataLocalDemo = function() {
	
	// Private functions	

	// demo initializer
	var demo = function() {

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				var dataJSONArray = JSON.parse(this.responseText);

				var datatable = $('.kt-datatable').KTDatatable({
				// datasource definition
				data: {
					type: 'local',
					source: dataJSONArray,
					pageSize: 10,
				},

				// layout definition
				layout: {
					scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
					// height: 450, // datatable's body's fixed height
					footer: false, // display/hide footer
				},

				// column sorting
				sortable: true,

				pagination: true,

				search: {
					input: $('#generalSearch'),
				},

				// columns definition
				columns: [
				{
					field: 'guest_doc_id',
					title: 'Document ID',
					width: 80,
					template: function(row) 
					{
						return row.guest_doc_id;
					}
				}, 
				{
					field: 'guest_name',
					title: 'Guest Name',
					width: 150,
					template: function(row) 
					{
						return row.guest_name;
					}
				}, 
				{
					field: 'guest_mobile',
					title: 'Phone No',
					width: 80,
					template: function(row) 
					{
						return row.guest_mobile;
					}
				},		
						
				{
					field: 'guest_email',
					title: 'Email ID',
					width: 150,
					template: function(row) 
					{
						return row.guest_email;
					},
				}, 
				{
					field: 'guest_form_type',
					title: 'Form Type',
					width: 100,
					template: function(row) 
					{
						return row.guest_form_type;
					},
				},
				{
					field: 'timestamp',
					title: 'Timestamp',
					width: 100,
					template: function(row)
					{
							return row.timestamp;
					},
				},
				{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 50,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\<a href="' + row.guest_document_path + '" class="btn btn-sm btn-clean btn-icon btn-icon-md">\
						<i class="la la-download"></i>\</a>\
						';
					},
				}],
				});

				$('#kt_form_status').on('change', function() {
					datatable.search($(this).val().toLowerCase(), 'Status');
				});

				$('#kt_form_type').on('change', function() {
					datatable.search($(this).val().toLowerCase(), 'Type');
				});

				$('#kt_form_status,#kt_form_type').selectpicker();
			}
		};
		xmlhttp.open("GET", "Sec_Api/manage_guest_documents.php", true);
		xmlhttp.send();
		
	};

	return {
		// Public functions
		init: function() {
			// init dmeo
			demo();
		},
	};
}();

// jQuery(document).ready(function() {
// 	KTDatatableDataLocalDemo.init();
// });

function LoadTable() {
	KTDatatableDataLocalDemo.init();
}

