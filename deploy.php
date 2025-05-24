<?php
// Ruta absoluta al script Bash que hará git pull
$output = shell_exec('/bin/bash /home/u978931113/deploy.sh 2>&1');
echo "<pre>$output</pre>";
?>
