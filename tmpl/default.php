<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_tabs
 * @copyright   Copyright (C) 2019 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Helper\ModuleHelper;

require ModuleHelper::getLayoutPath('mod_uk_tabs', $params->get('layout', 'default') . '_' . $position);
