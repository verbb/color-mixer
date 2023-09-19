# Upgrading from v2
While the [changelog](https://github.com/verbb/color-mixer/blob/craft-4/CHANGELOG.md) is the most comprehensive list of changes, this guide provides high-level overview and organizes changes by category.

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

