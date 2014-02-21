<?php

########################################################################
# Extension Manager/Repository config file for ext "caldaydescription".
#
# Auto generated 26-10-2011 19:36
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'cal day description rendering',
	'description' => 'This extension adds rendering of a special marker to add day descriptions such as public holidays, ordinary times or any other describing text',
	'category' => 'fe',
	'author' => 'Thomas Kowtsch',
	'author_email' => 'typo3@thomas-kowtsch.de',
	'shy' => '',
	'dependencies' => 'cal',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '1.1.0',
	'constraints' => array(
		'depends' => array(
			'cal' => '1.5.0',
            'typo3' => '4.5.5-6.1.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:10:{s:9:"ChangeLog";s:4:"54da";s:10:"README.txt";s:4:"ee2d";s:12:"ext_icon.gif";s:4:"1bdc";s:17:"ext_localconf.php";s:4:"c5f3";s:14:"ext_tables.php";s:4:"a5f7";s:14:"doc/manual.sxw";s:4:"5b29";s:58:"hooks/class.tx_caldaydescription_cal_descriptionmarker.php";s:4:"7f6e";s:20:"static/locallang.xml";s:4:"2077";s:40:"static/cal_day_description/constants.txt";s:4:"d41d";s:36:"static/cal_day_description/setup.txt";s:4:"9290";}',
	'suggests' => array(
	),
);

?>