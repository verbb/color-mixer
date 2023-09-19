# Usage
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
