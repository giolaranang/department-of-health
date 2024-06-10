function hidefirst(id){
	var row = document.getElementById(id);
	row.style.display = 'none';
}
function display(id){
	var row = document.getElementById(id);
	if (row.style.display == ''){row.style.display = 'none';}else{row.style.display = '';}
}