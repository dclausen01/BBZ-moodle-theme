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
 * Sprachstrings für das BBZ-Theme (Deutsch).
 *
 * @package    theme_bbz
 * @copyright  2026 BBZ Rendsburg-Eckernförde
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'BBZ';
$string['choosereadme'] = 'BBZ ist ein Kind-Theme von Boost für das Berufsbildungszentrum Rendsburg-Eckernförde. Es setzt die Marke (Logo, Blau/Rot-Akzente, Public Sans) ausschließlich über SCSS-Variablen-Overrides um und bleibt so kompatibel mit künftigen Moodle-Updates.';
$string['configtitle'] = 'BBZ';

// Einstellungsseiten.
$string['generalsettings'] = 'Allgemein';
$string['advancedsettings'] = 'Erweitert';

// Preset.
$string['preset'] = 'Theme-Vorlage (Preset)';
$string['preset_desc'] = 'Wählen Sie eine Vorlage, um das Aussehen des Themes grundlegend zu ändern. Die Markenfarben unten werden zusätzlich auf die gewählte Vorlage angewendet.';
$string['presetfiles'] = 'Zusätzliche Preset-Dateien';
$string['presetfiles_desc'] = 'Mit Preset-Dateien lässt sich das Erscheinungsbild des Themes stark verändern. Informationen zum Erstellen und Teilen eigener Presets finden Sie unter <a href="https://docs.moodle.org/dev/Boost_Presets">Boost Presets</a>.';

// Farben.
$string['brandcolor'] = 'Markenfarbe';
$string['brandcolor_desc'] = 'Primäre Akzentfarbe für Buttons, aktive Links und Fortschrittsbalken. Standard: BBZ-Blau (#3b6eb9).';
$string['accentcolor'] = 'Akzentfarbe';
$string['accentcolor_desc'] = 'Akzentfarbe, die für Dringlichkeit und Fälligkeiten reserviert ist. Standard: BBZ-Rot (#c13c3b). Wird bewusst sparsam eingesetzt.';

// Roh-SCSS.
$string['rawscsspre'] = 'Roh-SCSS (Anfang)';
$string['rawscsspre_desc'] = 'SCSS-Code, der vor allem anderen eingefügt wird. Meist werden hier Variablen definiert.';
$string['rawscss'] = 'Roh-SCSS';
$string['rawscss_desc'] = 'SCSS- oder CSS-Code, der am Ende des Stylesheets eingefügt wird.';

// Datenschutz.
$string['privacy:metadata'] = 'Das BBZ-Theme speichert keine personenbezogenen Daten.';
