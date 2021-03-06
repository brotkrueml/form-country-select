# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Fixed
- Include package symfony/intl for non-composer installations when missing

## [1.3.0] - 2020-12-25

### Added
- Compatibility with TYPO3 v11

### Changed
- Raise minimum required version to TYPO3 9.5.16

## [1.2.0] - 2020-07-01

### Added
- Enhance CountriesModificationEvent with page language (#5)

## [1.1.1] - 2020-02-17

### Fixed
- Prevent exception when using preview in form manager (#4)

## [1.1.0] - 2020-01-31

### Added
- Service class for usage of the country list in other scenarios

## [1.0.0] - 2019-12-27

### Added
- Form element "Country select"
- Signal/slot and PSR-14 event for modifying the country list

[Unreleased]: https://github.com/brotkrueml/form-country-select/compare/v1.3.0...HEAD
[1.3.0]: https://github.com/brotkrueml/schema/compare/v1.2.0...v1.3.0
[1.2.0]: https://github.com/brotkrueml/schema/compare/v1.1.1...v1.2.0
[1.1.1]: https://github.com/brotkrueml/schema/compare/v1.1.0...v1.1.1
[1.1.0]: https://github.com/brotkrueml/schema/compare/v1.0.0...v1.1.0
[1.0.0]: https://github.com/brotkrueml/form-country-select/releases/tag/v1.0.0
