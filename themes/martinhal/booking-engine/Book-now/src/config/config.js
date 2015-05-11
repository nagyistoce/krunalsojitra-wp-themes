var protel = protel || {};
protel.config = new function()
{
//this.WbeId =  "4";
//this.WbeType =  "group";
this.BaseUrl = "https://connect.protel.net";
this.WBEPath = "WBE/1";
this.FilePath = ""
this.ApiBaseUrl = this.BaseUrl + '/files/'+this.WBEPath+'/cors/index.html';
this.theme1 = 'a';
this.calendermode = "datebox";
this.facebookid = "protelhotelsoftware"; 
this.pageTransition = "fade";
this.useLocalStorage = false;
this.enableLogin = true;
this.defaultlang = "de";
this.groupHotels = false;
this.groupHotelsBy = "city"; //possible are city, country and stars 
}

protel.TrackingSettings = new function(){	
	this.UAID = 'UA-31119844-1';
	this.Domain = document.domain;
	this.pUAID = 'UA-27470550-1';
}
protel.security = new function(){
	this.sId = "";
}

protel.debugging = new function(){
	this.easyXDM = true;
	this.wbe = true;
	this.debugprotelapi = false;
}

protel.globlang = "de";