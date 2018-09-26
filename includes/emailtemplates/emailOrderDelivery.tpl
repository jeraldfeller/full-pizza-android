<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>{SITE_TITLE}</title>
	</head>
	<body>
		<table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" style="padding-left:5px;border:1px solid #CCCCCC;">
			<tr>
				<td align="left" colspan="2" style="padding-top:20px;"><img src="{SITE_LOGO}" alt="{SITE_TITLE}" title="{SITE_TITLE}" /></td>
			</tr>
			<tr>

				<td align="left" colspan="2" style="padding-top:20px;"></td>

			</tr>
			<tr>
				<td align="left" colspan="2" valign="top">Hi {CUSTOMER_NAME} </td>
			</tr>
			<tr>
				<td align="left" colspan="2" valign="top">Greetings from {SITE_TITLE}!</td>
			</tr>
			<tr>
				<td align="left" colspan="2" valign="top">&nbsp;&nbsp;&nbsp;&nbsp; We are pleased to inform you that the {RESTAURANT} has delivered items in your Order <a href="{SITE_URL}/myaccount">{ORDERNUMBER}</a> to given below address.</td>
				
			</tr>
			{CUSTOMERADDRESS}
			
			
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr>
				<td colspan="2" align="left" valign="top">Thanks</td>
			</tr>
			<tr>
				<td colspan="2" align="left" valign="top">{SITE_TITLE} Team</td>
			</tr>
			<tr>
				<td colspan="2" align="left" valign="top"><a href="{SITE_URL}" target="_blank">{SITE_URL}</a></td>
			</tr>						
		</table>
	</body>
</html>