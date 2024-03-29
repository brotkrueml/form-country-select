.. include:: /Includes.rst.txt

.. _introduction:

============
Introduction
============

.. _what-it-does:

What does it do?
================

.. attention::
   With TYPO3 v12.3 a new form element "Country Select" was :ref:`introduced
   <feature-99735-1678701694>` which serves the same purpose as the form
   element provided by this extension. This extension is now considered legacy,
   you should use TYPO3 Core's form element instead. There will be no
   compatible version for TYPO3 v13+. However, the current version will receive
   bug fixes as long as the LTS version is supported by the community.

   Have also a look into the :ref:`migration` chapter when you upgrade from an
   older version.

The extension provides a form element for the :ref:`TYPO3 Form Framework
<ext_form:introduction>` which displays a select box with all countries from the
`ISO 3166-1`_ standard. The country list is localised according to the language
of the website page.

.. figure:: /Images/country-select-frontend.png
   :class: with-shadow
   :alt: A select box with all countries

   A select box with all countries

This is especially useful for forms on websites with an international audience,
where the visitor can select his country.

The value of an option is the `alpha-2 code`_ of the country, the label is the
localised country name.

By default, the list is sorted alphabetically by country name. However, it is
possible to :ref:`modify <modification-country-list>` the order of the countries
or the country list as a whole.


.. _where-the-country-list-comes-from:

Where does the country list come from?
======================================

The list of countries is based on the `symfony/intl`_ package, which in turn
uses the localisation data of the `ICU library`_.

Release Management
==================

This extension uses `semantic versioning`_ which basically means for you, that

* Bugfix updates (e.g. 1.0.0 => 1.0.1) just includes small bug fixes or security
  relevant stuff without breaking changes.
* Minor updates (e.g. 1.0.0 => 1.1.0) includes new features and smaller tasks
  without breaking changes.
* Major updates (e.g. 1.0.0 => 2.0.0) breaking changes which can be
  refactorings, features or bug fixes.


.. _ISO 3166-1: https://en.wikipedia.org/wiki/ISO_3166-1
.. _alpha-2 code: https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
.. _ICU library: https://github.com/unicode-org/icu
.. _semantic versioning: https://semver.org/
.. _symfony/intl: https://github.com/symfony/intl
