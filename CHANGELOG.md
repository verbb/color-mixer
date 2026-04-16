# Changelog

## 4.1.1 - 2026-04-16

### Changed
- Fix incorrect version tagged.

## 4.1.0 - 2026-04-11

### Added
- Add `toOklch` Twig filter for OKLCH conversion.
- Add `toCmyk` Twig filter for CMYK conversion.

### Changed
- Bump `ozdemirburak/iris:^4.0`.

## 4.0.0 - 2024-05-11

### Changed
- Now requires PHP `8.2.0+`.
- Now requires Craft `5.0.0+`.

## 3.0.1 - 2025-07-18

### Changed
- Misc cleanup.

## 3.0.0 - 2022-06-25

### Added
- Add more conversion filters for different formats.

### Changed
- Now requires PHP `8.0.2+`.
- Now requires Craft `4.0.0+`.
- Migration to `ozdemirburak/iris` to better handle colours.

### Removed
- Removed `gradientColors` and `gradient`. These can be easily constructed without the need for Twig filters.

## 2.0.0 - 2022-06-25

### Changed
- Migration to `verbb/color-mixer`.
- Now requires Craft 3.7+.

## 1.0.0 - 2018-07-19

### Added
- Initial release
