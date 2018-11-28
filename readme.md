![Color Mixer for Craft CMS](icon.png) <!-- .element height="30%" width="30%" -->

# Color Mixer
A set of Twig filters for modifying hex colors in Craft CMS 3. Ported from the original plugin for Craft 2 by Ether Creative. 
https://github.com/ethercreative/colormixer

### Install 
Find it in the Craft Plugin Store or simply install via Composer from your command line
`composer require "whoisjuan/craft-color-mixer:*"`

### Filters
**hexToHsl**

```twig
hexToHsl

hexToHsl($returnAsArray)
```

Converts a hex to HSL. Returns a comma separated string unless ```$returnAsArray``` is set to true.


**hexToRgb**

```twig
hexToRgb

hexToRgb($returnAsArray)
```

Converts a hex to RGB. Returns a comma separated string unless ```$returnAsArray``` is set to true.


**darken**

```twig
darken($amount)
```

Darkens a hex by the ```$amount``` percentage.


**lighten**

```twig
lighten($amount)
```

Lightens a hex by the ```$amount``` percentage.


**mix**

```twig
mix($hexToMixWith, $amount)
```

Mixes two hexes together. The ```$amount``` to mix the colors together by is set between -100..0..+100, where 0 is an equal amount of both colors. ```$amount``` defaults to 0 if not set.


**isLight**

```twig
isLight($threshold)
```

Returns true if the color is considered "light", false if not. The *optional* `$threshold` value determines at what point the color is considered light. Anything above this value is considered light. Defaults to 130, range is 0..255.


**isDark**

```twig
isDark($threshold)
```

Returns true if the color is considered "dark", false if not. The *optional* `$threshold` value determines at what point the color is considered dark. Anything below or equal to this value is considered dark. Defaults to 130, range is 0..255.


**complementary**

```twig
complementary
```

Returns the complimentary color.


**gradientColors**

```twig
gradientColors($amount, $threshold)
```

Returns an array with the input color and a slightly darkened / lightened counterpart (depending on whether the input color is light or dark). Both parameters are *optional*.  
`$amount` defines how much lighter or darker the color should be made (defaults to 10, range is 0..100).  
`$threshold` determines at what point the color is considered dark. Anything below or equal to this value is considered dark. Defaults to 130, range is 0..255.


**gradient**

```twig
gradient($direction, $amountOrSecondary, $threshold)
```

Returns a string of CSS containing the styling to give an element a background gradient. All parameters are *optional*.  
`$direction` defines the direction of the gradient. Must be either: `horizontal` (→), `vertical` (↓), `diagonalDown` (↘), `diagonalUp` (↗), `radial` (○). Defaults to `horizontal`.  
`$amountOrSecondary` defines the amount to lighten or darken the input color (defaults to 10, range is 0..100) or a hex string for the secondary color.
`$threshold` determines at what point the color is considered dark. Anything below or equal to this value is considered dark. Defaults to 130, range is 0..255. If `$amountOrSecondary` is a hex string, this value is ignored.

The MIT License (MIT)

Copyright (c) 2018 whoisjuan

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
