<?php
$this->show('Twitch/twitch_header.php');

echo 'Click On Stream details for editing the Stream or viewing the username and parent.<hr />';

echo '<h4>Streams</h4><hr />';
    if(!$Twitch)
    {
     echo 'No streams found';

    }
    else
    {

    foreach($Twitch as $stream)
    {
         echo '<iframe src="https://player.twitch.tv/?channel='.$stream->username.'&parent='.$stream->parent.'"
            frameborder="'.$stream->frameborder.'" allowfullscreen="'.$stream->allowfull.'" scrolling="'.$stream->scroll.' "
             height="'.$stream->height.'" width="'.$stream->width.'"></iframe></p>';
         echo '<p><a href="'.SITE_URL.'/admin/index.php/Twitch_admin/get_stream?id='.$stream->id.'">Stream Details</a></p><br />';
  }

    }

?>
