		function grafica() {
    var data = [];
	
    $.get("./../xml/estudiantes.xml",{},function(xml){
        $('estudiante',xml).each(function(i) {
		
        nombre = $(this).find("nombre").text();
			c1 = $(this).find("c1").text();
			c2 = $(this).find("c2").text();
			c3 = $(this).find("c3").text();
			c4 = $(this).find("c4").text();
			
			promediofin = (parseInt(c1)+parseInt(c2)+parseInt(c3)+parseInt(c4))/4;
			if( promediofin > 7) {
                                
                                promediofin=promediofin;
								ordinario=promediofin;
                        } else {
                                
								ordinario=promediofin;
								promediofin=(promediofin/2)*3;
                        }
						
						data.push({
                                
                                Nombre: nombre,
								
                                Promedio: promediofin
            });
                });
        });
       alert("grafica creada");
    return data;
}


function tabla() {
    var data = [];
	
    $.get("./../xml/estudiantes.xml",{},function(xml){
        $('estudiante',xml).each(function(i) {
		
        nombre = $(this).find("nombre").text();
			c1 = $(this).find("c1").text();
			c2 = $(this).find("c2").text();
			c3 = $(this).find("c3").text();
			c4 = $(this).find("c4").text();
			
			
			
			promediofin = (parseInt(c1)+parseInt(c2)+parseInt(c3)+parseInt(c4))/4;
			if( promediofin > 7) {
                                
                                promediofin=promediofin;
								ordinario=promediofin;
                        } else {
                                
								ordinario=promediofin;
								promediofin=(promediofin/2)*3;
                        }
			
			
			
						
						data.push({
                                
                                Nombre: nombre,
								Calificacion1: c1,
								Calificacion2: c2,
								Calificacion3: c3,
								Calificacion4: c4,
								Ordinario: ordinario,
                                Promedio: promediofin
            });
                });
        });
       alert("tabla creada");
    return data;
}