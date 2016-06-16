var TableAdvanced = function () {

    var initTable1 = function () {
        var table = $('#sample_1');

        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        var oTable = table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found",
				"bSort": false
            },
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
        });

        var tableWrapper = $('#sample_1_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        var tableColumnToggler = $('#sample_4_column_toggler');
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

		 /* handle show/hide columns*/
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
    }

	var initTable2 = function () {
        var table = $('#sample_2');

        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
        });

        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            "order": [
                [0, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],

            // set the initial value
            "pageLength": 10,


            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
            // So when dropdowns used the scrollable div should be removed.
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "tableTools": {
                "sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }, {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                }, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
                    "sMessage": "Generated by DataTables"
                }, {
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }]
            }
        });

        var tableWrapper = $('#sample_2_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }

    var initTable2c = function () {
        var table = $('table.multiple');

        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
        });

        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
			"aaSorting": [],


            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"] // change per page values here
            ],

            // set the initial value
           "pageLength": 10,
           "bDestroy": true,

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
            // So when dropdowns used the scrollable div should be removed.
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "tableTools": {
                "sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }, {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                }, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
                    "sMessage": "Generated by DataTables"
                }, {
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }]
            }
        });

        var one = $('#one_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
		var two = $('#two_wrapper');
		var	three = $('#three_wrapper');
        one.find('.dataTables_length select').select2(); // initialize select2 dropdown
		two.find('.dataTables_length select').select2(); // initialize select2 dropdown
		three.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }

    var initTableNotYetScheduled = function () {
        var table = $('table.notyetscheduled');

        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
        });

        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "You have no assigned Jira tickets.",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found.",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

			"aaSorting": [],


            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"] // change per page values here
            ],

            // set the initial value
           "pageLength": 10,
           "bDestroy": true,

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
            // So when dropdowns used the scrollable div should be removed.
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "tableTools": {
                "sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }, {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                }, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
                    "sMessage": "Generated by DataTables"
                }, {
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }]
            }
        });

        var notyetscheduled = $('#notyetscheduled_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        notyetscheduled.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }

	 var assign_table = function () {
        var table = $('#assign_table');

        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
        });

        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
			"bProcessing": true,
			  "ajax": {
                  "url": "Jira/assignGetTicket",
				  "type": "post",
				  "data": function ( d ) {
                      d.release_id = $("#release").val();
                      d.project_id = $("#project").val();
                      d.component = $("#component").val();
                  },
              },
			  "aoColumnDefs": [{
                        "mData": "jira_pkey" , "aTargets": [0]
                    }, {
                        "mData": "release_name", "aTargets": [1]
                    }, {
                        "mData": "summary" , "aTargets": [2]
                    }, {
                        "mData": "component" , "aTargets": [3]
                    }, {
                        "mData": "jira_id",
                        "aTargets": [4],
                        "mRender" : function (data, type, full) {
                            return '<a class="btn blue btn-block btn-sm" data-toggle="modal"  onclick="assign(this);" href="#assign_modal" data-jiraid = "'+data+'" data-jirapkey ="'+full.jira_pkey+'" >  Assign </a>' ;
                        }
					}
                ],
				"aaSorting": []
        });

        var one = $('#assign_table_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        one.find('.dataTables_length select').select2(); // initialize select2 dropdown

		$("#assign_form").on("submit", function(ev){
			var table1 = $
			ev.preventDefault();
			var data = $(this).serialize();

			$.ajax({
                url : "Jira/assignTicket",
                type: "POST",
                data : data,
                success: function(response) {
                    $('#assign_modal').modal('toggle');
                    $('.refreshtable').each(function(ev) {
                        var table = $(this).dataTable();
						table.api().ajax.reload();
                    });
					var conf = confirm('Ticket Assigned Successfully! Are you done with assigning?');
					if(conf == true) {
                        location.reload();
					} else {
                        return false;
                    }
				}
			});
		})

		$('.assign').on('change', function(ev) {
			oTable.api().ajax.reload();
		});

        $('#clear_assign').on('click', function(ev) {
           $('.assign').each(function(ev) {
               $(this).select2('val', '');
               oTable.api().ajax.reload();
			});
		});
    }


	 var reassign_table = function () {
        var table = $('#reassign_table');

        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
        });


        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
			"bProcessing": true,
            "ajax": {
                "url": "Jira/reassignGetTicket",
                "type": "post",
                "data": function ( d ) {
                    d.release_id = $("#release2").val();
					d.project_id = $("#project2").val();
					d.component = $("#component2").val();
                },
            },

			"aoColumnDefs": [{
                "mData": "jira_pkey" , "aTargets": [0]
            }, {
                "mData": "release_name", "aTargets": [1]
            }, {
                "mData": "summary" , "aTargets": [2]
            }, {
                "mData": "assignee" , "aTargets": [3]
            }, {
                "mData": "jira_id",
                "aTargets": [4],
                "mRender" : function (data, type, full) {
                    return '<a class="btn btn-danger btn-block btn-sm" data-toggle="modal"  onclick="reassign(this);" href="#reassign_modal" data-jiraid = "'+data+'" data-jirapkey ="'+full.jira_pkey+'" > reassign </a>';
                }
            }],
			"aaSorting": []
        });

        var one = $('#reassign_table_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        one.find('.dataTables_length select').select2(); // initialize select2 dropdown

		$("#reassign_form").on("submit", function(ev) {
			var table1 = $
			ev.preventDefault();
			var data = $(this).serialize();
			$.ajax({
                url : "Jira/assignTicket",
				type: "POST",
				data : data,
				success: function(response) {
					$('#reassign_modal').modal('toggle');
					alert( 'Re-Assigned Successfully');
					$('.refreshtable').each(function(ev) {
                        var table = $(this).dataTable();
						table.api().ajax.reload();
                    });
                    var conf = confirm('Re-Assigned Successfully! Finish Re-Assigning?');
					if(conf == true) {
                        location.reload();
					} else {
                        return false;
					}
				}
			});
		})

        $('.reassign').on('change', function(ev){
			oTable.api().ajax.reload();
		});
        $('#clear_assign2').on('click', function(ev) {
            $('.reassign').each(function(ev) {
                $(this).select2('val', '');
                oTable.api().ajax.reload();
            });
        });
    }

    var initTable3 = function (i) {
        var table = $('#sample_3_' + i);

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-md default",
                "disabled": "btn btn-md default disabled"
            },
            "collection": {
                 "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        /* Formatting function for row details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = "<div style='margin-top:10px'><div class='col-md-3'>" ;
			sOut += "<table class='table table-bordered table-striped'>";
			sOut += '<thead>';
            sOut += '<tr><th>Status</th> <th></th></tr>';
			sOut += '</thead>';
			sOut += '<tbody>';
            sOut += '<tr><td>Status</td> <td>Existing</td></tr>';
			sOut += '<tr><td>Date Last Change</td> <td>11/11/2015</td></tr>';
			sOut += '<tr><td>Tester</td> <td>Cyril Penacuba</td></tr>';
			sOut += '<tr><td>Comment</td> <td></td></tr>';
			sOut += '</tbody>';
            sOut += '</table>';

			sOut += "<table class='table table-bordered table-striped'>";
			sOut += '<thead>';
            sOut += '<tr><th>Checker</th> <th></th></tr>';
			sOut += '</thead>';
			sOut += '<tbody>';
            sOut += '<tr><td>Priority</td> <td>High</td></tr>';
			sOut += '<tr><td>Date Reviewed</td> <td>11/11/2015</td></tr>';
			sOut += '<tr><td>Reviewer</td> <td>Joseph Castaneda</td></tr>';
			sOut += '<tr><td>Comment</td> <td></td></tr>';
			sOut += '</tbody>';
            sOut += '</table>';
			sOut += '</div>';

			var sOut2 = "<div class='col-md-5'><table class='table table-bordered table-striped'>";
			sOut2 += '<thead>';
            sOut2 += '<tr><th>#</th><th>Procedure</th><th>#</th><th>Expected Results</th></tr>';
			sOut2 += '</thead>';
			sOut2 += '<tbody>';
            sOut2 += '<tr><td>1</td><td>Go to ISSLink: http://link.qa.issapps.com/login/login/ and login using an entitled account </td><td>1</td>'
					+ '<td>Should be able to load ISSLink </td></tr>'
			sOut2 += '<tr><td>2</td><td>Provide Username and Password and Click Login</td><td>2</td>'
					+ '<td> Should be able to login successfully and redirect to home</td></tr>'
			sOut2 += '<tr><td>3</td><td>Besides Recover Max header on the homepage click Go button</td><td>3</td>'
					+ '<td>Should display New Cases</td></tr>'

			sOut2 += '</tbody>';

            sOut2 += '</table></div>';

			var sOut3 = "<div style='margin-top:10px'><div class='col-md-4'><table class='table table-bordered table-striped'>";
			sOut3 += '<thead>';
            sOut3 += '<tr><th>Automation Details</th> <th></th></tr>';
			sOut3 += '</thead>';
			sOut3 += '<tbody>';
            sOut3 += '<tr><td>Developed</td> <td>Edison Paulo B Suero</td></tr>';
			sOut3 += '<tr><td>Date Finished</td> <td>11/11/2015</td></tr>';
			sOut3 += '<tr><td>Status</td> <td>Completed</td></tr>';
			sOut3 += '<tr><td>Comment</td> <td></td></tr>';
			sOut3 += '<tr><td>AT Script Location</td> <td>TC_RecoverMaxNewCases_001_TS_001</td></tr>';

			sOut3 += '</tbody>';

            sOut3 += '</table></div>';

            return sOut + sOut2 + sOut3;
        }

        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement('th');
        nCloneTh.className = "table-checkbox";

        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        table.find('thead tr').each(function () {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        table.find('tbody tr').each(function () {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        /*
         * Initialize DataTables, with no sorting on the 'details' column
         */
        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            "columnDefs": [{
                "orderable": false,
                "targets": [0]
            }],
            "order": [
                [1, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
            "tableTools": {
               "sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
               "aButtons": [{
                   "sExtends": "pdf",
                   "sButtonText": "PDF"
               }, {
                   "sExtends": "csv",
                   "sButtonText": "CSV"
               }, {
                   "sExtends": "xls",
                   "sButtonText": "Excel"
               }, {
                   "sExtends": "print",
                   "sButtonText": "Print",
                   "sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
                   "sMessage": "Generated by DataTables"
               }, {
                   "sExtends": "copy",
                   "sButtonText": "Copy"
               },

               {
                   "sExtends": "text",
                   "sButtonText": "Expand All",
                   "fnClick": function ( button, config ) {
                       $('tbody td .row-details').each( function() {
                           if( !oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
                               $( this ).click();
                           }
                       })
                   }
               },
               {
                   "sExtends": "text",
                   "sButtonText": "Collapse All",
                   "fnClick": function ( button, config ) {
                       $('tbody td .row-details').each( function() {
                           if( oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
                               $( this ).click();
                           }
                       })
                   }
               }
               ]
           }
        });
        var tableWrapper = $('#sample_3_' + i + '_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
    }

    var initJiraTable = function (i) {
        var table = $('#jira_ticket_' + i);

        $.extend(true, $.fn.DataTable.TableTools.classes, {
         "container": "btn-group tabletools-dropdown-on-portlet",
         "buttons": {
             "normal": "btn btn-md default",
             "disabled": "btn btn-md default disabled"
         },
         "collection": {
            "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
        }
     });

        /* Formatting function for row details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = "<div style='margin-top:10px'><div class='col-md-3'>" ;
			sOut += "<table class='table table-bordered table-striped'>";
			sOut += '<thead>';
            sOut += '<tr><th>Status</th> <th></th></tr>';
			sOut += '</thead>';
			sOut += '<tbody>';
            sOut += '<tr><td>Status</td> <td>Existing</td></tr>';
			sOut += '<tr><td>Date Last Change</td> <td>11/11/2015</td></tr>';
			sOut += '<tr><td>Tester</td> <td>Cyril Penacuba</td></tr>';
			sOut += '<tr><td>Comment</td> <td></td></tr>';
			sOut += '</tbody>';
            sOut += '</table>';

			sOut += "<table class='table table-bordered table-striped'>";
			sOut += '<thead>';
            sOut += '<tr><th>Checker</th> <th></th></tr>';
			sOut += '</thead>';
			sOut += '<tbody>';
            sOut += '<tr><td>Priority</td> <td>High</td></tr>';
			sOut += '<tr><td>Date Reviewed</td> <td>11/11/2015</td></tr>';
			sOut += '<tr><td>Reviewer</td> <td>Joseph Castaneda</td></tr>';
			sOut += '<tr><td>Comment</td> <td></td></tr>';
			sOut += '</tbody>';
            sOut += '</table>';
			sOut += '</div>';

			var sOut2 = "<div class='col-md-5'><table class='table table-bordered table-striped'>";
			sOut2 += '<thead>';
            sOut2 += '<tr><th>#</th><th>Procedure</th><th>#</th><th>Expected Results</th></tr>';
			sOut2 += '</thead>';
			sOut2 += '<tbody>';
            sOut2 += '<tr><td>1</td><td>Go to ISSLink: http://link.qa.issapps.com/login/login/ and login using an entitled account </td><td>1</td>'
					+ '<td>Should be able to load ISSLink </td></tr>'
			sOut2 += '<tr><td>2</td><td>Provide Username and Password and Click Login</td><td>2</td>'
					+ '<td> Should be able to login successfully and redirect to home</td></tr>'
			sOut2 += '<tr><td>3</td><td>Besides Recover Max header on the homepage click Go button</td><td>3</td>'
					+ '<td>Should display New Cases</td></tr>'

			sOut2 += '</tbody>';

            sOut2 += '</table></div>';

			var sOut3 = "<div style='margin-top:10px'><div class='col-md-4'><table class='table table-bordered table-striped'>";
			sOut3 += '<thead>';
            sOut3 += '<tr><th>Automation Details</th> <th></th></tr>';
			sOut3 += '</thead>';
			sOut3 += '<tbody>';
            sOut3 += '<tr><td>Developed</td> <td>Edison Paulo B Suero</td></tr>';
			sOut3 += '<tr><td>Date Finished</td> <td>11/11/2015</td></tr>';
			sOut3 += '<tr><td>Status</td> <td>Completed</td></tr>';
			sOut3 += '<tr><td>Comment</td> <td></td></tr>';
			sOut3 += '<tr><td>AT Script Location</td> <td>TC_RecoverMaxNewCases_001_TS_001</td></tr>';

			sOut3 += '</tbody>';

            sOut3 += '</table></div>';

            return sOut + sOut2 + sOut3;
        }

        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement('th');
        nCloneTh.className = "table-checkbox";

        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        table.find('thead tr').each(function () {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        table.find('tbody tr').each(function () {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        /*
         * Initialize DataTables, with no sorting on the 'details' column
         */
        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            "columnDefs": [{
                "orderable": false,
                "targets": [0]
            }],
            "order": [
                [1, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
            "tableTools": {
               "sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
               "aButtons": [{
                   "sExtends": "pdf",
                   "sButtonText": "PDF"
               }, {
                   "sExtends": "csv",
                   "sButtonText": "CSV"
               }, {
                   "sExtends": "xls",
                   "sButtonText": "Excel"
               }, {
                   "sExtends": "print",
                   "sButtonText": "Print",
                   "sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
                   "sMessage": "Generated by DataTables"
               }, {
                   "sExtends": "copy",
                   "sButtonText": "Copy"
               },

               {
                   "sExtends": "text",
                   "sButtonText": "Expand All",
                   "fnClick": function ( button, config ) {
                       $('tbody td .row-details').each( function() {
                           if( !oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
                               $( this ).click();
                           }
                       })
                   }
               },
               {
                   "sExtends": "text",
                   "sButtonText": "Collapse All",
                   "fnClick": function ( button, config ) {
                       $('tbody td .row-details').each( function() {
                           if( oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
                               $( this ).click();
                           }
                       })
                   }
               }
               ]
           }
        });
        var tableWrapper = $('#jira_ticket_' + i + '_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
    }

	var initTable3c = function () {
        var table = $('#jira_ticket_table');
		   $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });

        /* Formatting function for row details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = "<div style='margin-top:10px'><div class='col-md-4'>" ;
			sOut += "<table class='table table-bordered table-striped'>";
			sOut += '<thead>';
            sOut += '<tr><th>QBIT Status</th> <th></th></tr>';
			sOut += '</thead>';
			sOut += '<tbody>';
            sOut += '<tr><td>Estimated(Days)</td> <td>'+aData[6]+'</td></tr>';
			sOut += '<tr><td>Planned Start</td> <td>'+aData[10]+'</td></tr>';
			sOut += '<tr><td>Planned End</td> <td>'+aData[11]+'</td></tr>';
			sOut += '<tr><td>Assigned</td> <td>'+aData[12]+'</td></tr>';
			sOut += '<tr><td>Actual Start</td> <td>'+aData[13]+'</td></tr>';
			sOut += '<tr><td>Actual End</td> <td>'+aData[14]+'</td></tr>';
			sOut += '<tr><td>Actual (Days)</td> <td>'+aData[15]+'</td></tr>';
			sOut += '</tbody>';
            sOut += '</table>';

			sOut += "<table class='table table-bordered table-striped'>";
			sOut += '<thead>';
            sOut += '<tr><th>Test Cases Details</th> <th></th></tr>';
			sOut += '</thead>';
			sOut += '<tbody>';
            sOut += '<tr><td># of Test Scenarios</td> <td>'+aData[16]+'</td></tr>';
			sOut += '<tr><td>Passed</td> <td>'+aData[17]+'</td></tr>';
			sOut += '<tr><td>Failed</td> <td>'+aData[18]+'</td></tr>';
			sOut += '<tr><td>Pending</td> <td>'+aData[19]+'</td></tr>';
			sOut += '<tr><td>Not Started</td> <td>'+aData[20]+'</td></tr>';
			sOut += '<tr><td>Test Complete%</td> <td>'+aData[21]+'</td></tr>';
			sOut += '</tbody>';
            sOut += '</table>';
			sOut += '</div>';

			var sOut2 = "<div class='col-md-4'><table class='table table-bordered table-striped'>";
			sOut2 += '<thead>';
            sOut2 += '<tr><th>Jira Status</th><th></th></tr>';
			sOut2 += '</thead>';
			sOut2 += '<tbody>';
            sOut2 += '<tr><td>Status</td><td>'+aData[4]+'</td>';
			sOut2 += '<tr><td>Resolution</td><td>'+aData[22]+'</td>';
			sOut2 += '<tr><td>Assignee</td><td>'+aData[23]+'</td>';
			sOut2 += '<tr><td>Reporter</td><td>'+aData[24]+'</td>';
			sOut2 += '<tr><td>Resource</td><td>'+aData[25]+'</td>';
			sOut2 += '<tr><td>Tester</td><td>'+aData[26]+'</td>';
			sOut2 += '<tr><td>Issue Type</td><td>'+aData[27]+'</td>';
			sOut2 += '<tr><td>Priority</td><td>'+aData[28]+'</td>';
			sOut2 += '<tr><td>Fix Version</td><td>'+aData[29]+'</td>';
			sOut2 += '<tr><td>Labels</td><td>'+aData[30]+'</td>';
			sOut2 += '<tr><td>Affects Version/s</td><td></td>';
			sOut2 += '<tr><td>Updated</td><td>'+aData[32]+'</td>';
			sOut2 += '<tr><td>Created</td><td>'+aData[33]+'</td>';
			sOut2 += '<tr><td>Changelist ID</td><td>'+aData[34]+'</td>';
			sOut2 += '<tr><td>Linked Issues</td><td>'+aData[35]+'</td>';
			sOut2 += '<tr><td>Targeted Version</td><td>'+aData[36]+'</td>';
			sOut2 += '<tr><td>Development LOE - Database</td><td>'+aData[37]+'</td>';
			sOut2 += '<tr><td>Development LOE - Others</td><td>'+aData[38]+'</td>';
			sOut2 += '<tr><td>Total</td><td>'+aData[39]+'</td>';
			sOut2 += '</tbody>';
            sOut2 += '</table></div>';

			var sOut3 = "<div class='col-md-4'>";
			sOut3 += "<table class='table table-bordered table-striped'>";
			sOut3 += '<thead>';
            sOut3 += '<tr><th>QA Schedule - TC Creation</th><th></th></tr>';
			sOut3 += '</thead>';
			sOut3 += '<tbody>';
            sOut3 += '<tr><td>FLOE</td><td>'+aData[40]+'</td>';
			sOut3 += '<tr><td>Complexity</td><td>'+aData[41]+'</td>';
			sOut3 += '<tr><td>TC Creation (Days)</td><td>'+aData[42]+'</td>';
			sOut3 += '</tbody>';
            sOut3 += '</table>';

			sOut3 += "<table class='table table-bordered table-striped'>";
			sOut3 += '<thead>';
            sOut3 += '<tr><th>QA Schedule - TC Execution</th><th></th></tr>';
			sOut3 += '</thead>';
			sOut3 += '<tbody>';
            sOut3 += '<tr><td>FLOE</td><td>'+aData[43]+'</td>';
			sOut3 += '<tr><td>Complexity</td><td>'+aData[44]+'</td>';
			sOut3 += '<tr><td>TC Execution (Days)</td><td>'+aData[45]+'</td>';
			sOut3 += '</tbody>';
            sOut3 += '</table>';

			sOut3 += "<table class='table table-bordered table-striped'>";
			sOut3 += '<thead>';
            sOut3 += '<tr><th>Job Process</th><th></th></tr>';
			sOut3 += '</thead>';
			sOut3 += '<tbody>';
            sOut3 += '<tr><td>Job Details</td><td>'+aData[46]+'</td>';
			sOut3 += '<tr><td>Job Process (Days)</td><td>'+aData[47]+'</td>';
			sOut3 += '</tbody>';
            sOut3 += '</table>';

			sOut3 +='</div>';

            return sOut + sOut2  + sOut3;
        }

        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement('th');
        nCloneTh.className = "table-checkbox";

        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        table.find('thead tr').each(function () {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        table.find('tbody tr').each(function () {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        /*
         * Initialize DataTables, with no sorting on the 'details' column
         */
        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "aaSorting": [],
            "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }, {
    				"targets": [9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47],
                    "visible": false,
                    "searchable": true
    			}
			],

            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
			 "dom": "<'row' r<'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
			 "tableTools": {
                "sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
    					"sExtends": "text",
    					"sButtonText": "Expand All",
    					"fnClick": function ( button, config ) {
    						$('tbody td .row-details').each( function() {
    							if( !oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
    								$( this ).click();
    							}
    						})
    					}
    				}, {
    					"sExtends": "text",
    					"sButtonText": "Collapse All",
    					"fnClick": function ( button, config ) {
    						$('tbody td .row-details').each( function() {
    							if( oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
    								$( this ).click();
    							}
    						})
    					}
    				}
				]
            }

        });
        var tableWrapper = $('#jira_ticket_table_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
    }

	var initTable3c_editable = function () {
		var table = $('#manage_test_case_table');
		   $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-dropdown-on-portlet",
            "buttons": {
                "normal": "btn btn-md default",
                "disabled": "btn btn-md default disabled"
            },
            "collection": {
                "container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
            }
        });


        /* Formatting function for row details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
           var sOut = "<div style='margin-top:10px'><div class='col-md-3'>" ;
			sOut += "<table class='table table-bordered table-striped'>";
			sOut += '<thead>';
            sOut += '<tr><th>Status</th> <th></th></tr>';
			sOut += '</thead>';
			sOut += '<tbody>';

            sOut += "<tr><td>Status</td> <td>"+aData[9]+"</td></tr>";
			sOut += '<tr><td>Date Last Change</td> <td>'+aData[10]+'</td></tr>';
			sOut += '<tr><td>Tester</td> <td>'+aData[11]+'</td></tr>';
			sOut += '<tr><td>Comment</td> <td>'+aData[12]+'</td></tr>';
			sOut += '</tbody>';
            sOut += '</table>';

			sOut += "<table class='table table-bordered table-striped'>";
			sOut += '<thead>';
            sOut += '<tr><th>Checker</th> <th></th></tr>';
			sOut += '</thead>';
			sOut += '<tbody>';
			sOut += '<tr><td>Reviewed</td> <td>'+aData[13]+'</td></tr>';
            sOut += '<tr><td>Priority</td> <td>'+aData[14]+'</td></tr>';
			sOut += '<tr><td>Date Reviewed</td> <td>'+aData[15]+'</td></tr>';
			sOut += '<tr><td>Reviewer</td> <td>'+aData[16]+'</td></tr>';
			sOut += '<tr><td>Comment</td> <td>'+aData[17]+'</td></tr>';
			sOut += '</tbody>';
            sOut += '</table>';
			sOut += '</div>';

			var sOut2 = "<div class='col-md-5'><table class='table table-bordered table-striped'>";
			sOut2 += '<thead>';
            sOut2 += '<tr><th>Procedure</th><th>Expected Results</th></tr>';
			sOut2 += '</thead>';
			sOut2 += '<tbody>';
            sOut2 += '<tr><td width=50%>'+aData[18]+'</td><td width=50%>'+aData[19]+'</td></tr>';
			sOut2 += '</tbody>';
            sOut2 += '</table></div>';

			var sOut3 = "<div style='margin-top:10px'><div class='col-md-4'><table class='table table-bordered table-striped'>";
			sOut3 += '<thead>';
            sOut3 += '<tr><th>Automation Details</th> <th></th></tr>';
			sOut3 += '</thead>';
			sOut3 += '<tbody>';
            sOut3 += '<tr><td>Developed</td> <td>'+aData[20]+'</td></tr>';
			sOut3 += '<tr><td>Date Finished</td> <td>'+aData[21]+'</td></tr>';
			sOut3 += '<tr><td>Status</td> <td>'+aData[22]+'</td></tr>';
			sOut3 += '<tr><td>Comment</td><td>'+aData[23]+'</td></tr>';
			sOut3 += '<tr><td>AT Script Location</td> <td>'+aData[24]+'</td></tr>';

			sOut3 += '</tbody>';

            sOut3 += '</table></div>';

            return sOut + sOut2 + sOut3;
        }

        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement('th');
        nCloneTh.className = "table-checkbox";

        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        table.find('thead tr').each(function () {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        table.find('tbody tr').each(function () {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        /*
         * Initialize DataTables, with no sorting on the 'details' column
         */
        var oTable = table.dataTable({


            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
			 destroy: true,
            "columnDefs": [{
                "orderable": false,
                "targets": [0]
            },
			{
				"targets": [ 9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24 ],
                "visible": false,
                "searchable": true
			}

			],
            "order": [
                [1, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
			  "dom": "<'row' <'col-md-12'T>><'row'<'col-md-6' <'toolbar'>><'col-md-6'f>r><'table-scrollable't><'row'<'col-md-6 col-sm-12' l><'col-md-6 col-sm-12' p> <'col-md-5'><'col-md-6'i>>", // horizobtal scrollable datatable
			  // "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"
			 "tableTools": {
                "sSwfPath": "assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [/*{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }, {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                }, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                },*/ {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
                    "sMessage": "Generated by DataTables"
                }, {
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }, {
					"sExtends": "text",
					"sButtonText": "Expand All",
					"fnClick": function ( button, config ) {
						$('tbody td .row-details').each( function() {
							if( !oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
								$( this ).click();
							}
						})
					}
				},
				{
					"sExtends": "text",
					"sButtonText": "Collapse All",
					"fnClick": function ( button, config ) {
						$('tbody td .row-details').each( function() {
							if( oTable.fnIsOpen( $(this).parents('tr')[0] ) ){
								$( this ).click();
							}
						})
					}
				}
				]
            }

        });

        var tableWrapper = $('#manage_test_case_table_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');

            }
        });

		$('#enable').on('click', function () {

        $('tbody td .row-details').each( function() {
            if(!oTable.fnIsOpen( $(this).parents('tr')[0])) {
                $( this ).click();
            }
        });

		$('#manage_test_case_table .editable').editable('toggleDisabled');
        });
    }

    var manage_smoke_test = function () {
        var table = $('table.manage_smoke_test');
        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "scrollX": true,
            "language": {
                "aria": {
                    "sortAscending" : ": activate to sort column ascending",
                    "sortDescending" : ": activate to sort column descending"
                },
                "emptyTable" : "No data available in table",
                "info" : "Showing _START_ to _END_ of _TOTAL_ records",
                "infoEmpty" : "No records found",
                "infoFiltered" : "(filtered1 from _MAX_ total records)",
                "lengthMenu" : " _MENU_ records",
                "paging" : {
                    "previous" : "Prev",
                    "next" : "Next"
                },
                //"search" : "Search:",
                "zeroRecords" : "No matching records found"
            },
            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
            // So when dropdowns used the scrollable div should be removed.
            "sDom" : '<"H"lr>t<"F"ip>',
            //"dom" : "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'><'col-md-7 col-sm-12'p>>",
            "bStateSave" : true, // save datatable state(pagination, sort, etc) in cookie.
            "lengthMenu" : [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength" : 5,
            "columnDefs" : [{  // set default column settings
                'orderable' : false,
                'targets' : [0]
            }, {
                "searchable" : false,
                "targets" : [0]
            }],
            "order" : [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#manage_smoke_test_wrapper');
		var gc = table.find('.group-checkable');

        jQuery(gc).each( function () {
            var gct = $(this);
      		var total = $('.' + gct.val()).length - 1;
      		var c = $('.' + gct.val() + ':checked').length;
      		if(total == c) {
      			gct.attr('checked', true);
      		} else {
      			gct.attr('checked', false);
      		}
      		jQuery.uniform.update(gct);
        });

        table.find('.group-checkable').change(function () {
            var component_cb = $(this).val();
            var set = $('.'+component_cb).attr('checked','checked');
            var checked = jQuery(this).is(":checked");

            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });

            jQuery.uniform.update(set);
			document.getElementById('checkedCount').innerHTML = $('input.checkboxes:checked').length;
        });

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

		$( "#apply_changes" ).click( function() {
			var getUnselectedCB = [];
			var b_id = document.getElementById("b_id").value;
			var pr_id = document.getElementById("pr_id").value;
			var p_id = document.getElementById("project_id").value;
			$('.manage_smoke_test').each(function() {
			var currTable = $(this).dataTable();
			var rowcollection =  currTable.$(".checkboxes:checked", {"page": "all"});
			var cbarray = [];

			rowcollection.each( function(index,elem) {
    			var checkbox_value = $(elem).val();
    			cbarray.push({cbarray:checkbox_value});
    			getUnselectedCB.push({cbarray:checkbox_value});
			});

            var id = $(this).parent().find('.table_component').val();
            var jsonString = JSON.stringify(cbarray);

			$.ajax({
				url : "/WEBApp/public/SmokeTest/include_smoketest",
				type: "POST",
				data : {
                    b_id : b_id,
                    pr_id : pr_id,
                    cbarray : cbarray
                },
				success: function(data) {
                    alert("Test cases included to smoke test successfully.");
				}
			});
		});

        $.ajax({
            url : "/WEBApp/public/SmokeTest/remove_smoketest",
            type : "POST",
            data : {
                b_id : b_id,
                pr_id : pr_id,
                project_id : p_id,
                check : getUnselectedCB
            },
            success: function(data) {
					alert(data);
				}
			});
		});

		$('input.checkboxes').on('change', function () {
    		document.getElementById('checkedCount').innerHTML = $('input.checkboxes:checked').length;

    		var gc = table.find('.group-checkable');

            jQuery(gc).each(function () {
                var gct = $(this);
    			var total = $('.'+gct.val()).length ;
    			var c = $('.'+gct.val()+':checked').length;
    			if(total == c) {
    				gct.attr('checked', true);
    			} else {
    				gct.attr('checked', false);
    			}
    			jQuery.uniform.update(gct);
            });
		});

		$('.component_button').on('click', function() {
			$("#init").hide();
			$(".hide_component_table").hide();
			$("#hide_table").show();
			var btext = $(this).text();
			$('.component_text').text('Current: ' + btext);
			$("." + btext).show();
		});
	}


    var initTable4 = function () {
        var table = $('#sample_4');

        /* Formatting function for row expanded details */
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table>';
            sOut += '<tr><td>Platform(s):</td><td>' + aData[2] + '</td></tr>';
            sOut += '<tr><td>Engine version:</td><td>' + aData[3] + '</td></tr>';
            sOut += '<tr><td>CSS grade:</td><td>' + aData[4] + '</td></tr>';
            sOut += '<tr><td>Others:</td><td>Could provide a link here</td></tr>';
            sOut += '</table>';

            return sOut;
        }

        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement('th');
        nCloneTh.className = "table-checkbox";

        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        table.find('thead tr').each(function () {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        table.find('tbody tr').each(function () {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            "columnDefs": [{
                "orderable": false,
                "targets": [0]
            }],
            "order": [
                [1, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
        });

        var tableWrapper = $('#sample_4_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        var tableColumnToggler = $('#sample_4_column_toggler');

        /* modify datatable control inputs */
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });

        /* handle show/hide columns*/
        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
    }

    var initTable5 = function () {

        var table = $('#sample_5');

        /* Fixed header extension: http://datatables.net/extensions/scroller/ */

        var oTable = table.dataTable({
            "dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // datatable layout without  horizobtal scroll
            "scrollY": "300",
            "deferRender": true,
            "order": [
                [0, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10 // set the initial value
        });


        var tableWrapper = $('#sample_5_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }

    var initTable6 = function () {

        var table = $('table.atst_table');
        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            /*"order": [
                [0, 'asc']
            ],*/
            "bStateSave" : true,
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10, // set the initial value,
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
                }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ]
        });

        var tableWrapper = $('#atst_table_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

        var gc = table.find('.group-checkable');

        jQuery(gc).each( function () {
            var gct = $(this);
            var total = $('.tid').length - 1;
            var c = $('.tid:checked').length;
            if(total == c) {
                gct.attr('checked', true);
            } else {
                gct.attr('checked', false);
            }
            jQuery.uniform.update(gct);
        });

        table.find('.group-checkable').change(function() {
            var set = $('.tid').attr('checked', 'checked');
            var checked = jQuery(this).is(":checked");

            jQuery(set).each(function() {
                if(checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

		$('#atst').on('submit', function (e) {
			e.preventDefault();
			var cbarray = [];

			//var currTable = $("#atst_table").dataTable();
			var rowcollection = oTable.$(".tid:checked", {"page": "all"});

			rowcollection.each(function(index,elem){
				var checkbox_value = $(elem).val();
				cbarray.push(checkbox_value);
			});
            console.log(JSON.stringify(cbarray));

			var formdata = $("#atst").serializeArray();

            var release_id = $("select[name='release_id']").val();
            var browser_id = $("input:radio[name='browser']:checked").val();
            var execution_id = $("input[name='exec_id']").val();

            console.log("Release ID: " + release_id +
                    "\nBrowser ID: " + browser_id +
                    "\nExecution ID: " + execution_id);

            if(cbarray.length == 0) {
                alert("Cannot apply changes. No test case is selected.");
            } else {
                openModal();
                $.ajax({
                    url : "Project/addToSmokeTest",
                    type : "POST",
                    data : {
                        tc : cbarray,
                        release_id : formdata[1].value,
                        browser_id : formdata[2].value,
                        exec_id : formdata[3].value
                    },
                    success : function(res) {
                        closeModal();
                        console.log("res: " + res);
                        var jsonData = JSON.parse(res);
                        console.log("jsonData: " + jsonData);
                        var project_name = jsonData.project_name ;
                        var release_name = jsonData.release_name ;
                        var browser_name = jsonData.browser_name ;
                        var conf = confirm('Applied to SmokeTest! Proceed to SmokeTest?');
                        if(conf == true) {
                            window.location = "SmokeTest/Component/" + project_name + "/" + release_name + "/" + browser_name ;
                        }
                    },
                    error : function(res) {
                        alert('Please select atleast one test case and a browser.');
                    }
                });
            }            
		});
    }

    function updateDataTableSelectAllCtrl(table) {
        var $table = table.table().node();
        var $chkbox_all = $('tbody input[type="checkbox"]', $table);
        var $chkbox_checked = $('tbody input[type="checkbox"]:checked', $table);
        var chkbox_select_all = $('thead input[name="select_all"]', $table).get(0);

        if($chkbox_checked.length === 0) {
            chkbox_select_all.checked = false;
            if('indeterminate' in chkbox_select_all){
                chkbox_select_all.indeterminate = false;
            } else if ($chkbox_checked.length === $chkbox_all.length) {
                chkbox_select_all.checked = true;
                if('indeterminate' in chkbox_select_all) {
                    chkbox_select_all.indeterminate = false;
                }
            } else {
                chkbox_select_all.checked = true;
                if('indeterminate' in chkbox_select_all) {
                    chkbox_select_all.indeterminate = true;
                }
            }
        }
    }

    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }

            console.log('me 1');

            initTable1();
            initTable2();
			initTable2c();
            initTableNotYetScheduled();
			initTable3c();
			initTable3c_editable();
			assign_table();
			reassign_table();
			manage_smoke_test();
            initTable4();
            initTable5();
            initTable6();

            console.log('me 2');
        }

    };

}();
