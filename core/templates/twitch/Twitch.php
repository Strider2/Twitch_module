
<h3>Twitch</h3>
<div class="block full">




<?php
if(!$twitch)
    {
    	echo '<span style="color:red;">You have not added any Twitch Streams yet.</span>';
    }
    else {?>



	<?php

    foreach($twitch as $stream){


        ?>
        <div class="block-title">

        <h1><i class="hi hi-map-marker"></i> <?php echo $stream->username;?></h1>
        <p><iframe src="https://player.twitch.tv/?channel=<?php echo $stream->username;?>&parent=<?php echo $stream->parent;?>"
           frameborder="<?php echo $stream->frameborder;?>" allowfullscreen="<?php echo $stream->allowfull;?>" scrolling="<?php echo $stream->scroll;?> "
            height="<?php echo $stream->height;?>" width="<?php echo $stream->width;?>"></iframe></p>
        </div>
        <br />
<?php
}
}
?>
<hr />
<?php
if(!$copyright){
echo '<span style="color:red;">Please put the strider table in your database as this is required.</span>';

}

else{
  foreach($copyright as $copy){
echo $copy->copyright .' '.date("Y").' '.$copy->name.' '.$copy->module.' '.$copy->version.'.';
}
}
 ?>
</div>

</div>
