<?php

class ryanbot extends slackbot{

	function __construct(){
		$this->response['username'] = 'Ryan Gosling';
		$this->response['icon_emoji'] = ':hey-girl:';
	
		$this->register_callback(array('weather', 'wether'), '_post_weather');
		$this->register_callback(array('shirtless', 'take it off', 'too much shirt, gos'), '_post_shirtless');
		$this->register_callback(array("gos, it's cold", 'put it on', "remember, you're canadian"), '_post_shirtfull');
	}

	// Command callbacks
	protected function _bad_command($command = ''){
		$this->respond('...');
	}
	protected function _post_weather(){
		$weather = $this->__get_weather();
		$response  = 'It\'s currently ' . strtolower($weather['currently']['summary']) . ' and ' . round($weather['currently']['temperature']). "\n";
		$response .= 'But in my bed it\'s 23 and cuddly.';
		$this->respond($response);
	}
	protected function _post_shirtless(){
		$this->respond($this->__build_image('http://i.imgur.com/laACKHq.gif', 'Better?'));
	}
	protected function _post_shirtfull(){
		$this->respond($this->__build_image('http://i.imgur.com/LXei92A.gif', 'Gawwwwdddd. Fine.'));
	}
}