

//con target obtengo el componente con el q se esta generando el evento. y con ello tengo el value

$(function(){
    $('#select-subcategoria').on('change',ondata);
});

function ondata(){
   var subcat_id= $(this).val();
    //AJAX
    if(!subcat_id)
        
     $('#select-tipo').html('<option value="-">-Seleccione Tipo-</option>');
      $('#select-material').html('<option value="-">-Seleccione material-</option>');
      $('#select-talla').html('<option value="-">-Seleccione talla-</option>');
    
    
    $.get('/almacen/articulo/create/'+subcat_id+'/tipos',function(data){
        //para probar lo de abajo
        /*for(var i=0;i<data.length;i++){
            console.log(data[i]);
        }*/
        var html_select='<option value="-">-Seleccione Tipo-</option>';
         $('#select-tipo').empty();
        if(data.length==0){
            html_select +='<option value="-">-Ninguno-</option>';
        }else{
        for(var i=0;i<data.length;i++){
            html_select +='<option value="'+data[i].nombre+'">'+data[i].nombre+'</option>';
           /* console.log(html_select);*/
            
            }
        }
        $('#select-tipo').html( html_select);
    });
    
    //MATERIAL
    
       $.get('/almacen/articulo/create/'+subcat_id+'/materiales',function(data1){
     
        var html_select1='<option value="-">-Seleccione material-</option>';
         $('#select-material').empty();
        if(data1.length==0){
               html_select1 +='<option value="-">-Ninguno-</option>';
        }else{

            for(var i=0;i<data1.length;i++){
                html_select1 +='<option value="'+data1[i].nombre+'">'+data1[i].nombre+'</option>';
               /* console.log(html_select);*/
           
            }
        
        }
         $('#select-material').html( html_select1);
    });
    
    //TALLAS
    
       $.get('/almacen/articulo/create/'+subcat_id+'/tallas',function(data2){
 
        var html_select2='<option value="-">-Seleccione Talla-</option>';
         $('#select-talla').empty();
           if(data2.length==0){
            html_select2 +='<option value="-">-Ninguno-</option>';
           }else{
                for(var i=0;i<data2.length;i++){
                    html_select2 +='<option value="'+data2[i].nombre+'">'+data2[i].nombre+'</option>';
                   /* console.log(html_select);*/
               
                }
           }
            $('#select-talla').html( html_select2);  
    });
}



