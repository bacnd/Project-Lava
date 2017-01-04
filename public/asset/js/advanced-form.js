//date picker start
if (top.location != location) {
    top.location.href = document.location.href ;
}
$(function(){
    window.prettyPrint && prettyPrint();
    $('.default-date-picker').datepicker({
        format: 'mm-dd-yyyy'
    });
    $('.dpYears').datepicker();
    $('.dpMonths').datepicker();


    var startDate = new Date(2012,1,20);
    var endDate = new Date(2012,1,25);
    $('.dp4').datepicker()
        .on('changeDate', function(ev){
            if (ev.date.valueOf() > endDate.valueOf()){
                $('.alert').show().find('strong').text('The start date can not be greater then the end date');
            } else {
                $('.alert').hide();
                startDate = new Date(ev.date);
                $('#startDate').text($('.dp4').data('date'));
            }
            $('.dp4').datepicker('hide');
        });
    $('.dp5').datepicker()
        .on('changeDate', function(ev){
            if (ev.date.valueOf() < startDate.valueOf()){
                $('.alert').show().find('strong').text('The end date can not be less then the start date');
            } else {
                $('.alert').hide();
                endDate = new Date(ev.date);
                $('.endDate').text($('.dp5').data('date'));
            }
            $('.dp5').datepicker('hide');
        });

    // disabling dates
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('.dpd1').datepicker({
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('.dpd2')[0].focus();
        }).data('datepicker');
    var checkout = $('.dpd2').datepicker({
        onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
            checkout.hide();
        }).data('datepicker');
});

// Báo giá chi tiết
function ajaxList(group,name,fun){
	var input = group.find('input');
	var list  = group.find('ul');
	input.on('focus',function(){ ajaxLoop(list,name,fun); });
	input.on('keyup',function(){ ajaxLoop(list,name,fun); });
}

/*
 * List to textbox
 * list : class muốn show data
 * name : data muốn trả về MySQL
 * fun	: get data từ funtion nào trong php
 */ 
function ajaxLoop(list,name,fun){
	$.ajax({
		url: getBaseUrl()+fun+'/',
	    data: {vai:$('.vai_input').val(),kho:$('.kho_input').val(),ncc:$('.ncc_input').val()},
		dataType: 'json',
	    type: 'POST',
	    success: function(result) {
	    	list.show();
			var str='';
			$.each(result, function (key, item){
				str += '<li><span>'+item[name]+'</span></li>';
			});
			list.html(str);
	    }
 	});
}

/*
 * Dropdown list
 * list : class muốn show data
 * name : data muốn trả về MySQL
 * fun	: get data từ funtion nào trong php
 * 
 */
function ajaxOptions(select,name,fun,out){
	var value = name.split(',');
	$.ajax({
		url: getBaseUrl()+fun+'/',
	    data: {data:select.val()}, //data: {data:.find('select').val()}
		dataType: 'json',
	    type: 'POST',
	    success: function(result) {
			var str='';
			$.each(result, function (key, item){
				var name_str = ''; 
				for(var i = 0; i < value.length; i++){ 
					if(i == 0 ) name_str += item[value[i]]; 
					else  name_str += ' - ' + item[value[i]];
				}
				str += '<option value="'+item['ID']+'"><span>'+ name_str +'</span></option>'; //item[value[0]]+' - '+$.number(item[value[1]])
			});
			out.html(str); //out.find('select').html(str);
	    }
 	});
}

function ajaxOption(select,fun,out){
	$.ajax({
		url: getBaseUrl()+fun,
	    data: {key:select.val()},
		dataType: 'json',
	    type: 'POST',
	    success: function(result) {alert(result);
			var str='';
			$.each(result, function (key, item){
				str += '<option value="'+item['ID']+'"><span>'+item['Name']+'</span></option>';
			});
			out.html(str);
	    }
 	});
}

/*
 * Input data to textbox
 * element 	: đối tượng phát sinh sự kiện
 * out 		: đối tượng trả về
 * action 	: get data từ funtion nào trong php
 */ 
function ajaxData(action, element, out){
	$.ajax({
		url: getBaseUrl()+action,
		type: 'POST',
	    data: {key: element.val()},
	    success: function(result) {
	    	out.val(result); 
	    },
	    error: function(xhr, desc, err) {
	        console.log(xhr);
	        console.log("Details: " + desc + "\nError:" + err);
	    }
	 });
}

function ajaxData2(action, element1, element2, out){
	$.ajax({
		url: getBaseUrl()+action,
		type: 'POST',
	    data: {key1: element1.val(), key2: element2.val()},
	    success: function(result) {
	    	out.val(result);
	    },
	    error: function(xhr, desc, err) {
	        console.log(xhr);
	        console.log("Details: " + desc + "\nError:" + err);
	    }
	 });
}

function getBaseUrl() {
    //var re = new RegExp(/^.*\//);
    //return re.exec(window.location.href);
	var root = window.location.pathname;
	var parts = root.split("/");
	return window.location.protocol + '//' + window.location.host + '/' + parts[1] + '/';
}

/*
 * format currency
 */
$('input.currency').on('keydown',function(e){ 
    if ($.inArray(e.keyCode, [9, 27, 13]) !== -1 ||
        (e.keyCode == 65 && e.ctrlKey === true) || 
        (e.keyCode >= 35 && e.keyCode <= 40)) {
        return;
    }
    e.preventDefault();
    if($.inArray(e.keyCode,[8,46]) !== -1){
        $(this).val('');
        return;
    }

    var a = ["a","b","c","d","e","f","g","h","i","`"];
    var n = ["1","2","3","4","5","6","7","8","9","0"];

    var value = $(this).val();
    var clean = value.replace(/\./g,'').replace(/,/g,'').replace(/^0+/, '');   

    var charCode = String.fromCharCode(e.keyCode);
    var p = $.inArray(charCode,a);

    if(p !== -1)
    {
        value = clean + n[p];

        //if(value.length == 2) value = '0' + value;
        //if(value.length == 1) value = '00' + value;

        var formatted = '';
        for(var i=0;i<value.length;i++)
        {
            var sep = '';
            //if(i == 2) sep = ',';
            if(i != 0 && i % 3 == 0) sep = ',';
            formatted = value.substring(value.length-1-i,value.length-i) + sep + formatted;
        }
        $(this).val(formatted);
    }    
    return;
});

//date picker end


//datetime picker start
/*
$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});

$(".form_datetime-component").datetimepicker({
    format: "dd MM yyyy - hh:ii"
});


$(".form_datetime-adv").datetimepicker({
    format: "dd MM yyyy - hh:ii",
    autoclose: true,
    todayBtn: true,
    startDate: "2013-02-14 10:00",
    minuteStep: 10
});

$(".form_datetime-meridian").datetimepicker({
    format: "dd MM yyyy - HH:ii P",
    showMeridian: true,
    autoclose: true,
    todayBtn: true
});

//datetime picker end

//timepicker start
$('.timepicker-default').timepicker();


$('.timepicker-24').timepicker({
    autoclose: true,
    minuteStep: 1,
    showSeconds: true,
    showMeridian: false
});

//timepicker end

//colorpicker start

$('.colorpicker-default').colorpicker({
    format: 'hex'
});
$('.colorpicker-rgba').colorpicker();

//colorpicker end

//multiselect start


$('#my_multi_select1').multiSelect();
$('#my_multi_select2').multiSelect({
    selectableOptgroup: true
});

$('#my_multi_select3').multiSelect({
    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
    afterInit: function (ms) {
        var that = this,
            $selectableSearch = that.$selectableUl.prev(),
            $selectionSearch = that.$selectionUl.prev(),
            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
            .on('keydown', function (e) {
                if (e.which === 40) {
                    that.$selectableUl.focus();
                    return false;
                }
            });

        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
            .on('keydown', function (e) {
                if (e.which == 40) {
                    that.$selectionUl.focus();
                    return false;
                }
            });
    },
    afterSelect: function () {
        this.qs1.cache();
        this.qs2.cache();
    },
    afterDeselect: function () {
        this.qs1.cache();
        this.qs2.cache();
    }
});


//multiselect end


//spinner start
$('#spinner1').spinner();
$('#spinner2').spinner({disabled: true});
$('#spinner3').spinner({value:0, min: 0, max: 10});
$('#spinner4').spinner({value:0, step: 5, min: 0, max: 200});
//spinner end

//wysihtml5 start

$('.wysihtml5').wysihtml5();

//wysihtml5 end

//tag input

function onAddTag(tag) {
    alert("Added a tag: " + tag);
}
function onRemoveTag(tag) {
    alert("Removed a tag: " + tag);
}

function onChangeTag(input,tag) {
    alert("Changed a tag: " + tag);
}

$(function() {

    $('#tags_1').tagsInput({width:'auto'});
    $('#tags_2').tagsInput({
        width: '250',
        onChange: function(elem, elem_tags)
        {
            var languages = ['php','ruby','javascript'];
            $('.tag', elem_tags).each(function()
            {
                if($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0)
                    $(this).css('background-color', 'yellow');
            });
        }
    });

    // Uncomment this line to see the callback functions in action
    //			$('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag,onChange: onChangeTag});

    // Uncomment this line to see an input with no interface for adding new tags.
    //			$('input.tags').tagsInput({interactive:false});
});
*/