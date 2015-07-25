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

var transferable = true;
if(!transferable) {
	document.getElementsByName("xferable")[0].disabled = true;
	document.getElementsByName("xferable")[0].checked = false;
}

function fixdata(data) {
	var o = "", l = 0, w = 10240;
	for(; l<data.byteLength/w; ++l) o+=String.fromCharCode.apply(null,new Uint8Array(data.slice(l*w,l*w+w)));
	o+=String.fromCharCode.apply(null, new Uint8Array(data.slice(l*w)));
	return o;
}

function ab2str(data) {
	var o = "", l = 0, w = 10240;
	for(; l<data.byteLength/w; ++l) o+=String.fromCharCode.apply(null,new Uint16Array(data.slice(l*w,l*w+w)));
	o+=String.fromCharCode.apply(null, new Uint16Array(data.slice(l*w)));
	return o;
}

function s2ab(s) {
	var b = new ArrayBuffer(s.length*2), v = new Uint16Array(b);
	for (var i=0; i != s.length; ++i) v[i] = s.charCodeAt(i);
	return [v, b];
}

function xlsxworker_noxfer(data, cb) {
	var worker = new Worker('/public/js/dropUploader/xlsxworker.js');
	worker.onmessage = function(e) {
		switch(e.data.t) {
			case 'ready': break;
			case 'e': console.error(e.data.d); break;
			case 'xlsx': cb(JSON.parse(e.data.d)); break;
		}
	};
	var arr = rABS ? data : btoa(fixdata(data));
	worker.postMessage({d:arr,b:rABS});
}

function xlsxworker_xfer(data, cb) {
	var worker = new Worker(rABS ? '/public/js/dropUploader/xlsxworker.js' : '/public/js/dropUploader/xlsxworker.js');
	worker.onmessage = function(e) {
		switch(e.data.t) {
			case 'ready': break;
			case 'e': console.error(e.data.d); break;
			default: xx=ab2str(e.data).replace(/\n/g,"\\n").replace(/\r/g,"\\r"); console.log("done"); cb(JSON.parse(xx)); break;
		}
	};
	if(rABS) {
		var val = s2ab(data);
		worker.postMessage(val[1], [val[1]]);
	} else {
		worker.postMessage(data, [data]);
	}
}

function xlsxworker(data, cb) {
	transferable = document.getElementsByName("xferable")[0].checked;
	if(transferable) xlsxworker_xfer(data, cb);
	else xlsxworker_noxfer(data, cb);
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
		var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
		if(roa.length > 0){
			result[sheetName] = roa;
		}
	});
	return result;
}

function to_csv(workbook) {
	var result = [];
	workbook.SheetNames.forEach(function(sheetName) {
		var csv = XLSX.utils.sheet_to_csv(workbook.Sheets[sheetName]);
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
		var formulae = XLSX.utils.get_formulae(workbook.Sheets[sheetName]);
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
	var wb = XLSX.read(tarea.value, {type: 'base64'});
	process_wb(wb);
}

function process_wb(wb) {
	var output = "";
	switch(get_radio_value("format")) {
		case "json":
			output = JSON.stringify(to_json(wb), 2, 2);
			break;
		case "form":
			output = to_formulae(wb);
			break;
		default:
		output = to_csv(wb);
	}
	if(out.innerText === undefined){ 
		alert("KKK"+output+"KKK");
	}
	else{ 
		//output = JSON.parse(output);
		addProducts(output);
        }
	if(typeof console !== 'undefined') console.log("output", new Date());
}

function addProducts(output){
	
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "/product/addProducts",
		data: {productsData:output},
		success: function(data){
			console.log(data.msg);
			alert("success");
		},
		error: function(e){
			console.log(e);
		}
	}).done(function(data) {
	    console.log(data);
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
				xlsxworker(data, process_wb);
			} else {
				var wb;
				if(rABS) {
					wb = XLSX.read(data, {type: 'binary'});
				} else {
				var arr = fixdata(data);
					wb = XLSX.read(btoa(arr), {type: 'base64'});
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