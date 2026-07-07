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
 * Theme callback functions for the BBZ theme.
 *
 * @package    theme_bbz
 * @copyright  2026 BBZ Rendsburg-Eckernförde
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Return the main SCSS content for the theme.
 *
 * This loads the selected preset (an uploaded one, or Boost's default/plain
 * preset). The actual brand tweaks are applied through the pre- and extra-SCSS
 * callbacks so the preset itself stays a clean Bootstrap/Boost base.
 *
 * @param theme_config $theme The theme config object.
 * @return string The SCSS content to compile.
 */
function theme_bbz_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();
    $context = context_system::instance();

    if ($filename == 'default.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_bbz', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
    } else {
        // Fall back to Boost's default preset.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }

    return $scss;
}

/**
 * Inject the pre-SCSS: brand variables that must override Bootstrap's
 * `!default` values before the preset is compiled.
 *
 * Order matters: the shipped defaults come first, then values chosen in the
 * theme settings (so an admin can recolour without editing code), then any
 * raw pre-SCSS the admin entered.
 *
 * @param theme_config $theme The theme config object.
 * @return string The SCSS to prepend.
 */
function theme_bbz_get_pre_scss($theme) {
    global $CFG;

    $scss = '';

    // 1. Brand variable defaults shipped with the theme.
    $scss .= file_get_contents($CFG->dirroot . '/theme/bbz/scss/pre.scss');

    // 2. Values from the theme settings override the shipped defaults.
    //    Each setting is mapped to the Bootstrap variable and to our own brand
    //    token so custom rules in post.scss follow the same colour.
    $configurable = [
        'brandcolor'  => ['primary', 'bbz-blue'],
        'accentcolor' => ['danger', 'bbz-red'],
    ];

    foreach ($configurable as $configkey => $targets) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        foreach ((array) $targets as $target) {
            $scss .= "\n\$" . $target . ': ' . $value . ';';
        }
    }

    // 3. Raw pre-SCSS entered by the admin (advanced settings).
    if (!empty($theme->settings->scsspre)) {
        $scss .= "\n" . $theme->settings->scsspre;
    }

    return $scss;
}

/**
 * Inject the extra SCSS: our custom component styling appended after the
 * preset, plus any raw SCSS from the advanced settings.
 *
 * @param theme_config $theme The theme config object.
 * @return string The SCSS to append.
 */
function theme_bbz_get_extra_scss($theme) {
    global $CFG;

    $scss = file_get_contents($CFG->dirroot . '/theme/bbz/scss/post.scss');

    if (!empty($theme->settings->scss)) {
        $scss .= "\n" . $theme->settings->scss;
    }

    return $scss;
}
