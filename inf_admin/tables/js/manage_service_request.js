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
					field: 'request_id',
					title: 'Request ID',
					width: 60,
					template: function(row) 
					{
						return row.request_id;
					}
				}, 
				{
					field: 'person_name',
					title: 'Name',
					width: 80,
					template: function(row) 
					{
						return row.person_name + ' ' + row.last_name;
					}
				}, 
				{
					field: 'phone_no',
					title: 'Phone No',
					width: 80,
					template: function(row) 
					{
						return row.phone_no;
					}
				},		
						
				{
					field: 'email_id',
					title: 'Email ID',
					width: 140,
					template: function(row) 
					{
						return row.email_id;
					},
				}, 
				{
					field: 'property_type',
					title: 'Property Type',
					width: 80,
					template: function(row) 
					{
						return row.property_type;
					},
				},
				{
					field: 'Free_Property_Valuation',
					title: 'Requested Service',
					width: 100,
					template: function(row)
					{
							var requested_service = '';
							var rs_item = 0;
							if(row.Free_Property_Valuation == 1){
								requested_service = requested_service.concat('Free Property Valuation');
								rs_item += 1;
							}
							if(row.Property_Mortgage_Health_Check == 1){
								if(rs_item >= 1){
									requested_service = requested_service.concat(', ');
								}
								requested_service = requested_service.concat('Property Mortgage Health Check');
								rs_item += 1;
							}
							if(row.Rental_Property_Inspection == 1){
								if(rs_item >= 1){
									requested_service = requested_service.concat(', ');
								}
								requested_service = requested_service.concat('Rental Property Inspection');
								rs_item += 1;
							}
							if(row.Free_Rental_Appraisal == 1){
								if(rs_item >= 1){
									requested_service = requested_service.concat(', ');
								}
								requested_service = requested_service.concat('Free Rental Appraisal');
								rs_item += 1;
							}
							return requested_service;
					},
				},
				{
					field: 'communicationMethod',
					title: 'Communication Method',
					width: 100,
					template: function(row)
					{
							return row.communicationMethod;
					},
				},
				{
					field: 'longitude',
					title: 'Location',
					width: 60,
					template: function(row)
					{
							return '<a href="https://maps.google.com/?q=' + row.latitude + ',' + row.longitude + '">Open Map</a>';
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
		xmlhttp.open("GET", "Sec_Api/manage_service_request.php", true);
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

