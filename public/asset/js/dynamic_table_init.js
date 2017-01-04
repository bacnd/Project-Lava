function fnFormatDetails ( oTable, nTr, id )
{
    $.ajax({
		url: getBaseUrl()+'data',
	    data: {data: id},
	    type: 'POST',
	    success: function(result) {
	    	oTable.fnOpen( nTr, result, 'detail' );
	    }
	})
}

function getBaseUrl() {
	var root = window.location.pathname;
	var parts = root.split("/");
	return window.location.protocol + '//' + window.location.host + '/' + parts[1] + '/' ;
}

function getUrl() {
	var root = window.location.pathname;
	var parts = root.split("/");
	return window.location.protocol + '//' + window.location.host + '/' ;
}

$(document).ready(function() {
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="'+ getUrl() +'images/details_open.png">';
    nCloneTd.className = "center"; 

    $('.hidden-table-info thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );

    $('.hidden-table-info tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );

    
});