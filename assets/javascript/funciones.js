//Cierra la ventana que esta activa
function closewindow() 
{
  self.opener = this;
  self.close();
}


function mensaje() 
{
  alert("CON FUNCIONES");
}

//Realiza el submit de un formulario, a la p�gina que le ha sido enviada
function enviar(pagina, formulario)
{
	eval("document."+formulario+".action='"+pagina+"'")
	eval("document."+formulario+".submit()")
}

//Funciones para la validaci�n de n�meros. Su usa en el onKeyPress
function EvaluateText(cadena, obj)
{ 
 opc = false; 
 
 if(cadena == "%d"){ 
   if(event.keyCode > 47 && event.keyCode < 58) 
     opc = true; 
 }	 
 
 if(cadena == "%f"){ 
   if(event.keyCode > 47 && event.keyCode < 58) 
     opc = true; 
   if(obj.value.search("[.*]") == -1 && obj.value.length != 0) 
     if(event.keyCode == 46) 
       opc = true; 
 }
 
 if(cadena == "%c")
 {
	 if((event.keyCode >= 97 && event.keyCode <= 122) || (event.keyCode >= 65 && event.keyCode <= 90))
		 opc = true;
 }
 
 if(opc == false) 
   event.returnValue = false; 
} 

function valida_entero(campo) 
{
	EvaluateText('%d',campo); 
}

function valida_cadena(campo)
{
	EvaluateText('%c', campo);
}

function valida_valor(min, max, obj)
{ 
	var valor
	valor = obj.value
	if(valor < min || valor > max)
	{
		alert("El valor debe de estar entre " + '\n' + min + " y " + max)
		obj.focus()
		obj.select()
		event.returnValue = false;
	}
}

function campos_vacios(formulario)
{
	form 	= eval("document."+formulario)
	total = form.length
	for(i=0; i<total; i++)
	{
		if(form.elements[i].type != "button" || form.elements[i].type != "hidden")
		{
			if(form.elements[i].title)
			{
				if((form.elements[i].type == "select-one" && (/*form.elements[i].value == 0 || */form.elements[i].value == -1)) || (form.elements[i].value == '' || form.elements[i].value == null))
				{
						alert(form.elements[i].title)
						form.elements[i].focus()
						return false
				}
			}
		}
	}
	return true
}


function hora() { 
var mensaje="    INSTITUTO TECNOLOGICO DE CHIHUAHUA II |======|" ;
var h = new Date(); 
window.status="|======| "
+ h.getHours() +":"+ h.getMinutes() +"" +mensaje ; 
window.setTimeout('hora()',100); 
}

function confirmar(texto)
{
	alert("entraste a la funcion");
	var agree=confirm(texto);
	if (agree) 
		return true ;
	else 
		return false ;
}

function trim(cadena)
{
	for(i=0; i<cadena.length; )
	{
		if(cadena.charAt(i)==" ")
			cadena=cadena.substring(i+1, cadena.length);
		else
			break;
	}

	for(i=cadena.length-1; i>=0; i=cadena.length-1)
	{
		if(cadena.charAt(i)==" ")
			cadena=cadena.substring(0,i);
		else
			break;
	}
	return cadena;
}