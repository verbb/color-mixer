# Color Mixer Plugin for Craft CMS
A set of Twig filters for modifying hex colors in Craft CMS. Use Twig to modify and manipulate color values and generate valid CSS that can be used in your templates.

This plugin allows you to use simple Twig filters to:
- Convert color values from Hex, HSL, RGB, RGBA and more
- Saturate or Desaturate colors by a set amount.
- Lighten and darken colors by a set amount.
- Mix, tint and shade colors by a set amount.
- Fade colors by a set amount.
- Determine if a color is considered dark or light.
- Get a complementary color.

## Installation
You can install Color Mixer via the plugin store, or through Composer.

### Craft Plugin Store
To install **Color Mixer**, navigate to the _Plugin Store_ section of your Craft control panel, search for `Color Mixer`, and click the _Try_ button.

### Composer
You can also add the package to your project using Composer.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:
    
        composer require verbb/color-mixer

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Color Mixer.

## Usage
Color Mixer provide a number of Twig filters to use, for a variety of different use-cases.

### Conversion
Color Mixer supports converting between the following color formats.

- Hex (`toHex`)
- Hexa (`toHexa`)
- HSL (`toHsl`)
- HSLA (`toHsla`)
- HSV (`toHsv`)
- RGB (`toRgb`)
- RGBA (`toRgba`)

Each `to*` method supports the following arguments:
- `asArray` - `true` or `false` as to whether to return values as an array. Default `false`.

For example, to convert Hex to RGB:

```twig
{{ '#ff00ff' | toRgb }} {# rgb(255, 0, 255) #}
```

Hex to RGBA:

```twig
{{ '#ff00ff' | toRgba }} {# rgba(255, 0, 255, 1) #}
```

RGB to HSL:

```twig
{{ 'rgb(255,0,255)' | toHsl }} {# hsl(300, 100%, 50%) #}
```

You can also retrieve an array of individual values instead of a string:

```twig
{% set color = '#ff00ff' | toRgb(true) %}
{# Returns an array of `{ r: 255, g: 0, b: 255 }` #}

{{ color.r }} {# 255 #}
{{ color.g }} {# 0 #}
{{ color.b }} {# 255 #}
```

Of course, you can convert between multiple different color types. Color Mixer expects values in the following formats:

```twig
{% set hex = '#ff00ff' %}
{% set hexa = '#ff00ff4c' %}
{% set hsl = 'hsl(300, 100%, 50%)' %}
{% set hsla = 'hsla(300, 100%, 50%, 0.3)' %}
{% set hsv = 'hsv(300, 100%, 100%)' %}
{% set rgb = 'rgb(255, 0, 255)' %}
{% set rgba = 'rgba(255, 0, 255, 0.33)' %}
```

After which you can interchangably supply them to any of the conversion methods. For example, if you wanted to convert a Hex color to every supported color type: 

```twig
toHex: {{ hex | toHex }}
toHexa: {{ hex | toHexa }}
toHsl: {{ hex | toHsl }}
toHsla: {{ hex | toHsla }}
toHsv: {{ hex | toHsv }}
toRgb: {{ hex | toRgb }}
toRgba: {{ hex | toRgba }}
```

Additionally, you might like to strip out the "type" denotions for the color. To explain, refer to the below table:

Type | With Type | Without Type
--- | --- | ---
| Hex | `#ff00ff` | `ff00ff`
| Hexa | `#ff00ff4c` | `ff00ff4c`
| HSL | `hsl(300, 100%, 50%)` | `300, 100%, 50%`
| HSLA | `hsla(300, 100%, 50%, 0.3)` | `300, 100%, 50%, 0.3`
| HSV | `hsv(300, 100%, 100%)` | `300, 100%, 100%`
| RGB | `rgb(255, 0, 255)` | `255, 0, 255`
| RGBA | `rgba(255, 0, 255, 0.33)` | `255, 0, 255, 0.33`

To do this, you can use the `rawColor` Twig filter, after a conversion, or standalone.

```twig
{# Without `rawColor` #}
{{ '#ff00ff' | toHex }} {# #ff00ff #}
{{ '#ff00ff' | toRgba }} {# rgba(255,0,255,1) #}
{{ '#ff00ff' | toHsl }} {# hsl(300, 100%, 50%) #}

{# With `rawColor` #}
{{ '#ff00ff' | toHex | rawColor }} {# ff00ff #}
{{ '#ff00ff' | toRgba | rawColor }} {# 255, 0, 255 #}
{{ '#ff00ff' | toHsl | rawColor }} {# 300, 100%, 50% #}

{# Standalone `rawColor` #}
{{ '#ff00ff' | rawColor }} {# ff00ff #}
{{ 'rgb(255, 0, 255)' | rawColor }} {# 255, 0, 255 #}
```

### Manipulation

#### `saturate`
Saturate by a percentage amount.

```twig
{{ '#ff00ff' | saturate(20) }} {# #ff00ff #}
```

#### `desaturate`
Desaturate by a percentage amount.

```twig
{{ '#ff00ff' | desaturate(20) }} {# #e61ae6 #}
```

#### `grayscale`
Get the greyscale value (same as `desaturate(100)`)

```twig
{{ '#ff00ff' | grayscale }} {# #808080 #}
```

#### `lighten`
Lighten by a percentage amount.

```twig
{{ '#ff00ff' | lighten(20) }} {# #ff66ff #}
```

#### `darken`
Darken by a percentage amount.

```twig
{{ '#ff00ff' | darken(20) }} {# #990099 #}
```

#### `brighten`
Brighten by a percentage amount.

```twig
{{ '#ff00ff' | brighten(20) }} {# #ff33ff #}
```

#### `mix`
Mix by a percentage amount.

```twig
{{ '#ff00ff' | mix('#e51717', 20) }} {# #fa05d1 #}
```

#### `tint`
Mix color with white by a percentage amount.

```twig
{{ '#ff00ff' | tint(20) }} {# #ff33ff #}
```

#### `shade`
Mix color with black by a percentage amount.

```twig
{{ '#ff00ff' | shade(20) }} {# #cc00cc #}
```

#### `fade`
Set the absolute opacity of a color by a percentage amount.

```twig
{{ '#ff00ff' | fade(20) }} {# rgba(255, 0, 255, 0.2) #}
```

#### `fadeIn`
Increase the opacity of a color by a percentage amount.

```twig
{{ '#ff00ff' | fadeIn(20) }} {# rgba(255, 0, 255, 1) #}
```

#### `fadeOut`
Decrease the opacity of a color by a percentage amount.

```twig
{{ '#ff00ff' | fadeOut(20) }} {# rgba(255, 0, 255, 0.8) #}
```

#### `complementary`
Returns the complimentary color.

```twig
{{ '#ff00ff' | complementary }}
```

#### `isLight`
Whether a color is considered light.

```twig
{{ '#ff00ff' | isLight }} {# false #}
```

#### `isDark`
Whether a color is considered dark.

```twig
{{ '#ff00ff' | isDark }} {# true #}
```

## Upgrading from v1/v2
The following Twig filters have changed:

Old | What to do instead
--- | ---
| `hexToHsl` | `toHsl`
| `hexToHsl(true)` | `toHsl(true)`
| `hexToRgb` | `toRgb`
| `hexToRgb(true)` | `toRgb(true)`

Color conversion formats have also changed:

```twig
{# Color Mixer v1/v2 #}
{{ '#ff00ff' | hexToHsl }} {# 300,1,0.5 #}
{{ '#ff00ff' | hexToRgb }} {# 255,0,255 #}

{# Color Mixer v3 #}
{{ '#ff00ff' | toHsl }} {# hsl(300,1,0.5) #}
{{ '#ff00ff' | toRgb }} {# rgb(255,0,255) #}
```

To retain the old format, combine the `rawColor` filter.

```twig
{{ '#ff00ff' | toHsl | rawColor }} {# 300,1,0.5 #}
{{ '#ff00ff' | toRgb | rawColor }} {# 255,0,255 #}
```

When converting to an array, do note the array keys are now **lowercase**.

```twig
{# Color Mixer v1/v2 #}
{{ '#ff00ff' | hexToHsl(true) }} {# { H: 300, S: 1, L: 0.5 } #}
{{ '#ff00ff' | hexToRgb }} {# { R: 255, G: 0, B: 255 } #}

{# Color Mixer v3 #}
{{ '#ff00ff' | toHsl }} {# { h: 300, s: 1, l: 0.5 } #}
{{ '#ff00ff' | toRgb }} {# { r: 255, g: 0, b: 255 } #}
```

Both `gradientColors` and `gradient` have been removed. These can be easily constructed without the need for Twig filters.

## Credits
Based on [Color Mixer](https://github.com/ethercreative/colormixer) for Craft 2.

## Show your Support
Color Mixer is licensed under the MIT license, meaning it will always be free and open source – we love free stuff! If you'd like to show your support to the plugin regardless, [Sponsor](https://github.com/sponsors/verbb) development.

<h2></h2>

<a href="https://verbb.io" target="_blank">
    <img width="100" src="https://verbb.io/assets/img/verbb-pill.svg">
</a>
