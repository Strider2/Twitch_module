<?php


class Twitch_admin extends CodonModule
{
    public function HTMLHead()
    {
        $this->set('sidebar', 'Twitch/sidebar_twitch.php');
    }

    public function NavBar()
    {
        echo '<li><a href="'.SITE_URL.'/admin/index.php/Twitch_admin">Twitch</a></li>';
    }

    public function index()
    {
        if($this->post->action == 'save_new_stream')
        {
            $this->save_new_stream();
        }
        elseif($this->post->action == 'save_edit_stream')
        {
            $this->save_edit_stream();
        }
        else
        {
            $this->set('Twitch', TwitchData::get_stream());
			      $this->set('history', TwitchData::get_past_stream());
            $this->set('copyright', TwitchData::getVersion());
            $this->show('Twitch/twitch_index.php');
        }
    }
    public function get_stream()
    {
        $id = $_GET[id];
        $this->set('Twitch', TwitchData::get_streams($id));
        $this->set('copyright', TwitchData::getVersion());
        $this->show('Twitch/twitch_details.php');
    }
    public function new_stream()
    {
        $Twitch = TwitchData::get_stream();
        $this->set('copyright', TwitchData::getVersion());
        $this->set('title', 'Add Stream');
        $this->set('action', 'save_new_stream');
        $this->set('Twitch', $Twitch);


        $this->show('Twitch/twitch_new_form.php');
        /*$this->set('codeshares', $codeshares);
        $this->show('codeshare/codeshare_new_form.php');*/
    }
    protected function save_new_stream()
    {
      $Twitch = array();

      $Twitch['username'] = DB::escape($this->post->username);
      $Twitch['parent'] = DB::escape($this->post->parent);
      $Twitch['border'] = DB::escape($this->post->border);
      $Twitch['screen'] = DB::escape($this->post->screen);
      $Twitch['scroll'] = DB::escape($this->post->scroll);
      $Twitch['height'] = DB::escape($this->post->height);
      $Twitch['width'] = DB::escape($this->post->width);



      /*foreach($Twitch as $test)
      {
          if(empty($test))
          {
              $this->set('spotify', $Twitch);
              $this->show('youtube/spotify_new_form.php');
              return;
          }
      }*/


      # Add it in
      TwitchData::save_new_stream($Twitch['username'], $Twitch['parent'],
                            $Twitch['border'],
                            $Twitch['screen'],
                            $Twitch['scroll'],
                            $Twitch['height'],
                            $Twitch['width']);


      $this->set('message', 'The stream "' . $this->post->username .'" has been added');
      $this->render('core_success.php');
      $this->set('Twitch', TwitchData::get_stream());
      $this->show('Twitch/twitch_index');
      LogData::addLog(Auth::$userinfo->pilotid, 'Added Twitch stream "' . $this->post->username . '"');
    }
    public function edit_widget() {
            $id = $_GET[id];
            $Twitch = array();
            $Twitch = TwitchData::get_streams($id);
            $this->set('copyright', TwitchData::getVersion());
            $this->set('Twitch', $Twitch);
            $this->show('Twitch/twitch_edit_form.php');
    }
    protected function save_edit_stream()
    {
      $Twitch = array();

      $Twitch['name'] = DB::escape($this->post->username);
      $Twitch['parent'] = DB::escape($this->post->parent);
      $Twitch['border'] = DB::escape($this->post->border);
      $Twitch['screen'] = DB::escape($this->post->screen);
      $Twitch['scroll'] = DB::escape($this->post->scroll);
      $Twitch['height'] = DB::escape($this->post->height);
      $Twitch['width'] = DB::escape($this->post->width);


        $ret=TwitchData::save_edit_stream($Twitch['username'], $Twitch['parent'],
                              $Twitch['border'],
                              $Twitch['screen'],
                              $Twitch['scroll'],
                              $Twitch['height'],
                              $Twitch['width']);

        if (DB::errno() != 0 && $ret == false) {
            $this->set('message',
                       'There was an error adding the Twitch stream,
                       already exists DB error: ' . DB::error());
            $this->render('core_error.php');
            return;
        }

        $this->set('message', 'The Twitch stream "' . $this->post->username .
                   '" has been added');
        $this->render('core_success.php');

        LogData::addLog(Auth::$userinfo->pilotid, 'Edited Twitch stream "' . $this->post->username . '"');

        $id = $Twitch['id'];
        $this->set('Twitch', TwitchData::get_streams($id));

        $this->show('Twitch/twitch_details.php');
    }

    public function delete_stream()
    {
        $id = $_GET[id];
        TwitchData::delete_stream($id);
        LogData::addLog(Auth::$userinfo->pilotid, 'Deleted Twitch stream "' . $this->post->username . '"');
        $this->set('Twitch', TwitchData::get_upcoming_stream());
        $this->show('Twitch/Twitch_index.php');
    }
}
