{{-- HTML del email de recuperacion de contraseña --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>	
</head>
<body>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td>
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="400" bgcolor="#DEDEDE">
					<tr>
						<td height="10"></td>
					</tr>
					<tr>
						<td>
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td width="10"></td>
									<td bgcolor="#616361" align="center"><font size="5" face="Verdana" style="color: #FFFFFF;">Coordinacion de Lenguas Extranjeras</font></td>
									<td width="10"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr><td height="10"></td></tr>
					<tr>
						<td>
							<table align="left" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="30"></td>
									<td ><font size="4" face="Verdana">Hola.</font></td>
									<td width="30"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table align="left" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="30"></td>
									<td>
										<font size="4" face="Verdana">Está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento para su cuenta.</font>
									</td>
									<td width="30"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr><td height="20"></td></tr>
					<tr>
						<td align="center"><font size="4" face="Verdana">
							<div>
							<!--[if mso]>
							<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:40px;v-text-anchor:middle;width:200px;" arcsize="10%" stroke="f" fillcolor="#168BE5">
							<w:anchorlock/>
							<center>
							<![endif]-->
							<a href="{{ $reseturl }}" style="background-color:#168BE5;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:40px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;">Cambiar Contraseña</a>
  							<!--[if mso]>
    						</center>
  							</v:roundrect>
  							<![endif]-->
  							</div>
						</td>
					</tr>
					<tr><td height="20"></td></tr>
					<tr>
						<td>
							<table align="left" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="30"></td>
									<td><font size="4" face="Verdana">Si usted no solicitó ningun cambió de contraseña, no se requiere ningun acción adicional.</font></td>
									<td width="30"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr><td height="10"></td></tr>
					<tr>
						<td>
							<table align="left" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="30"></td>
									<td><font size="4" face="Verdana">Saludos</font></td>
									<td width="30"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table align="left" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="30"></td>
									<td><font size="4" face="Verdana">{{ $msg }}</font></td>
									<td width="30"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr><td height="15"></td></tr>
					<tr>
						<td>
							<table align="left" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="10"></td>
									<td><font size="1" face="Verdana">Si usted tiene algun problema al hacer clic en el botton de recuperacion de contraseña, puede copiar y pegar la siguiente URL dentro de su navegador. </br>{{ $reseturl }}</font></td>
									<td width="10"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr><td height="10"></td></tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>