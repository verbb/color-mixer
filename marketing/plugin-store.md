Color Mixer gives Twig the colour operations designers reach for every day. Convert, lighten, darken, mix, tint, shade, fade, and assess colour values without maintaining a separate utility layer.

Take a colour stored in Craft and derive the variants your template needs at render time. A single source value can produce hover states, tints, shades, translucent overlays, or a complementary accent.

## Features

- **Format conversion:** Convert Hex, HSL, RGB, RGBA, OKLCH, CMYK, and other colour formats without manual parsing in Twig.
- **Lighten and darken:** Derive brighter or deeper variants by a controlled amount.
- **Tint and shade:** Blend towards white or black for a related colour scale.
- **Mix colours:** Combine two values to create a deliberate intermediate colour.
- **Fade values:** Adjust opacity and return a value suitable for translucent CSS.
- **Light or dark checks:** Choose an appropriate treatment based on the perceived brightness of a colour.
- **Common colour formats:** Convert between Hex, HSL, RGB, RGBA, OKLCH, CMYK, and related representations before passing the result to CSS or another template operation. Helpers can also determine whether a colour is broadly light or dark for contrast decisions.
