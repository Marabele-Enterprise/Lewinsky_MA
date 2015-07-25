var rABS = typeof FileReader !== "undefined" && typeof FileReader.prototype !== "undefined" && typeof FileReader.prototype.readAsBinaryString !== "undefined";
if(!rABS) {
	document.getElementsByName("userabs")[0].disabled = true;
	document.getElementsByName("userabs")[0].checked = false;
}

var use_worker = typeof Worker !== 'undefined';
if(!use_worker) {
	document.getElementsByName("useworker")[0].disabled = true;
	document.getElementsByName("useworker")[0].checked = false;
}

function fixdata(data) {
	var o = "", l = 0, w = 10240;
	for(; l<data.byteLength/w; ++l) o+=String.fromCharCode.apply(null,new Uint8Array(data.slice(l*w,l*w+w)));
	o+=String.fromCharCode.apply(null, new Uint8Array(data.slice(o.length)));
	return o;
}

function xlsworker(data, cb) {
	var worker = new Worker($("#URLholder").val()+'/public/plugins/dropUploader/xlsworker.js');
	worker.onmessage = function(e) {
		switch(e.data.t) {
			case 'ready': break;
			case 'e': console.error(e.data.d); break;
			case 'xls': cb(JSON.parse(e.data.d)); break;
		}
	};
	var arr = rABS ? data : btoa(fixdata(data));
	worker.postMessage({d:arr,b:rABS});
}

function get_radio_value( radioName ) {
	var radios = document.getElementsByName( radioName );
	for( var i = 0; i < radios.length; i++ ) {
		if( radios[i].checked || radios.length === 1 ) {
			return radios[i].value;
		}
	}
}

function to_json(workbook) {
	var result = {};
	workbook.SheetNames.forEach(function(sheetName) {
		var roa = XLS.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
		if(roa.length > 0){
			result[sheetName] = roa;
		}
	});
	return result;
}

function to_csv(workbook) {
	var result = [];
	workbook.SheetNames.forEach(function(sheetName) {
		var csv = XLS.utils.sheet_to_csv(workbook.Sheets[sheetName]);
		if(csv.length > 0){
			result.push("SHEET: " + sheetName);
			result.push("");
			result.push(csv);
		}
	});
	return result.join("\n");
}

function to_formulae(workbook) {
	var result = [];
	workbook.SheetNames.forEach(function(sheetName) {
		var formulae = XLS.utils.get_formulae(workbook.Sheets[sheetName]);
		if(formulae.length > 0){
			result.push("SHEET: " + sheetName);
			result.push("");
			result.push(formulae.join("\n"));
		}
	});
	return result.join("\n");
}

var tarea = document.getElementById('b64data');
function b64it() {
	if(typeof console !== 'undefined') console.log("onload", new Date());
	var wb = XLS.read(tarea.value, {type: 'base64'});
	process_wb(wb);
}

function process_wb(wb) {
	if(use_worker) XLS.SSF.load_table(wb.SSF);
	var output = "";
	switch(get_radio_value("format")) {
		case "json":
			output = JSON.stringify(to_json(wb), 2, 2);
			break;
		case "form":
			output = to_formulae(wb);
			break;
		default:
			output = JSON.stringify(to_json(wb), 2, 2);
	}
	if(out.innerText === undefined) alert("KKK"+output+"KKK");
	else{ 
		//output = JSON.parse(output);
		addItems(output);
        }
	if(typeof console !== 'undefined') console.log("output", new Date());
}

function addItems(output){
	$('#loadingImg').fadeIn();
	$.ajax({
		type: "POST",
		//dataType: "json",
		url: $("#URLholder").val()+"/generic/insertExcel",
		data: {data:output},
		success: function(data){
			console.log(data);
		},
		error: function(e){
			console.log(e);
			$('#loadingImg').fadeOut();
			$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Items uploaded successfuly</div>");
		}
	}).done(function(data) {
		//console.log(data);
		$('#loadingImg').fadeOut();
		$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Items uploaded successfuly.</div>");
	}).fail(function(jqXHR,status, errorThrown) {
	    console.log(errorThrown);
	    console.log(jqXHR.responseText);
	    console.log(jqXHR.status);
	});
}

var drop = document.getElementById('drop');
function handleDrop(e) {
	e.stopPropagation();
	e.preventDefault();
	rABS = document.getElementsByName("userabs")[0].checked;
	use_worker = document.getElementsByName("useworker")[0].checked;
	var files = e.dataTransfer.files;
	var i,f;
	for (i = 0, f = files[i]; i != files.length; ++i) {
		var reader = new FileReader();
		var name = f.name;
		reader.onload = function(e) {
			if(typeof console !== 'undefined') console.log("onload", new Date(), rABS, use_worker);
			var data = e.target.result;
			if(use_worker) {
				xlsworker(data, process_wb);
			} else {
				var wb;
				if(rABS) {
					wb = XLS.read(data, {type: 'binary'});
				} else {
					var arr = fixdata(data);
					wb = XLS.read(btoa(arr), {type: 'base64'});
				}
				process_wb(wb);
			}
		};
		if(rABS) reader.readAsBinaryString(f);
		else reader.readAsArrayBuffer(f);
	}
}

function handleDragover(e) {
	e.stopPropagation();
	e.preventDefault();
	e.dataTransfer.dropEffect = 'copy';
}

if(drop.addEventListener) {
	drop.addEventListener('dragenter', handleDragover, false);
	drop.addEventListener('dragover', handleDragover, false);
	drop.addEventListener('drop', handleDrop, false);
}