<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2009 Thomas Kowtsch
 * You can redistribute this file and/or modify it under the terms of the 
 * GNU General Public License as published by the Free Software Foundation;
 * either version 2 of the License, or (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This file is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the file!
 ***************************************************************/
if (!defined('PATH_tslib')) define('PATH_tslib', t3lib_extMgm::extPath('cms').'tslib/');

require_once (PATH_tslib.'class.tslib_pibase.php');

/**
 *
 * @author Thomas Kowtsch <typo3@thomas-kowtsch.de>
 * @package TYPO3
 * @subpackage caldaydescription
 */
class tx_caldaydescription_cal_descriptionmarker {

 	function tx_caldaydescription_cal_descriptionmarker (){
 		global $LANG;
 		$LANG->includeLLFile('EXT:caldaydescription/static/locallang.xml');
 		global $CONF;
 		debug($CONF);
	}
	
	/**
	 * Main hook for processing additional markers
	 *
	 */
	function postSearchForObjectMarker($top, $template, &$sims, $rems, $wrapped, $view) {
		global $LANG;
		if (($view=='day')&&(!is_null($top->conf['getdate']))) {
			$sims['###CALDAYDESCRIPTION###']=$LANG->getLL('l_cdd_'.$top->conf['getdate']);
		} elseif (($view=='week')&&(!is_null($top->days))){
			foreach ($top->days as $day) {
				$sims['###CALDAYDESCRIPTION'.$day->weekdayNumber.'###'] = $LANG->getLL('l_cdd_'.$day->Ymd);
			}
		} elseif (($view=='event')&&(!is_null($top->conf['getdate']))){
			$sims['###CALDAYDESCRIPTION###']=$LANG->getLL('l_cdd_'.$top->conf['getdate']);

		} elseif (($view=='list')&&(!is_null($top->cachedValueArray['start_date']))){
			$sims['###CALDAYDESCRIPTION###']=$LANG->getLL('l_cdd_'.$top->cachedValueArray['start_date']);
		}else {
		//	debug($view);
		}

	}
 	
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/caldaydescription/hooks/class.tx_caldaydescription_cal_locationmarker.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/caldaydescription/service/class.tx_tx_caldaydescription_cal_locationmarker.php']);
}
?>
