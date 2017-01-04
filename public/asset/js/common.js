BASE = window.location.protocol + '//' + window.location.host + '/';
var root = window.location.pathname;
var parts = root.split("/");
if(parts[0] == 'mgmsoft') {
	BASE = BASE + mgmsoft + '/';
}

$('.addRow').live('click', function(){
	var $prevTr = $(this).closest('tr').prev('tr');
	var $clone = $prevTr.clone().find('input').val('').end();
	var inputs=['input', 'select'];
	for (var index in inputs) {
		$clone.find(inputs[index]).each(function() {
			//set name
			var nameIndex = $(this).attr('name').replace(/[^0-9]/g, '');
			var newName = $(this).attr('name').replace(/[0-9]/g, parseInt(nameIndex)+1);
			$(this).attr('name', newName);
		});
	}
	$clone.removeAttr('id');
	$prevTr.after($clone);
	return false;
});

//change form mau
$('.formMau').change(function(){
	var maHang=$(this).val();
	$.ajax({
		type: 'GET',
		url: getUrl() + 'loadformmau/' + maHang,
		//data: {'mahang':maHang},
		async: false,
		success: function(data) {
			$('#tempData').html(data);
			$('#container .table.result').html( $('#tempData .table.result').html() );
			$('#tempData').empty();
			//$('#container .table.result .ActualCosting').change();
			$('.ActualCosting').each(function(){
				loadArticle($(this));
			});
		},
		error: function(e) {
		}
	});
});

$('.deleteRow').live('click', function(){
	$(this).closest('tr').remove();
	return false;
});

//change form mau
$('.ActualCosting').live('change', function(){
	loadArticle($(this));
});
function loadArticle(ele)
{
	var loaiNpl=ele.val();
	var index=ele.attr('name').replace(/[^0-9]/g, '');
	$.ajax({
		type: 'POST',
		url: BASE + 'formmau/loadnpl/' + loaiNpl,
		data: {'index':index},
		async: false,
		success: function(data) {
			var articleVal = $('.cArticle:eq(' +index + ')').val();
			$('.Article:eq(' +index + ')').html(data);
			$('.cArticle:eq(' +index + ')').val(articleVal);
			//$('.cArticle:eq(' +index + ')').change();
		},
		error: function(e) {

		}
	});
}

//change loai ton npl
$('.cArticle').live('change', function(){
	loadDinhMucGiaNCC( $(this) );
});
//lay dinh muc
function loadDinhMucGiaNCC(ele)
{
	var index=ele.attr('name').replace(/[^0-9]/g, '');
	var maLoaiNpl=$('.ActualCosting:eq(' +index + ')').val();
	var maHang=$('.maHang').val();

	var nplton=ele.find('option:selected').text();
	var maNplTon = ele.val();
	var arrLoaiNPL = nplton.split(" - ");
	var kho=arrLoaiNPL[2];

	$.ajax({
		type: 'POST',
		url: BASE + 'formmau/loadinfonpl/',
		data: {'index':index, 'mahang': maHang, 'loainpl': maLoaiNpl, 'nplton': maNplTon, 'kho':kho},
		dataType: 'json',
		async: false,
		success: function(data) {
			$('.Costing:eq(' +index + ')').val(data.costing);
			$('.Price:eq(' +index + ')').val(data.price);
			$('.Supplier:eq(' +index + ')').val(data.supplier);
		},
		error: function(e) {

		}
	});
}

function getUrl() {
    //var re = new RegExp(/^.*\//);
    //return re.exec(window.location.href);
	var root = window.location.pathname;
	var parts = root.split("/");
	if( (parts.length == 4 && Number.isInteger( parseInt(parts[3]) ) )
	|| (parts.length == 3 && !Number.isInteger( parseInt(parts[3]) ) )) {
		return window.location.protocol + '//' + window.location.host + '/' + parts[1] + '/';
	}
	return window.location.protocol + '//' + window.location.host + '/' + parts[1] + '/' + parts[2] + '/';
}

/*$(document).ready(function() {
	$.fn.dataTableExt.sErrMode = 'throw';
});*/