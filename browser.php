<body>
<h3>Download our latest plugin</h3>
<p>If you have the right browser and machine combo:<br/>
Macintosh machines with the Firefox browser or Windows machines with the Internet Explorer browser or the Firefox browser<br/><br/>



</p>

<?
	/* reading two environment variables User Agent and Remote Address (IP Address) */
	/* conditions based on requirements: Mac users need Firefox and can't use anything else, Windows users can use only IE, Firefox */
	/* used MDN suggestions on how to detect browsers with User Agent strings, which made me realize my script is fairly simple and needs to be beefed up */
	 
	$browser = $_SERVER['HTTP_USER_AGENT'];
	/* example User Agent strings, some are contrived for testing, not actual, others I grabbed from internet searches */
	# "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36M"
	# $browser = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.75.14 (KHTML, like Gecko) Version/7.0.3 Safari/7046A194A";
	# $browser = "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0";
	# $browser = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) Gecko/20100101 Firefox/39.0";
	# $browser = "MSIE 10.0 (Macintosh 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36M";
	# $browser = "MSIE 10.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36M";
	# $browser = "AOL 10.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.132 Safari/537.36M";
	# $browser = "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:24.0) Gecko/20100101 Firefox/24.0";
	$address = $_SERVER['REMOTE_ADDR'];
if (preg_match("/^(\d+)\./", $address, $matches)) {
	if ($matches[1] != "202") {
		if (preg_match("/\(Macintosh\b/", $browser)) {		
			if (preg_match("/Firefox/", $browser)) {	
				if (preg_match("/Seamonkey\b/", $browser)) {			
					echo "We don't allow Seamonkey which you have, download the latest version of Mozilla <a href='https://www.mozilla.org/en-US/firefox/new/'>Firefox</a>";
				} else {	
					echo "You're on a Mac with Firefox, so you're good to go!<br/>";				
					echo "<a href='http://www.oreillyschool.com/'>Link to Software</a>";
				}
			} else {
				echo "You have a Mac, you need Firefox, get it <a href='https://www.mozilla.org/en-US/firefox/new/'>here</a>";
			}				
		} else if (preg_match("/\(Windows\b/", $browser)) {
			if (preg_match("/Firefox/", $browser)) {
				if (preg_match("/Seamonkey\b/", $browser)) {			
					echo "We don't allow Seamonkey which you have, download the latest version of Mozilla <a href='https://www.mozilla.org/en-US/firefox/new/'>Firefox</a>";
				} else {	
					echo "You're on a Windows machine using Firefox, so you're good to go!<br/>";				
					echo "<a href='http://www.oreillyschool.com/'>Link to Software</a>";
				}
			} else if (preg_match("/MSIE\b/", $browser)) {
				echo "You're on Windows machine using Internet Explorer, so you're good to go!<br/>";
				echo "<a href='http://www.oreillyschool.com/'>Link to Software</a>";
			} else {
				echo "You're on a Windows machine, so you need to use Mozilla <a href='https://www.mozilla.org/en-US/firefox/new/'>Firefox</a> or <a href='http://windows.microsoft.com/en-us/internet-explorer/download-ie'>Internet Explorer</a>";
			}
		} else {
			echo "You're not on a Windows or Mac machine, which you need together with the appropriate browser. With Mac, you need Firefox. With Windows, you need either Internet Explorer or Firefox.";
		}
	} else {
		header('Location: hacker.txt');
		die();
		
	}
}  else {
	echo "Can't detect the IP address of your computer, please try another computer!";
}
	
?>
</body>