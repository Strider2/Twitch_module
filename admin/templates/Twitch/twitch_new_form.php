<?php

$this->show('Twitch/twitch_header.php');
if(isset($Twitch))
{echo '<div id="error">All fields must be filled out</div>'; }
?>

<h4>Twitch Stream</h4>
<span style="color:red;">Note: All fields must be filled in.</span>
<table width="80%">
  <form name="eventform" action="<?php echo SITE_URL; ?>/admin/index.php/Twitch_admin" method="post">
  <table width="100%" class="tablesorter">
  <tr>
    <td valign="top"><strong>Username: </strong></td>
    <td>
      <input type="text" name="username"
      <?php
      if(isset($event))
      {
        echo 'value="'.$event['username'].'"';
      } ?>/>
    </td>
  </tr>
  <tr>
    <td align="top"><strong>Parent: </strong></td>
    <td>
      <input type="text" name="parent"
      <?php if(isset($event))
      {
        echo 'value"'.$event['parent'].'"';
      } ?>/>
      <p><span style="color:red;">Please enter your VA web address.</span></p>
    </td>
  </tr>
  <tr>
    <td align="top"><strong>Frame Border: </strong></td>
    <td>
      <input type="text" name="border"
      <?php
      if(isset($event))
      {
        echo 'value="'.$event['border'].'"';
      } ?>/>
      <p><span style="color:red;">You can choose either 1 or 0.</span></p>
    </td>
  </tr>
  <tr>
    <td><strong>Allow Fullscreen:</strong></td>
    <td>
      <input type="text" name="screen"
      <?php
      if(isset($event))
      {
          echo 'value="'.$event['screen'].'"';
      }
       ?>/>
       <p><span style="color:red;">Enter true or false.</span></p>

    </td>
  </tr>
  <tr>
    <td width="3%" nowrap><strong>Scroll:</strong></td>
    <td><input  name="scroll"
        <?php
        if(isset($event))
        {
          echo 'value="'.$event['scroll'].'"';
        }
        ?>/>
        <p><span style="color:red;">Enter Yes or No.</span></p>
    </td>
  </tr>
  <tr>
    <td width="3%" nowrap><strong>Height:</strong></td>
    <td><input  name="height"
        <?php
        if(isset($event))
        {
          echo 'value="'.$event['height'].'"';
        }
        ?>/>
    </td>
  </tr>
  <tr>
    <td><strong>Width:</strong></td>
    <td><input name="width"
      <?php
        if(isset($event))
        {
          echo 'value="'.$event['width'].'"';
        }
       ?>/>
    </td>
  </tr>
  <tr>
    <td></td>
    <td><input type="hidden" name="action" value="<?php echo $action;?>" />
      <input type="hidden" name="id" value="<?php echo $Twitch->id;?>" />
      <input type="submit" name="submit" value="<?php echo $title;?>" />
    </td>
  </tr>
  </table>
  </form>
  </div>
