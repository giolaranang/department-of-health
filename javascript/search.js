checked=false;
function checkedAll (form1) {
	var aa= document.getElementById('form1');
	 if (checked == false) { checked = true } else { checked = false }
	for (var i =0; i < 4; i++){
	 aa.elements[i].checked = checked;
	}
}

function unchecktheAll (form1) {
	var aa= document.getElementById('form1');
	if(checked == false){ checked = true } else { checked = false }
	aa.elements[0].checked = false;
}

function f_optionMove(s_from, s_to) {
	var e_from = document.forms['test_form'].elements[s_from],
		e_to   = document.forms['test_form'].elements[s_to];
		
	if (!e_from)
		return alert ("Error: selectbox with name '" + s_from + "' can't be found.");
	if (!e_to)
		return alert ("Error: selectbox with name '" + s_from + "' can't be found.");

	var n_moved = 0;
	for (var i = 0; i < e_from.options.length; i++) {
		if (e_from.options[i].selected) {
			e_to.options[e_to.options.length] = new Option(e_from.options[i].text, e_from.options[i].value);
			n_moved++;
		}
		else if (n_moved)
			e_from.options[i - n_moved] = new Option(e_from.options[i].text, e_from.options[i].value);
	}
	if (n_moved)
		e_from.options.length = e_from.options.length - n_moved;
	else
		alert("You haven't selected any options");
}

function f_optionMoveAll(s_from, s_to) {
	var e_from = document.forms['test_form'].elements[s_from],
		e_to   = document.forms['test_form'].elements[s_to];
		
	if (!e_from)
		return alert ("Error: selectbox with name '" + s_from + "' can't be found.");
	if (!e_to)
		return alert ("Error: selectbox with name '" + s_from + "' can't be found.");

	e_to.options.length = 0;
	for (var i = 0; i < e_from.options.length; i++)
			e_to.options[i] = new Option(e_from.options[i].text, e_from.options[i].value);
	e_from.options.length = 0;

}

function f_selectAll (s_select) {
	var e_select = document.forms['test_form'].elements[s_select];
	for (var i = 0; i < e_select.options.length; i++)
			e_select.options[i].selected = true;
}

function addOption(sbox,text,value )
{
	var selectbox = document.drop_list.sbox;
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;
	selectbox.options.add(optn);
}

function addDates(selectbox){
	var day1 = document.drop_list.day1;
	var month1 = document.drop_list.month1;
	var year1 = document.drop_list.year1;
	var day2 = document.drop_list.day2;
	var month2 = document.drop_list.month2;
	var year2 = document.drop_list.year2;
	if(!day1 || !month1 || !year1 || !day2 || !month2 || !year2){
		alert("Invalid Dates.");
	}
	var date1 = new Date(month1+" "+day1+", "+year1);
	var date2;
	if(day2!="--" && month2!="--------" && year2!="----"){
		date2 = new Date(month2+" "+day2+", "+year2);
		if(date1>date2){
			alert("Invalid Dates.");
		}else{
			for(var date = date1; date <= date2; date.setDate(date.getDate()+1)){
				var month = date.getMonth() + 1
				var day = date.getDate()
				var year = date.getFullYear()
				addOption(selectbox, month + "/" + day + "/" + year);
			}
		}
	}else{
		var month = date1.getMonth() + 1
		var day = date1.getDate()
		var year = date1.getFullYear()
		addOption(selectbox, month+"/"+day+"/"+year, month+"/"+day+"/"+year);
	}
}

function ordernumtext(){
	var txt = document.form1.ordernum.value;
	var chrs = txt.split("");
	var allowed = new Array('0','1','2','3','4','5','6','7','8','9',',','-');
	for(i = 0; i < chrs.length; i++){
		var b = true;
		for(j = 0; j < allowed.length; j++){
			if(chrs[i]==allowed[j]){
				b = false;
				break;
			}
		}
		if(b){
			chrs[i] = "";
		}
	}
	txt = chrs.join();
	document.form1.ordernum.value = txt;
	alert(txt);
}

function addOption(selectbox,text,value )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;
	selectbox.options.add(optn);
}