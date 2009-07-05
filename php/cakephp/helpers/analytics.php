<?php

class AnalyticsHelper extends AppHelper {
/**
 * Included helpers.
 *
 * @var array
 */
	var $helpers = array('Html', 'Javascript', 'Form');

	function __construct() {
	}
	
	/**
	 * Returns google analytics javascript code
	 *
	 */
	function ga($uuid = null)
	{
		?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("<?php echo $uuid; ?>");
pageTracker._trackPageview();
} catch(err) {}</script>
		<?php
		
	}
	
	/**
	 * Returns google analytics urchin (legacy) javascript code
	 *
	 */
	function urchin($uuid = null)
	{
		?>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
try {
_uacct = "<?php echo $uuid; ?>";
urchinTracker();
} catch(err) {}</script>
		<?php
	}
}
?>