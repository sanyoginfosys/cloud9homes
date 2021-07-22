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
					field: 'testimonials_id',
					title: 'Testimonial ID',
					width: 100,
					template: function(row) 
					{
						return row.testimonials_id;
					}
				}, 
				{
					field: 'user_name',
					title: 'Client Name',
					width: 150,
					template: function(row) 
					{
						return row.user_name;
					}
				}, 
				{
					field: 'timestamp',
					title: 'Timestamp',
					width: 120,
					template: function(row) 
					{
						return row.timestamp;
					}
				},		
				{
					field: 'approved',
					title: 'Status',
					width: 120,
					template: function(row) 
					{
						if(row.approved == 0)
							return 'Not Live';
						else
							return 'Published';
					}
				}, 
				{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 50,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\<a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">\
						<i class="edit-cust-btn la la-cog" data-toggle="modal" id="'+row.testimonials_id+'"></i>\</a>\
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
		xmlhttp.open("GET", "Sec_Api/manage_testimonials.php", true);
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

