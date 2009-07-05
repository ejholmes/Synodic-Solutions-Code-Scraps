<?php
App::import('Vendor', 'Simplepie');

class SimplepieHelper extends AppHelper {
/**
 * Included helpers.
 *
 * @var array
 */
	var $helpers = array('Html', 'Javascript', 'Form');
	
	var $cache;

	function __construct() {
		$this->cache = CACHE . 'rss' . DS;
	}
	
	
	/**
	 * returns a simplepie feed object.
	 *
	 */
	function feed($feed_url, $limit = 0)
	{
		if (!file_exists($this->cache)) {
			$folder = new Folder();
			$folder->mkdir($this->cache); 
		}
		
		//setup SimplePie
		$feed = new SimplePie();
		$feed->set_feed_url($feed_url);
		$feed->set_cache_location($this->cache);
		$feed->set_item_limit($limit);
		$feed->strip_htmltags(array('img'));
		
		//retrieve the feed
		$feed->init();
		
		//get the feed items
		$items = $feed->get_items();
		
		//return
		if ($items) {
			return $items;
		} else {
			return false;
		} 
	}
}

?>