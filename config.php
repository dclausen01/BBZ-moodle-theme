<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Configuration for the BBZ theme.
 *
 * BBZ is a Boost child theme. It keeps Boost's markup and layouts untouched and
 * only re-brands the look through SCSS variable overrides, so it stays
 * compatible with future Moodle updates.
 *
 * @package    theme_bbz
 * @copyright  2026 BBZ Rendsburg-Eckernförde
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$THEME->name = 'bbz';

// Inherit everything (layouts, templates, renderers) from Boost.
$THEME->parents = ['boost'];

// We do not ship any plain CSS sheets; all styling is compiled from SCSS.
$THEME->sheets = [];
$THEME->editor_sheets = [];
$THEME->usefallback = true;

// Boost/Bootstrap based icon system and behaviour.
$THEME->iconsystem = \core\output\icon_system::FONTAWESOME;
$THEME->haseditswitch = true;
$THEME->usescourseindex = true;
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->requiredblocks = '';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;

// SCSS pipeline: main preset + our pre/extra SCSS callbacks (see lib.php).
$THEME->scss = function($theme) {
    return theme_bbz_get_main_scss_content($theme);
};
$THEME->prescsscallback = 'theme_bbz_get_pre_scss';
$THEME->extrascsscallback = 'theme_bbz_get_extra_scss';
