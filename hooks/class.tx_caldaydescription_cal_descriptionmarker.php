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
	var $xmlData = '';
	 
 	function tx_caldaydescription_cal_descriptionmarker (){
 		global $TSFE;
 		global $xmlData;
 		
		$xmlPath = t3lib_div::getFileAbsFileName($TSFE->tmpl->setup['plugin.']['tx_caldaydescription.']['descriptionLL']);
		$xmlFile = t3lib_div::getURL($xmlPath);
		$xmlData = t3lib_div::xml2array($xmlFile);
	}
	
	/**
	 * Main hook for processing additional markers
	 *
	 */
	function postSearchForObjectMarker($top, $template, &$sims, $rems, $wrapped, $view) {
		global $LANG;
 		global $xmlData;
		
 		if (is_array($xmlData)) {
			if (($view=='day')&&(!is_null($top->conf['getdate']))) {
				$sims['###CALDAYDESCRIPTION###']=$xmlData['data']['default']['l_cdd_'.$top->conf['getdate']];
			} elseif (($view=='week')&&(!is_null($top->days))){
				foreach ($top->days as $day) {
					$sims['###CALDAYDESCRIPTION'.$day->weekdayNumber.'###'] = $xmlData['data']['default']['l_cdd_'.$day->Ymd];
				}
			} elseif (($view=='event')&&(!is_null($top->conf['getdate']))){
				$sims['###CALDAYDESCRIPTION###']=$xmlData['data']['default']['l_cdd_'.$top->conf['getdate']];
	
			} elseif (($view=='list')&&(!is_null($top->cachedValueArray['start_date']))){
				$sims['###CALDAYDESCRIPTION###']=$xmlData['data']['default']['l_cdd_'.$top->cachedValueArray['start_date']];
			} elseif (($view=='locationgrid')&&(is_array($top->objectsInList))){
				$dayItems = 0;
				foreach (array_keys($top->objectsInList) as $datekey) {
					$sims['###CALDAYDESCRIPTION'.intval($dayItems).'###'] = $xmlData['data']['default']['l_cdd_'.$datekey];
					$dayItems++;
					$sims['###CALDAYDESCRIPTION###'][] = $xmlData['data']['default']['l_cdd_'.$datekey];
				}
			}else {
				// Found an unsupported view? Please enable the debug statements and send the resuslt with a description to the EXTs author.	
				//debug($top->objectsInList);
				//debug($view,'view');
			}
 		}
	}
 	
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/caldaydescription/hooks/class.tx_caldaydescription_cal_locationmarker.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/caldaydescription/service/class.tx_tx_caldaydescription_cal_locationmarker.php']);
}
?>
