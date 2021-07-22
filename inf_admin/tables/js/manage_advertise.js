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
					field: 'advertise_id',
					title: 'Advertise ID',
					width: 60,
					template: function(row) 
					{
						return row.advertise_id;
					}
				}, 
				{
					field: 'advertise_name',
					title: 'Advertise Name',
					width: 80,
					template: function(row) 
					{
						return row.advertise_name;
					}
				},
				{
					field: 'advertise_status',
					title: 'Status',
					width: 60,
					template: function(row)
					{
							if(row.advertise_status == 1) return 'Live';
							else return 'Not Live';
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
						var action_val = '\<a title="View Details" class="btn btn-sm btn-clean btn-icon btn-icon-md">\
						<i class="edit-cust-btn la la-eye" data-toggle="modal" id="'+row.advertise_id+'"></i>\</a>';
						
						// if(row.update_permission == 1){
						// 	action_val = action_val.concat('\<a title="Update Listing" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="manage_advertise.php?advertise='+row.advertise_id+'">\
						// 	<i class="edit-cust-btn fa fa-edit"></i>\</a>');
						// }

						if(row.delete_permission == 1){
						action_val = action_val.concat('\<a title="Delete Listing" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="delete_advertise.php?advertise_id='+row.advertise_id+'">\
						<i class="edit-cust-btn fa fa-trash"></i>\</a>');
						}

						if(row.advertise_status == 1){
							action_val = action_val.concat('\<a title="Disapprove Listing" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="remove_advertise.php?advertise_id='+row.advertise_id+'">\
							<i class="edit-cust-btn fa fa-toggle-on"></i>\</a>');
						}	else	{
							action_val = action_val.concat('\<a title="Approve Listing" class="btn btn-sm btn-clean btn-icon btn-icon-md" href="live_advertise.php?advertise_id='+row.advertise_id+'">\
							<i class="edit-cust-btn fa fa-toggle-off"></i>\</a>');
						}

						return action_val;
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
		xmlhttp.open("GET", "Sec_Api/manage_advertise.php", true);
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

