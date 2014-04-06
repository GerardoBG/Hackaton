// JavaScript Document
/**manejo de imagenes*/

function redimensionar(im,maxWidth,maxHeight){ 
    var i=new Image(); 
    i.onload=function(){ 
        var w=this.width, 
        h=this.height, 
        scale=Math.min(maxWidth/w,maxHeight/h), 
        canvas=document.createElement('canvas'), 
        ctx=canvas.getContext('2d'); 
        canvas.width=w*scale; 
        canvas.height=h*scale; 
        ctx.drawImage(i,0,0,w*scale,h*scale); 
        $('cajadatos').innerHTML='<input type="hidden" name="guardaImagen2" value="'+canvas.toDataURL()+'" form="servidor"><img src="'+canvas.toDataURL()+'" width="140px" height="160px">';
        
    } 
    i.src=im; 
} 
function previsualizar(e){ 
    if (!!window.FileReader){ 
        var input=e.target,fr=new FileReader(), 
        tipos=/image.*/i; 
        if(input.files.length===0)return; 
        if(!tipos.test(input.files[0].type)){alert("El formato del archivo seleccionado es incorrecto",1);return;} 
        fr.onload=function(evt){ 
            var im=evt.target.result; 
            if (document.createElement("canvas").getContext) 
                redimensionar(im,149,149); 
            else{ 
                $('cajadatos').innerHTML=(e.target || e.srcElement).value; 
            } 
        } 
        fr.readAsDataURL(input.files[0]); 
    }else{ 
        $('cajadatos').innerHTML='<input type="hidden" name="guardaImagen" value="'+(e.target || e.srcElement).value+'" form="servidor"><img src="'+(e.target || e.srcElement).value+'" width="140px" height="160px">';
        
    } 
} 
function $(x){
return document.getElementById(x);
}

 function init(){ 
    $('archivos').onchange=previsualizar; 
}
onload=init; 
window.addEventListener('load', init, false);
