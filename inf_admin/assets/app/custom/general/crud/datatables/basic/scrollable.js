"use strict";
var KTDatatablesBasicScrollable = function() {

	var initTable1 = function() {
		var table = $('#kt_table_1');

		// begin first table
		table.DataTable({
			scrollY: '50vh',
			scrollX: true,
			scrollCollapse: true,
			columnDefs: [
			],
		});

		$('#kt_table_1').DataTable( {
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'excel', 'print'
				]
			} );
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesBasicScrollable.init();
});