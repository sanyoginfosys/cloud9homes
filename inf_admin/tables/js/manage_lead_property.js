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
					field: 'property_id',
					title: 'Property ID',
					width: 60,
					template: function(row) 
					{
						return row.property_id;
					}
				}, 
				{
					field: 'property_type',
					title: 'Property Type',
					width: 80,
					template: function(row) 
					{
						return row.property_type;
					}
				}, 
				{
					field: 'transaction',
					title: 'Transaction',
					width: 80,
					template: function(row) 
					{
						return row.transaction;
					}
				},		
						
				{
					field: 'name',
					title: 'Name',
					width: 120,
					template: function(row) 
					{
						return row.name;
					},
				}, 
				{
					field: 'phoneno',
					title: 'Phone No',
					width: 80,
					template: function(row) 
					{
						return row.phoneno;
					},
				},
				{
					field: 'longitude',
					title: 'Location',
					width: 100,
					template: function(row)
					{
							return '<a href="https://maps.google.com/?q=' + row.latitude + ',' + row.longitude + '">Open Map</a>';
					},
				},
				{
					field: 'price',
					title: 'Price',
					width: 100,
					template: function(row)
					{
							return '$ ' + row.price;
					},
				},
				{
					field: 'area',
					title: 'Area',
					width: 60,
					template: function(row)
					{
							return row.area + ' m<sup>2</sup>';
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
					width: 70,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\<a title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md">\
						<i class="edit-cust-btn la la-eye" data-toggle="modal" id="'+row.property_id+'"></i>\</a>\
						\<a title="Approve" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="approve_LeadProperty.php?property_id='+row.property_id+'">\
						<i class="edit-cust-btn la la-location-arrow"></i>\</a>\
						\<a title="Remove" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="delete_LeadProperty.php?property_id='+row.property_id+'" onclick="confirmDelete()">\
						<i class="edit-cust-btn la la-trash"></i>\</a>\
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
		xmlhttp.open("GET", "Sec_Api/manage_lead_property.php", true);
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

