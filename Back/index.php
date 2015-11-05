<script type="text/javascript">
    function cambiar_imagen(id, imagen)
    {
        x=document.getElementById(id);
//original
        x.src = "http://sii.itchihuahuaii.edu.mx/img/acceso/"+imagen;
//	x.src = "/acceso/"+imagen;
    }

    function mostrar(t)
    {
        document.acceso.tipo.value = t;
        acc = document.getElementById("tabla_acceso");
        texto_usr = document.getElementById("user");
        texto_pws = document.getElementById("pass");
        asp = document.getElementById("aspirantes");

        switch(t)
        {
            case 'p':	//asp.style.visibility = "hidden";
                acc.style.visibility = "visible";
                texto_usr.innerHTML = "Usuario:";
                texto_pws.innerHTML = "Contrase&ntilde;a:";
                document.acceso.usuario.focus()
                break;
            case 'a':	//asp.style.visibility = "hidden";
                acc.style.visibility = "visible";
                texto_usr.innerHTML = "No. de Control:";
                texto_pws.innerHTML = "NIP:";
                document.acceso.usuario.focus()
                break;
            case 's':	alert ("¿Eres aspirante nuevo y NO te has registrado ?. \nProporciona 0 en No solicitud y 0 en NIP con ello tendr&aacute;s acceso al sistema. \n Si ya cuentas con tu n&uacute;mero de solicitud proporciona tu n&uacute;mero y tu NIP correspondiente para actualizar los datos de la solicitud");
                acc.style.visibility = "visible";
                texto_usr.innerHTML = "No. Solicitud:";
                texto_pws.innerHTML = "NIP:";
                document.acceso.usuario.focus()
            /*acc.style.visibility = "hidden";
             asp.style.visibility = "visible";
             break;*/
        }
    }


    function valida_datos()
    {
        formulario = document.acceso;
        if(formulario.tipo.value=='p')
        {
            msj_usr = "usuario";
            msj_pws = "contrase&ntilde;a";
        }
        else
        {
            msj_usr = "n&uacute;mero de control";
            msj_pws = "nip";
            if (formulario.tipo.value=='s')
            {
                if(isNaN(formulario.usuario.value))
                {
                    window.alert("Introduce un n&uacute;mero de solicitud n&uacute;merico");
                    formulario.usuario.focus();
                    return false;
                }
            }

            if(isNaN(formulario.contrasena.value))
            {
                window.alert("Introduce un NIP n&uacute;merico");
                formulario.contrasena.focus();
                return false;
            }
            if(formulario.contrasena.value.length>4)
            {
                window.alert("Introduce un NIP de 4 caracteres");
                formulario.contrasena.focus();
                return false;
            }
        }

        if(formulario.usuario.value=="" || formulario.usuario.value==null)
        {
            window.alert("Por favor introduce tu "+msj_usr);
            formulario.usuario.focus();
            return false;
        }

        if(formulario.contrasena.value=="" || formulario.contrasena.value==null)
        {
            window.alert("Por favor introduce tu "+msj_pws);
            formulario.contrasena.focus();
            return false;
        }
        return true
        //formulario.submit();
    }
</script>
</script>

<body> <!--onload="document.forms[0].elements[0].focus()"-->

<form name="acceso" action="<?=base_url()?>index.php/sesion/login.php" method="post" onSubmit="return valida_datos()">
    <input name="tipo" type="hidden" value="" />
    <table id="tabla" width="700" style="background:transparent;" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
    <td align="left" height="60">
    <img src="<?=base_url()?>assets/imagenes/personal.gif" onClick="mostrar('p');" id="img_personal" onMouseOver="cambiar_imagen('img_personal','personal_over.gif',1)" onMouseOut="cambiar_imagen('img_personal','personal.gif')" />
    </td>
    </tr>
    <tr>
    <td align="center" height="60">

    <img src="<?=base_url()?>assets/imagenes/alumnos.gif" onClick="mostrar('a');" id="img_alumnos" onMouseOver="cambiar_imagen('img_alumnos','alumnos_over.gif',1)" onMouseOut="cambiar_imagen('img_alumnos','alumnos.gif')" />

    <!--
    <img src="http://sii.itchihuahuaii.edu.mx/img/acceso/alumnos.gif" id="img_alumnos" onMouseOver="cambiar_imagen('img_alumnos','alumnos_over.gif',1)" onMouseOut="cambiar_imagen('img_alumnos','alumnos.gif')" />
    -->
    </td>
    </tr>
    <tr>
    <td align="right" height="60">

        <!-- desactivarlo cundo sea tiempo de solicitudes -->

    <img src="<?=base_url()?>assets/imagenes/aspirantes.gif" onClick="mostrar('s');" id="img_aspirantes" onMouseOver="cambiar_imagen('img_aspirantes','aspirantes_over.gif',1)" onMouseOut="cambiar_imagen('img_aspirantes','aspirantes.gif')" />
    </td>
    </tr>
    </table>

    <div align="center" style="visibility:hidden" id="tabla_acceso">
    <table align="center" width="360" cellspacing="2" cellpadding="2" border="0">
    <tr>
    <th align="center" colspan="2"> Autentificaci&oacute;n para acceso al sistema </th>
</tr>
<tr>
<td colspan="2" align="center" id="gris"> Introduce los datos correspondientes:</td>
</tr>
<tr>
<th align="left" width="110" id="user"> No. Solicitud: </th>
<td align="left" width="179"> <input type="Text" name="usuario" size="35" maxlength="30"> </td>
    </tr>
    <tr>
    <th align="left" id="pass"> NIP: </th>
<td align="left"><input type="password" name="contrasena" size="35" maxlength="15"></td>
    </tr>
    </table>
    <br />
    <div align="center">
    <input class="boton" type="submit" value="Acceso" />
    </div>
    </div>
    </form>
        <!--  @1.1 -->
        <!--  @20070821 -->
    </body>
    </html>
