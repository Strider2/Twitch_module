<?php

class TwitchData extends CodonData
{
    public static function get_stream()
    {
		return DB::get_results("SELECT * FROM ".TABLE_PREFIX."twitch");

    }
 	public static function get_upcoming_stream()
    {
        $query = "SELECT * FROM ".TABLE_PREFIX."twitch
                ORDER BY id ASC";

        return DB::get_results($query);
    }
    public static function get_streams($id)
    {
        $query = "SELECT * FROM ".TABLE_PREFIX."twitch WHERE id='$id'";

        return DB::get_row($query);
    }

   public static function get_past_stream()
    {
        $query = "SELECT * FROM ".TABLE_PREFIX."twitch
                ORDER BY id DESC";

        return DB::get_results($query);
    }

    public static function save_new_stream($username, $parent, $border, $screen, $scroll, $height, $width)
    {
      $query = "INSERT IGNORE INTO ".TABLE_PREFIX."twitch (username, parent, frameborder, allowfull, scroll, height, width)
              VALUES ('$username', '$parent', '$border', '$screen', '$scroll', '$height', '$width')";

      DB::query($query);
    }
     public static function save_edit_stream($username, $parent, $border, $screen, $scroll, $height, $width)
    {
        $query = "UPDATE ".TABLE_PREFIX."twitch SET
         username='$username',
         parent='$parent',
         frameborder='$border',
         allowfull='$screen',
         scroll='$scroll',
         height='$height',
         width='$width'
         WHERE id='$id'";

        DB::query($query);
    }
    public static function delete_stream($id)
    {
        $query = "DELETE FROM ".TABLE_PREFIX."twitch
                    WHERE id='$id'";

        DB::query($query);
    }
       /////////////////////////////////
       // Do not remove this code!   //
       ///////////////////////////////
       public static function getVersion()
       {
        return DB::get_results("SELECT * FROM ".TABLE_PREFIX."strider WHERE id = 6");
       }
}
