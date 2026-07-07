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
 * Theme settings for the BBZ theme.
 *
 * @package    theme_bbz
 * @copyright  2026 BBZ Rendsburg-Eckernförde
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // Tabbed settings page, reusing Boost's tab helper.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingbbz', get_string('configtitle', 'theme_bbz'));

    // ------------------------------------------------------------------
    // Tab 1: General – preset and brand colours.
    // ------------------------------------------------------------------
    $page = new admin_settingpage('theme_bbz_general', get_string('generalsettings', 'theme_bbz'));

    // Preset chooser.
    $name = 'theme_bbz/preset';
    $title = get_string('preset', 'theme_bbz');
    $description = get_string('preset_desc', 'theme_bbz');
    $default = 'default.scss';

    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_bbz', 'preset', 0, 'itemid,filepath,filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // Boost's built-in presets are always available.
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';

    $setting = new admin_setting_configthemepreset($name, $title, $description, $default, $choices, 'bbz');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset upload area.
    $name = 'theme_bbz/presetfiles';
    $title = get_string('presetfiles', 'theme_bbz');
    $description = get_string('presetfiles_desc', 'theme_bbz');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        ['maxfiles' => 20, 'accepted_types' => ['.scss']]);
    $page->add($setting);

    // Brand (primary) colour.
    $name = 'theme_bbz/brandcolor';
    $title = get_string('brandcolor', 'theme_bbz');
    $description = get_string('brandcolor_desc', 'theme_bbz');
    $default = '#3b6eb9';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Accent (danger / urgency) colour.
    $name = 'theme_bbz/accentcolor';
    $title = get_string('accentcolor', 'theme_bbz');
    $description = get_string('accentcolor_desc', 'theme_bbz');
    $default = '#c13c3b';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // ------------------------------------------------------------------
    // Tab 2: Advanced – raw SCSS.
    // ------------------------------------------------------------------
    $page = new admin_settingpage('theme_bbz_advanced', get_string('advancedsettings', 'theme_bbz'));

    // Raw SCSS injected before the preset (variable overrides).
    $name = 'theme_bbz/scsspre';
    $title = get_string('rawscsspre', 'theme_bbz');
    $description = get_string('rawscsspre_desc', 'theme_bbz');
    $setting = new admin_setting_scsscode($name, $title, $description, '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS injected after the preset (custom rules).
    $name = 'theme_bbz/scss';
    $title = get_string('rawscss', 'theme_bbz');
    $description = get_string('rawscss_desc', 'theme_bbz');
    $setting = new admin_setting_scsscode($name, $title, $description, '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
