$(document).ready(function(){
    recargaLista();
    recargaLista2();
	$('#tabla').change(function(){
        recargaLista();
        recargaLista2();
	});
	$("#generar").click(function(){
		q1();
		q2();
	});
})
            
function recargaLista(){
	var tabla=$("#tabla").val();
	$.ajax({
		type:"POST",
		url:"assets/php/llenarcolum.php",
		data:{tabla:tabla}
	}).done(function(data){
		$("#columna1").html(data);
    }) 
}

function recargaLista2(){
	var tabla=$("#tabla").val();
	$.ajax({
		type:"POST",
		url:"assets/php/llenarcolum.php",
		data:{tabla:tabla}
	}).done(function(data){
		$("#columna2").html(data);
	}) 
}

function q1(){
	
	var entrada = $("#tabla").val() +". "+$("#columna1").val() + ". "+$("#columna2").val() +".";
	var programa = `querys:- read(X), read(Y),q1(X,Y). q1(X,Y):-write('select '),write(Y),write(', count(*)/(select count(*) from '),write(X),write(') as probabilidad from '),write(X),write(' where '),write(Y),write(' in(select distinct '),write(Y),write(' from '),write(X),write(') group by '),write(Y). :-querys.`;
	var to_compileq1 = {
		"LanguageChoice": "19",
		"Program": programa,
		"Input": entrada,
		"CompilerArgs" : ""
	};
	$.ajax ({
			url: "https://rextester.com/rundotnet/api",
			type: "POST",
			data: to_compileq1
		}).done(function(data) {
			$("#query1").val(data.Result);
		}).fail(function(data, err) {
			alert("fail " + JSON.stringify(data) + " " + JSON.stringify(err));
	});
}

function q2(){
	var entrada1 = $("#tabla").val() +". "+$("#columna1").val() + ". "+$("#columna2").val() +".";
	var programa1 = `querys:- read(X), read(Y), read(Z), q2(X,Y,Z). q2(X,Y,Z):-write('select '),write(Y),write(', '),write(Z),write(', count(*)/(select count(*) from '),write(X),write(') as Probabilidad from '),write(X),write(' where '),write(Y),write(' in(select distinct '),write(Y),write(' from '),write(X),write(') and '),write(Z),write(' in(select distinct '),write(Z),write(' from '),write(X),write(') group by '),write(Z),write(', '),write(Y),write(' order by '),write(Y),write(', '),write(Z). :-querys.`;
	var to_compileq2 = {
		"LanguageChoice": "19",
		"Program": programa1,
		"Input": entrada1,
		"CompilerArgs" : ""
	};
	
	$.ajax ({
			url: "https://rextester.com/rundotnet/api",
			type: "POST",
			data: to_compileq2
		}).done(function(data) {
			$("#query2").val(data.Result);
		}).fail(function(data, err) {
			alert("fail " + JSON.stringify(data) + " " + JSON.stringify(err));
	});
}

function selectAlmacen(){
	// let cbxAlmacenid = document.getElementById('cbxAlmacenid');
	// let almacen = cbxAlmacenid.value;

	// document.getElementById('pCostUnits').innerText=`hola`;
	document.getElementById('pCostUnits').innerHTML=("hola mundo")
}