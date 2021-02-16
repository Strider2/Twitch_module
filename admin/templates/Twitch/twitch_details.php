<?php

$this->show('Twitch/twitch_header.php');



echo '<h4>Twitch username: '.$Twitch->username.'</h4><hr />';

echo 'Parent: <b>'.$Twitch->parent.'</b><br />';

echo '</b><hr />';
echo '<a href="'.SITE_URL.'/admin/index.php/Twitch_admin/edit_stream?id='.$Twitch->id.'"><b>Edit Stream</b></a><br /><hr />';
echo '<a href="'.SITE_URL.'/admin/index.php/Twitch_admin/delete_stream?id='.$Twitch->id.'"><span style="color:red;"><b>Delete Stream</b></a> - This will delete the Twitch Stream from the database permanently!</span><br /><hr />';
?>
