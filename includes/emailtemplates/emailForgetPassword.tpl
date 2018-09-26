<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>{SITE_TITLE}</title>
	</head>
	<body>
		<table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" style="padding-left:5px;border:1px solid #CCCCCC;">
			<tr>
				<td align="left" colspan="3" style="padding-top:20px;"><img src="{SITE_LOGO}" alt="{SITE_TITLE}" title="{SITE_TITLE}" /></td>
			</tr>
			<tr>
				<td align="left" colspan="3" style="padding-top:20px;">Hi,</td>
			</tr>
			<tr>
				<td align="left" colspan="3" style="padding-top:20px;"><b>Your password link as below: </b></td>
			</tr>
            
            <tr>
				<td width="15%" align="left" valign="top">Customer Name</td>
				<td width="5%" align="center" valign="top">:</td>
				<td width="" align="left" valign="top">{CUSTOMER} {CUSTOMERLAST}</td>
			</tr>
			
			<tr>
				<td width="15%" align="left" valign="top">Email</td>
				<td width="5%" align="center" valign="top">:</td>
				<td width="" align="left" valign="top">{USEREMAIL}</td>
			</tr>
            
            {PASSWORD}
			
			
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>
				<td align="left" valign="top" colspan="3">Thanks</td>
			</tr>
			<tr>
				<td align="left" valign="top" colspan="3">{SITE_TITLE}</td>
			</tr>
			<tr>
				<td align="left" valign="top" colspan="3"><a href="{SITE_URL}" target="_blank">{SITE_URL}</a></td>
			</tr>						
		</table>
	</body>
</html>