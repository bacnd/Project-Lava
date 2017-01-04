var EditChucvu = function () {
    return {
        //main function to initiate the module
        init: function () {
        	function getBaseUrl() {
        	    var re = new RegExp(/^.*\//);
        	    return re.exec(window.location.href);
        	}
        	
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<a class="save" href=""><i class="fa fa-save"></i></a>&nbsp;&nbsp;<a class="cancel" href=""><i class="fa fa-power-off"></i></a>';
            }

            function saveRow(oTable, nRow) {
            	var aData = oTable.fnGetData(nRow);
                var jqInputs = $('input', nRow);
                var jqTds = $('>td', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 1, true);
                oTable.fnDraw();
                var myString = aData[0]+','+jqInputs[0].value;
                $.ajax({
                	url: getBaseUrl()+'ajax/'+aData[0],
        	     	data: {data: myString},
        	     	type: 'POST',
        	     	success: function(result) {
        	     		jqTds[0].innerHTML = result;
        	            oTable.fnUpdate(
        	            	'<a class="view" title="View" href="'+getBaseUrl()+result+'"><i class="fa fa-eye"></i></a> '+
        	            	'<a class="update" href=""><i class="fa fa-edit"></i></a> '+
        	            	'<a class="delete" href="'+getBaseUrl()+'deletes/'+result+'"><i class="fa fa-trash-o"></i></a>', nRow, 2, false);
        	            }
        	        });
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 2, false);
                oTable.fnDraw();
            }

            var oTable = $('.editable-sample').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 10,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ kết quả trên trang",
                    "sSearch": "Tìm kiếm",
                    "zeroRecords": "Không tìm thấy",
        			"info": "Hiển thị _START_ đến _END_ trên _TOTAL_",
                    "infoEmpty": "Không tìm thấy",
                    "infoFiltered": "(tìm kiếm _MAX_ dòng)",
                    "oPaginate": {
                        "sPrevious": "Trước",
                        "sNext": "Sau"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('.dataTables_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            jQuery('.dataTables_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

            var nEditing = null;

            $('#editable-sample_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                '<a class="update" href=""><i class="fa fa-save"></i></a>', '<a class="cancel" data-mode="new" href=""><i class="fa fa-power-off"></i></a>'
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('.editable-sample a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('.editable-sample a.update').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
            
            $('.editable-sample a.save').live('click', function (e) {
            	e.preventDefault();
            	var nRow 	= $(this).parents('tr')[0];
            	if (nEditing == nRow) {
                    saveRow(oTable, nEditing);
                    nEditing = null;
            	}
            });
        }

    };

}();