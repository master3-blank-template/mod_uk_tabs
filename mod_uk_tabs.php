<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_tabs
 * @copyright   Copyright (C) Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;

$vars = [
    'tabs_class', 'title_class', 'title_type', 'title_img_width', 'content_class', 'position', 'align',
    'active', 'swiping', 'media',
    'items'
];

foreach ($vars as $var) {
    $$var = $params->get($var);
}

$module_id = $module->id;

$tabs_class = trim($tabs_class) ? ' ' . trim($tabs_class) : '';
$tabs_class = $position !== 'top' ? $tabs_class . ' uk-tab-' . $position : $tabs_class;
switch ($align) {
    case 'right':
        $tabs_class .= ' uk-flex-right';
        break;
    case 'center':
        $tabs_class .= ' uk-flex-center';
        break;
    case 'justify':
        $tabs_class .= ' uk-flex-between';
        break;
    case 'width':
        if ($position == 'top' || $position == 'bottom') $tabs_class .= ' uk-child-width-expand';
        break;
    case 'left':
    default:;
}

$tabs_params = [];
$tabs_params[] = 'connect:#mod_uk_tabs_' . $module_id;
if ((int)$active > 0 && (count((array)$items) > (int)$active)) {
    $tabs_params[] = 'active:' . $active;
} else {
    $active = 0;
}
if (!(bool)$swiping) {
    $tabs_params[] = 'swiping:false';
}
if (trim($media)) {
    $tabs_params[] = 'media:' . trim($media);
}
$tabs_params = $tabs_params ? '="' . implode(';', $tabs_params) . '"' : '';

$title_class = trim($title_class) ? ' ' . trim($title_class) : '';
$content_class = trim($content_class) ? ' ' . trim($content_class) : '';

if ($items) {
    Factory::getDocument()->addScript('/modules/mod_uk_tabs/assets/moduktabs.js');
    require(ModuleHelper::getLayoutPath('mod_uk_tabs', $params->get('layout', 'default')));
}
