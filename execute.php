<?php
//$star_code = 0x1F31F;
$star_code = 0x2605;
setlocale(LC_TIME, 'it_IT');
date_default_timezone_set('Europe/Rome');
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
//Versione
//LaraLuu ver. 3.2 01/12/2018
//Token
//Chestnut2016 (LaraLuu10-Chestnut2016)
//$token = "302203409:AAEyrF7Ke0AbSC8V5D-fySjcWCloL_urcBE";
//Chestnut2018 (LaraLuu20-Chestnut2018)
//$token = "463846721:AAEibpeoS3N55wY8o6F-XEdXdWVKzWUk9BA"; 
//BigBugs (LaraLuu20-BigBugs)
//$token="288290650:AAG2Be9J1dfT_DHdJy-Jwc65vvXivczGEXs";
//BigBugs - (LaraLuu30-BigBugs)
//$token="327275867:AAG-9RXTwHv-TwOnHKQAktab6mEkkGbpJRc";
//BigBugs - (LaraLuu31-BigBugs)
//$token="538008647:AAFZ0C9pcCjqS1GbEbhKOFu7NnPD9WkNinM";
//Cavalieri e furfanti - (LaraLuu31-Cavalieriefurfanti)
//$token="487143922:AAFRNOJ_fVVF1tQ4T_9KDSA1loMSPJZjycw";
//Chestnut2019 - (LaraLuu31-Chestnut2019)
$token="738410474:AAHdHaQ0M3pOmMf1uU9boanIc4JtFy3V5ww";
$botUrl = "https://api.telegram.org/bot".$token."/sendPhoto";
$botUrlVoice = "https://api.telegram.org/bot".$token."/sendVoice";
$botUrlVideo = "https://api.telegram.org/bot".$token."/sendVideo";
$botUrlMessage = "https://api.telegram.org/bot".$token."/sendMessage";
$botUrlDocument = "https://api.telegram.org/bot".$token."/sendDocument";
//parametri ricevuti all'invocazione
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
// path dei file sequenziali gestiti a run-time
$path = 'livello.txt';
$path_abl = 'abilitazione.txt';
$path_admin='amministratore.txt';
$path_black_list='black_list.txt';
$path_restore='restore.txt';
$path_broadcast='broadcast.txt';
$path_classifica='classifica.txt';
$path_users='users.txt';
$path_faq='faq.txt';
$path_faq_menu='faq_.txt';
$path_about='about.txt';
$path_about_menu='about_.txt';
$path_cron='cron.txt';
$path_anagrafica='anagrafica.txt';
$path_automa='automa.txt';
$path_monitor='monitor.txt';
$path_log='log.txt';
$path_lock='lock.txt';
// keyboard con emoticons
$emo_help = "\xF0\x9F\x94\x8D";
$emoji_help=json_decode('"'.$emo_help.'"');
$key_help=$emoji_help." indizi";
$emo_enigma = "\xF0\x9F\x8C\x80";
$emoji_enigma=json_decode('"'.$emo_enigma.'"');
$key_enigma=$emoji_enigma." enigma";
//$emo_about = "\xF0\x9F\x8C\x80";
$emo_about = "\xE2\x84\xB9";
$emoji_about=json_decode('"'.$emo_about.'"');
$key_about=$emoji_about." about";
$emo_aboutinfo = "\xE2\x84\xB9";
$emoji_aboutinfo=json_decode('"'.$emo_aboutinfo.'"');
$key_aboutinfo=$emoji_aboutinfo." info";
$emo_aboutfaq = "\xE2\x84\xB9";
$emoji_aboutfaq=json_decode('"'.$emo_aboutfaq.'"');
$key_aboutfaq=$emoji_aboutfaq." faq";
$emo_ranking = "\xF0\x9F\x8F\x86";
$emoji_ranking=json_decode('"'.$emo_ranking.'"');
$key_ranking=$emoji_ranking." gara";
//$emo_chat = "\xF0\x9F\x93\xA8";
$emo_chat = "\xF0\x9F\x97\xA8";
$emoji_chat=json_decode('"'.$emo_chat.'"');
$key_chat=$emoji_chat." chat";
$emo_setup = "\xF0\x9F\x91\x94";
$emoji_setup=json_decode('"'.$emo_setup.'"');
$key_setup=$emoji_setup." profilo";
// keyborad setup
//$emo_team = "\xF0\x9F\x8E\xBD";
$emo_team = "\xF0\x9F\x9B\xA1";
$emoji_team=json_decode('"'.$emo_team.'"');
$key_team=$emoji_team." team";
$emo_nick = "\xF0\x9F\x90\xB6";
$emoji_nick=json_decode('"'.$emo_nick.'"');
$key_nick=$emoji_nick." nick";
$emo_regnick = "\xF0\x9F\x90\xB6";
$emoji_regnick=json_decode('"'.$emo_regnick.'"');
$key_regnick=$emoji_regnick." registra";
$emo_viewnick = "\xF0\x9F\x90\xB6";
$emoji_viewnick=json_decode('"'.$emo_viewnick.'"');
$key_viewnick=$emoji_viewnick." visualizza";
$emo_nome = "\xF0\x9F\x91\xA8";
$emoji_nome=json_decode('"'.$emo_nome.'"');
$key_nome=$emoji_nome." anagrafica";
//$emo_registrazione = "\xF0\x9F\x93\x9D";
$emo_registrazione = "\xF0\x9F\x91\xA8";
$emoji_registrazione=json_decode('"'.$emo_registrazione.'"');
$key_registrazione=$emoji_registrazione." registra";
//$emo_anagrafica = "\xF0\x9F\x93\x8B";
$emo_anagrafica = "\xF0\x9F\x91\xA8";
$emoji_anagrafica=json_decode('"'.$emo_anagrafica.'"');
$key_anagrafica=$emoji_anagrafica." visualizza";
$emo_keyboardoff = "\xF0\x9F\x94\xA1";
$emoji_keyboardoff=json_decode('"'.$emo_keyboardoff.'"');
$key_keyboardoff=$emoji_keyboardoff." menu off";
$emo_menu = "\xF0\x9F\x8F\x9A";
$emoji_menu=json_decode('"'.$emo_menu.'"');
$key_menu=$emoji_menu." menu";
// keyboard ranking
$emo_granking = "\xF0\x9F\x93\x8A";
$emoji_granking=json_decode('"'.$emo_granking.'"');
$key_granking=$emoji_granking." livelli";
$emo_dranking = "\xF0\x9F\x8E\xAF";
$emoji_dranking=json_decode('"'.$emo_dranking.'"');
$key_dranking=$emoji_dranking." dettagli";
$emo_tranking = "\xF0\x9F\x8E\x96";
$emoji_tranking=json_decode('"'.$emo_tranking.'"');
$key_tranking=$emoji_tranking." classifica";
//$emo_stat = "\xF0\x9F\x93\x9D";
//$emo_stat = "\xF0\x9F\x8F\xB7";
$emo_stat = "\xF0\x9F\x93\x8B";
$emoji_stat=json_decode('"'.$emo_stat.'"');
$key_stat=$emoji_stat." tabellino"; 
// keyboard team
//$emo_crea = "\xF0\x9F\x91\x95";
$emo_crea = "\xF0\x9F\x9B\xA1";
$emoji_crea=json_decode('"'.$emo_crea.'"');
$key_crea=$emoji_crea." crea";
//$emo_aggiungi = "\xF0\x9F\x91\xA5";
$emo_aggiungi = "\xE2\x9E\x95";
$emoji_aggiungi=json_decode('"'.$emo_aggiungi.'"');
$key_aggiungi=$emoji_aggiungi." aggiungi";
//$emo_esci = "\xF0\x9F\x9A\xAA";
$emo_esci = "\xF0\x9F\x91\xA4";
$emoji_esci=json_decode('"'.$emo_esci.'"');
$key_esci=$emoji_esci." esci";
//$emo_sblocca = "\xF0\x9F\x94\x93";
$emo_sblocca = "\xF0\x9F\x94\x91";
$emoji_sblocca=json_decode('"'.$emo_sblocca.'"');
$key_sblocca=$emoji_sblocca." sblocca";
//$emo_elenca = "\xF0\x9F\x93\xB0";
//$emo_elenca = "\xF0\x9F\x8F\xB7";
$emo_elenca = "\xF0\x9F\x91\xAC";
$emoji_elenca=json_decode('"'.$emo_elenca.'"');
$key_elenca=$emoji_elenca." info";
// keyboard lteam
//$emo_crea = "\xF0\x9F\x91\x95";
$emo_lteam = "\xF0\x9F\x9B\xA1";
$emoji_lteam=json_decode('"'.$emo_lteam.'"');
$key_lteam=$emoji_lteam."  team";
monitor($path_monitor, $chatId, "play");
//lettura da file del livello raggiunto dalla chatId e del nick dell'utente corrente 
//nel caso di nuovo deployment dell'applicazione è valorizzato la var restart (restart == true significa nuovo utente)
$myVarsJson = file_get_contents($path);
$myVarsArr = json_decode($myVarsJson,true);
$restart = isset($myVarsArr[$chatId]["livello"]) ? false : true;
$livello = (int)$myVarsArr[$chatId]["livello"];
$data_corrente = date("d/m/Y H:i");
$data_livello = isset($myVarsArr[$chatId]["date"]) ? $myVarsArr[$chatId]["date"] : $data_corrente;
$nickId = isset($myVarsArr[$chatId]["nick"]) ? $myVarsArr[$chatId]["nick"] : "NICK non impostato";
$teamId = isset($myVarsArr[$chatId]["team"]) ? $myVarsArr[$chatId]["team"] : "giocatore singolo";
//lettura da file delle abilitazioni degli indizi per tutti i livelli
//$abilitazione = array(0=>1, 1=>0, 2=>0);
$myAblJson = file_get_contents($path_abl);
$abilitazione = json_decode($myAblJson,true);
//lettura da file degli amministratori
$myAdminJson = file_get_contents($path_admin);
$amministratore = json_decode($myAdminJson,true);
//lettura del file di restore
$myRstJson = file_get_contents($path_restore);
$restore = json_decode($myRstJson,true);
//lettura del file di disabilitazione dei broadcast
$myBrdJson = file_get_contents($path_broadcast);
$flagBroadcast = json_decode($myBrdJson,true);
//verifica se l'utente corrente è amministratore
//il primo che si connette è eletto amministratore
if (isset($amministratore['flag'])=== false)
{
	$amministratore[$chatId] = true;
	$amministratore['flag'] = true;
	$amministratore['stato_gioco'] = "da_avviare";
	$amministratore['maxTeam'] = 7;
	$myAdminJson = json_encode($amministratore);
	file_put_contents($path_admin, $myAdminJson, LOCK_EX);
	$utenteAdmin=true;
	$myVarsArr[$chatId]["nick"]="ADMIN";
	$myVarsJson = json_encode($myVarsArr);
	file_put_contents($path, $myVarsJson, LOCK_EX);
}
elseif ($amministratore[$chatId] === true) 
	$utenteAdmin=true;
else
	$utenteAdmin=false;
// imposta il numero massimo di utenti
if (isset($amministratore['maxTeam'])=== false)
	$MAX_TEAM=7;
else
	$MAX_TEAM=$amministratore['maxTeam'];
//ottiene l'id di ADMIN e la data dell'ultimo backup
foreach ($myVarsArr as $key => $value)
{
	if ($myVarsArr[$key]["nick"]=="ADMIN")
	{
		$data_ultimo_bck = $myVarsArr[$key]["backup"];
		$idADMIN = $key;
		break;
	}
}	
//Verifica di congruenza (scongiura il caso in cui la lettura non è OK)
if (!isset($idADMIN))
{
	$response='non ho capito, ripeti per favore...';
	$parameters = array('chat_id' => $chatId, "text" => $response);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	
	exit();
}
	
//ottiene lo stato del gioco: da_avviare, terminato, in_pausa, da_ripristinare, in_esecuzione
//(è memorizzato nel file amministratore.txt)
$statoGioco=$amministratore['stato_gioco'];
if (($statoGioco == "in_esecuzione") || ($statoGioco == "in_pausa")) //gestisce lo stato da_ripristinare (si verifica quando, con un backup già deployato, si riavvia il sistema) 
{
	$statoGioco = isset($restore["gestito"]) ? $statoGioco : "da_ripristinare";
}
//gestione dei comandi a tempo
$myCrnJson = file_get_contents($path_cron);
$cron = json_decode($myCrnJson,true);
$nuovoComando = comando_ritardato($statoGioco, $cron);
if ($nuovoComando !== "nessuno")
{
	$response = "il bot ha eseguito un cambio di stato\nper favore ripeti la richiesta";
	$parameters = array('chat_id' => $chatId, "text" => $response);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	
	$msg = "il bot effettua un cambio di stato\n";
	$msg = $msg . "/match " . $nuovoComando . " -s";
		
	$all_chatId = array_keys($amministratore);
	$tot = count($all_chatId);
	for ($i=0; $i<$tot; $i++) 
	{ 
		if ($all_chatId[$i]>0)
		{
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $all_chatId[$i] . "&text=" . urlencode($msg);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
		}
	}
	
	$utenteAdmin=true;
	$data_corrente = date("d/m/Y H:i", (int)$cron[timestamp]);
	$chatId = 1; // nessuna ulteriore notifica
	
	/*
	$nulla="";
	$nulla = json_encode($nulla);
	file_put_contents($path_cron, $nulla, LOCK_EX);
	*/
	
	unlink($path_cron);
	
	if ($nuovoComando == "start")
	{
		$text = "/match start -s";
	}
	else if ($nuovoComando == "go")
	{
		$text = "/match go -s";
	}
	else if ($nuovoComando == "sleep")
	{
		$text = "/match sleep -s";
	}
	else if ($nuovoComando == "end")
	{
		$text = "/match end -s";
	}
}
	
//flag utilizzato per gestire comandi utente nello stato da_avviare o terminato se richiesti dall'admin
$eccezione=false;
//lettura del file delle domande
$xml=simplexml_load_file("domande.xml") or die("Error: Cannot create object");
//calcolo tempi di attesa per gli aiuti
$attesa_aiuto1 = isset($xml->domanda[$livello]->attesa1)?$xml->domanda[$livello]->attesa1 : 60;
$attesa_aiuto2 = isset($xml->domanda[$livello]->attesa2)?$xml->domanda[$livello]->attesa2 : 120;
$attesa_aiuto3 = isset($xml->domanda[$livello]->attesa3)?$xml->domanda[$livello]->attesa3 : 180;
if (isset($abilitazione[$livello]["aiuto1"]))
	$attesa_aiuto1 = $abilitazione[$livello]["aiuto1"];
if (isset($abilitazione[$livello]["aiuto2"]))
	$attesa_aiuto2 = $abilitazione[$livello]["aiuto2"];
if (isset($abilitazione[$livello]["aiuto3"]))
	$attesa_aiuto3 = $abilitazione[$livello]["aiuto3"];
//********* conversione dei comandi inviati da keyboard o tramite link
$key_help_command="/help -H";
$key_enigma_command="/refresh";
$key_stat_command="/stat";
$key_dranking_command="/ranking";
$key_tranking_command="/ranking -K";
$key_granking_command="/ranking -V";
$key_regnick_command="/nick";
$key_viewnick_command="/nick -V";
$key_chat_command="/chat";
$key_setup_command="/setup";
$key_crea_command="/team -C";
$key_elenca_command="/team -l";
$key_sblocca_command="/team -r";
$key_esci_command="/team -s";
$key_aggiungi_command="/team -A";
$key_elenca_command="/team -l";
$key_keyboardoff_command="/menu off";
$key_registrazione_command="/register";
$key_anagrafica_command="/register -V";
$key_aboutinfo_command="/about -A";
$key_aboutfaq_command="/about -F";
$key_lteam_command="/lteam";
$link_liv="/liv_";
if(strpos($text, $key_help) === 0)
{
	push_automa($path_automa, $chatId);
	$text = $key_help_command;
}
else if (strpos($text, $key_enigma) === 0)
{
	push_automa($path_automa, $chatId);
	$text = $key_enigma_command;
}
else if (strpos($text, $key_stat) === 0)
{
	push_automa($path_automa, $chatId);
	$text = $key_stat_command;
}
else if (strpos($text, $key_chat) === 0)
{
	set_automa($key_chat_command, $path_automa, $chatId);
	
	$msg = "inserisci il messaggio da inviare all'admin";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);	
	
	exit();
}
else if (strpos($text, $key_about) === 0)
{
	push_automa($path_automa, $chatId);
	$reply_markup='{"keyboard":[["'.$key_aboutinfo.'","'.$key_aboutfaq.'"],["'. $key_menu .'"]],"resize_keyboard":true}';
		
	$msg="menu about";
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
}
else if (strpos($text, $key_aboutinfo) === 0)
{
	push_automa($path_automa, $chatId);
	$text = $key_aboutinfo_command;
}
else if (strpos($text, $key_aboutfaq) === 0)
{
	push_automa($path_automa, $chatId);
	$text = $key_aboutfaq_command;
}
else if (strpos($text, $key_dranking) === 0)
{
	set_automa($key_dranking_command, $path_automa, $chatId);
	
	$msg = "inserisci il numero del livello";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);	
	
	exit();
}
else if (strpos($text, $key_tranking) === 0)
{
	push_automa($path_automa, $chatId);
	$text = $key_tranking_command;
}
else if (strpos($text, $key_granking) === 0)
{
	push_automa($path_automa, $chatId);
	$text = $key_granking_command;
}
else if (strpos($text, $key_nick) === 0)
{
	push_automa($path_automa, $chatId);
	$reply_markup='{"keyboard":[["'.$key_regnick.'","'.$key_viewnick.'"],["'. $key_menu .'"]],"resize_keyboard":true}';
		
	$msg="menu nickname";
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
}
else if (strpos($text, $key_regnick) === 0)
{
	set_automa($key_regnick_command, $path_automa, $chatId);
	
	$msg = "inserisci il nickname (nome di fantasia usato durante la gara)";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);	
	
	exit();
}
else if (strpos($text, $key_viewnick) === 0)
{
	push_automa($path_automa, $chatId);
	$text = $key_viewnick_command;
}
else if (strpos($text, $key_crea) === 0)
{
	set_automa($key_crea_command, $path_automa, $chatId);
	
	$msg = "inserisci il nome del team che vuoi creare";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);	
	
	exit();
}
else if (strpos($text, $key_esci) === 0)
{
	$cmd_question=$key_esci_command."?";
	set_automa($cmd_question, $path_automa, $chatId);
	
	$msg = "confermi di voler uscire dal team e partecipare come giocatore singolo?\n\ninvia ok per uscire dal team";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);	
	
	exit();
	
}
else if (strpos($text, $key_sblocca) === 0)
{	
	$cmd_question=$key_sblocca_command."?";
	set_automa($cmd_question, $path_automa, $chatId);
	
	$msg = "hai richiesto di sbloccare la tua utenza per abilitarne l'inserimento in un team già esistente\n\nin seguito, per completare l'operazione di inserimento, un giocatore del team dovrà aggiungere il tuo nickname\n\ninvia ok per procedere allo sblocco";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);	
	
	exit();
}
else if (strpos($text, $key_aggiungi) === 0)
{
	set_automa($key_aggiungi_command, $path_automa, $chatId);
	
	$msg = "inserisci il nickname del giocatore da aggiungere al team";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);	
	
	exit();
}
else if (strpos($text, $key_elenca) === 0)
{
	push_automa($path_automa, $chatId);
	$text = $key_elenca_command;
}
else if (strpos($text, $key_keyboardoff) === 0)
{
	$cmd_question=$key_keyboardoff_command."?";
	set_automa($cmd_question, $path_automa, $chatId);
	
	$msg = "hai richiesto di disabilitare l'uso dei menu per interagire con il bot esclusivamente con i comandi\n\nin seguito potrai abilitare nuovamente l'interfaccia a menu mediante il comando /menu on\n\ninvia ok per procedere";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);	
	
	exit();
}
else if (strpos($text, $key_lteam) === 0)
{
	set_automa($key_lteam_command, $path_automa, $chatId);
	
	$msg = "inserisci le lettere inziali del team da visualizzare";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);	
	
	exit();
}
else if (strpos($text, $key_setup) === 0)
{
	push_automa($path_automa, $chatId);
	
	$reply_markup='{"keyboard":[["'.$key_nome.'","'.$key_nick.'"],["'.$key_team.'","'. $key_menu .'"]],"resize_keyboard":true}';
		
	$msg="menu profilo";
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
	
}
else if (strpos($text, $key_ranking) === 0)
{
	push_automa($path_automa, $chatId);
	$reply_markup='{"keyboard":[["'.$key_tranking.'","'.$key_granking.'","'.$key_dranking.'"],["'.$key_stat.'","'. $key_lteam . '","'. $key_menu .'"]],"resize_keyboard":true}';
		
	$msg="menu gara";
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
	
}
else if (strpos($text, $key_team) === 0)
{
	push_automa($path_automa, $chatId);
	
	$reply_markup='{"keyboard":[["'.$key_crea.'","'.$key_aggiungi.'","'.$key_sblocca.'"],["'.$key_esci.'","'. $key_elenca .'","'. $key_menu .'"]],"resize_keyboard":true}';
		
	$msg="menu team";
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
	
}
else if (strpos($text, $key_nome) === 0)
{	
	push_automa($path_automa, $chatId);
	$reply_markup='{"keyboard":[["'.$key_registrazione.'","'.$key_anagrafica.'"],["'. $key_menu .'"]],"resize_keyboard":true}';
		
	$msg="menu anagrafica";
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
}
else if (strpos($text, $key_registrazione) === 0)
{	
	set_automa($key_registrazione_command, $path_automa, $chatId);
	
	$msg = "registrati inserendo nome cognome e classe";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);	
	
	exit();
	
}
else if (strpos($text, $key_anagrafica) === 0)
{
	push_automa($path_automa, $chatId);
	$text = $key_anagrafica_command;
}
else if (strpos($text, $key_menu) === 0)
{
	push_automa($path_automa, $chatId);
	
	$reply_markup='{"keyboard":[["'.$key_enigma.'","'.$key_help.'", "'.$key_ranking.'"],["'.$key_chat.'","'. $key_setup. '","'.$key_about .'"]],"resize_keyboard":true}';
		
	$msg="menu principale";
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
	
}
else if (strpos($text, $link_liv) === 0)
{
	push_automa($path_automa, $chatId);
	$text = "/ranking ".substr($text, strpos($text, $link_liv)+strlen($link_liv), strlen($text));
}
// ********* gestisce i comandi pendenti inviati tramite menu
$push=push_automa($path_automa, $chatId);
if (isquestion($push))
{
	if ($text === "ok")
		$text=estrai_cmd($push);
	else
		exit();
}
else
	$text=estrai_cmd($push).$text;
//********* comandi eseguibili come amministratore
// Invio dei menu
if(strcmp($text, '/start') === 0)
{
	$reply_markup='{"keyboard":[["'.$key_enigma.'","'.$key_help.'", "'.$key_ranking.'"],["'.$key_chat.'","'. $key_setup. '","'.$key_about .'"]],"resize_keyboard":true}';
		
	$msg="menu abilitati";
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
}
//invio di un messaggio di benvenuto agli amministratori in caso di start o restart (dovuto a deployment dell'app)
if(((strcmp($text, '/start') === 0) || $restart === true) && ($utenteAdmin === true))
{
	$msg = "utente admin\n/list elenca nuovi comandi";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
}
//list dei comandi admin
if(strpos($text, '/list') !== false && $utenteAdmin === true) 
{
	$msg =       "/list\n    comandi di admin\n";
	$msg = $msg . "/multicast livello messaggio\n    messaggio sul livello\n";
	$msg = $msg . "/braodcast messaggio\n    messaggio a tutti\n";
	$msg = $msg . "/unicast Id | nick | team messaggio\n    messaggio a utente/team\n";
	$msg = $msg . "/admin Id\n    nuovo admin\n";
	$msg = $msg . "/match:\n    /match start [-s]  (inizio gara)\n    /match go [-s]  (restart gara)\n    /match sleep [-s]  (in pausa)\n    /match end [-s]  (fine gara)\n    /match status   (statistiche)\n";
	$msg = $msg . "    /match start -t [data ora]\n    /match go -t [data ora]\n    /match sleep -t [data ora]\n    /match end -t [data ora]\n";
	$msg = $msg . "/maxteam num\n    max giocatori in team\n";
	$msg = $msg . "/enable:\n    /enable liv t1 t2 t3\n    /enable -liv t1 t2 t3\n    t1 t2 t3 tempi in min\n";
	$msg = $msg . "/identity Id | nick | team\n    identifica utente o team\n";
	$msg = $msg . "/lnext livello\n    avanza gli utenti del livello\n";
	$msg = $msg . "/backup:\n    /backup 1   livelli\n    /backup 2   aiuti\n    /backup 3   admin\n    /backup 4   blacklist\n    /backup 5   anagrafica\n";
	$msg = $msg . "/reset:\n    /reset game  [-n]\n     azzera livelli (nick)\n    /reset bot\n      azzera i file\n    /reset broadcast\n     abilita msg broadcast\n";
	$msg = $msg . "/lset:\n    /lset Id livello\n       imposta livello di Id e team\n    /lset nick livello\n       imposta livello di nick e team\n";
	$msg = $msg . "/sset:\n    /sset Id stelle\n       imposta le stelle di Id\n    /sset nick stelle\n       imposta le stelle di nick\n";
	$msg = $msg . "/blacklist:\n    /blacklist Id insert\n    /blacklist Id delete\n    /blacklist list\n";
	$msg = $msg . "/show:\n    /show count\n    /show autors [autore]\n    /show enigma numero\n    /show help numero\n    /show solution numero\n";
	$msg = $msg . "/users:\n    /users numero\n    /users all\n";
	$msg = $msg . "/export\n    esporta classifica\n";
	$msg = $msg . "/iam:\n    /iam [-s] Id comando\n       esegue comando come Id\n    /iam [-s] nick comando\n       esegue comando come nick\n";
	$msg = $msg . "/monitor:\n    /monitor on\n    /monitor off\n    /monitor show\n";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	exit();
}
//monitor     monitoraggio delle richieste
if(strpos($text, '/monitor') !== false && $utenteAdmin === true) 
{
	if (strpos($text, " ")>0)
	{
		$abl  = explode(" ", $text);
		
		if ($abl[1] == "on")
		{
			monitor($path_monitor, $chatId, "on");
			$response = "monitoraggio attivato\n";
		}
		elseif ($abl[1] == "off")
		{
			monitor($path_monitor, $chatId, "off");
			$response = "monitoraggio disabilitato\n";
		}
		elseif ($abl[1] == "show")
		{
			$response = monitor($path_monitor, $chatId, "show");
		}
	}
	else
	{
		$response = "per gestire il monitoraggio delle transazioni usa i comandi:\n/monitor on     (attiva il monitoraggio)\n/monitor off    (disabilita il monitoraggio)\n/monitor show  (mostra le statistiche)\n";
	}
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	exit();
}
//iam: cambia l'identità dell'utente
if(strpos($text, '/iam') !== false && $utenteAdmin === true) 
{
	if (strpos($text, " ")>0)
	{
		$par  = explode(" ", $text);
		
		if ($par[1]=="-s")
		{
			$superuser=true;
			$id=(int)$par[2];
			$nick  = $par[2];
		}
		else
		{
			$superuser=false;
			$id=(int)$par[1];
			$nick  = $par[1];
		}
		
		foreach ($myVarsArr as $key => $value)
		{
			if ($myVarsArr[$key]["nick"]===$nick)
			{
				$id=(int)$key;
				break;
			}
		}
		
		if (!isset($myVarsArr[(int)$id]['livello']))
		{
			$response = "utente sconosciuto";
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
			exit();
		}
		else
		{
			$nickId = isset($myVarsArr[$id]["nick"]) ? $myVarsArr[$id]["nick"] : "NICK non impostato";
			$teamId = isset($myVarsArr[$id]["team"]) ? $myVarsArr[$id]["team"] : "giocatore singolo";
			if (!$superuser)
			{
				if ($amministratore[$id] === true) 
					$utenteAdmin=true;
				else
					$utenteAdmin=false;
				$text = substr($text, strpos($text, $par[2]));
			}
			else
			{
				$utenteAdmin=true;
				$text = substr($text, strpos($text, $par[3]));
			}
			
			$chatId = $id;
			
			//nel caso di nuovo deployment dell'applicazione è valorizzato la var restart (restart == true significa nuovo utente)
			$restart = isset($myVarsArr[$chatId]["livello"]) ? false : true;
			$livello = (int)$myVarsArr[$chatId]["livello"];
			$data_livello = isset($myVarsArr[$chatId]["date"]) ? $myVarsArr[$chatId]["date"] : $data_corrente;
		}
	}
	else
	{
		$response = "per eseguire un comando con l'identità di un diverso giocatore usa uno dei comandi\n\n/iam [-s] Id comando\n/iam [-s] nick comando\n(il flag -s consente di eseguire per conto dell'utente i comandi dell'admin)\n";
	
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		exit();
	}
}
//match: cambia lo stato del gioco
if(strpos($text, '/match') !== false && $utenteAdmin === true) 
{
	if (strpos($text, " ")>0)
	{
		$abl  = explode(" ", $text);
		
		if ($abl[1] == "start" || $abl[1] == "go"  || $abl[1] == "sleep" || $abl[1] == "end")
		{	
	
			if ($abl[2]=="-t")
			{
				if (isset($abl[3]) && isset($abl[4]))
				{
					$ore = substr($abl[4], 0, strpos($abl[4], ":"));
					$minuti = substr($abl[4], strpos($abl[4], ":")+1);
					$mese = substr($abl[3], 3, 2);
					$giorno = substr($abl[3], 0, 2);
					$anno = substr($abl[3], 6, 4);
					$secondi = mktime($ore, $minuti, 0, $mese, $giorno, $anno);
					$cron['timestamp']=$secondi;
					$cron['comando']= $abl[1];
					$myCrnJson = json_encode($cron);
					file_put_contents($path_cron, $myCrnJson, LOCK_EX);
					$attesa=($secondi - time());
					$hh = (int)($attesa / 3600);
					$mm = (int)(($attesa % 3600)/60);
					$ss = (int)(($attesa % 3600)%60);
					$msg = "inserito comando a tempo\n/match " . $abl[1] . " -s (in esecuzione tra " . $hh . "h " . $mm . "m " . $ss . "s)";
					$all_chatId = array_keys($amministratore);
					$tot = count($all_chatId);
					for ($i=0; $i<$tot; $i++) 
					{ 
						if ($all_chatId[$i]>0)
						{
							$ch = curl_init();
							$myUrl=$botUrlMessage . "?chat_id=" . $all_chatId[$i] . "&text=" . urlencode($msg);
							curl_setopt($ch, CURLOPT_URL, $myUrl); 
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
							
							// read curl response
							$output = curl_exec($ch);
							curl_close($ch);
						}
					}
				}
				elseif(!isset($abl[3]) && !isset($abl[4]))
				{
					/*
					$nulla="";
					$nulla = json_encode($nulla);
					file_put_contents($path_cron, $nulla, LOCK_EX);
					*/
					
					unlink($path_cron);
					
					$msg = "rimosso comando a tempo";
					
					$all_chatId = array_keys($amministratore);
					$tot = count($all_chatId);
					for ($i=0; $i<$tot; $i++) 
					{ 
						if ($all_chatId[$i]>0)
						{
							$ch = curl_init();
							$myUrl=$botUrlMessage . "?chat_id=" . $all_chatId[$i] . "&text=" . urlencode($msg);
							curl_setopt($ch, CURLOPT_URL, $myUrl); 
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
							
							// read curl response
							$output = curl_exec($ch);
							curl_close($ch);
						}
					}
				}
				else
				{
					$response = "uso errato del comando /match";
					$ch = curl_init();
					$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
					curl_setopt($ch, CURLOPT_URL, $myUrl); 
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					
					// read curl response
					$output = curl_exec($ch);
					curl_close($ch);
				}
				exit();
			}
			if ($abl[2]=="-s")
				$muto=true;
			else
				$muto=false;
			$regolare=true;
			
			if ($abl[1] == "start")
			{
				if (($statoGioco == "da_ripristinare") || ($statoGioco == "in_pausa"))
				{
					$response = "il sistema è nello stato " . $statoGioco . "\neseguire /match go o /reset game";
					$regolare=false;
				}
				elseif ($statoGioco == "terminato")
				{
					$response = "il sistema è nello stato " . $statoGioco . "\neseguire /reset game";
					$regolare=false;
				}
				else 
				{
					$amministratore['stato_gioco'] = "in_esecuzione";
					$myAdminJson = json_encode($amministratore);
					file_put_contents($path_admin, $myAdminJson, LOCK_EX);
					
					$restore["gestito"] = $data_corrente;
					$myRstJson = json_encode($restore);
					file_put_contents($path_restore, $myRstJson, LOCK_EX);
					
					$response = "stato del gioco: in esecuzione";
					$notifica = "la gara è iniziata!!!\ntocca il pulsante 'enigma' per continuare";
				}
			}	
			elseif ($abl[1] == "go")
			{
				if ($statoGioco == "da_avviare")
				{
					$response = "il sistema è nello stato " . $statoGioco . "\neseguire /match start";
					$regolare=false;
				}
				else
				{
					$amministratore['stato_gioco'] = "in_esecuzione";
					$myAdminJson = json_encode($amministratore);
					file_put_contents($path_admin, $myAdminJson, LOCK_EX);
					
					if (($statoGioco == "da_ripristinare") || ($statoGioco == "terminato"))
					{
						$restore['gestito'] = $data_corrente;
						$myRstJson = json_encode($restore);
						file_put_contents($path_restore, $myRstJson, LOCK_EX);
						
						$response = "stato del gioco: in esecuzione";
						$notifica = "il bot è stato riavviato\naggiornamento del\n" . $data_ultimo_bck . "\n\n\ntocca il pulsante 'enigma' per continuare";
					}
					else
					{
						$response = "stato del gioco: in esecuzione";
						$notifica = "la gara è ripresa!\n\ntocca il pulsante 'enigma' per continuare";
					}
					$statoGioco = "in_esecuzione";
				}
			}
			elseif 	($abl[1] == "sleep")
			{
				if ($statoGioco == "da_ripristinare")
				{
					$restore['gestito'] = $data_corrente;
					$myRstJson = json_encode($restore);
					file_put_contents($path_restore, $myRstJson, LOCK_EX);
				}
				
				$amministratore['stato_gioco'] = "in_pausa";
				$myAdminJson = json_encode($amministratore);
				file_put_contents($path_admin, $myAdminJson, LOCK_EX);
				$response = "stato del gioco: in pausa";
				$notifica = "la gara è momentaneamente sospesa";
			}	
			elseif 	($abl[1] == "end")
			{
				if ($statoGioco == "da_ripristinare")
				{
					$restore['gestito'] = $data_corrente;
					$myRstJson = json_encode($restore);
					file_put_contents($path_restore, $myRstJson, LOCK_EX);
				}
				$amministratore['stato_gioco'] = "terminato";
				$myAdminJson = json_encode($amministratore);
				file_put_contents($path_admin, $myAdminJson, LOCK_EX);
				$notifica = 'la gara è terminata, il tesoro è stato trovato!';
			}
			
			if (!$muto && $regolare)
			{
				if (!verifyBrd($flagBroadcast, $path_broadcast, $chatId))
					exit();
			
				$j=0;
				foreach ($myVarsArr as $key => $value)
				{
					//Telegram prescrive una pausa di 1 sec ogni 30 notifiche 
					if ($j % 20 == 0)
					{
						sleep(1);
					}
					$j++;
					$ch = curl_init();
					$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($notifica);
					curl_setopt($ch, CURLOPT_URL, $myUrl); 
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					
					// read curl response
					$output = curl_exec($ch);
					curl_close($ch);
				}
				setBrd($flagBroadcast, $path_broadcast, $chatId);
			}
		}
		elseif ($abl[1] == "status")
		{
		
			if (isset($restore["gestito"]))
				$data_riavvio = $restore["gestito"];
			elseif ($statoGioco == "da_avviare")
				$data_riavvio = "<in attesa di start>";
			elseif ($statoGioco == "da_ripristinare")
				$data_riavvio = "<in attesa di go>";
				
			if (!isset($flagBroadcast[$chatId]["stato"]))
				$statoBroadcast="abilitato";
			else if (time() - $flagBroadcast[$chatId]["stato"]>60)
				$statoBroadcast="abilitato";
			else
				$statoBroadcast="non abilitato";
			// statistiche sui partecipanti
			$tot=0;
			$nprimi=0;
			$maxlivello=0;
			foreach ($myVarsArr as $key => $value) 
			{
				if ($maxlivello < $value['livello'])
				{
					$maxlivello = $value['livello'];
				}
				$tot++;
			}
		
			if (isset($cron["timestamp"]))
			{
				$data_cron = date("d/m/Y H:i", $cron["timestamp"]);
				$comando_cron = "/match " . $cron["comando"] . " -s";
				$msg_cron = "\n\ncomando a tempo:\n$comando_cron ($data_cron)";
			}
			else
			{
				$msg_cron = "";
			}
			$response = "ultimo riavvio: "  . $data_riavvio . "\nultimo backup: " . $data_ultimo_bck . "\nstato: " . $statoGioco ."\nmsg broadcast: " . $statoBroadcast;
			
			$response = $response . $msg_cron;
			$response = $response . "\n\nmax giocatori per team: " . $MAX_TEAM;
			$response = $response . "\n\n" . $tot . " giocatori partecipanti";
			$response = $response . "\nlivello max raggiunto: " . $maxlivello;
		}
		
		else
		{
			$response = "uso del comando /match:\n    /match start [-s]  (inizio gara)\n    /match go [-s] (restart gara)\n    /match sleep [-s]  (in pausa)\n    /match end  [-s] (fine gara)\n    /match status   (statistiche)\n       flag -s: senza notifica";
			$response = $response . "\n\n    /match start -t  [data ora]\n    /match go -t  [data ora]\n    /match sleep -t  [data ora]\n    /match end  -t  [data ora]\n       -t (rimuove comando)\n       -t gg/mm/aaaa hh:mm\n       (senza notifica)";
		}
	
	}
	else
	{
	
		$response = "uso del comando /match:\n    /match start [-s]  (inizio gara)\n    /match go [-s] (restart gara)\n    /match sleep [-s]  (in pausa)\n    /match end  [-s] (fine gara)\n    /match status   (statistiche)\n       flag -s: senza notifica";
		$response = $response . "\n\n    /match start -t  [data ora]\n    /match go -t  [data ora]\n    /match sleep -t  [data ora]\n    /match end  -t  [data ora]\n       -t (rimuove comando)\n       -t gg/mm/aaaa hh:mm\n       (senza notifica)";
	}
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	exit();
}
//backup
if(strpos($text, '/backup') !== false && $utenteAdmin === true) 
{
	if (strpos($text, " ")>0)
	{
		$tipo  = explode(" ", $text);
		$msg = "invio eseguito correttamente";
		if ((int)$tipo[1] === 1)
		{
		
			$myVarsArr[$idADMIN]["backup"]=$data_corrente;
			$myVarsJson = json_encode($myVarsArr);
			file_put_contents($path, $myVarsJson, LOCK_EX);
			$postFields = array('chat_id' => $chatId, 'document' => new CURLFile($path));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $botUrlDocument); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
	
		}
		elseif ((int)$tipo[1] === 2)
		{
			$postFields = array('chat_id' => $chatId, 'document' => new CURLFile($path_abl));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $botUrlDocument); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
		}
		elseif ((int)$tipo[1] === 3)
		{
			$postFields = array('chat_id' => $chatId, 'document' => new CURLFile($path_admin));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $botUrlDocument); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
		}
		elseif ((int)$tipo[1] === 4)
		{
			$postFields = array('chat_id' => $chatId, 'document' => new CURLFile($path_black_list));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $botUrlDocument); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
		}
		elseif ((int)$tipo[1] === 5)
		{
			$postFields = array('chat_id' => $chatId, 'document' => new CURLFile($path_anagrafica));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $botUrlDocument); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
		}
		else
		{
			$msg = "uso del comando /backup:\n    /backup 1   (livelli)\n    /backup 2   (aiuti)\n    /backup 3   (admin)\n    /backup 4   (blacklist)\n    /backup 5   (anagrafica)\n";
		}
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	else
	{
		$response = "uso del comando /backup:\n    /backup 1   (livelli)\n    /backup 2   (aiuti)\n    /backup 3   (admin)\n    /backup 4   (blacklist)\n    /backup 5   (anagrafica)\n";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
		
	exit();
}
//export
if(strpos($text, '/export') !== false && $utenteAdmin === true) 
{
			
	$all_chatId = array_keys($myVarsArr);
	$tot = count($all_chatId);
	$j=0;
	
	//lettura da file delle anagrafiche
	$myAngJson = file_get_contents($path_anagrafica);
	$anagrafica = json_decode($myAngJson,true);
	
	
	$classifica = "Id,nickname,team,lastname (telegram),firstname (telegram),level,star,date,register\n";
	for ($i=0; $i<$tot; $i++) 
	{
		$classifica = $classifica . $all_chatId[$i] . ",'";
		$classifica = $classifica . $myVarsArr[$all_chatId[$i]]['nick'] . "','";
		$classifica = $classifica . $myVarsArr[$all_chatId[$i]]['team'] . "','";
		$classifica = $classifica . $myVarsArr[$all_chatId[$i]]['lastname'] . "','";
		$classifica = $classifica . $myVarsArr[$all_chatId[$i]]['firstname'] . "',";
		$classifica = $classifica . $myVarsArr[$all_chatId[$i]]['livello'] . ",";
		$classifica = $classifica . $myVarsArr[$all_chatId[$i]]['star'] . ",";
		$classifica = $classifica . $myVarsArr[$all_chatId[$i]]['date'] . ",";
		$classifica = $classifica . $anagrafica[$all_chatId[$i]]['anagrafica'] . "\n";
	}
		
	//$myClassJson = json_encode($classifica);
	file_put_contents($path_classifica, $classifica, LOCK_EX);
	$postFields = array('chat_id' => $chatId, 'document' => new CURLFile($path_classifica));
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
	curl_setopt($ch, CURLOPT_URL, $botUrlDocument); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
}
//users
if(strpos($text, '/users') !== false && $utenteAdmin === true) 
{
	$par  = explode(" ", $text);
	if (!isset($par[1]))
	{
		$response = "uso del comando /users:\n/users numero\n     utenti del livello\n/users top\n     utenti del livello top\n/users all\n     tutti gli utenti\n";
	}
	else if ($par[1] == "all")
	{
		foreach ($myVarsArr as $key => $value)
		{
			if(isset($value['team']) && strlen($value['team'])>=1)
			{
				$elencoteam[$value['team']] = (int)$elencoteam[$value['team']]+1;
			}
		}
		$tot_team=count($elencoteam);
		$response="utenti presenti sul bot\n";
	
		if ($tot_team > 0)
			$response=$response . "\n    <team> (" . $tot_team . ")";
		foreach ($elencoteam as $key_team => $value_team)
		{	
			foreach ($myVarsArr as $key => $value)
			{
				if($value['team'] == $key_team)
				{
					$response=$response . "\nId: " . $key;
					if ((int)$value['star'] > 0)
						$response=$response . " (" . $value['star'] . unichr($star_code) . ")";
					$response=$response . "\n    nick: " . $value['nick'] . "\n    team: " . $value['team'];
				}
			}
		}
		if ($tot_team > 0)
			$response=$response . "\n";
		$tot_single=0;
		$response_="";
		foreach ($myVarsArr as $key => $value)
		{
			if(isset($value['nick']) && ((!isset($value['team'])) || strlen($value['team'])==0))
			{
				$response_=$response_ . "\nId: " . $key;
				if ((int)$value['star'] > 0)
						$response_=$response_ . " (" . $value['star'] . unichr($star_code) . ")";
				$response_=$response_ . "\n    nick: " . $myVarsArr[$key]["nick"];
				$tot_single = $tot_single + 1;
			}
		}
		if ($tot_single > 0)
		{
			$response=$response . "\n    <giocatori singoli> (" . $tot_single . ")";
			$response=$response . $response_;
			$response=$response . "\n";
		}
		$tot_anonimi=0;
		$response_="";
		foreach ($myVarsArr as $key => $value)
		{
			if(!isset($value['nick']))
			{
				$response_=$response_ . "\nId: " . $key;
				if ($value['star'] > 0)
						$response=$response . " (" . $value['star'] . unichr($star_code) . ")";
				$tot_anonimi++;
			}
		}
		if ($tot_anonimi > 0)
		{
			$response=$response . "\n    <giocatori anonimi> (" . $tot_anonimi . ")";
			$response=$response . $response_;
		}	
	}
	else if (is_numeric($par[1]) || $par[1]=="top")
	{
		$liv = $par[1];
		if ($par[1] == "top")
		{
			foreach ($myVarsArr as $key => $value)
			{
				if(isset($value['team']))
				{
					if (strlen($value['team'])>=1)
					{
						$elencoteam[$value['team']]['num'] = (int)$elencoteam[$value['team']]['num']+1;
						$elencoteam[$value['team']]['livello']=$value['livello'];
					}
					else
					{
						$single=isset($value['nick']) ? $value['nick'] : $key;
						$elencosingoli[$single]=$value['livello']; 
						$numsingle++;	
					}
				}
				else
				{
					$single=isset($value['nick']) ? $value['nick'] : $key;
					$elencosingoli[$single]=$value['livello'];
					$numsingle++;
				} 
			}
			
			$maxlivello = 0; 
			foreach ($elencoteam as $key => $value) 
			{
				$i = (int)$elencoteam[$key]['livello'];
				if ($i>$maxlivello)
					$maxlivello=$i;
			}
			foreach ($elencosingoli as $value)
			{
				$i = (int)$value;
				if ($i>$maxlivello)
					$maxlivello=$i;
			} 
			$liv = $maxlivello;
		}
			
		$tot_team = 0;
		$tot_single = 0;
		$tot_anonimi = 0;
		
		unset($elencoteam);
		unset($elencosingoli);
		foreach ($myVarsArr as $key => $value)
		{
			if(isset($value['team']))
			{
				if ((strlen($value['team'])>=1) && ($value['livello'] == $liv))
				{
					$elencoteam[$value['team']] = (int)$elencoteam[$value['team']]+1;
				}
				else if ($value['livello'] == $liv)
				{
						$single=isset($value['nick']) ? $value['nick'] : "anonimo";
						$elencosingoli[$single]=(int)$elencosingoli[$single]+1;
						$tot_single=$tot_single + 1;
				}
			}
			else if ($value['livello'] == $liv)
			{
				$single=isset($value['nick']) ? $value['nick'] : "anonimo";
				if (isset($value['nick']))
				{
					$elencosingoli[$single]=(int)$elencosingoli[$single]+1;
					$tot_single=$tot_single + 1;
				}
				else
					$tot_anonimi=$tot_anonimi + 1;
			}
		}
		$tot_team=count($elencoteam);
		
		$response="utenti del livello " . $liv . "\n";
		
		if ($tot_team > 0)
			$response=$response . "\n    <team> (" . $tot_team . ")";
		foreach ($elencoteam as $key_team => $value_team) 
		{	
			foreach ($myVarsArr as $key => $value)
			{
				if($value['team'] == $key_team)
				{
					$response=$response . "\nId: " . $key;
					if ($value['star'] > 0)
						$response=$response . " (" . $value['star'] . unichr($star_code) . ")";
				$response=$response	. "\n    nick: " . $value['nick'] . "\n    team: " . $value['team'];
				}
			}
		}
		if ($tot_team > 0)
			$response=$response . "\n";
			
		if ($tot_single > 0)
			$response=$response . "\n    <giocatori singoli> (" . $tot_single . ")";
		foreach ($myVarsArr as $key => $value)
		{
			if(isset($value['nick']) && $value['livello']==$liv  && ((!isset($value['team'])) || strlen($value['team'])==0))
			{
				$response=$response . "\nId: " . $key;
				if ($value['star'] > 0)
						$response=$response . " (" . $value['star'] . unichr($star_code) . ")";
				$response=$response	. "\n    nick: " . $myVarsArr[$key]["nick"];
			}
		}
		if ($tot_single > 0)
			$response=$response . "\n";
			
		if ($tot_anonimi > 0)
			$response=$response . "\n    <giocatori anonimi> (" . $tot_anonimi . ")";
		foreach ($myVarsArr as $key => $value)
		{
			if(!isset($value['nick']) && $value['livello']==$liv)
			{
				$response=$response . "\nId: " . $key;
				if ($value['star'] > 0)
						$response=$response . " (" . $value['star'] . unichr($star_code) . ")";
			}
		}
	}
	else
	{
		$response = "uso del comando /users:\n/users numero\n     utenti del livello\n/users top\n     utenti del livello top\n/users all\n     tutti gli utenti\n";
	}
	
	
	if (strlen($response)<4096)
	{
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	else
	{
		file_put_contents($path_users, $response, LOCK_EX);
		$postFields = array('chat_id' => $chatId, 'document' => new CURLFile($path_users));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
		curl_setopt($ch, CURLOPT_URL, $botUrlDocument); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	
	/*
	$parameters = array('chat_id' => $chatId, "text" => $response);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	*/
	exit();
}
//show 
if(strpos($text, '/show') !== false && $utenteAdmin === true) 
{
	if (strpos($text, " ")>0 )
	{
		$par  = explode(" ", $text);
		if ($par[1] === "autors")
		{
			if (isset($par[2]))
				$autoreinserito=true;
			else
				$autoreinserito=false;
			$response = "autori:\n";
			//$xml=simplexml_load_file("domande.xml") or die("Error: Cannot create object");
			for ($i=0; isset($xml->domanda[$i]); $i++)
			{
				//se l'autore coincide oppure non è impostato
				if (((strpos(strtolower($xml->domanda[$i]->autore), strtolower($par[2]))!== false) && $autoreinserito) ||
				    !$autoreinserito)
				{
					$response =  $response . "\n" . $xml->domanda[$i]->autore . ": " . $i;
				}
			}
			
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
			exit();
		}
		elseif ($par[1] === "count")
		{
			//$xml=simplexml_load_file("domande.xml") or die("Error: Cannot create object");
			for ($i=0; isset($xml->domanda[$i]); $i++);
			
			$i--;
			$response =  "livello finale:  " . $i;
			
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
			exit();
		}
		elseif ($par[1] === "enigma")
		{
			//$xml=simplexml_load_file("domande.xml") or die("Error: Cannot create object");
			$livello = (int)$par[2];
			$response = "enigma livello " . (int)$livello . "\n" ;
			$response = $response . "autore: " . $xml->domanda[(int)$livello]->autore . "\n\n" ;
			
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
			$tipo = $xml->domanda[(int)$livello]->tipo;
			$eccezione = true;
			
		}
		elseif ($par[1] === "help")
		{
			//$xml=simplexml_load_file("domande.xml") or die("Error: Cannot create object");
			$livello = (int)$par[2];
			$response = "aiuti livello " . (int)$livello . "\n" ;
			$response = $response . "autore: " . $xml->domanda[(int)$livello]->autore . "\n\n" ;
			//$xml=simplexml_load_file("domande.xml") or die("Error: Cannot create object");
			$indizio = array(0 => (String)($xml->domanda[$livello]->indizio0), 
				 1 => (String)($xml->domanda[$livello]->indizio1), 
				 2 => (String)($xml->domanda[$livello]->indizio2), 
				 3 => (String)($xml->domanda[$livello]->indizio3));
			$response = $response . $indizio[0] . "\n" . $indizio[1] . "\n" . $indizio[2] . "\n" . $indizio[3];
			
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
			exit();
		}
		elseif ($par[1] === "solution")
		{
			$livello = (int)$par[2];
			
			//$xml=simplexml_load_file("domande.xml") or die("Error: Cannot create object");
			$response = "soluzione livello " . (int)$livello . "\n" ;
			$response = $response . "autore:" . $xml->domanda[(int)$livello]->autore . "\n\n" ;
			//$xml=simplexml_load_file("domande.xml") or die("Error: Cannot create object");
			$response = $response . (String)($xml->domanda[$livello]->risposta);
			
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
			exit();
		}
		else
		{
			$msg = "uso del comando /show:\n    /show count\n    /show autors [autore]\n    /show enigma numero\n    /show help numero\n    /show solution numero\n";
			
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
			exit();
		}
	}
	else
	{
		$response = "uso del comando /show:\n    /show count\n    /show autors [autore]\n    /show enigma numero\n    /show help numero\n    /show solution numero\n";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		exit();
	}
}
//reset del gioco
if(strpos($text, '/reset') !== false && $utenteAdmin === true) 
{
	if (strpos($text, " ")>0)
	{
		$tipo  = explode(" ", $text);
		if ((($tipo[1] === "game") && (!isset($tipo[2]))) || (($tipo[1] === "game") && ($tipo[2] === "-n")))
		{
		    $tot=0;
			foreach ($myVarsArr as $key => $value)
			{
				$myVarsArr[$key]['livello'] = 0;
				$myVarsArr[$key]['star'] = 0;
				$myVarsArr[$key]['date'] = $data_corrente;
				if (($tipo[2] === "-n") && ($myVarsArr[$key]['nick'] !== "ADMIN"))
				{
					unset($myVarsArr[$key]['nick']);
					unset($myVarsArr[$key]['team']);
				}
				elseif (($tipo[2] === "-n") && ($myVarsArr[$key]['nick'] === "ADMIN"))
				{
					unset($myVarsArr[$key]['team']);
				}
				
				$tot++;				
			}
			
			$myArrJson = json_encode($myVarsArr);
			file_put_contents($path, $myArrJson, LOCK_EX); 
			
			
			unlink($path_abl);
			
			$restore['gestito'] = $data_corrente;
			$myRstJson = json_encode($restore);
			file_put_contents($path_restore, $myRstJson, LOCK_EX);
			
			$amministratore['stato_gioco'] = "da_avviare";
			$myAdminJson = json_encode($amministratore);
			file_put_contents($path_admin, $myAdminJson, LOCK_EX);
			
			
			$msg="aggiornato il livello di " . $tot . " utenti\nazzerati gli aiuti\n";
			if ($tipo[2] === "-n")
				$msg=$msg . "azzerati nickname e team\n";
			$msg=$msg . "lo stato del gioco è da_avviare";
		}
		elseif ($tipo[1] === "bot")
		{
			unlink($path);
			unlink($path_admin);
			unlink($path_abl);
			unlink($path_black_list);
			
			$restore["gestito"] = $data_corrente;
			$myRstJson = json_encode($restore);
			file_put_contents($path_restore, $myRstJson, LOCK_EX);
			$msg = "reinizializzazione del bot eseguita correttamente";
		}
		elseif ($tipo[1] === "broadcast")
		{
			$nulla="";
			$nulla = json_encode($nulla);
			file_put_contents($path_broadcast, $nulla, LOCK_EX);
			
			$msg = "abilitazione invio messaggio broadcast effettuato con successo";
		}
		else
		{
			$msg = "uso del comando \n/reset game [-n]\n     reimposta a 0 livelli e aiuti (opzionalmente nick e team)\n/reset bot\n     reinizializza il bot\n/reset broadcast\n     abilita msg broadcast";
		}
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	else
	{
		$response = "uso del comando \n/reset game [-n]\n     reimposta a 0 livelli e aiuti (opzionalmente nick e team)\n/reset bot\n     reinizializza il bot\n/reset broadcast\n     abilita msg broadcast";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
		
	exit();
}
//aggiunta di un utente admin
if(strpos($text, '/admin') !== false && $utenteAdmin === true) 
{
	if (strpos($text, " ")>0)
	{
		$newId  = substr($text, strpos($text, " ") + 1);
		if (is_numeric($newId))
		{
			$amministratore[$newId] = true;
			$myAdminJson = json_encode($amministratore);
			file_put_contents($path_admin, $myAdminJson, LOCK_EX);
			
			$msg = "utente admin\n/list elenca nuovi comandi";
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $newId . "&text=" . urlencode($msg);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
			
			$msg = "admin inserito correttamente";
		}
		else
		{
			$msg = "parametro errato\nuso del comando:\n/admin Id";
		}
		
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	else
	{
		$response = "per aggiungere un admin usa il comando\n/admin Id";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		
	}
	
	exit();
}
//maxteam (massimo numero di giocatori in un team)
if(strpos($text, '/maxteam') !== false && $utenteAdmin === true) 
{	
	if (strpos($text, " ")>0)
	{
		$num  = substr($text, strpos($text, " ") + 1);
		if (is_numeric($num))
		{
			$amministratore['maxTeam'] = $num;
			$myAdminJson = json_encode($amministratore);
			file_put_contents($path_admin, $myAdminJson, LOCK_EX);
			
			$msg = "massimo numero di giocatori in team impostato correttamente";
		}
		else
		{
			$msg = "parametro errato\nuso del comando:\n/maxteam num";
		}
		
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	else
	{
		$response = "per impostare il massimo numero di giocatori in team usa il comando\n/maxteam num";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		
	}
	
	exit();
}
//avanza gli utenti di un livello
if(strpos($text, '/lnext') !== false && $utenteAdmin === true) 
{	
	if (strpos($text, " ")>0)
	{
	
		$par  = explode(" ", $text);
		$tot=0;
		$liv  = (int)$par[1];
		foreach ($myVarsArr as $key => $value)
		{
			if ($value['livello']==$liv)
			{
				$myVarsArr[$key]['livello']++;
				$myVarsArr[$key]['date']=$data_corrente;
				
				$msg = "il tuo livello è stato aggiornato, complimenti! tocca il pulsante enigma per continuare";
				$ch = curl_init();
				$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($msg);
				curl_setopt($ch, CURLOPT_URL, $myUrl); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				
				// read curl response
				$output = curl_exec($ch);
				curl_close($ch);
				$tot++;
			}
				
		}
		
		//aggiornamento su file
		$myVarsJson = json_encode($myVarsArr);
		file_put_contents($path, $myVarsJson, LOCK_EX);
		
		$msg = $tot . " utenti sono stati avanzati di livello";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	else
	{
		$response = "per avanzare gli utenti di un livello usa il comando\n/lnext livello";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		
	}
	
	exit();
}
//enable: impostazione dei tempi di attesa per gli aiuti di un livello
if(strpos($text, '/enable') !== false && $utenteAdmin === true) 
{
	$abl  = explode(" ", $text);
	
	
	if (isset($abl[1]) && isset($abl[2]) && isset($abl[3]) && isset($abl[4]) && (int)$abl[1]!==0)
	{	
		if ($abl[1] < 0)
		{
			$liv = -$abl[1];
			for ($i=1; $i<=$liv; $i++)
			{
				$abilitazione[$i]["aiuto1"]=$abl[2];
				$abilitazione[$i]["aiuto2"]=$abl[3];
				$abilitazione[$i]["aiuto3"]=$abl[4];
			}
		}
		else
		{
			$liv = $abl[1];
			$abilitazione[$liv]["aiuto1"]=$abl[2];
			$abilitazione[$liv]["aiuto2"]=$abl[3];
			$abilitazione[$liv]["aiuto3"]=$abl[4];
		}
		
		$myAblJson = json_encode($abilitazione);
		file_put_contents($path_abl, $myAblJson, LOCK_EX);
		if ($abl[1] < 0)
			$response = "impostati i tempi di attesa per gli aiuti sui livelli da 1 a  " . $liv;
		else
			$response = "impostati i tempi di attesa per gli aiuti sul livello " . $liv;
		
		$parameters = array('chat_id' => $chatId, "text" => $response);
		$parameters["method"] = "sendMessage";
		echo json_encode($parameters);
	}
	else
	{
		$response = "imposta i tempi di attesa in minuti per l'abilitazione degli aiuti a partire dalla data di raggiungimento del livello\n\n/enable liv t1 t2 t3\n    tempi di attesa per il livello liv > 0\n/enable -liv t1 t2 t3\n    tempi di attesa per i livelli da 1 a liv";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	exit();
}
//impostazione di un livello per un utente e il suo team (se associato)
if(strpos($text, '/lset') !== false && $utenteAdmin === true) 
{
	$par  = explode(" ", $text);
	
	// lset Id livello
	if (strpos($text, " ")>0 && strpos(substr($text, strpos($text, " ")+1), " ")>0)
	{
		$id=(int)$par[1];
		$nick  = $par[1];
		
		foreach ($myVarsArr as $key => $value)
		{
			if ($myVarsArr[$key]["nick"]===$nick)
			{
				$id=(int)$key;
				break;
			}
		}
		
		if (!isset($myVarsArr[(int)$id]['livello']))
		{
			$response = "utente sconosciuto";
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
		}
		else	
		{
			if (!isset($myVarsArr[(int)$id]['team']) || strlen($myVarsArr[$id]['team'])==0)
			{
				$myVarsArr[$id]['livello'] = $par[2];
				$myVarsArr[$id]['date'] = $data_corrente;
				
				$msg = "il tuo livello è stato aggiornato!\ntocca il pulsante enigma per continuare";
				$ch = curl_init();
				$myUrl=$botUrlMessage . "?chat_id=" . $id . "&text=" . urlencode($msg);
				curl_setopt($ch, CURLOPT_URL, $myUrl); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				
				// read curl response
				$output = curl_exec($ch);
				curl_close($ch);
				
				$response = "impostazione del livello effettuata per un singolo utente";
			}
			else
			{
				$livello=$par[2];
				$team=$myVarsArr[(int)$id]['team'];
				
				foreach ($myVarsArr as $key => $value)
				{
					if ($myVarsArr[$key]["team"]===$team)
					{
						$myVarsArr[$key]["livello"]=$livello;
						$myVarsArr[$key]["date"]=$data_corrente;
						
						$msg = "il tuo livello è stato aggiornato!\ntocca il pulsante enigma per continuare";
						$ch = curl_init();
						$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($msg);
						curl_setopt($ch, CURLOPT_URL, $myUrl); 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
						
						// read curl response
						$output = curl_exec($ch);
						curl_close($ch);
					
					}
				}
				$response = "impostazione del livello effettuata per il team ".$team;
			}
				
			//aggiornamento su file
			$myVarsJson = json_encode($myVarsArr);
			file_put_contents($path, $myVarsJson, LOCK_EX);
			$parameters = array('chat_id' => $chatId, "text" => $response);
			$parameters["method"] = "sendMessage";
			echo json_encode($parameters);
		}
	}
	else
	{
		$response = "per impostare il livello per un utente e il suo team usa uno dei comandi\n/lset Id livello\n/lset nick livello";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	exit();
}
//impostazione delle stelle per un utente singolo
if(strpos($text, '/sset') !== false && $utenteAdmin === true) 
{
	$par  = explode(" ", $text);
	
	// sset Id stelle
	if (strpos($text, " ")>0 && strpos(substr($text, strpos($text, " ")+1), " ")>0)
	{
		$id=(int)$par[1];
		$nick  = $par[1];
		
		foreach ($myVarsArr as $key => $value)
		{
			if ($myVarsArr[$key]["nick"]===$nick)
			{
				$id=(int)$key;
				break;
			}
		}
		
		if (!isset($myVarsArr[(int)$id]['livello']))
		{
			$response = "utente sconosciuto";
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
		}
		else	
		{
			$myVarsArr[$id]['star'] = $par[2];
					
			$msg = "il numero di stelle è stato aggiornato, complimenti!";
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $id . "&text=" . urlencode($msg);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
			
			//aggiornamento su file
			$myVarsJson = json_encode($myVarsArr);
			file_put_contents($path, $myVarsJson, LOCK_EX);
			$response = "numero di stelle aggiornato";
			$parameters = array('chat_id' => $chatId, "text" => $response);
			$parameters["method"] = "sendMessage";
			echo json_encode($parameters);
			
		}
	}
	else
	{
		$response = "per impostare il numero di stelle usa uno dei comandi\n/sset Id stelle\n/sset nick stelle";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	exit();
}
//identity di un utente
if(strpos($text, '/identity') !== false && $utenteAdmin === true) 
{
	// identifica un utente
	if (strpos($text, " ")>0)
	{
		
		$response ="";
		
		$par  = explode(" ", $text);
		
		$id=(int)$par[1];
		$nick = $par[1];
		$team = $par[1];
		
		$trovato=false;
		$tipo_id=false;
		$tipo_team=false;
		//contemporaneamente un identificativo può essere un team e un nick
		
		//è di tipo team?
		foreach ($myVarsArr as $key => $value)
		{
			if ($myVarsArr[$key]["team"]==$team)
			{
				$trovato=true;
				$tipo_team=true;
				break;
			}
		}
		
		//è anche un nick?
		foreach ($myVarsArr as $key => $value)
		{
			if ($myVarsArr[$key]["nick"]==$nick)
			{
				$trovato=true;
				$tipo_id=true;
				$id=$key;
				break;
			}
		}
		
		//è un id?
		if (isset($myVarsArr[$id]['livello']))
		{
			$trovato=true;
			$tipo_id=true;
		}
		
		if (!$trovato)
		{
			$response = "utente sconosciuto";
		}
		else
		{
			if ($tipo_team)
			{
				$response_team = "team " . $team . ":";
				foreach ($myVarsArr as $key => $value)
				{
					if ($myVarsArr[$key]["team"]===$team)
					{
						$response_team = $response_team . "\n    " . $key . " - " . $myVarsArr[$key]["nick"];
						if ((int)$myVarsArr[$key]["star"]>0)
							$response_team = $response_team . " (" . (int)$myVarsArr[$key]['star'] . unichr($star_code) . ")";
						$level_team = (int)$myVarsArr[$key]["livello"];
						$date_team = $myVarsArr[$key]["date"];
					}
				}
				$response_team = $response_team . "\nlivello: " . $level_team;
				$response_team = $response_team . "\nraggiunto il: " . $date_team;
				
				//calcolo tempi di attesa per gli aiuti
				$attesa_aiuto1 = isset($xml->domanda[$level_team]->attesa1)?$xml->domanda[$level_team]->attesa1 : 60;
				$attesa_aiuto2 = isset($xml->domanda[$level_team]->attesa2)?$xml->domanda[$level_team]->attesa2 : 120;
				$attesa_aiuto3 = isset($xml->domanda[$level_team]->attesa3)?$xml->domanda[$level_team]->attesa3 : 180;
				if (isset($abilitazione[$level_team]["aiuto1"]))
					$attesa_aiuto1 = $abilitazione[$level_team]["aiuto1"];
				if (isset($abilitazione[$level_team]["aiuto2"]))
					$attesa_aiuto2 = $abilitazione[$level_team]["aiuto2"];
				if (isset($abilitazione[$level_team]["aiuto3"]))
					$attesa_aiuto3 = $abilitazione[$level_team]["aiuto3"];
				//prossimo aiuto
				if ($level_team > 0)
				{
					if (abilitazione_livello($attesa_aiuto3, $date_team))
						$msg_prossimo_aiuto = "\n\ntutti gli aiuti sul livello sono abilitati";
					else if (abilitazione_livello($attesa_aiuto2, $date_team))
						$msg_prossimo_aiuto = "\n\nterzo aiuto alle " . prossimo_aiuto($attesa_aiuto3, $date_team);
					else if (abilitazione_livello($attesa_aiuto1, $date_team))
						$msg_prossimo_aiuto = "\n\nsecondo aiuto alle " . prossimo_aiuto($attesa_aiuto2, $date_team);
					else 
						$msg_prossimo_aiuto = "\n\nprimo aiuto alle " . prossimo_aiuto($attesa_aiuto1, $date_team);
				}
				else
				{
					$msg_prossimo_aiuto = "";
				}
				
				
				$response_team = $response_team . $msg_prossimo_aiuto;
				
				if ($tipo_id)
				{
					$response_team = $response_team . "\n\n----------------\n\n";
					$response_team = $response_team . "giocatore " . $nick . ": \n";
				}
				$response = $response_team;
			}
			if ($tipo_id)
			{
				$ulastname = $myVarsArr[$id]['lastname'];
				$ufirstname = $myVarsArr[$id]['firstname'];
				$unick = isset($myVarsArr[$id]['nick']) ? $myVarsArr[$id]['nick'] : "<NICK non impostato>";
				$ulevel = (int)$myVarsArr[$id]['livello'];
				$udate = $myVarsArr[$id]['date'];
				$uteam = $myVarsArr[$id]['team'];
				if (!isset($uteam))
					$uteam = "giocatore singolo";
				else if (strlen($uteam)==0)
					$uteam = "giocatore singolo";
				
				
				//calcolo tempi di attesa per gli aiuti
				$attesa_aiuto1 = isset($xml->domanda[$ulevel]->attesa1)?$xml->domanda[$ulevel]->attesa1 : 60;
				$attesa_aiuto2 = isset($xml->domanda[$ulevel]->attesa2)?$xml->domanda[$ulevel]->attesa2 : 120;
				$attesa_aiuto3 = isset($xml->domanda[$ulevel]->attesa3)?$xml->domanda[$ulevel]->attesa3 : 180;
				if (isset($abilitazione[$ulevel]["aiuto1"]))
					$attesa_aiuto1 = $abilitazione[$ulevel]["aiuto1"];
				if (isset($abilitazione[$ulevel]["aiuto2"]))
					$attesa_aiuto2 = $abilitazione[$ulevel]["aiuto2"];
				if (isset($abilitazione[$ulevel]["aiuto3"]))
					$attesa_aiuto3 = $abilitazione[$ulevel]["aiuto3"];
				//prossimo aiuto
				if ($ulevel > 0)
				{
					
					if (abilitazione_livello($attesa_aiuto3, $myVarsArr[$id]["date"]))
						$msg_prossimo_aiuto = "\n\ntutti gli aiuti sul livello sono abilitati";
					else if (abilitazione_livello($attesa_aiuto2, $myVarsArr[$id]["date"]))
						$msg_prossimo_aiuto = "\n\nterzo aiuto alle " . prossimo_aiuto($attesa_aiuto3, $myVarsArr[$id]["date"]);
					else if (abilitazione_livello($attesa_aiuto1, $myVarsArr[$id]["date"]))
						$msg_prossimo_aiuto = "\n\nsecondo aiuto alle " . prossimo_aiuto($attesa_aiuto2, $myVarsArr[$id]["date"]);
					else 
						$msg_prossimo_aiuto = "\n\nprimo aiuto alle " . prossimo_aiuto($attesa_aiuto1, $myVarsArr[$id]["date"]);
				}
				else
					$msg_prossimo_aiuto = "";
				
				//lettura da file delle anagrafiche
				$myAngJson = file_get_contents($path_anagrafica);
				$anagrafica = json_decode($myAngJson,true);
				
				if (isset($anagrafica[$id]['anagrafica']))
				{
					$msg_anagrafica=$anagrafica[$id]['anagrafica'];
				}
				else
				{
					$msg_anagrafica="<utente non registrato>";
				}
				$response = $response . "Id: " . $id . " (" . (int)$myVarsArr[$id]['star'] . unichr($star_code) . ")";
				$response = $response . "\nregistrazione: " . $msg_anagrafica;
				$response = $response . "\ncognome (telegram): " . $ulastname . "\nnome (telegram): " . $ufirstname . "\nnick: " . $unick ;
				$response = $response . "\nteam: " . $uteam . "\nlivello: " . $ulevel . "\nraggiunto il: ". $udate;
				$response = $response . $msg_prossimo_aiuto;
			}
		}
		
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	else
	{
		$response = "per identificare un utente o un team usa uno dei comandi\n\n/identity Id\n/identity nick\n/identity team";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	exit();
}
//messaggio inviato in broadcast
if(strpos($text, '/broadcast') !== false && $utenteAdmin === true) 
{
	//se non è ammesso il broadcast fa exit()
	if (!verifyBrd($flagBroadcast, $path_broadcast, $chatId))
		exit();
	
	// invia un messaggio a tutti gli utenti in chat
	if (strpos($text, " ")>0)
	{
		$msg  = substr($text, strpos($text, " ") + 1);
		
		$all_chatId = array_keys($myVarsArr);
		$tot = count($all_chatId);
		$j=0;
		for ($i=0; $i<$tot; $i++) 
		{
			//Telegram prescrive una pausa di1 sec ogni 30 notifiche 
			if ($j % 20 == 0)
			{
				sleep(1);
			}
			$j++;
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $all_chatId[$i] . "&text=" . urlencode($msg);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
		}
		$response = "messaggio notificato a " . $j . " utenti";
	}
	else
	{
		$response = "per inviare un messaggio a tutti esegui il comando\n/broadcast messaggio";
	}
	
	setBrd($flagBroadcast, $path_broadcast, $chatId);
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
}
//messaggio inviato a tutti gli utenti di un livello
if(strpos($text, '/multicast') !== false && $utenteAdmin === true) 
{
	//se non è ammesso il broadcast fa exit()
	if (!verifyBrd($flagBroadcast, $path_broadcast, $chatId))
		exit();
	
	// invia un messaggio a tutti gli utenti in chat che si trovano ad un certo livello
	if (strpos($text, " ")>0 && strpos(substr($text, strpos($text, " ")+1), " ")>0)
	{
	
		$msg  = substr($text, strpos($text, " ") + 1);
		$liv = substr($msg, 0, strpos($msg, " "));
		$msg  = substr($msg, strpos($msg, " ") + 1);
		
		$all_chatId = array_keys($myVarsArr);
		$tot = count($all_chatId);
		$j=0;
		for ($i=0; $i<$tot; $i++) 
		{
			if ($myVarsArr[$all_chatId[$i]]["livello"]==$liv)
			{
				//Telegram prescrive una pausa di1 sec ogni 30 notifiche 
				if ($j % 20 == 0)
				{
					sleep(1);
				}
				$j++;
				$ch = curl_init();
				$myUrl=$botUrlMessage . "?chat_id=" . $all_chatId[$i] . "&text=" . urlencode($msg);
				curl_setopt($ch, CURLOPT_URL, $myUrl); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				
				// read curl response
				$output = curl_exec($ch);
				curl_close($ch);
			}
		}
		$response = "messaggio notificato a " . $j . " utenti";
	}
	else
	{
		$response = "per inviare un messaggio ai giocatori di un livello esegui il comando\n/multicast livello messaggio";
	}
	
	setBrd($flagBroadcast, $path_broadcast, $chatId);
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
}
//gestione blacklist
if(strpos($text, '/blacklist') !== false && $utenteAdmin === true) 
{
	// inserisce o rimuove un utente in blacklist
	$myBlackJson = file_get_contents($path_black_list);
    $black_list = json_decode($myBlackJson,true);
	if (strpos($text, " ")>0)
	{
		$par  = explode(" ", $text);
		
		if ($par[1] === "list")
		{
			$msg = "blacklist:\n";
			foreach ($black_list as $key => $value) 
			{
				if ($value == true)
					$msg = $msg  . "\n" . $key;
			}
		}
		elseif (($par[2] === "insert") || ($par[2] === "delete"))
		{
			if (($par[2] === "insert"))
			    $black_list[$par[1]] = true;
			if (($par[2] === "delete"))
			    $black_list[$par[1]] = false;
			
			$myBlackJson = json_encode($black_list);
			file_put_contents($path_black_list, $myBlackJson, LOCK_EX);
			
			$msg = "operazione effettuata su blacklist: " . $par[2] . " di " . $par[1] . "\n";
		}
		else
		{
			$msg = "uso del comando /blacklist:\n    /blacklist Id insert\n    /blacklist Id delete\n    /blacklist list";
		}
	
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);	
	}
	else
	{
		$response = "uso del comando /blacklist:\n    /blacklist Id insert\n    /blacklist Id delete\n    /blacklist list";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);	
	}
	
	exit();
}
//unicast messaggio inviato ad un solo utente o ad un team
if(strpos($text, '/unicast') !== false && $utenteAdmin === true) 
{
	$par  = explode(" ", $text);
	
	if (!isset($par[1]))
	{
		$msg = 	"il comando /unicast consente di inviare un messaggio ad un singolo giocatore o ad un team\n\nuso del comando:\n/unicast Id messaggio\n/unicast nick messaggio\n/unicast team messaggio";
		
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		exit();
	}
	
	// invia un messaggio ad un utente o ad un team in chat
	$id=(int)$par[1];
	$nick = $par[1];
	$team = $par[1];
	
	$tipo="notfound";
	foreach ($myVarsArr as $key => $value)
	{
		if ($myVarsArr[$key]["team"]==$team)
		{
			$tipo="team";
			break;
		}
	}
	if ($tipo=="notfound")
	{
		foreach ($myVarsArr as $key => $value)
		{
			if ($myVarsArr[$key]["nick"]==$nick)
			{
				$tipo="nick";
				$id=$key;
				break;
			}
		}
	}
	if ($tipo=="notfound")
	{
		if (isset($myVarsArr[$id]['livello']))
		{
			$tipo="id";
		}
	}
	
	if ($tipo=="notfound")
	{
		$response = "utente sconosciuto";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	else	
	{
		$msg = substr($text, strpos($text, $par[2]));
		if ($tipo=="team")
		{
			foreach ($myVarsArr as $key => $value)
			{
				if ($myVarsArr[$key]["team"]===$team)
				{
					$msg = $nickId . ": " . $msg;
		
					$ch = curl_init();
					$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($msg);
					curl_setopt($ch, CURLOPT_URL, $myUrl); 
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					
					// read curl response
					$output = curl_exec($ch);
					curl_close($ch);
				}
			}
		}
		else
		{
			$msg = $nickId . ": " . $msg;
		
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $id . "&text=" . urlencode($msg);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
		}
	}
	exit();
}
//***** utenti in black_list
//lettura da file della black_list
$myBlackJson = file_get_contents($path_black_list);
$black_list = json_decode($myBlackJson,true);
if ($black_list[$chatId]===true)
{
	$response = "utente non ammesso alla gara";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	exit();
}
//STATO in_pausa: **********  nessun comando utente può essere eseguito
//i nuovi utenti sono registrati nei file di contesto
if (($statoGioco==="in_pausa") && !$eccezione)
{
	$myVarsArr[$chatId]["firstname"]=$firstname;
	$myVarsArr[$chatId]["lastname"]=$lastname;
	$myVarsJson = json_encode($myVarsArr);
	file_put_contents($path, $myVarsJson, LOCK_EX);
	
	if ($statoGioco==="da_avviare")
		$msg = "la gara non è ancora iniziata!!!!!!\n vieni a trovarmi tra un po'...";
	else
		$msg = "il sistema è momentaneamente in pausa, riprova tra un po'...";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	exit();
}
//STATO da_ripristinare: **********  nessun comando utente può essere eseguito
//gli utenti non sono registrati nei file di contesto
if (($statoGioco=="da_ripristinare") && !$eccezione)
{
	$msg = "il sistema è momentaneamente in pausa, riprova tra un po'...";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	
	$msg = "sistema in stato da_ripristinare\n";
	$msg = $msg . $nickId . " - " . $chatId . ": tenta l'accesso";
		
	$all_chatId = array_keys($amministratore);
	$tot = count($all_chatId);
	for ($i=0; $i<$tot; $i++) 
	{ 
		if ($all_chatId[$i]>0)
		{
			$ch = curl_init();
			$myUrl=$botUrlMessage . "?chat_id=" . $all_chatId[$i] . "&text=" . urlencode($msg);
			curl_setopt($ch, CURLOPT_URL, $myUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
			// read curl response
			$output = curl_exec($ch);
			curl_close($ch);
		}
	}
	exit();
}
//STATO da_avviare: ********** 
//i nuovi utenti sono registrati nei file di contesto
if ($statoGioco==="da_avviare") 
{
	$myVarsArr[$chatId]["firstname"]=$firstname;
	$myVarsArr[$chatId]["lastname"]=$lastname;
	$myVarsJson = json_encode($myVarsArr);
	file_put_contents($path, $myVarsJson, LOCK_EX);
}
//STATI da_avviare, terminato, in_esecuzione: gestione dei comandi utente che possono essere eseguiti in questi stati
//stat statistica dell'utente
if(strcmp($text, '/stat') === 0)
{
	$precede=0;
	$uguale=0;
	$tot=0;
	$nprimi=0;
	$maxlivello=0;
	$primo=$nickId;
	$numsingle=0;
	$tot=0;
	$livello=(int)$myVarsArr[$chatId]['livello'];
	
	foreach ($myVarsArr as $key => $value) 
	{
		if(isset($value['team']))
		{
			if (strlen($value['team'])>=1)
			{
				$elencoteam[$value['team']]['num'] = (int)$elencoteam[$value['team']]['num']+1;
				$elencoteam[$value['team']]['livello']=$value['livello'];
			}
			else
			{
				$single=isset($value['nick']) ? $value['nick'] : $key;
				$elencosingoli[$single]=$value['livello']; 
				$numsingle++;	
			}
		}
		else
		{
			$single=isset($value['nick']) ? $value['nick'] : $key;
			$elencosingoli[$single]=$value['livello']; 
			$numsingle++;				
		}
		$tot++;
	}
	$elenconometeam = array_keys($elencoteam);
	$numteam=count($elenconometeam);
	
	$team_avanti=0;
	$team_uguali=0;
	foreach ($elencoteam as $key => $value) 
	{
		if( (int)$elencoteam[$key]['livello'] > $livello )
			$team_avanti++;
		else if ( (int)$elencoteam[$key]['livello'] == $livello )
			$team_uguali++;
	}
	$singoli_avanti=0;
	$singoli_uguali=0;
	foreach ($elencosingoli as $value) 
	{
		if( (int)$value > $livello ) 
			$singoli_avanti++;
		else if ( (int)$value == $livello ) 
			$singoli_uguali++;
	}
	
	$maxlivello = 0; 
	foreach ($elencoteam as $key => $value) 
	{
		$i = (int)$elencoteam[$key]['livello'];
		$rank_t[$i] = (int)$rank_t[$i] + 1;
		if ($i>$maxlivello)
			$maxlivello=$i;
	}
	foreach ($elencosingoli as $value) 
	{
		$i = (int)$value;
		$rank_s[$i] = (int)$rank_s[$i] + 1;
		if ($i>$maxlivello)
			$maxlivello=$i;
	} 
	$tot_primi = $rank_t[$maxlivello] + $rank_s[$maxlivello];
	if ($tot_primi==1)
		$msg_primo = "\nal primo posto c'è 1 concorrente";
	else
		$msg_primo = "\nal primo posto ci sono " . $tot_primi . " concorrenti";
	
	//prossimo aiuto
	if (($livello > 0) && ($statoGioco != "terminato"))
	{
		
		if (abilitazione_livello($attesa_aiuto3, $myVarsArr[$chatId]["date"]))
			$msg_prossimo_aiuto = "\n\n<b>tutti gli indizi del livello sono abilitati</b>";
		else if (abilitazione_livello($attesa_aiuto2, $myVarsArr[$chatId]["date"]))
			$msg_prossimo_aiuto = "\n\n<b>prossimo indizio alle:<b> " . prossimo_aiuto($attesa_aiuto3, $myVarsArr[$chatId]["date"]);
		else if (abilitazione_livello($attesa_aiuto1, $myVarsArr[$chatId]["date"]))
			$msg_prossimo_aiuto = "\n\n<b>prossimo indizio alle:</b> " . prossimo_aiuto($attesa_aiuto2, $myVarsArr[$chatId]["date"]);
		else 
			$msg_prossimo_aiuto = "\n\n<b>prossimo indizio alle:</b> " . prossimo_aiuto($attesa_aiuto1, $myVarsArr[$chatId]["date"]);
	}
	else if ($statoGioco == "terminato")
		$msg_prossimo_aiuto = "\n\n<b>la gara è terminata!</b>\n";
	else
		$msg_prossimo_aiuto = "";
	
	if (!isset($teamId))
		$nometeam = "<i>giocatore singolo</i>";
	else if (strlen($teamId)==0)
		$nometeam = "<i>giocatore singolo</i>";
	else
		$nometeam = ($teamId == "giocatore singolo") ? "<i>giocatore singolo</i>" : $teamId;
		//$nometeam = $teamId;
	
	$response =  "<b>tabellino della gara</b>\n\n";
	$response =  $response . "<b>Id:</b> " . $chatId;
	
	if ((int)$myVarsArr[$chatId]['star'] > 0)
		$response = $response . " (" . (int)$myVarsArr[$chatId]['star'] . unichr($star_code) . ")";
	
	$response =  $response . "\n<b>nickname:</b> " . $nickId . "\n<b>team:</b> " . $nometeam;
	$response =  $response . "\n<b>sei sul livello:</b> " . $livello . "\nraggiunto il: " . $myVarsArr[$chatId]["date"];
	$response =  $response . $msg_prossimo_aiuto;
	$response =  $response . "\n\n<b>numero di giocatori:</b> " . $tot . "\n    team: " . $numteam . "\n    giocatori singoli: " . $numsingle ;
	$response =  $response . "\n\n<b>max livello raggiunto:</b> " . $maxlivello;
	$response =  $response . $msg_primo;
	
	$tot = $team_avanti + $singoli_avanti;
	
	if ($tot == 1)
		$response =  $response . "\n\nprecede " . $tot . " concorrente";
	else
		$response =  $response . "\n\nprecedono " . $tot . " concorrenti";
	
	$tot = $team_uguali + $singoli_uguali;
	
	if ($tot == 1)
		$response =  $response . "\nsul tuo livello " . $tot . " concorrente";
	else
		$response =  $response . "\nsul tuo livello " . $tot . " concorrenti";
		
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response)."&parse_mode=HTML";
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	exit();
}
//chat con gli admin
if(strpos($text, '/chat') !== false )
{
	// invia un messaggio agli admin
	
	if (strpos($text, " ")>0)
	{
		$msg  = substr($text, strpos($text, " ") + 1);
		$msg = $nickId . "-" . $chatId . ": " . $msg;
		
		$all_chatId = array_keys($amministratore);
		$tot = count($all_chatId);
		for ($i=0; $i<$tot; $i++) 
		{ 
			if ($all_chatId[$i]>0)
			{
				$ch = curl_init();
				$myUrl=$botUrlMessage . "?chat_id=" . $all_chatId[$i] . "&text=" . urlencode($msg);
				curl_setopt($ch, CURLOPT_URL, $myUrl); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				
				// read curl response
				$output = curl_exec($ch);
				curl_close($ch);
			}
		}
	}
	else
	{
		$response = "per inviare un messaggio all'admin usa il comando\n/chat messaggio";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		
	}
	
	exit();
}
//ranking
if(strpos($text, '/ranking') !== false)
{
	$par  = explode(" ", $text);
	if (!isset($par[1]) || $par[1]==='-V')
	{
		foreach ($myVarsArr as $key => $value)
		{
			if(isset($value['team']))
			{
				if (strlen($value['team'])>=1)
				{
					$elencoteam[$value['team']]['num'] = (int)$elencoteam[$value['team']]['num']+1;
					$elencoteam[$value['team']]['livello']=(int)$value['livello'];
				}
				else
				{
					$single=isset($value['nick']) ? $value['nick'] : $key;
					$elencosingoli[$single]=(int)$value['livello']; 
					$numsingle++;	
				}
			}
			else
			{
				$single=isset($value['nick']) ? $value['nick'] : $key;
				$elencosingoli[$single]=(int)$value['livello'];
				$numsingle++;
			} 
		}
		$maxlivello = 0; 
		foreach ($elencoteam as $key => $value) 
		{
			$i = (int)$elencoteam[$key]['livello'];
			$rank_t[$i] = (int)$rank_t[$i] + 1;
			if ($i>$maxlivello)
				$maxlivello=$i;
		}
		foreach ($elencosingoli as $value) 
		{
			$i = (int)$value;
			$rank_s[$i] = (int)$rank_s[$i] + 1;
			if ($i>$maxlivello)
				$maxlivello=$i;
		} 
		$response = "<b>concorenti per livello</b>\n\n";
		for ($i=$maxlivello; $i>=0; $i--)
		{
			$tot = $rank_t[$i] + $rank_s[$i];
			$response = $response . "/liv_" . allunga_i($i,3) . "    concorrenti " . $tot;
			if ($i>0)
				$response = $response . "\n";
		}
		
		if (!isset($par[1]))
			$response = $response . "\n-----------------------\n/ranking liv    per i dettagli\nliv è un numero oppure 'top'";
	}
	else if($par[1] == "-K")
	{
			
		foreach ($myVarsArr as $key => $value)
		{
			if(isset($value['team']))
			{
				if (strlen($value['team'])>=1)
				{
					$elenco[$emoji_team." ".$value['team']]['livello']=$value['livello'];
					$elenco[$emoji_team." ".$value['team']]['star']+=$value['star'];
					$elenco[$emoji_team." ".$value['team']]['date']=$value['date'];
				}
				else
				{
					if (isset($value['nick']))
					{
						$elenco[$emoji_esci." ".$value['nick']]['livello']=$value['livello'];
						$elenco[$emoji_esci." ".$value['nick']]['star']=$value['star'];
						$elenco[$emoji_esci." ".$value['nick']]['date']=$value['date'];
					}
				}
			}
			else
			{
				if(isset($value['nick']))
				{
					$elenco[$emoji_esci." ".$value['nick']]['livello']=$value['livello'];
					$elenco[$emoji_esci." ".$value['nick']]['star']=$value['star'];
					$elenco[$emoji_esci." ".$value['nick']]['date']=$value['date'];
				}
			}
		}
		
		
		$data_corr_new=str_replace("/", "-", $data_corrente);
		$secondi_corr=strtotime($data_corr_new);	
		
		foreach ($elenco as $key => $value)
		{
			$data_elem_new=str_replace("/", "-", $value['date']);
			$secondi=strtotime($data_elem_new);
			$elenco[$key]['sort']=sprintf("%03d",$value["livello"]).sprintf("%03d",$value["star"]).sprintf("%010d",$secondi_corr-$secondi);
		}
		
		$narr = array_sort($elenco, "sort", $order=SORT_DESC);
		
			
		$response="<b>classifica generale</b>\n";
		$liv_curr = -1;
		foreach ($narr as $key => $value) 
		{
			$response_par = "";
			if ($liv_curr != $value['livello'])
			{
				$response_par = "\n---- <b>livello ". $value['livello'] . "</b>\n";
				$liv_curr = $value['livello'];
			}
				
			$response_par = $response_par . $key;
			if ($value['star']>0)
				$response_par = $response_par . " (".$value['star'].unichr($star_code).")";
			$response_par = $response_par . "\n";
			
			if (strlen($response)+strlen($response_par)<4030)
				$response = $response . $response_par;
			else
			{
				$response = $response . "\n(gli ultimi concorrenti non compaiono in classifica)";
				break;
			}
				
		}
		
	}
	else
	{
		if (!(is_numeric($par[1]) || $par[1] == "top"))
		{
			$response="errore nei parametri\nil livello deve essere un numero o la la parola 'top'";
		}
		else
		{
			$liv = $par[1];
			if ($par[1] == "top")
			{
				foreach ($myVarsArr as $key => $value)
				{
					if(isset($value['team']))
					{
						if (strlen($value['team'])>=1)
						{
							$elencoteam[$value['team']]['num'] = (int)$elencoteam[$value['team']]['num']+1;
							$elencoteam[$value['team']]['livello']=$value['livello'];
						}
						else
						{
							$single=isset($value['nick']) ? $value['nick'] : $key;
							$elencosingoli[$single]=$value['livello']; 
							$numsingle++;	
						}
					}
					else
					{
						$single=isset($value['nick']) ? $value['nick'] : $key;
						$elencosingoli[$single]=$value['livello'];
						$numsingle++;
					}
				}
				
				$maxlivello = 0; 
				foreach ($elencoteam as $key => $value) 
				{
					$i = (int)$elencoteam[$key]['livello'];
					if ($i>$maxlivello)
						$maxlivello=$i;
				}
				foreach ($elencosingoli as $value) 
				{
					$i = (int)$value;
					if ($i>$maxlivello)
						$maxlivello=$i;
				} 
				$liv = $maxlivello;
			}
			
			$tot_team = 0;
			$tot_single = 0;
			$tot_anonimi = 0;
			
			unset($elencoteam);
			unset($elencosingoli);
			foreach ($myVarsArr as $key => $value)
			{
				if(isset($value['team']))
				{
					if ((strlen($value['team'])>=1) && ($value['livello'] == $liv))  //giocatori nel team
					{
						$elencoteam[$value['team']]['num'] = (int)$elencoteam[$value['team']]['num']+1;
						$elencoteam[$value['team']]['star'] = (int)$elencoteam[$value['team']]['star']+
						                                      (int)$myVarsArr[$key]['star'];
						$elencoteam[$value['team']]['team'] = $value['team'];
					}
					else if ($value['livello'] == $liv )   //giocatori con utenza sbloccata
					{
						$single=isset($value['nick']) ? $value['nick'] : "anonimo";
						if (isset($value['nick']))
						{
							$elencosingoli[$single]=(int)$elencosingoli[$single]+1;
							$tot_single=$tot_single + 1;
						}
						else
							$tot_anonimi=$tot_anonimi + 1;
					}
					
				}
				else if ($value['livello'] == $liv)
				{
					$single=isset($value['nick']) ? $value['nick'] : "anonimo";
					if (isset($value['nick']))
					{
						$elencosingoli[$single]=(int)$elencosingoli[$single]+1;
						$tot_single=$tot_single + 1;
					}
					else
						$tot_anonimi=$tot_anonimi + 1;
				}
			}
			$tot_team=count($elencoteam);
		
			$response="<b>concorrenti al livello " . $liv . "</b>";
			
			if ($tot_team > 0)
				$response=$response . "\n\n---- <b>team</b> (" . $tot_team . ")";
			
			$narr = array_sort($elencoteam, "team", $order=SORT_ASC);
			
			foreach ($narr as $key => $value) 
			{
				if ((int)$value['star'] > 0)
					$response=$response . "\n" . $emoji_team. " " . $key . " (" . (int)$value['star'] . unichr($star_code) . ")";
				else
					$response=$response . "\n" . $emoji_team. " " . $key;
			}
			
			if ($tot_single > 0)
				$response=$response . "\n\n---- <b>giocatori singoli </b>(" . $tot_single . ")";
			
			$narr = array_sort($myVarsArr, "nick", $order=SORT_ASC);
			
			foreach ($narr as $key => $value)
			{
				if (isset($value['nick']) && ((strlen($value['team'])<1) || !isset($value['team'])) && $value['star']>0 && $value['livello']==$liv)
					$response=$response . "\n" . $emoji_esci. " " . $value['nick'] . " (" . $narr[$key]['star'] . unichr($star_code) . ")";
				elseif (isset($value['nick'])&& ((strlen($value['team'])<1) || !isset($value['team'])) && $value['livello']==$liv)
					$response=$response . "\n" . $emoji_esci. " " . $value['nick'];
			}
			
		/*	
			foreach ($elencosingoli as $key => $value) 
			{
				if ($key !== "anonimo")
					if ((int)$myVarsArr[$key]['star'] > 0)
						$response=$response . "\n" . $key . " (" . $myVarsArr[$key]['star'] . unichr($star_code) . ")";
					else
						$response=$response . "\n" . $key . "***********";
			}
		*/
			
			if ($tot_anonimi > 0)
				$response=$response . "\n\n <b>giocatori anonimi</b> (" . $tot_anonimi . ")";
		}
		
	}
	
	if (strlen($response)>=4096)
	{
		$response = "troppi livelli presenti in classifica\nla richiesta di visualizzazione non può essere soddisfatta";
	}
	
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response)."&parse_mode=HTML";
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	/*
	$parameters = array('chat_id' => $chatId, "text" => $response);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	*/
	
	exit();
}
//lteam iniziali
if(strpos($text, '/lteam') !== false)
{
	$par  = explode(" ", $text);
	foreach ($myVarsArr as $key => $value)
	{
		if(isset($value['team']))
		{
			if (strlen($value['team'])>=1)
			{
				$elenco[$key]['team']=$value['team'];
				$elenco[$key]['nick']=$value['nick'];
				$elenco[$key]['star']=$value['star'];
				$elenco[$key]['sort']=$value['team']."X".$value['nick'];
			}
		}
	}
	
	$narr = array_sort($elenco, "sort", $order=SORT_ASC);
	
	$response="<b>composizione dei team</b>";
	$team_curr = "Y";
	$tstar=0;
	$response_team = "";
	$response_gioc = "";
	$flag = false;
	foreach ($narr as $key => $value) 
	{
		if ((strpos($value['team'], $par[1])===0) || ($par[1]==="*"))
		{
			if ($team_curr != $value['team'])
			{
				if ($tstar > 0)
				{	
					$response_star = " (" . $tstar . unichr($star_code) . ")\n";
				}
				else
				{
					$response_star = "\n";
				}
				
				if (strlen($response)+strlen($response_team)+
				    strlen($response_star)+strlen($response_gioc) > 4050)
				{
					$response = $response . "\n(alcuni team non possono essere visualizzati)";
					break;
				}
				
				$response = $response . $response_team . $response_star . $response_gioc;
				$response_gioc = "";
				$tstar = 0;
				$response_team = "\n" . $emoji_team . "<b> ". $value['team'] . "</b>";
				$team_curr = $value['team'];
				$flag = true;
			}
			
			if ($value['star'] > 0)
				$gstar = " (" . $value['star'] . unichr($star_code) . ")";
			else
				$gstar = "";
			$response_gioc = $response_gioc . $emoji_esci . " ". $value['nick'] . $gstar . "\n";
			$tstar += $value['star'];
		}
	}
	if ($flag)
	{
		if ($tstar > 0)
		{	
			$response_star = " (" . $tstar . unichr($star_code) . ")\n";
		}
		else
		{
			$response_star = "\n";
		}
		
		if (strlen($response)+strlen($response_team)+
			strlen($response_star)+strlen($response_gioc) > 4050)
		{
			$response = $response . "\n(alcuni team non possono essere visualizzati)";
		}
		
		$response = $response . $response_team . $response_star . $response_gioc;
		$flag=false;
	}
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response)."&parse_mode=HTML";
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	
	/*
	$parameters = array('chat_id' => $chatId, "text" => $response);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	*/
	
	exit(); 
	
}
//about visualizza il file about.txt
if(strpos($text, '/about') !== false) 
{	
	$par  = explode(" ", $text);
	
	if (!isset($par[1]))
	{
		$msg=file_get_contents($path_about);
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg)."&parse_mode=HTML";
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	elseif ($par[1]=="faq")
	{
		$postFields = array('chat_id' => $chatId, 'document' => new CURLFile($path_faq));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
		curl_setopt($ch, CURLOPT_URL, $botUrlDocument); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
	
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	elseif ($par[1]=="-A")   // opzione richiamabile solo da menu
	{
		$msg=file_get_contents($path_about_menu);
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg)."&parse_mode=HTML";
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	elseif ($par[1]=="-F")  // opzione richiamabile solo da menu
	{
		$postFields = array('chat_id' => $chatId, 'document' => new CURLFile($path_faq_menu));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
		curl_setopt($ch, CURLOPT_URL, $botUrlDocument); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
	
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	else
	{
		$response = "uso del comando /about\n/about    visualizza informazioni sul bot\n/about faq    visualizza le faq";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	exit();
}
//KEYBOARD *******************************************************************
if(strpos($text, '/menu') !== false) 
{	
	$par  = explode(" ", $text);
	
	if (!isset($par[1]))
	{
		$msg="uso del comando /menu\n/menu on    abilita i menu\n/menu off    disabilita i menu";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	elseif ($par[1]=="on")
	{	
		
		$reply_markup='{"keyboard":[["'.$key_enigma.'","'.$key_help.'", "'.$key_ranking.'"],["'.$key_chat.'","'. $key_setup. '","'.$key_about .'"]],"resize_keyboard":true}';
		
		$msg="menu abilitati";
		
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	elseif ($par[1]=="off")
	{
		$reply_markup='{"hide_keyboard": true}';
		
		$msg="menu disabilitati";
		
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		
	}
	else
	{
		
		$msg="uso del comando /menu\n/menu on    abilita i menu\n/menu off    disabilita i menu";
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	exit();
}
//zero (azzera i livelli dell'utente) ***********
if(strpos($text, '/zero') !== false) 
{	
	$par  = explode(" ", $text);
	
	$myVarsArr[$chatId]["livello"]=0;
	$myVarsArr[$chatId]["date"]=$data_corrente;
	
	$team = $myVarsArr[$chatId]["team"];
	if (strlen($team)>=1)
	{
		foreach ($myVarsArr as $key => $value)
		{
			if ($myVarsArr[$key]["team"]===$team)
			{
				if ($key !== $chatId)
				{
					$myVarsArr[$key]["livello"]=0;
					$myVarsArr[$key]["date"]=$data_corrente;
					
					$msg = $nickId . " ha azzerato il livello di gioco del team";
					$ch = curl_init();
					$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($msg);
					curl_setopt($ch, CURLOPT_URL, $myUrl); 
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					
					// read curl response
					$output = curl_exec($ch);
					curl_close($ch);
				}
			}
		}
		$msg="il livello di gioco del tuo team è stato azzerato";
	}
	else
	{
		$msg="il tuo livello di gioco è stato azzerato";
	}
	$myVarsJson = json_encode($myVarsArr);
	file_put_contents($path, $myVarsJson, LOCK_EX);
		
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	exit();
}
//gestione dei messaggi e dei comandi (diversi dai comandi /stat /chat /about /ranking) ricevuti quando la gara è terminata
//è notifica la fine della gara
if (($statoGioco=="terminato") && !$eccezione)
{
	$msg = "la gara è terminata, il tesoro è stato trovato!!!";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	exit();
}
//comandi che possono essere eseguiti negli stati da_avviare e in esecuzione
//team imposta il team
if(strpos($text, '/team') !== false)
{
	// imposta il team
	$par  = explode(" ", $text);
	
	if (!isset($par[1]))
	{
		$response = "uso del comando /team\n    /team -l  (dettagli sul team)\n    /team -c mio-team  (crea il team)\n    /team -r  (per essere aggiunti in un team)\n    /team -s  (singolo giocatore)\n    /team -a nickname  (aggiunge al team)";
	}
	else if (($par[1]=="-c") && strlen($myVarsArr[$chatId]["team"])>=1)
	{
		$response = "sei già associato ad un team\nper creare un nuovo team esegui prima /team -c";
	}
	else if (($par[1]=="-C") && strlen($myVarsArr[$chatId]["team"])>=1)
	{
		$response = "sei già associato ad un team\nper crearne uno, devi prima uscire dal tuo team";
	}
	else if ((($par[1]=="-C") || ($par[1]=="-C")) && isset($par[2]) && !isset($myVarsArr[$chatId]["nick"]))
	{
		$response = "per creare un team devi prima impostare il nickname";
	}
	else if ((($par[1]=="-c") || ($par[1]=="-C")) && (!isset($par[2])))
	{
		unset($myVarsArr[$chatId]["team"]);
		$myVarsJson = json_encode($myVarsArr);
		file_put_contents($path, $myVarsJson, LOCK_EX);
		
		$response = "gareggi come singolo giocatore";
	}
	else if (($par[1]=="-c")||($par[1]=="-C"))
	{
		
		if ($par[1]=="-c")
			$team  = substr($text, strpos($text, "-c ")+3);
		else
			$team  = substr($text, strpos($text, "-C ")+3);
		
		$team = str_replace(" ", "_", $team);
		
		$inuso=false;
		foreach ($myVarsArr as $key => $value)
		{
			if ($myVarsArr[$key]["team"]===$team)
			{
				$inuso = true;
				break;
			}
		}
		if ($inuso === false) 
		{
			$myVarsArr[$chatId]["team"]=$team;
			$myVarsJson = json_encode($myVarsArr);
			file_put_contents($path, $myVarsJson, LOCK_EX);
			
			$response = "team creato correttamente: ".$myVarsArr[$chatId]["team"];
		}
		else
			$response = "nome del team già in uso";
	}
	else if ($par[1]=="-l")
	{
		$team = $myVarsArr[$chatId]["team"]; 
		if (!isset($team))
		{
			$response = "gareggi come singolo giocatore";
		}
		else if (strlen($team)==0) 
		{
			$response = "non risulti associato a nessun team\nla tua utenza risulta sbloccata e può essere associata ad un team già esistente";
		}
		else 
		{
			$response = "sei associato al team " . $team . "\n\ncompisizione del team:\n";
			foreach ($myVarsArr as $key => $value)
			{
				if ($myVarsArr[$key]["team"]==$team)
				{
					$response = $response . $myVarsArr[$key]["nick"];
					if ((int)$myVarsArr[$key]['star'] > 0)
						$response = $response . " (" . (int)$myVarsArr[$key]['star'] . unichr($star_code) . ")";
					$response = $response . "\n";
				}
			}
		}
	}
	else if ($par[1]=="-r" && !isset($myVarsArr[$chatId]["nick"]))
	{	
		$response = "per sbloccare l'utenza devi prima impostare il nickname";
	}
	else if ($par[1]=="-r")
	{
		$myVarsArr[$chatId]["team"]="";
		$myVarsJson = json_encode($myVarsArr);
		file_put_contents($path, $myVarsJson, LOCK_EX);
		
		$response = "la tua utenza è sbloccata e può essere aggiunta ad un team già esistente";
	}
	else if ($par[1]=="-s")
	{
		unset($myVarsArr[$chatId]["team"]);
		
		$myVarsJson = json_encode($myVarsArr);
		file_put_contents($path, $myVarsJson, LOCK_EX);
		
		$response = "gareggi come singolo giocatore";
	}
	else if ($par[1]==="-a" || $par[1]==="-A")  // opzione -A richiamabile solo da interfaccia a menu
	{
		if ($par[1]==="-a")
			$nick=substr($text, strpos($text, "-a ")+3);
		else
			$nick=substr($text, strpos($text, "-A ")+3);
				
		$team = $myVarsArr[$chatId]["team"];
		
		if (!strlen($team)>=1)
		{
			if ($par[1]==="-a")
				$response = "non appartieni a nessun team\nnon puoi associare altri giocatori\nusa prima il comando\n/team -c mio-team";
			else
				$response = "non appartieni a nessun team\nnon puoi associare altri giocatori";
		}
		else
		{
		    // conta il numero di giocatori nel team
			$cont=0;
			foreach ($myVarsArr as $key => $value)
			{
				if ($myVarsArr[$key]["team"]===$team)
					$cont++;
			}
			
			if ($cont>=$MAX_TEAM)
			{
				$msg = "hai già raggiunto il numero massimo di giocatori ammessi in team\nnon puoi aggiungere altri giocatori";
				$ch = curl_init();
				$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
				curl_setopt($ch, CURLOPT_URL, $myUrl); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				
				// read curl response
				$output = curl_exec($ch);
				curl_close($ch);
				exit();
			}
       		
			$nicktrovato=false;
			foreach ($myVarsArr as $key => $value)
			{
				if ($myVarsArr[$key]["nick"]===$nick)
				{
					$nicktrovato = true;
					if (!isset($myVarsArr[$key]["team"]))
					{
						if ($par[1]==="-a")
							$response = $nick . " gareggia come singolo giocatore\n\n" . $nick . " deve eseguire il comando\n/team -r per poter essere associato ad un team";
						else
							$response = $nick . " gareggia come singolo giocatore\n\n" . $nick . " deve sbloccare la propria utenza per poter essere associato ad un team";
					}
					else if ((strlen($myVarsArr[$key]["team"])==0))
					{
						$myVarsArr[$key]["livello"]=$myVarsArr[$chatId]["livello"];
						$myVarsArr[$key]["date"]=$myVarsArr[$chatId]["date"];
						$myVarsArr[$key]["team"]=$team;
						$myVarsArr[$key]["star"]=0;
						$myVarsJson = json_encode($myVarsArr);
						file_put_contents($path, $myVarsJson, LOCK_EX);
				
						$newId=$key;
				
						$msg = "sei stato inserito nel team " . $team . "\n\nsei ora allineato al livello di gioco del team";
						$ch = curl_init();
						$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($msg);
						curl_setopt($ch, CURLOPT_URL, $myUrl); 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
						
						// read curl response
						$output = curl_exec($ch);
						curl_close($ch);
			
						$response = $nick . " è stato aggiunto al team " . $team;
					}
					
					else
						$response = $nick . " è già associato ad un differente team";
					
					break;
				}
			}
			if (!$nicktrovato)
				$response = $nick . " non è stato trovato\n\nverifica di aver scritto correttamente il nickname";
			else
			{
				foreach ($myVarsArr as $key => $value)
				{
					if ($myVarsArr[$key]["team"]===$team)
					{
						if (($key !== $newId) && ($key !== $chatId))
						{
							$msg = $nick . " è stato aggiunto al team " . $team;
							$ch = curl_init();
							$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($msg);
							curl_setopt($ch, CURLOPT_URL, $myUrl); 
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
							
							// read curl response
							$output = curl_exec($ch);
							curl_close($ch);
						}
					}
				}
			}
		}
	}
	else
	{
		$response = "uso del comando /team\n    /team -l  (dettagli sul team)\n    /team -c mio-team  (crea il team)\n    /team -r  (per essere aggiunti in un team)\n    /team -s  (singolo giocatore)\n    /team -a nickname  (aggiunge al team)";
	}
	
	$parameters = array('chat_id' => $chatId, "text" => $response);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	exit();
}
//register
if(strpos($text, '/register') !== false)
{
	$par  = explode(" ", $text);
	
	//lettura da file delle anagrafiche
	$myAngJson = file_get_contents($path_anagrafica);
	$anagrafica = json_decode($myAngJson,true);
		
	
	if (!isset($par[1]))
	{
		
		if (!isset($anagrafica[$chatId]['anagrafica']))
		{
			$response="non sei ancora registrato\nper registrarti usa il comando:\n/register nome cognome classe";
		}
		else
		{
			$response="utente: " . $anagrafica[$chatId]['anagrafica'];
		}		
	}
	else if ($par[1]=="-V")   // opzione richiamabile esclusivamente da interfaccia a menu
	{
		if (!isset($anagrafica[$chatId]['anagrafica']))
		{
			$response="non sei ancora registrato";
		}
		else
		{
			$response="utente: " . $anagrafica[$chatId]['anagrafica'];
		}		
	}
	else
	{
		$anagrafica[$chatId]['anagrafica']=substr($text, strpos($text, $par[1]));
		$myAngJson = json_encode($anagrafica);
		file_put_contents($path_anagrafica, $myAngJson, LOCK_EX);
		
		$response="utente registrato correttamente: " . $anagrafica[$chatId]['anagrafica'];
	}
	
	$parameters = array('chat_id' => $chatId, "text" => $response);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	exit();
}
//nick imposta il nickname
if(strpos($text, '/nick') !== false)
{
	
	$par  = explode(" ", $text);
	
	if (!isset($par[1]))
	{
		
		if (!isset($myVarsArr[$chatId]["nick"]))
		{
			$response="non hai ancora impostato il nickname\nper impostare il nickname usa il comando:\n/nick mio-nick";
		}
		else
		{
			$response="nickname: " . $myVarsArr[$chatId]["nick"];
		}		
	}
	else if ($par[1]=="-V")   // opzione richiamabile esclusivamente da interfaccia a menu
	{
		if (!isset($myVarsArr[$chatId]["nick"]))
		{
			$response="non hai ancora impostato il nickname";
		}
		else
		{
			$response="nickname: " . $myVarsArr[$chatId]["nick"];
		}		
	
	}
	else
	{
		if ($myVarsArr[$chatId]["nick"]=="ADMIN")
		{
			$response = "ADMIN non può modificare il proprio nick";
		}
		else
		{
			$nick  = substr($text, strpos($text, " ")+1);
			
			$nick = str_replace(" ", "_", $nick);
			
			$inuso=false;
			foreach ($myVarsArr as $key => $value)
			{
				if ($myVarsArr[$key]["nick"]===$nick)
				{
					$inuso = true;
					break;
				}
			}
			if ($inuso === false) 
			{
				$myVarsArr[$chatId]["nick"]=$nick;
				$myVarsJson = json_encode($myVarsArr);
				file_put_contents($path, $myVarsJson, LOCK_EX);
				
				$response = "nickname impostato correttamente: ". $myVarsArr[$chatId]["nick"];
			}
			else
				$response = "nickname già in uso";
		}
	}
	$parameters = array('chat_id' => $chatId, "text" => $response);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	exit();
}
	
//gestione dei messaggi e dei comandi (diversi dai comandi /stat /chat /about /ranking /nick /team /register) 
//ricevuti quando la gara è da_avviare - è notifica che la gara non è iniziata
if (($statoGioco=="da_avviare") && !$eccezione)
{
	$msg = "la gara non è ancora iniziata!!!\nla tua richiesta non può essere soddisfatta";
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg);
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	exit();
}
//gestione di ulteriori comandi utente e dei messaggi mentre la gara è in_esecuzione
//registrazione dei nuovi uteneti nel file di contesto
//la procedura è eseguita in corrispondenza dello start o restart (restart==true significa nuovo utente ed è dovuto a deployment dell'app)
//impostazione del livello 0 e dei dati utente nel file livello.txt
$risEsatta=false;
$response = '';
if(((strcmp($text, '/start') === 0) || $restart === true) && !$eccezione)
{	
	// imposta a 0 il livello raggiunto dalla chatId
	if (!isset($myVarsArr[$chatId]["livello"]))
	{
		$livello=0;
		$myVarsArr[$chatId]["livello"]=$livello;
		$myVarsArr[$chatId]["date"]=$data_corrente;
		$myVarsArr[$chatId]["firstname"]=$firstname;
		$myVarsArr[$chatId]["lastname"]=$lastname;
		$myVarsJson = json_encode($myVarsArr);
		file_put_contents($path, $myVarsJson, LOCK_EX);
	}
	
	$risEsatta=true;
}
// acquisisce tutte le info relative al livello corrente
//$xml=simplexml_load_file("domande.xml") or die("Error: Cannot create object");
$tipo = (String)($xml->domanda[$livello]->tipo);
$risorsa = (String)($xml->domanda[$livello]->risorsa);
$risposta = (String)($xml->domanda[$livello]->risposta);
$indizio = array(0 => (String)($xml->domanda[$livello]->indizio0), 
				 1 => (String)($xml->domanda[$livello]->indizio1), 
				 2 => (String)($xml->domanda[$livello]->indizio2), 
				 3 => (String)($xml->domanda[$livello]->indizio3));
//help accede agli indizi correnti
if(strpos($text, '/help') !== false)
{
	$par  = explode(" ", $text);
	
	if (!isset($par[1]))
	{
		$reply_markup='{"keyboard":[["'.$key_enigma.'","'.$key_help.'", "'.$key_ranking.'"],["'.$key_chat.'","'. $key_setup. '","'.$key_about .'"]],"resize_keyboard":true}';
		
		$msg="menu abilitati";
		
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg). "&reply_markup=" . $reply_markup;
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
	}
	
	// fornisce gli indizi per il livello corrente coerentemente con le abilitazioni
	$response = $indizio[0];
	if (abilitazione_livello($attesa_aiuto1, $myVarsArr[$chatId]["date"] ))
		$response = $response . "\n" . $indizio[1];
	if (abilitazione_livello($attesa_aiuto2, $myVarsArr[$chatId]["date"] ))
	    $response = $response . "\n" . $indizio[2];
    if (abilitazione_livello($attesa_aiuto3, $myVarsArr[$chatId]["date"] ))
		$response = $response . "\n" . $indizio[3];
	
	
	//prossimo aiuto
	if (($livello > 0) && ($statoGioco != "terminato"))
	{
		if (abilitazione_livello($attesa_aiuto3, $myVarsArr[$chatId]["date"]))
			$msg_prossimo_aiuto = "\n\n<i>tutti gli indizi del livello sono abilitati</i>";
		else if (abilitazione_livello($attesa_aiuto2, $myVarsArr[$chatId]["date"]))
			$msg_prossimo_aiuto = "\n\n<i>prossimo indizio alle: " . prossimo_aiuto($attesa_aiuto3, $myVarsArr[$chatId]["date"]) . "</i>";
		else if (abilitazione_livello($attesa_aiuto1, $myVarsArr[$chatId]["date"]))
			$msg_prossimo_aiuto = "\n\n<i>prossimo indizio alle: " . prossimo_aiuto($attesa_aiuto2, $myVarsArr[$chatId]["date"]). "</i>";
		else 
			$msg_prossimo_aiuto = "\n\n<i>prossimo indizio alle: " . prossimo_aiuto($attesa_aiuto1, $myVarsArr[$chatId]["date"]). "</i>";
	}
	
	$response = $response . $msg_prossimo_aiuto;
	
	
	$ch = curl_init();
	$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($response)."&parse_mode=HTML";
	curl_setopt($ch, CURLOPT_URL, $myUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
	// read curl response
	$output = curl_exec($ch);
	curl_close($ch);
	exit();
		
/*
	$parameters = array('chat_id' => $chatId, "text" => $response);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	exit();
*/
}
//refresh ricarica la domanda corrente
if(strpos($text, '/refresh') !== false)
{
	$risEsatta=true;
}
// / comando errato
/*
if((strpos($text, '/') !== false) && !$eccezione)
{
	$response = "comando errato";
	$parameters = array('chat_id' => $chatId, "text" => $response);
	$parameters["method"] = "sendMessage";
	echo json_encode($parameters);
	exit();
}
*/
//verifica se la risposta data è corretta e, se OK,  incrementa il livello
//if((strcmp($text, strtolower($risposta)) === 0) && (!$eccezione))
if (risposta_esatta($text, $risposta) && (!$eccezione))
{
	$file = fopen($path_lock,"w+");
	$Lock = flock($file,LOCK_EX);
	if (!$Lock)
	{
		$msg="l'utente " . $chatId . " non può aggiornare il livello: lock non ottenuto";
		$all_chatId = array_keys($amministratore);
		$tot = count($all_chatId);
		for ($i=0; $i<$tot; $i++) 
		{ 
			if ($all_chatId[$i]>0)
			{
				$ch = curl_init();
				$myUrl=$botUrlMessage . "?chat_id=" . $all_chatId[$i] . "&text=" . urlencode($msg);
				curl_setopt($ch, CURLOPT_URL, $myUrl); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				
				// read curl response
				$output = curl_exec($ch);
				curl_close($ch);
			}
		}
		
		$response='non ho capito, ripeti per favore...';
		$parameters = array('chat_id' => $chatId, "text" => $response);
		$parameters["method"] = "sendMessage";
		echo json_encode($parameters);
		
		fclose($file);
		exit();
	}
	
	//mylog("lock ottenuto", $path_log, $chatId);
	  
	$myVarsJson = file_get_contents($path);
    $myVarsArr = json_decode($myVarsJson,true);
	
	//mylog("letto dopo il lock", $path_log, $chatId);
    
	if ($myVarsArr[$chatId]["livello"]==$livello)
	{
		$maxlivello=0;
		foreach ($myVarsArr as $key => $value) 
		{
			if ($maxlivello < $value['livello'])
			{
				$maxlivello = $value['livello'];
			}
		}
		if ($livello == $maxlivello)
			$stella=true;
		else
			$stella=false;
		
		$livello++;
		$myVarsArr[$chatId]["livello"]=$livello;
		$myVarsArr[$chatId]["date"]=$data_corrente;
		if ($stella && $livello > 1)
			$myVarsArr[$chatId]["star"]=(int)$myVarsArr[$chatId]["star"]+1;
		
		$team = $myVarsArr[$chatId]["team"];
		if (strlen($team)>=1)
		{
			foreach ($myVarsArr as $key => $value)
			{
				if ($myVarsArr[$key]["team"]===$team)
				{
					if ($key !== $chatId)
					{
						$myVarsArr[$key]["livello"]=$livello;
						$myVarsArr[$key]["date"]=$data_corrente;
						
						$msg = $nickId . " ha superato il livello del gioco inviando la risposta:\n" .$text."\n\ntocca il pulsante  'enigma' per visualizzare il nuovo quesito";
						$ch = curl_init();
						$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($msg);
						curl_setopt($ch, CURLOPT_URL, $myUrl); 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
						
						// read curl response
						$output = curl_exec($ch);
						curl_close($ch);
					}
				}
			}
		}
		$myVarsJson = json_encode($myVarsArr);
	    file_put_contents($path, $myVarsJson, LOCK_EX);
		flock($file,LOCK_UN);
		fclose($file);
		//verifica di congruenza
		$myVarsXXJson = file_get_contents($path);
		$myVarsXXArr = json_decode($myVarsJson,true);
		if ($myVarsXXArr[$idADMIN]["nick"]!=="ADMIN")
		{
			$msg="errore critico di scrittura del file dei livelli tentativo 1";
			$all_chatId = array_keys($amministratore);
			$tot = count($all_chatId);
			for ($i=0; $i<$tot; $i++) 
			{ 
				if ($all_chatId[$i]>0)
				{
					$ch = curl_init();
					$myUrl=$botUrlMessage . "?chat_id=" . $all_chatId[$i] . "&text=" . urlencode($msg);
					curl_setopt($ch, CURLOPT_URL, $myUrl); 
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					
					// read curl response
					$output = curl_exec($ch);
					curl_close($ch);
				}
			}
			
			$myVarsJson = json_encode($myVarsArr);
			file_put_contents($path, $myVarsJson, LOCK_EX);
			
			$myVarsXXJson = file_get_contents($path);
			$myVarsXXArr = json_decode($myVarsJson,true);
			if ($myVarsXXArr[$idADMIN]["nick"]!=="ADMIN")
			{
		
				$msg="errore critico di scrittura del file dei livelli tentativo 2";
				$all_chatId = array_keys($amministratore);
				$tot = count($all_chatId);
				for ($i=0; $i<$tot; $i++) 
				{ 
					if ($all_chatId[$i]>0)
					{
						$ch = curl_init();
						$myUrl=$botUrlMessage . "?chat_id=" . $all_chatId[$i] . "&text=" . urlencode($msg);
						curl_setopt($ch, CURLOPT_URL, $myUrl); 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
						
						// read curl response
						$output = curl_exec($ch);
						curl_close($ch);
					}
				}
			}
		}
		else if ($myVarsXXArr[chatId]["livello"]!==$myVarsArr[chatId]["livello"])
		{
			$response='non ho capito, ripeti per favore...';
			$parameters = array('chat_id' => $chatId, "text" => $response);
			$parameters["method"] = "sendMessage";
			echo json_encode($parameters);
			
			exit();
		}
		// fine verifica di congruenza
	}
	else
	{
		$response='non ho capito, ripeti per favore...';
		$parameters = array('chat_id' => $chatId, "text" => $response);
		$parameters["method"] = "sendMessage";
		echo json_encode($parameters);
		
		flock($file,LOCK_UN);
		fclose($file);
		exit();
	}
	
	//$xml=simplexml_load_file("domande.xml") or die("Error: Cannot create object");
	$tipo = (String)($xml->domanda[$livello]->tipo);
	$risorsa = (String)($xml->domanda[$livello]->risorsa);
	$risposta = (String)($xml->domanda[$livello]->risposta);
	$indizio = array(0 => (String)($xml->domanda[$livello]->indizio0), 
					 1 => (String)($xml->domanda[$livello]->indizio1), 
					 2 => (String)($xml->domanda[$livello]->indizio2), 
					 3 => (String)($xml->domanda[$livello]->indizio3));
	$risEsatta=true;
}
	
//gestisce la risposta corretta (allo start/restart si considera fittiziamente che la risposta è esatta)
//mostrando la domanda del livello appena raggiunto
//quando lo stato eccezione (su richiesta di admin) è imposato l'enigma è comunque visualizzato
if(($risEsatta==true)||($eccezione == true))
{
	if(strcmp($tipo, "immagine") === 0)
	{
		$postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("$risorsa")));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
		curl_setopt($ch, CURLOPT_URL, $botUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		
		// read curl response
		$output = curl_exec($ch);
			
		exit();
	}
	
	if(strcmp($tipo, "sequenza") === 0)
	{
		$risorsa1=str_replace(".", "-1.", $risorsa);
		$risorsa2=str_replace(".", "-2.", $risorsa);
		$risorsa3=str_replace(".", "-3.", $risorsa);
		
		
		if (!$eccezione)
		{
			if (abilitazione_livello($attesa_aiuto3, $myVarsArr[$chatId]["date"] ))
				$risorsa=$risorsa3;
			elseif (abilitazione_livello($attesa_aiuto2, $myVarsArr[$chatId]["date"] ))
				$risorsa=$risorsa2;
			elseif (abilitazione_livello($attesa_aiuto1, $myVarsArr[$chatId]["date"] ))
				$risorsa=$risorsa1;
			
			$postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("$risorsa")));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $botUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			
			// read curl response
			$output = curl_exec($ch);
		}
		else
		{
			$postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("$risorsa")));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $botUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			
			// read curl response
			$output = curl_exec($ch);
			
			sleep(2);
			
			$risorsa=$risorsa1;
			
			$postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("$risorsa")));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $botUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			
			// read curl response
			$output = curl_exec($ch);
			
			sleep(2);
			
			$risorsa=$risorsa2;
			
			$postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("$risorsa")));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $botUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			
			// read curl response
			$output = curl_exec($ch);
			
			sleep(2);
			
			$risorsa=$risorsa3;
			
			$postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("$risorsa")));
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
			curl_setopt($ch, CURLOPT_URL, $botUrl); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			
			// read curl response
			$output = curl_exec($ch);
		}
		
			
		exit();
	}
	if(strcmp($tipo, "audio") === 0)
	{
		$postFields = array('chat_id' => $chatId, 'voice' => new CURLFile(realpath("$risorsa")));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
		curl_setopt($ch, CURLOPT_URL, $botUrlVoice); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		
		// read curl response
		$output = curl_exec($ch);
			
		exit();
	}
	if(strcmp($tipo, "video") === 0)
	{
		$postFields = array('chat_id' => $chatId, 'video' => new CURLFile(realpath("$risorsa")));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
		curl_setopt($ch, CURLOPT_URL, $botUrlVideo); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		
		// read curl response
		$output = curl_exec($ch);
			
		exit();
	}
	
	if(strcmp($tipo, "documento") === 0)
	{
		$postFields = array('chat_id' => $chatId, 'document' => new CURLFile(realpath("$risorsa")));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
		curl_setopt($ch, CURLOPT_URL, $botUrlDocument); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		
		// read curl response
		$output = curl_exec($ch);
			
		exit();
	}
	if(strcmp($tipo, "testo") === 0)
	{
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($risorsa);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		exit();
		
		/* Modo alternativo
		$parameters = array('chat_id' => $chatId, "text" => $risorsa);
		$parameters["method"] = "sendMessage";
		echo json_encode($parameters);
		exit();
		*/
	}
	
	if(strcmp($tipo, "chiusura") === 0)
	{
		//Invio dell'immagine finale
		$postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("$risorsa")));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
		curl_setopt($ch, CURLOPT_URL, $botUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		
		//Invio del testo finale + codice di controllo		
		$cod_ctrl = ($chatId % 97) + ($chatId * 100);
		$msg_chiusura = $risposta . "\nCode: " . $cod_ctrl;
		
		$ch = curl_init();
		$myUrl=$botUrlMessage . "?chat_id=" . $chatId . "&text=" . urlencode($msg_chiusura);
		curl_setopt($ch, CURLOPT_URL, $myUrl); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		
		// read curl response
		$output = curl_exec($ch);
		curl_close($ch);
		
		//impostazione dello stato del gioco a terminato
		if (!$eccezione)
		{
			$amministratore['stato_gioco'] = "terminato";
			$myAdminJson = json_encode($amministratore);
			file_put_contents($path_admin, $myAdminJson, LOCK_EX);
			
			//notifica a tutti gli utenti la fine della gara
			$notifica = "la gara è terminata, il tesoro è stato trovato!!!!";
			
			if (!verifyBrd($flagBroadcast, $path_broadcast, $chatId))
					exit();
				
			$team = $myVarsArr[$chatId]["team"];
			if (strlen($team)>=1)
			{
				foreach ($myVarsArr as $key => $value)
				{
					if ($myVarsArr[$key]["team"]===$team)
					{
						if ($key !== $chatId)
						{
							$myVarsArr[$key]["livello"]=$livello;
							$myVarsArr[$key]["date"]=$data_corrente;
							
							$msg = $nickId . ' ha trovato il tesoro, il tuo team ha vinto la gara!!!';
							$ch = curl_init();
							$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($msg);
							curl_setopt($ch, CURLOPT_URL, $myUrl); 
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
							
							// read curl response
							$output = curl_exec($ch);
							curl_close($ch);
						}
					}
				}
				sleep(1);
			}	
			
			$j=0;
			foreach ($myVarsArr as $key => $value)
			{
				//Telegram prescrive una pausa di 1 sec ogni 30 notifiche 
				if ($j % 20 == 0)
				{
					sleep(1);
				}
				if ($key != $chatId)
				{
					$j++;
					$ch = curl_init();
					$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($notifica);
					curl_setopt($ch, CURLOPT_URL, $myUrl); 
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					
					// read curl response
					$output = curl_exec($ch);
					curl_close($ch);
				}
				
			}
			setBrd($flagBroadcast, $path_broadcast, $chatId);
			
		/*
			//notifica a tutti gli utenti la fine della gara
			$notifica = "la gara è terminata, il tesoro è stato trovato!!!";
			foreach ($myVarsArr as $key => $value)
			{
				$ch = curl_init();
				$myUrl=$botUrlMessage . "?chat_id=" . $key . "&text=" . urlencode($notifica);
				curl_setopt($ch, CURLOPT_URL, $myUrl); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				
				// read curl response
				$output = curl_exec($ch);
				curl_close($ch);
			}
		*/
		}
		exit();
	}
}
else
{
	if (strcmp($tipo, "chiusura") === 0)
	{
		$response='la gara è terminata, il tesoro è stato trovato!!!';
		$parameters = array('chat_id' => $chatId, "text" => $response);
		$parameters["method"] = "sendMessage";
		echo json_encode($parameters);
	}
	else
	{
		if (substr($text, 0, 1)=="/")
			$response='comando non riconosciuto';
		else if(strlen($text)>50)
			$response='il testo inserito è troppo lungo e la risposta non è stata verificata, riprova...';
		else
			$response='non è la risposta giusta, riprova...';
		$parameters = array('chat_id' => $chatId, "text" => $response);
		$parameters["method"] = "sendMessage";
		echo json_encode($parameters);
	}
	
}
function verifyBrd($flagBroadcast, $path_broadcast, $id)
{
	if (!isset($flagBroadcast[$id]["stato"]))
	{
		$flagBroadcast[$id]["stato"]=time()+1000;
		$myBrdJson = json_encode($flagBroadcast);
		file_put_contents($path_broadcast, $myBrdJson, LOCK_EX);
		return true;
	}
	elseif (time() - $flagBroadcast[$id]["stato"] > 60)
	{
		$flagBroadcast[$id]["stato"]=time()+1000;
		$myBrdJson = json_encode($flagBroadcast);
		file_put_contents($path_broadcast, $myBrdJson, LOCK_EX);
		return true;
	}
	else
		return false;
}
function setBrd($flagBroadcast, $path_broadcast, $id)
{
	$flagBroadcast[$id]["stato"]=time();
	$myBrdJson = json_encode($flagBroadcast);
	file_put_contents($path_broadcast, $myBrdJson, LOCK_EX);
	return true;
}
function abilitazione_livello($tempo_attesa, $data_livello)
{
	$data_livello_new = str_replace("/", "-", $data_livello);
	$secondi=strtotime($data_livello_new);
	if ((time() - $secondi) > ($tempo_attesa*60))
		return true;
	else
		return false;
}
function prossimo_aiuto($tempo_attesa, $data_livello)
{
	$data_livello_new = str_replace("/", "-", $data_livello);
	$secondi=strtotime($data_livello_new);
	
	$data_corrente = date("d/m/Y H:i");
	$data_corr_new=str_replace("/", "-", $data_corrente);
	$secondi_corr=strtotime($data_corr_new);	
	
	$diff=$secondi + ($tempo_attesa * 60) - $secondi_corr;
	
	if ($diff>=(3600*24))
		return "n.d.";
	else
		return date("H:i", $secondi + ($tempo_attesa * 60));
}
// il confronto è case unsensitive, l'accento e altri caratteri partcolari sono sostituiti con spazio
// la risposta data deve contenere tutte le parole previste nelle risposta esatta
// una risposta > 50 caratteri è considerata errata
function risposta_esatta($risposta, $esatta)
{
	if (strlen($risposta)> 50)
		return false;
	
	$risposta = preg_replace('/[^a-zA-Z0-9-+*:><=.,èéàòù]/', ' ', $risposta);
    $esatta = preg_replace('/[^a-zA-Z0-9-+*:><=.,èéàòù]/', ' ', $esatta);
	$ris = explode(" ", strtolower($risposta));
	$es = explode(" ", strtolower($esatta));
	
	$tot_ris = count($ris);
	$tot_es = count($es);
	
	if ($tot_ris<$tot_es)
		return false;
	
	for ($i=0; $i<$tot_es; $i++)
	{
		$corretto=false;
		for ($j=0; $j<$tot_ris; $j++)
		{
			if ($es[$i]==$ris[$j])
			{
				$corretto=true;
				break;
			}
				
		}
		if (!$corretto)
			break;
	}
	return $corretto;
}
function unichr($i) 
{
    return iconv('UCS-4LE', 'UTF-8', pack('V', $i));
}
function comando_ritardato($statoGioco, $cron)
{
    if ($statoGioco == "in_pausa" || $statoGioco == "in_esecuzione" || $statoGioco == "da_avviare")
	{
		if (isset($cron["timestamp"]) && time() > (int)$cron["timestamp"])
		{
			return $cron["comando"];
		}
		else
			return "nessuno";
	}
	else
		return "nessuno";
}
function set_automa($comando, $path_automa, $id)
{
	//lettura del file dell'automa a stati
	$myAtmJson = file_get_contents($path_automa);
	$automa = json_decode($myAtmJson,true);
	$automa[$id] = $comando;
	
	$myAtmJson = json_encode($automa);
	file_put_contents($path_automa, $myAtmJson, LOCK_EX);
		
	return true;
}
function push_automa($path_automa, $chatId)
{
	//lettura del file dell'automa a stati
	$myAtmJson = file_get_contents($path_automa);
	$automa = json_decode($myAtmJson,true);
	if (isset($automa[$chatId]))
	{
		$ret = $automa[$chatId];
		unset($automa[$chatId]);
		$myAtmJson = json_encode($automa);
		file_put_contents($path_automa, $myAtmJson, LOCK_EX);
	}
	else
		$ret="";
	
	return $ret;
}
function isquestion($cmd)
{
	//verifica se l'ultimo carattere del cmd è ?
	if (strlen($cmd)>0)
	{
		if ($cmd[strlen($cmd)-1] === "?")
			return true;
		else
			return false;
	}
	else
		return false;
}
function estrai_cmd($cmd)
{
	//verifica se l'ultimo carattere del cmd è ?
	if (strlen($cmd)>0)
	{
		if ($cmd[strlen($cmd)-1] === "?")
			$ret = substr($cmd, 0, strlen($cmd)-1) . " ";
		else
			$ret = $cmd . " ";
	}
	else
		$ret = "";
	
	return $ret;
}
function allunga_i($i, $len)
{
	$n_cifre = 0;
	$k=$i;
	if ($k == 0)
		$n_cifre = 1;
	else
	{
		while ($k>0)
		{
			$n_cifre++;
			$k=floor($k/10);
		}		
	}
	$blanc="";
	for($j=0; $j<$len-$n_cifre; $j++)
		$blanc=$blanc." ";
	
	return $i.$blanc;
}
function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();
    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }
        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }
        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }
    return $new_array;
}
function monitor($path_monitor, $id, $action)
{
	if ($action === "play")
	{
		$myMntJson = file_get_contents($path_monitor);
		$monitor = json_decode($myMntJson,true);
		if(isset($monitor["status"]))
		{
			$data_corr = date("d/m/Y H");
			$monitor["count"][$data_corr] += 1;
			$monitor[$id] += 1;
			$myMntJson = json_encode($monitor);
			file_put_contents($path_monitor, $myMntJson, LOCK_EX);
		}
	}
	elseif  ($action === "on")
	{
		$myMntJson = file_get_contents($path_monitor);
		$monitor = json_decode($myMntJson,true);
		$monitor["status"] = date("d/m/Y H:i");
		
		$myMntJson = json_encode($monitor);
		file_put_contents($path_monitor, $myMntJson, LOCK_EX);
	}
	elseif  ($action === "off")
	{
		$myMntJson = file_get_contents($path_monitor);
		$monitor = json_decode($myMntJson,true);
		unset($monitor["status"]);
		
		$myMntJson = json_encode($monitor);
		file_put_contents($path_monitor, $myMntJson, LOCK_EX);
	}
	elseif  ($action === "show")
	{
		$myMntJson = file_get_contents($path_monitor);
		$monitor = json_decode($myMntJson,true);
		$response = "monitoraggo delle transazioni";
		if (isset($monitor["status"]))
			$response = $response . "\n\nultima attivazione: \n" . $monitor["status"];
		else
			$response = $response . "\n\nmonitoraggio non attivo";
		
		if (isset($monitor["count"]))
		{
			$cc=$monitor["count"];
			$response = $response . "\n\ntransazioni per ora:";
			$tot=0;
			foreach ($cc as $k => $v) 
			{
				$response = $response . "\n". $k.": ".$v;
				$tot+=$v;
			}
			$response = $response . "\ntotale: ". $tot;
			
			$response = $response . "\n\ntransazioni per utente: ";
			$nutenti=0;
			foreach ($monitor as $k => $v) 
			{
				if ($k != "count"  &&  $k != "status") 
				{
					$response = $response . "\n" . $k.": ".$v;
					$nutenti += 1;
				} 
			}
			$response = $response . "\nutenti attivi: ".$nutenti;
		}
		return $response;
	}
		
	return true;
}
function mylog($trace, $path_log, $id)
{
	
	//esempio d'uso mylog("sono qui", $path_log, $chatId);   e' scritto il file log.txt
	
	//lettura del file di log
	$myLogJson = file_get_contents($path_log);
	$log = json_decode($myLogJson,true);
	$dd=date("d/m/Y H:i:s");
	$log[$id . "-" .$trace . "-" . $dd]="";
	
	$myLogJson = json_encode($log);
	file_put_contents($path_log, $myLogJson, LOCK_EX);
		
	return true;
}