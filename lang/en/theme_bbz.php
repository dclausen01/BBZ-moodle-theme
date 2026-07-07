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
 * Language strings for the BBZ theme (English).
 *
 * @package    theme_bbz
 * @copyright  2026 BBZ Rendsburg-Eckernförde
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'BBZ';
$string['choosereadme'] = 'BBZ is a child theme of Boost for the Berufsbildungszentrum Rendsburg-Eckernförde. It applies the BBZ brand (logo, blue/red accents, Public Sans) through SCSS variable overrides only, so it stays compatible with future Moodle updates.';
$string['configtitle'] = 'BBZ';

// Setting pages.
$string['generalsettings'] = 'General';
$string['advancedsettings'] = 'Advanced';

// Preset.
$string['preset'] = 'Theme preset';
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme. The brand colours below are applied on top of the chosen preset.';
$string['presetfiles'] = 'Additional theme preset files';
$string['presetfiles_desc'] = 'Preset files can be used to dramatically alter the appearance of the theme. See <a href="https://docs.moodle.org/dev/Boost_Presets">Boost presets</a> for information on creating and sharing your own preset files.';

// Colours.
$string['brandcolor'] = 'Brand colour';
$string['brandcolor_desc'] = 'The primary accent colour used for buttons, active links and progress bars. Defaults to BBZ blue (#3b6eb9).';
$string['accentcolor'] = 'Accent colour';
$string['accentcolor_desc'] = 'The accent colour reserved for urgency and due dates. Defaults to BBZ red (#c13c3b). Used sparingly on purpose.';

// Raw SCSS.
$string['rawscsspre'] = 'Raw initial SCSS';
$string['rawscsspre_desc'] = 'Use this field to provide SCSS code that will be injected before everything else. Most of the time you will use this setting to define variables.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';

// Privacy.
$string['privacy:metadata'] = 'The BBZ theme does not store any personal data about any user.';
