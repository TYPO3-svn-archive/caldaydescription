<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['FE']['EXTCONF']['ext/cal/model/class.tx_cal_base_model.php']['searchForObjectMarker'][] = 'EXT:caldaydescription/hooks/class.tx_caldaydescription_cal_descriptionmarker.php:tx_caldaydescription_cal_descriptionmarker';

?>