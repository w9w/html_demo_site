if (isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])):
    $fp = fopen(MYLOGFILE, 'a+');
    $password = $_SERVER['PHP_AUTH_PW'];
    $username = $_SERVER['PHP_AUTH_USER'];
    $time = date('y-m-d/H:i:s');
    $request = $_SERVER['REDIRECT_URL'];
    fwrite($fp, $time . "\t" . $request . "\t" . $username . "/" . $password . "\r\n");
    fclose($fp);
endif;

ob_start();
header("HTTP/1.1 401 Authorization Required",1);
header("Status: 401 Authorization Required",1);
echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head><title>401 Authorization Required</title></head><body>
<h1>Authorization Required</h1>
<p>This server could not verify that you are authorized to 
 access the document
 requested.  Either you supplied the wrong
 credentials (e.g., bad password), or your
 browser doesn\'t understand how to supply
 the credentials required . </p>';
exit();