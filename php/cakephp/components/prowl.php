<?php
/**
 * Load HttpSocket class from CakePHP core
 */
App::import('Core', 'HttpSocket');
/**
 * Prowl Component
 *
 * This is a component for the prowl client for iPhone (https://prowl.weks.net/). It simply allows you to send push
 * notifications to a users iPhone. This could be useful when sending SMS messages wouldn't be feasible.
 *
 * @filesource
 * @author Eric Holmes
 * @link ''
 * @package app
 * @subpackage app.controllers.components
 */
class ProwlComponent extends Object {
/**
 * Default values for the post data
 *
 * 'apikey' and 'application' are the only keys that must be set in order for a notification to be sent
 *
 * @var array
 * @access public
 */
	var $_defaults = array(
		'apikey' => '',
		'providerkey' => '',
		'priority' => 0,
		'application' => 'Prowl Component',
		'description' => ''
	);
/**
 * The API resource
 *
 * @var string
 * @access public
 */
	var $uri = 'https://prowl.weks.net/publicapi/';

/**
 * Method for posting a push notification
 *
 * @example $this->Prowl->add('Hello world');
 * @example $this->Prowl->add('Hi There!', array('description' => 'Example description to be posted on the users iPhone'));
 *
 * @param string $event The event to be posted
 * @param array $options Overrides for $this->_defaults
 * @access public
 */
	function add($event, $options = array()) {
		$options = Set::merge($this->_defaults, $options, array('event' => $event));
		return $this->api('add', $options);
	}

/**
 * Method for verifying the API key
 *
 * @param array $options Overrides for $this->_defaults
 * @access public
 */
	function verify($options) {
		$defaults = array(
			'apikey' => $this->_defaults['apikey'],
			'providerkey' => $this->_defaults['providerkey']
		);
		$options = array(
			'apikey' => $options['apikey'],
			'providerkey' => $options['providerkey']
		);
		$options = Set::merge($defaults, $options);
		return $this->api('verify', $options);
	}

/**
 * Direct access to the API 
 *
 * @param string $method The method to use ('add' or 'verify' as of today)
 * @param array $data The post data
 * @access public
 */
	function api($method, $data) {
		$sock = new HttpSocket();
		return $sock->post($this->uri . $method, $data);
	}

}
?>