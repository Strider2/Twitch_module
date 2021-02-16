<?php


$this->show('Twitch/twitch_header.php');

?>


<h4>Edit Widget</h4>
<hr />
<form name="eventform" action="<?php echo SITE_URL; ?>/admin/index.php/Twitch_admin" method="post" >
<table width="80%">

            <tr>
                <td>Userame</td>
                <td>
                  <input type="text" name="username"
                  <?php echo 'value="'.$Twitch->username.'"';?>/></td>

            </tr>
            <tr>
                <td>Parent</td>
                <td>
                  <input type="text" name="parent"
                  <?php echo 'value="'.$Twitch->parent.'"';?>/></td>

            </tr>
            <tr>
                <td>Frame Border</td>
                <td>
                  <input type="text" name="border"
                  <?php echo 'value="'.$Twitch->frameborder.'"';?>/></td>

            </tr>
            <tr>
                <td>Allow Fullscreen</td>
                <td><input type="text"  name="screen"
                           <?php echo 'value="'.$Twitch->screen.'"'; ?>
                           /></td>
            </tr>
            <tr>
                <td>Scroll</td>
                <td><input type="text" name="scroll"
                            <?php

                                  echo 'value="'.$Twitch->scroll.'"';
                                ?>/></td>
                              </tr>
                              <tr>
                                  <td>Height</td>
                                  <td><input type="text" name="height"
                                              <?php

                                                    echo 'value="'.$Twitch->height.'"';
                                                  ?>/></td>
                                                </tr>
            <tr>
                <td>Width</td>
                <td><input type="text" name="width"
                           <?php echo 'value="'.$Twitch->width.'"'; ?>
                          /></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $Twitch->id; ?>" />
                    <input type="hidden" name="action" value="save_edit_stream" />
                    <input type="submit" value="Edit Twitch Stream"></td>
            </tr>

    </table>     </form>
