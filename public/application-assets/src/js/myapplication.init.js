/**
 * BB's Zend Framework 2 Components
 * 
 * MyApplication client (init-)script
 *   
 * @package     [MyApplication]
 * @subpackage  BB's Zend Framework 2 Components
 * @subpackage  myApplication client script
 * @author      Björn Bartels <coding@bjoernbartels.earth>
 * @link        https://gitlab.bjoernbartels.earth/groups/zf2
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @copyright   copyright (c) 2016 Björn Bartels <coding@bjoernbartels.earth>
 */
if (!jQuery) {
	console.error('jQuery not found...');
	window.stop();
}

(function ($, doc, win, MyApplication) {
	
	var $doc = $(doc),
		$lang = MyApplication.Config.lang
	;
		
	//
	// init my-application
	//
	$doc.ready(function () {

		$doc.myapplication();
		
		console.log('data-test attributes:');
		document
			.querySelectorAll('*[data-test]')
			.forEach(
				function (e) { console.log(e.tagName, e.getAttribute('data-test')) }
			);
	});

})(jQuery, document, window, MyApplication);