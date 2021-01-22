$(document).ready(function(){
    recargaLista();
    recargaLista2();
	$('#tabla').change(function(){
        recargaLista();
        recargaLista2();
	});
})
            
function recargaLista(){
	var tabla=$("#tabla").val();
	$.ajax({
		type:"POST",
		url:"assets/php/llenarcolum.php",
		data:{tabla:tabla}
	}).done(function(data){
		$("#c1").html(data);
    }) 
}

function recargaLista2(){
	var tabla=$("#tabla").val();
	$.ajax({
		type:"POST",
		url:"assets/php/llenarcolum.php",
		data:{tabla:tabla}
	}).done(function(data){
		$("#c2").html(data);
	}) 
}

$("#btn").click(function(){

    var tabla = document.getElementById('#tabla');
    var c1 = document.getElementById('#c1');
    var c2 = document.getElementById('#c2');

    console.log('Boton presionado')

    var to_compile = {
        "LanguageChoice": "19",
        "Program": `superquery:- read(T), read(C1), read(A), write('select '), write(C1), write(', count(*)/(select count(*) from '), write(T), write(') as probabilidad from '), write(T), write(' where '), write(C1), write(' in(select distinct '),
        write(C1),write(' from '), write(T), write(') group by '), write(C1), write(';'), superquery2(T,C1,A).superquery2(T,C1,A):- write('\n\n'),write('select '), write(C1), write(', '), write(A), write(', count(*)/(select count(*) from '), write(T), write(') as probabilidad from '),
        write(T), write(' where '), write(C1), write(' in(select distinct '), write(C1),write(' from '), write(T), write(') and '), write(A), write(' in(select distinct '), write(A), write(' from '), write(T), write(') group by '),
        write(A), write(', '), write(C1), write(' order by '), write(C1), write(', '), write(A), write(';').:-superquery.`,
        "Input": tabla+'. '+c1+'. '+c2+'.',
        "CompilerArgs" : ""
    };

    $.ajax ({
            url: "https://rextester.com/rundotnet/api",
            type: "POST",
            data: to_compile
        }).done(function(data) {
            result = data.Result;
            $("#txta1").val(data.Result);
        }).fail(function(data, err) {
            alert("fail " + JSON.stringify(data) + " " + JSON.stringify(err));
        });
});
