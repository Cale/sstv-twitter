<?php
if (isset($argv)) {

	// Load Twitter library
	require_once 'lib/twitter.class.php';
	
	$iss = false;

	function postToTwitter($argv) {
		$consumerKey = "wwww";
		$consumerSecret = "xxxx";
		$accessToken = "yyyy";
		$accessTokenSecret = "zzzz";

		$img = $argv[1];
		$twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

		// Compose message
		if ($iss == false) {
			$messages = array(
				"The latest SSTV image captured from EM65. #SSTV",
				"The most recent #SSTV image captured on 14.230 MHz from EM65",
				"This is the latest #SSTV image recieved from EM65 at 14.230 MHz",
				"An SSTV image was just recieved on 14.230 MHz from EM65. #HamRadio",
				"This is the most recent Slow Scan Television image received from EM65 on 14.230 MHz #SSTV",
				"This #SSTV image was just received over the air at EM65",
				"The latest image received from gridsquare EM65. #SSTV",
				"This image was just received from gridsquare EM65. #SSTV"
			);
		} else {
			// ISS SSTV Message array
			$messages = array(
				"The latest SSTV image captured from the International Space Station. #SSTV",
				"The most recent #SSTV image captured on 145.800 MHz from the International Space Station.",
				"This #SSTV image was just received over the air from the International Space Station.",
				"The latest ISS SSTV image received from EM65. #SSTV"
			);
		}

		$message = $messages[array_rand($messages)];
		//$message = "The latest SSTV image captured from EM65. #sstv";
		echo "\n\n".$message." ".$img."\n\n";

		// Post to Twitter
		if ($img != "") {
			try {
				$tweet = $twitter->send($message, $img); // you can add $imagePath or array of image paths as second argument
			} catch (TwitterException $e) {
				echo 'Error: ' . $e->getMessage();
			}
		}
	}
	postToTwitter($argv);
}
?>

