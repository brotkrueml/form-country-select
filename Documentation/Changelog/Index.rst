.. _changelog:

Changelog
=========

All notable changes to this project will be documented in this file.

The format is based on `Keep a Changelog <https://keepachangelog.com/en/1.0.0/>`_\ ,
and this project adheres to `Semantic Versioning <https://semver.org/spec/v2.0.0.html>`_.

`Unreleased <https://github.com/brotkrueml/form-country-select/compare/v2.1.0...HEAD>`_
-------------------------------------------------------------------------------------------

`2.1.0 <https://github.com/brotkrueml/form-country-select/compare/v2.0.1...v2.1.0>`_ - 2023-04-09
-----------------------------------------------------------------------------------------------------

Updated
^^^^^^^


* symfony/intl to version 5.4.22 for non-Composer installations

Removed
^^^^^^^


* Compatibility with TYPO3 v12 (due to a form element with same name since TYPO3 v12.3) (#15)

`2.0.1 <https://github.com/brotkrueml/form-country-select/compare/v2.0.0...v2.0.1>`_ - 2023-01-13
-----------------------------------------------------------------------------------------------------

Fixed
^^^^^


* JavaScript error in form module with TYPO3 v12.1

`2.0.0 <https://github.com/brotkrueml/form-country-select/compare/v1.4.2...v2.0.0>`_ - 2022-10-07
-----------------------------------------------------------------------------------------------------

Added
^^^^^


* Compatibility with TYPO3 v12 (#12)

Updated
^^^^^^^


* symfony/intl to version 5.4.11 for non-Composer installations

Removed
^^^^^^^


* Signal for modification of the country list (#10)
* Compatibility with TYPO3 v9 and v10 (#10, #14)
* Compatibility with PHP 7.2 and 7.3 (#11)

`1.4.2 <https://github.com/brotkrueml/form-country-select/compare/v1.4.1...v1.4.2>`_ - 2022-03-22
-----------------------------------------------------------------------------------------------------

Fixed
^^^^^


* Display form element in form editor in combination with other custom form elements correctly (#13)

`1.4.1 <https://github.com/brotkrueml/form-country-select/compare/v1.4.0...v1.4.1>`_ - 2021-12-16
-----------------------------------------------------------------------------------------------------

Fixed
^^^^^


* Default language of backend user throws exception in form preview

`1.4.0 <https://github.com/brotkrueml/form-country-select/compare/v1.3.1...v1.4.0>`_ - 2021-11-29
-----------------------------------------------------------------------------------------------------

Added
^^^^^


* Compatibility with Symfony 6

Updated
^^^^^^^


* symfony/intl to version 5.4.0 for non-Composer installations

`1.3.1 <https://github.com/brotkrueml/form-country-select/compare/v1.3.0...v1.3.1>`_ - 2021-09-07
-----------------------------------------------------------------------------------------------------

Fixed
^^^^^


* Include package symfony/intl for non-Composer installations

`1.3.0 <https://github.com/brotkrueml/form-country-select/compare/v1.2.0...v1.3.0>`_ - 2020-12-25
-----------------------------------------------------------------------------------------------------

Added
^^^^^


* Compatibility with TYPO3 v11

Changed
^^^^^^^


* Raise minimum required version to TYPO3 9.5.16

`1.2.0 <https://github.com/brotkrueml/form-country-select/compare/v1.1.1...v1.2.0>`_ - 2020-07-01
-----------------------------------------------------------------------------------------------------

Added
^^^^^


* Enhance CountriesModificationEvent with page language (#5)

`1.1.1 <https://github.com/brotkrueml/form-country-select/compare/v1.1.0...v1.1.1>`_ - 2020-02-17
-----------------------------------------------------------------------------------------------------

Fixed
^^^^^


* Prevent exception when using preview in form manager (#4)

`1.1.0 <https://github.com/brotkrueml/form-country-select/compare/v1.0.0...v1.1.0>`_ - 2020-01-31
-----------------------------------------------------------------------------------------------------

Added
^^^^^


* Service class for usage of the country list in other scenarios

`1.0.0 <https://github.com/brotkrueml/form-country-select/releases/tag/v1.0.0>`_ - 2019-12-27
-------------------------------------------------------------------------------------------------

Added
^^^^^


* Form element "Country select"
* Signal/slot and PSR-14 event for modifying the country list
