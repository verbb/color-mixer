# Color Mixer Plugin for Craft CMS
A set of Twig filters for modifying hex colors in Craft CMS. Use Twig to modify and manipulate color values and generate valid CSS that can be used in your templates.

This plugin allows you to use simple Twig filters to:
- Transform color values from HEX to RGB
- Transform color values fromTraHEX to HSL
- Lighten and darken colors by a set amount.
- Determine if a color is considered dark or light.
- Get a complementary color
- Generate gradients.

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
Color Mixer provide a number of Twig filters to use

#### `hexToHsl`
Converts a hex to HSL. Returns a comma separated string unless `$returnAsArray` is set to true.

```twig
{{ '#3533b9' | hexToHsl }}

{% set hsl = '#3533b9' | hexToHsl($returnAsArray) %}
```


#### `hexToRgb`
Converts a hex to RGB. Returns a comma separated string unless `$returnAsArray` is set to true.

```twig
{{ '#3533b9' | hexToRgb }}

{% set rgb = '#3533b9' | hexToRgb($returnAsArray) %}
```


#### `darken`
Darkens a hex by the `$amount` percentage.

```twig
{{ '#3533b9' | darken($amount) }}
```


#### `lighten`
Lightens a hex by the `$amount` percentage.

```twig
{{ '#3533b9' | lighten($amount) }}
```


#### `mix`
Mixes two hexes together. The `$amount` to mix the colors together by is set between -100..0..+100, where 0 is an equal amount of both colors. `$amount` defaults to 0 if not set.

```twig
{{ '#3533b9' | mix($hexToMixWith, $amount) }}
```


#### `isLight`
Returns true if the color is considered "light", false if not. The *optional* `$threshold` value determines at what point the color is considered light. Anything above this value is considered light. Defaults to 130, range is 0..255.

```twig
{{ '#3533b9' | isLight($threshold) }}
```


#### `isDark`
Returns true if the color is considered "dark", false if not. The *optional* `$threshold` value determines at what point the color is considered dark. Anything below or equal to this value is considered dark. Defaults to 130, range is 0..255.

```twig
{{ '#3533b9' | isDark($threshold) }}
```


#### `complementary`
Returns the complimentary color.

```twig
{{ '#3533b9' | complementary }}
```


#### `gradientColors`
Returns an array with the input color and a slightly darkened / lightened counterpart (depending on whether the input color is light or dark). Both parameters are *optional*.
`$amount` defines how much lighter or darker the color should be made (defaults to 10, range is 0..100).  
`$threshold` determines at what point the color is considered dark. Anything below or equal to this value is considered dark. Defaults to 130, range is 0..255.

```twig
{% set garadient = '#3533b9' | gradientColors($amount, $threshold) %}
```


#### `gradient`
Returns a string of CSS containing the styling to give an element a background gradient. All parameters are *optional*.  
`$direction` defines the direction of the gradient. Must be either: `horizontal` (→), `vertical` (↓), `diagonalDown` (↘), `diagonalUp` (↗), `radial` (○). Defaults to `horizontal`. 
`$amountOrSecondary` defines the amount to lighten or darken the input color (defaults to 10, range is 0..100) or a hex string for the secondary color.
`$threshold` determines at what point the color is considered dark. Anything below or equal to this value is considered dark. Defaults to 130, range is 0..255. If `$amountOrSecondary` is a hex string, this value is ignored.

```twig
{{ '#3533b9' | gradient($direction, $amountOrSecondary, $threshold) }}
```


## Credits
Based on [Color Mixer](https://github.com/ethercreative/colormixer) for Craft 2.

## Show your Support
Color Mixer is licensed under the MIT license, meaning it will always be free and open source – we love free stuff! If you'd like to show your support to the plugin regardless, [Sponsor](https://github.com/sponsors/verbb) development.

<h2></h2>

<a href="https://verbb.io" target="_blank">
    <img width="100" src="https://verbb.io/assets/img/verbb-pill.svg">
</a>
