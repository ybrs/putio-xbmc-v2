<?
if (!$_GET['code']){
	// redirect 
	$url = 'https://api.put.io/v2/oauth2/authenticate'.
			'?client_id=26'.
			'&response_type=code'.
			'&redirect_uri=http://splitjoin.com/putio-xbmc.php';
	header('Location: '.$url);
} else {
	// get an access token
	$url = 'https://api.put.io/v2/oauth2/access_token'.
			'?client_id=26'.
			'&client_secret=SecretCode'.
			'&grant_type=authorization_code'.
			'&redirect_uri=http://splitjoin.com/putio-xbmc.php'.
			'&code='.$_GET['code'];
	$out = json_decode(file_get_contents($url));
	?>
	<br><br><br><br>		
	<div align="center">
		Please enter this code in xbmc settings: <br>
		<div style="font-size:22px; font-face: arial; border: 1px solid #000; width: 500px;">
		<?=join('-', str_split(strtoupper($out->access_token), 6));?>
		</div>
	</div>		
	<?
}	