<?php
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" >
<meta http-equiv="cache-control" content="no-cache"/>
<meta http-equiv="pragma" content="no-cache"/>
<meta name="viewport" content="width=device-width" />
<title></title>

<script src="https://connect.protel.net/files/wbe/2/WBEApp.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
    protelWBE = new WBE4();
    protelWBE.GoogleApiClientId = '';
    protelWBE.GoogleApiKey = '';
    protelWBE.FacebookAppID = "";
    protelWBE.TwitterApiKey = "";
    protelWBE.RegisterResultView('Search-Results');
    protelWBE.RegisterDetailView('DetailView-Content');
    protelWBE.RegisterHeaderContainer('headerWBE4');
    protelWBE.RegisterFooterContainer('footerWBE4');
    protelWBE.RenderWbeToContainer ="wbecontent";
    protelWBE.WbeSettings.CustomErrorPage="";
    protelWBE.APIKey="5031772a-c076-4b01-b125-e6ab12130700";
    protelWBE.WbeSettings.Design = 'puremorning';
    protelWBE.Init();
</script>



</head>
<body id="wbe" style="rgba" >
<div id="wbecontent"></div>
    

</body>

</html>
