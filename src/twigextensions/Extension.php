<?php
namespace verbb\colormixer\twigextensions;

use Twig\TwigFilter;
use Twig\Extension\AbstractExtension;

use Exception;

use OzdemirBurak\Iris\Color\Factory;

class Extension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    public function getName(): string
    {
        return 'ColorMixer';
    }

    public function getFilters(): array
    {
        return [
            // Conversion
            new TwigFilter('toHex', [$this, 'toHex']),
            new TwigFilter('toHexa', [$this, 'toHexa']),
            new TwigFilter('toHsl', [$this, 'toHsl']),
            new TwigFilter('toHsla', [$this, 'toHsla']),
            new TwigFilter('toHsv', [$this, 'toHsv']),
            new TwigFilter('toRgb', [$this, 'toRgb']),
            new TwigFilter('toRgba', [$this, 'toRgba']),
            new TwigFilter('rawColor', [$this, 'rawColor']),

            // Manipulation
            new TwigFilter('saturate', [$this, 'saturate']),
            new TwigFilter('desaturate', [$this, 'desaturate']),
            new TwigFilter('grayscale', [$this, 'grayscale']),
            new TwigFilter('lighten', [$this, 'lighten']),
            new TwigFilter('darken', [$this, 'darken']),
            new TwigFilter('brighten', [$this, 'brighten']),
            new TwigFilter('mix', [$this, 'mix']),
            new TwigFilter('tint', [$this, 'tint']),
            new TwigFilter('shade', [$this, 'shade']),
            new TwigFilter('fade', [$this, 'fade']),
            new TwigFilter('fadeIn', [$this, 'fadeIn']),
            new TwigFilter('fadeOut', [$this, 'fadeOut']),
            new TwigFilter('complementary', [$this, 'complementary']),
            new TwigFilter('isLight', [$this, 'isLight']),
            new TwigFilter('isDark', [$this, 'isDark']),
        ];
    }

    public function toHex(string $value, bool $asArray = false)
    {
        return $this->_convert('toHex', $value, $asArray);
    }

    public function toHexa(string $value, bool $asArray = false)
    {
        return $this->_convert('toHexa', $value, $asArray);
    }

    public function toHsl(string $value, bool $asArray = false)
    {
        return $this->_convert('toHsl', $value, $asArray);
    }

    public function toHsla(string $value, bool $asArray = false)
    {
        return $this->_convert('toHsla', $value, $asArray);
    }

    public function toHsv(string $value, bool $asArray = false)
    {
        return $this->_convert('toHsv', $value, $asArray);
    }

    public function toRgb(string $value, bool $asArray = false)
    {
        return $this->_convert('toRgb', $value, $asArray);
    }

    public function toRgba(string $value, bool $asArray = false)
    {
        return $this->_convert('toRgba', $value, $asArray);
    }

    public function rawColor(mixed $value)
    {
        if (!is_array($value)) {
            return str_replace(['#', 'hsl(', 'hsla(', 'hsv(', 'rgb(', 'rgba(', ')'], '', $value);
        }
    }

    public function saturate(string $value, int $amount = 0)
    {
        return Factory::init($value)->saturate($amount);
    }

    public function desaturate(string $value, int $amount = 0)
    {
        return Factory::init($value)->desaturate($amount);
    }

    public function grayscale(string $value)
    {
        return Factory::init($value)->grayscale();
    }

    public function lighten(string $value, int $amount = 10)
    {
        return Factory::init($value)->lighten($amount);
    }

    public function darken(string $value, int $amount = 10)
    {
        return Factory::init($value)->darken($amount);
    }

    public function brighten(string $value, int $amount = 10)
    {
        return Factory::init($value)->brighten($amount);
    }

    public function mix(string $value, string $value2, int $amount = 0)
    {
        $color = Factory::init($value);
        $color2 = Factory::init($value2);

        return $color->mix($color2, $amount);
    }

    public function tint(string $value, int $amount = 0)
    {
        return Factory::init($value)->tint($amount);
    }

    public function shade(string $value, int $amount = 0)
    {
        return Factory::init($value)->shade($amount);
    }

    public function fade(string $value, int $amount = 0)
    {
        return Factory::init($value)->fade($amount);
    }

    public function fadeIn(string $value, int $amount = 0)
    {
        return Factory::init($value)->fadeIn($amount);
    }

    public function fadeOut(string $value, int $amount = 0)
    {
        return Factory::init($value)->fadeOut($amount);
    }

    public function complementary(string $value)
    {
        $originColor = Factory::init($value);

        // Convert to HSLA to adjust the Hue
        $newColor = $originColor->toHsla()->values();

        // Adjust Hue 180 degrees
        $hue = $newColor[0];
        $newColor[0] = (($hue + 180) > 300) ? ($hue + 180 - 300) : ($hue + 180);

        $newColorColor = Factory::init('hsla(' . implode(',', $newColor) . ')');

        // Use mix 100% to return the same format as the provided one
        return $originColor->mix($newColorColor, 100);
    }

    public function isLight(string $value)
    {
        return Factory::init($value)->isLight();
    }

    public function isDark(string $value)
    {
        return Factory::init($value)->isDark();
    }


    // Private Methods
    // =========================================================================

    private function _convert($function, $value, $asArray = false)
    {
        $converted = Factory::init($value)->$function();

        if ($asArray) {
            $key = $function;

            // Special-case for hex/hexa as these are rgb/rgba
            if ($key === 'toHex') {
                $key = 'toRgb';
            } else if ($key === 'toHexa') {
                $key = 'toRgba';
            }

            $key = str_split(strtolower(str_replace('to', '', $key)));

            // Return values indexed by their function, so [r][g][b][a] instead of [0][1][2][3]
            return array_combine($key, $converted->values());
        }

        return $converted;
    }
}
