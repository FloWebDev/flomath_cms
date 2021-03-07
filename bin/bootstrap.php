<?php

$user   = !empty($argv[1]) ? $argv[1] : 'www-data';
$group  = !empty($argv[2]) ? $argv[2] : 'www-data';

shell_exec('chown -R ' . $user. ':' . $group . ' ' . __DIR__ . '/../');
shell_exec('chmod -R 775 ' . __DIR__ . '/../');
shell_exec('chmod -R 775 ' . __DIR__ . '/../var/');
echo shell_exec('ls -al');
