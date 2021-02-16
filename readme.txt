Twitch 1.0

This module will let you place Twitch Stream on your site.

If you have installed my codeshare module all you have to do is import the update_strider.sql file

If not, please import the phpvms_strider and edit the TwitchData.class.php file on line 64 and change the 4 to a 1.


To use this, you will need to get the Twitch username.

Youy will also need the url of your VA, if using it on a subdomain use: folder.yoururl.com if not in any subdomain just use: www.yoururl.com You need to put those in the parent field.

Please use:
<?php $Twitch = TwitchData::get_stream();
if(!Twitch)
{
  echo '<span style="color:red;">No Twitch Stream added</span>';
}
else {
  foreach($Twitch as $stream)
  {
  echo '<iframe src="https://player.twitch.tv/?channel='.$stream->username.'&parent='.$stream->parent.'"
     frameborder="'.$stream->frameborder.'" allowfullscreen="'.$stream->allowfull.'" scrolling="'.$stream->scroll.' "
      height="'.$stream->height.'" width="'.$stream->width.'"></iframe></p>';
  }
}
  ?>
That code for it to show on a page of your choice.


Released under the following license:
Creative Commons Attribution-Noncommercial-Share Alike 3.0 Unported License
