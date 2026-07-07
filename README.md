# BBZ – Moodle-Theme (Boost-Child-Theme)

Ein Moodle-Theme für das **Berufsbildungszentrum Rendsburg-Eckernförde (BBZ)**.
Es ist als **Kind-Theme von Boost** (dem Standard-Theme von Moodle) umgesetzt und
bindet die Marke – Logo, dezente Blau-/Rot-Akzente, Schriftart *Public Sans* –
**ausschließlich über SCSS-Variablen-Overrides** ein. Layout und Templates von
Boost bleiben unangetastet, damit das Theme mit künftigen Moodle-Updates
kompatibel bleibt und für alle Bildungsgänge (Wirtschaft, Medizin,
Sozialpädagogik, Berufliches Gymnasium, Berufsfachschule, IT u. a.) neutral
funktioniert.

## Designprinzip

Blau (`#3b6eb9`) und Rot (`#c13c3b`) werden **nur als Akzent** verwendet
(Buttons, Links, Fortschritt, Fälligkeiten), nie als große Flächen. Rot ist
bewusst für Dringlichkeit/Fälligkeit reserviert. Hintergründe sind ein warmes
Off-White, Karten sind weiß mit dezenten Rundungen.

## Voraussetzungen

- Moodle **4.1 LTS** oder neuer
- Das mitgelieferte Parent-Theme **Boost** (Teil von Moodle-Core)

## Installation

1. Den Ordner dieses Repos als `bbz` in das Moodle-Theme-Verzeichnis kopieren:

   ```
   <moodle>/theme/bbz/
   ```

   (z. B. via `git clone … theme/bbz` oder als ZIP über
   *Website-Administration → Plugins → Plugins installieren*.)

2. In Moodle als Administrator einloggen und die angebotene Datenbank-
   Aktualisierung ausführen.

3. Theme aktivieren unter
   *Website-Administration → Darstellung → Themes → Theme-Auswahl* → **BBZ**.

## Konfiguration

Unter *Website-Administration → Darstellung → Themes → BBZ*:

- **Allgemein**
  - *Theme-Vorlage (Preset)* – Boost-Preset als Basis (`default` / `plain` oder
    eigene hochgeladene Presets).
  - *Markenfarbe* – Primärfarbe (Standard BBZ-Blau `#3b6eb9`).
  - *Akzentfarbe* – Farbe für Dringlichkeit/Fälligkeit (Standard BBZ-Rot
    `#c13c3b`).
- **Erweitert**
  - *Roh-SCSS (Anfang)* und *Roh-SCSS* für zusätzliche Anpassungen.

### Logo

Das Header-Logo wird – update-sicher – über den Moodle-Kern gesetzt:
*Website-Administration → Darstellung → Logos*. Dort das BBZ-Logo als „Logo“
und „Kompaktes Logo“ hochladen. Eine Kopie liegt zur Bequemlichkeit unter
[`pix/logo.jpg`](pix/logo.jpg).

> Hinweis: Für den produktiven Einsatz sollte das Logo als freigestelltes
> (transparentes) PNG/SVG vorliegen – die aktuelle JPG-Datei hat einen weißen
> Hintergrund.

## Aufbau

```
theme/bbz/
├── config.php              Theme-Konfiguration (Parent = boost, SCSS-Callbacks)
├── version.php             Plugin-Metadaten & Abhängigkeit auf theme_boost
├── lib.php                 SCSS-Callbacks (main / pre / extra)
├── settings.php            Admin-Einstellungen (Preset, Farben, Roh-SCSS)
├── lang/
│   ├── en/theme_bbz.php    Sprachstrings (Englisch, Pflicht)
│   └── de/theme_bbz.php    Sprachstrings (Deutsch)
├── scss/
│   ├── pre.scss            Markenvariablen VOR dem Preset (Farben, Schrift, Radien)
│   └── post.scss           Komponenten-Feinschliff NACH dem Preset (Login, Karten …)
└── pix/
    ├── screenshot.png      Vorschaubild in der Theme-Auswahl
    └── logo.jpg            BBZ-Logo (Kopie)
```

### Wie das Branding greift

Moodle kompiliert `pre.scss` **vor** dem Boost-Preset. Da Bootstrap seine
Variablen mit `!default` deklariert, überschreiben die Zuweisungen in `pre.scss`
(z. B. `$primary`, `$font-family-sans-serif`, `$border-radius`) die Standard-
werte, ohne Markup anzufassen. `post.scss` wird **nach** dem Preset angehängt und
enthält nur wenige gezielte Regeln (Login-Karte mit blauem Balken und rotem
Eck-Akzent, Hover-Schatten auf Kurskarten, Nav-Pillen). Fehlt ein Selektor in
einer Moodle-Version, bleibt die Regel wirkungslos – nichts bricht.

## Herkunft

Das visuelle Konzept stammt aus einem High-Fidelity-Design-Handoff. Dieses
Theme setzt dessen Aussehen mit den Boost-Bordmitteln um (SCSS statt Layout-
Überschreibungen), gemäß der ausdrücklichen Empfehlung im Handoff.
