<?php

class Twitch extends CodonModule
{
	public function index()
	{
		$this->set('copyright', TwitchData::getVersion());
		$this->set('twitch', TwitchData::get_stream());
		$this->render('twitch/Twitch.php');
	}
	public function copyright()
	{
		$this->set('copyright', TwitchData::getVersion());
		$this->render('twitch/footer.php');
	}
}
