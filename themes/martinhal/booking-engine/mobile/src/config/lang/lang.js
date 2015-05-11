protel.internat = {};

protel.internat.set_languagedata = function(lang) {	
	protel.globlang = lang;
	if (lang == "de") {
		protel.WBE4.translations = new protel.internat.translations_de();
	} else if (lang == "en") {
		protel.WBE4.translations = new protel.internat.translations_en();
	} else {
		protel.WBE4.translations = new protel.internat.translations_default();
	}
	protel.localize(lang);
}

protel.internat.translations_default = function() {
	this.global = {};
	this.hotel = {};	
	this.user = {};
	this.form = {};
	this.reservation = {};
	this.basket = {};
	this.alerts = {};
	
/**
* Global variables
*/
	this.global.welcomemessage = "";
	this.global.contact = "Kontakt";
	this.global.online_reservation = "Online Reservierung";
	this.global.online_voucher = "Online Gutscheine";
	this.global.backbutton = "Zurück";
	this.global.homebutton = "Home";
	this.global.cartloginheader = "Warenkorb";
	this.global.cartbutton = "Warenkorb";
	this.global.loginbutton ="Login";	
	this.global.loggedinbutton ="Meine Daten";
	this.global.pleaseselect = "Bitte auswählen";
	this.global.save = "Speichern";
	this.global.hotel_single = "Hotel";
	this.global.hotel_multi="Unsere Hotels";
	this.global.map = "Karte";	
/**
* User related variables
*/	
	this.user.header = "Login";
	this.user.username = "Benutzer/Email"
	this.user.password = "Passwort";
	this.user.loginbutton = "Login";
	this.user.logoutbutton = "Logout";
	this.user.loggedin_header = "Meine Daten";	
	this.user.loggedin_myprofile = "Mein Profil";
	this.user.loggedin_myprofile_header = "Mein Profil";	
	this.user.loggedin_myreservations = "Meine Reservierungen";
	this.user.loggedin_myreservations_header = "Reservierungen";
	this.user.addnewuser = "Neuen Benutzer anlegen";	
	this.user.createnewuserbutton = "anlegen";	
/**
* Form variables
*/	
	this.form.userheader = "Benutzer";
	this.form.email = "Email";
	this.form.password = "Passwort";
	this.form.nameheader = "Name";
	this.form.salut = "Anrede";
	this.form.firstname = "Vorname";
	this.form.lastname = "Nachname";
	this.form.contactheader = "Kontakt";
	this.form.phone = "Phone";
	this.form.companyheader = "Firma";
	this.form.company = "Firmenname";
	this.form.addressheader = "Adresse";
	this.form.street = "Straße";
	this.form.zip = "PLZ";
	this.form.city = "Ort";
	this.form.country = "Land";
	/**
* Hotelpage variables
*/		
	this.hotel.hotelselect = "Hotelauswahl";
	this.hotel.header = "Hoteldetails";
	this.hotel.info = "Info";
	this.hotel.pics = "Bilder";
	this.hotel.facebook = "facebook";
	this.hotel.hotelinfos_header = "Hotelinfos";
	this.hotel.hotelinfos_features = "Hotelfeatures";	
/**
* Reservation variables
*/	
	this.reservation.cancel = "stornieren";
	this.reservation.cancelnow = "jetzt stornieren";	
	this.reservation.arrdate = "Anreise";
	this.reservation.depdate = "Abreise";
	this.reservation.roomcount = "Anzahl Zimmer";
	this.reservation.searchstartbutton = "Suche starten";
	this.reservation.header = "Reservierung";
	this.reservation.result_header = "Ergebnisse";
	this.reservation.cat_header = "Kategorien";
	this.reservation.searchparams_arrdep = "An-/Abreise: [arrdate] - [depdate]";
	this.reservation.addbasket_detailsinfo_adults = "Erwachsene(r)";
	this.reservation.addbasket_detailsinfo_childs = "Kind(er)";
	this.reservation.addbasket_detailsinfo_addbeds = "Zusatzbett(en)";
	this.reservation.addbasket_detailsinfo_cots = "Kinderbett(en)";
	this.reservation.addbasket_detailsinfo_arrdep = "An-/Abreise: [arrdate] - [depdate]";
	this.reservation.addbasket_detailchange_info = "maximale Personenzahl inkl. Kinder:";
	this.reservation.addbasket_detailchange_adults = "Erwachsene";
	this.reservation.addbasket_detailchange_childs = "Kinder von [agefrom] - [ageto] Jahren";
	this.reservation.addbasket_detailchange_addbeds = "Zusatzbetten";
	this.reservation.addbasket_detailchange_cots = "Kinderbetten";
	this.reservation.addbasket_addbutton = "In den Warenkorb legen";
	this.reservation.addbasket_addedmsg = "Ihre Buchung wurde in den Warenkorb gelegt.";
/**
* Shoppingbasket variables
*/	
	this.basket.header = "Warenkorb";
	this.basket.reservations_head = "Reservierungen";
	this.basket.itemdetails_arrdep = "An-/Abreise:";
	this.basket.itemdetails_category = "Kategorie:";
	this.basket.itemdetails_persons = "Personen:";
	this.basket.itemdetails_persons_adults = "Erwachsene(r)";	
	this.basket.itemdetails_persons_childs = "Kind(er)";
	this.basket.itemdetails_roomcount = "Anzahl Zimmer:";
	this.basket.itemdetails_itemtotal = "Gesamtpreis:";
	this.basket.baskettotal = "Gesamt:";
	this.basket.itemdetails_guests = "Guests:";
	this.basket.checkoutbutton = "Bezahlen";
	this.basket.bookerdata_head = "Meine Daten";
	this.basket.bookerdata_info = "Bitte vervollständigen Sie Ihre Daten.";
	this.basket.bookerdata_info2 = "(* = Pflichtfeld)";
	this.basket.nextbutton = "Weiter";
	this.basket.guestdata_head = "Gäste";
	this.basket.guestdata_info = "Bitte geben Sie die Daten der/des Reisenden ein.";
	this.basket.guestdata_info2 = "(* = Pflichtfeld)";
	this.basket.guestdata_room = "Zimmer";
	this.basket.guestdata_guest = "Gast";
	this.basket.summary_head = "Zusammenfassung";
	this.basket.summary_info = "Bitte überprüfen Sie die unten stehende Zusammenfassung bevor Sie die Buchung abschließen.";
	this.basket.agb_confirm = "Ich bin mit den allgemeinen Geschäftsbedingungen einverstanden";	
	this.basket.conf_button = "Buchung abschließen";
	this.basket.vouchers_head = "Gutscheine";
	this.basket.vouchers_for = "für:";
	this.basket.vouchers_amount = "Wert:";
	
 	
	
	this.alerts.agbconfirm = "Bitte bestätigen Sie die allgemeinen Geschäftsbedingungen.";
	this.alerts.bookingconfirm = "Vielen Dank für Ihre Buchung. Ihre Bestätigung erhalten Sie in Kürze.";
	this.alerts.user_updated = "Ihr Profil wurde aktualisiert.";
	this.alerts.user_created = "Ihr Profil wurde angelegt. Sie können sich nun anmelden.";
	this.alerts.noreservationfound = "Es sind keine Resrvierungen vorhanden.";
	this.alerts.requieredfields = "Es sind nicht alle Pflichtfelder ausgefüllt. Bitte überprüfen Sie Ihre Angaben.";
	this.alerts.error = "Bitte entschuldigen Sie. Es ist ein Fehler aufgetreten";
	this.alerts.vouchervalue = "Der Gutschein muss einen Wert zwischen [minvalue] und [maxvalue] [currency] haben. Bitte überprüfen Sie Ihre Angaben.";
	this.alerts.cancelresconfirm = "Klicken Sie Ok um die Reservierung [resno] zu stornieren.";
	this.alerts.rescanceled =  "Ihre Reservierung wurde storniert.";
	this.alerts.cancelreason =  "Bitte wählen Sie einen Stornogrund";
	this.alerts.voucheradded = "Der Gutschein wurde in den Warenkorb gelegt";
	this.alerts.novacancies = "Leider wurden keine Verfügbarkeiten gefunden";
}

protel.internat.translations_de = function() {
	this.global = {};
	this.hotel = {};	
	this.user = {};
	this.form = {};
	this.reservation = {};
	this.basket = {};
	this.alerts = {};
	
/**
* Global variables
*/
	this.global.welcomemessage = "";
	this.global.contact = "Kontakt";
	this.global.online_reservation = "Online Reservierung";
	this.global.online_voucher = "Online Gutscheine";
	this.global.backbutton = "Zurück";
	this.global.homebutton = "Home";
	this.global.cartloginheader = "Warenkorb & Login";
	this.global.cartbutton = "Warenkorb";
	this.global.loginbutton ="Login";
	this.global.loggedinbutton ="Meine Daten";
	this.global.pleaseselect = "Bitte auswählen";
	this.global.save = "Speichern";
	this.global.hotel_single = "Hotel";
	this.global.hotel_multi="Unsere Hotels";
	this.global.map = "Karte";
/**
* User related variables
*/	
	this.user.header = "Login";
	this.user.username = "Benutzer/Email"
	this.user.password = "Passwort";
	this.user.loginbutton = "Login";
	this.user.logoutbutton = "Logout";
	this.user.loggedin_header = "Meine Daten";	
	this.user.loggedin_myprofile = "Mein Profil";
	this.user.loggedin_myprofile_header = "Mein Profil";	
	this.user.loggedin_myreservations = "Meine Reservierungen";
	this.user.loggedin_myreservations_header = "Reservierungen";
	this.user.addnewuser = "Neuen Benutzer anlegen";	
	this.user.createnewuserbutton = "anlegen";	
/**
* Form variables
*/	
	this.form.userheader = "Benutzer";
	this.form.email = "Email";
	this.form.password = "Passwort";
	this.form.nameheader = "Name";
	this.form.salut = "Anrede";
	this.form.firstname = "Vorname";
	this.form.lastname = "Nachname";
	this.form.contactheader = "Kontakt";
	this.form.phone = "Phone";
	this.form.companyheader = "Firma";
	this.form.company = "Firmenname";
	this.form.addressheader = "Adresse";
	this.form.street = "Straße";
	this.form.zip = "PLZ";
	this.form.city = "Ort";
	this.form.country = "Land";	
/**
* Hotelpage variables
*/	
	this.hotel.hotelselect = "Hotelauswahl";	
	this.hotel.header = "Hoteldetails";
	this.hotel.info = "Info";
	this.hotel.pics = "Bilder";
	this.hotel.facebook = "facebook";
	this.hotel.hotelinfos_header = "Hotelinfos";
	this.hotel.hotelinfos_features = "Hotelfeatures";	
/**
* Reservation variables
*/	
	this.reservation.cancel = "stornieren";
	this.reservation.cancelnow = "jetzt stornieren";	
	this.reservation.arrdate = "Anreise";
	this.reservation.depdate = "Abreise";
	this.reservation.roomcount = "Anzahl Zimmer";
	this.reservation.searchstartbutton = "Suche starten";
	this.reservation.header = "Reservierung";
	this.reservation.result_header = "Ergebnisse";
	this.reservation.cat_header = "Kategorien";
	this.reservation.searchparams_arrdep = "An-/Abreise: [arrdate] - [depdate]";
	this.reservation.addbasket_detailsinfo_adults = "Erwachsene(r)";
	this.reservation.addbasket_detailsinfo_childs = "Kind(er)";
	this.reservation.addbasket_detailsinfo_addbeds = "Zusatzbett(en)";
	this.reservation.addbasket_detailsinfo_cots = "Kindbett(en)";
	this.reservation.addbasket_detailsinfo_arrdep = "An-/Abreise: [arrdate] - [depdate]";
	this.reservation.addbasket_detailchange_info = "maximale Personenzahl inkl. Kinder:";
	this.reservation.addbasket_detailchange_adults = "Erwachsene";
	this.reservation.addbasket_detailchange_childs = "Kinder von [agefrom] - [ageto] Jahren";
	this.reservation.addbasket_detailchange_addbeds = "Zusatzbetten";
	this.reservation.addbasket_detailchange_cots = "Kinderbetten";
	this.reservation.addbasket_addbutton = "In den Warenkorb legen";
	this.reservation.addbasket_addedmsg = "Ihre Buchung wurde in den Warenkorb gelegt.";
/**
* Shoppingbasket variables
*/	
	this.basket.header = "Warenkorb";
	this.basket.reservations_head = "Reservierungen";
	this.basket.itemdetails_arrdep = "An-/Abreise:";
	this.basket.itemdetails_category = "Kategorie:";
	this.basket.itemdetails_persons = "Personen:";
	this.basket.itemdetails_persons_adults = "Erwachsene(r)";	
	this.basket.itemdetails_persons_childs = "Kind(er)";
	this.basket.itemdetails_roomcount = "Anzahl Zimmer:";
	this.basket.itemdetails_itemtotal = "Gesamtpreis:";
	this.basket.baskettotal = "Gesamt:";
	this.basket.itemdetails_guests = "Guests:";
	this.basket.checkoutbutton = "Bezahlen";
	this.basket.bookerdata_head = "Meine Daten";
	this.basket.bookerdata_info = "Bitte vervollständigen Sie Ihre Daten.";
	this.basket.bookerdata_info2 = "(* = Pflichtfeld)";
	this.basket.nextbutton = "Weiter";
	this.basket.guestdata_head = "Gäste";
	this.basket.guestdata_info = "Bitte geben Sie die Daten der/des Reisenden ein.";
	this.basket.guestdata_info2 = "(* = Pflichtfeld)";
	this.basket.guestdata_room = "Zimmer";
	this.basket.guestdata_guest = "Gast";
	this.basket.summary_head = "Zusammenfassung";
	this.basket.summary_info = "Bitte überprüfen Sie die unten stehende Zusammenfassung bevor Sie die Buchung abschließen.";
	this.basket.agb_confirm = "Ich bin mit den allgemeinen Geschäftsbedingungen einverstanden";	
	this.basket.conf_button = "Buchung abschließen"; 		
	
	
	this.alerts.agbconfirm = "Bitte bestätigen Sie die allgemeinen Geschäftsbedingungen.";
	this.alerts.bookingconfirm = "Vielen Dank für Ihre Buchung. Ihre Bestätigung erhalten Sie in Kürze.";
	this.alerts.user_updated = "Ihr Profil wurde aktualisiert.";
	this.alerts.user_created = "Ihr Profil wurde angelegt. Sie können sich nun anmelden.";
	this.alerts.noreservationfound = "Es sind keine Resrvierungen vorhanden.";
	this.alerts.requieredfields = "Es sind nicht alle Pflichtfelder ausgefüllt. Bitte überprüfen Sie Ihre Angaben.";
	this.alerts.error = "Bitte entschuldigen Sie. Es ist ein Fehler aufgetreten";
	this.alerts.vouchervalue = "Der Gutschein muss einen Wert zwischen [minvalue] und [maxvalue] [currency] haben. Bitte überprüfen Sie Ihre Angaben.";
	this.alerts.cancelresconfirm = "Klicken Sie Ok um die Reservierung [resno] zu stornieren.";
	this.alerts.rescanceled =  "Ihre Reservierung wurde storniert.";
	this.alerts.cancelreason =  "Bitte wählen Sie einen Stornogrund";
	this.alerts.voucheradded = "Der Gutschein wurde in den Warenkorb gelegt";
	this.alerts.novacancies = "Leider wurden keine Verfügbarkeiten gefunden";
}

protel.internat.translations_en = function() {
	this.global = {};
	this.hotel = {};	
	this.user = {};
	this.form = {};
	this.reservation = {};
	this.basket = {};
	this.alerts = {};
	
/**
* Global variables
*/
	this.global.welcomemessage = "";
	this.global.contact = "Contact";
	this.global.online_reservation = "Online reservation";
	this.global.online_voucher = "Online vouchers";
	this.global.backbutton = "Back";
	this.global.homebutton = "Home";
	this.global.cartloginheader = "Shoppingcart & Login";
	this.global.cartbutton = "Shoppingcart";
	this.global.loginbutton ="Login";
	this.global.loggedinbutton ="My Data";
	this.global.pleaseselect = "please select";
	this.global.save = "Save";
	this.global.hotel_single = "Hotel";
	this.global.hotel_multi="Our Hotels";
	this.global.map = "Map";
/**
* User related variables
*/	
	this.user.header = "Login";
	this.user.username = "User/Email"
	this.user.password = "Password";
	this.user.loginbutton = "Login";
	this.user.logoutbutton = "Logout";
	this.user.loggedin_header = "My Data";	
	this.user.loggedin_myprofile = "My profile";
	this.user.loggedin_myprofile_header = "My profile";	
	this.user.loggedin_myreservations = "My Reservations";
	this.user.loggedin_myreservations_header = "Reservations";
	this.user.addnewuser = "Create new user";	
	this.user.createnewuserbutton = "Create";	
/**
* Form variables
*/	
	this.form.userheader = "User";
	this.form.email = "Email";
	this.form.password = "Password";
	this.form.nameheader = "Name";
	this.form.salut = "Salutation";
	this.form.firstname = "Firstname";
	this.form.lastname = "Lastname";
	this.form.contactheader = "Contact";
	this.form.phone = "Phone";
	this.form.companyheader = "Company";
	this.form.company = "Companyname";
	this.form.addressheader = "Address";
	this.form.street = "Street";
	this.form.zip = "ZIP";
	this.form.city = "City";
	this.form.country = "Country";	
/**
* Hotelpage variables
*/	
	
	this.hotel.header = "Hoteldetails";
	this.hotel.info = "Info";
	this.hotel.pics = "Pictures";
	this.hotel.facebook = "facebook";
	this.hotel.hotelinfos_header = "Hotelinfos";
	this.hotel.hotelinfos_features = "Hotelfeatures";	
/**
* Reservation variables
*/	
	this.reservation.cancel = "cancel";
	this.reservation.cancelnow = "cancel now";	
	this.reservation.arrdate = "Arrival";
	this.reservation.depdate = "Departure";
	this.reservation.roomcount = "Number of rooms";
	this.reservation.searchstartbutton = "Start searching";
	this.reservation.header = "Reservation";
	this.reservation.result_header = "Results";
	this.reservation.cat_header = "Categories";
	this.reservation.searchparams_arrdep = "Arrival/Departure: [arrdate] - [depdate]";
	this.reservation.addbasket_detailsinfo_adults = "Adults";
	this.reservation.addbasket_detailsinfo_childs = "Children";
	this.reservation.addbasket_detailsinfo_addbeds = "Additional Beds";
	this.reservation.addbasket_detailsinfo_cots = "Cots";
	this.reservation.addbasket_detailsinfo_arrdep = "Arrival/Departure: [arrdate] - [depdate]";
	this.reservation.addbasket_detailchange_info = "max. Adults incl. children:";
	this.reservation.addbasket_detailchange_adults = "Adults";
	this.reservation.addbasket_detailchange_childs = "Childs from [agefrom] to [ageto] years";
	this.reservation.addbasket_detailchange_addbeds = "Additional beds";
	this.reservation.addbasket_detailchange_cots = "Cots";
	this.reservation.addbasket_addbutton = "Add to basket";
	this.reservation.addbasket_addedmsg = "Your booking was added to the basket";
/**
* Shoppingbasket variables
*/	
	this.basket.header = "Shoppingcart";
	this.basket.reservations_head = "Reservations";
	this.basket.itemdetails_arrdep = "Arrival/Departure:";
	this.basket.itemdetails_category = "Category:";
	this.basket.itemdetails_persons = "Persons:";
	this.basket.itemdetails_persons_adults = "Adult(s)";	
	this.basket.itemdetails_persons_childs = "Children";
	this.basket.itemdetails_roomcount = "Rooms:";
	this.basket.itemdetails_itemtotal = "Total:";
	this.basket.itemdetails_guests = "Guests:";
	this.basket.baskettotal = "Total:";
	this.basket.checkoutbutton = "Check out";
	this.basket.bookerdata_head = "My Data";
	this.basket.bookerdata_info = "Please complete your data.";
	this.basket.bookerdata_info2 = "(* = mandatory field)";
	this.basket.nextbutton = "Next";
	this.basket.guestdata_head = "Guests";
	this.basket.guestdata_info = "Please complete the travellers data";
	this.basket.guestdata_info2 = "(* = mandatory field)";
	this.basket.guestdata_room = "Rooms";
	this.basket.guestdata_guest = "Guest";
	this.basket.summary_head = "Summary";
	this.basket.summary_info = "Please check the summary before you complete your booking.";
	this.basket.agb_confirm = "I accept the general terms and conditions";	
	this.basket.conf_button = "Complete booking"; 	
	
	
	this.alerts.agbconfirm = "Please confirm the terms and conditions";
	this.alerts.bookingconfirm = "Thank you for your Reservation. You will reveive your confirmation soon";
	this.alerts.user_updated = "Your profile has been updated";
	this.alerts.user_created = "Your profile has been created. You can log on now.";
	this.alerts.noreservationfound = "Sorry. No reservations found";
	this.alerts.requieredfields = "Not all mandatory fields are filled out. Please check again";
	this.alerts.error = "Sorry. An error occured";
	this.alerts.vouchervalue = "The value must be between [minvalue] and [maxvalue] [currency].";
	this.alerts.cancelresconfirm = "Press Ok to cancel the reservation [resno]";
	this.alerts.rescanceled =  "Reservation canceled";
	this.alerts.cancelreason =  "Please select a cancelreason";
	this.alerts.voucheradded = "Der Gutschein wurde in den Warenkorb gelegt";
	this.alerts.novacancies = "Leider wurden keine Verfügbarkeiten gefunden";
}
