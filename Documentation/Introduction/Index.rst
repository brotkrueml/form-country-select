.. include:: ../Includes.txt


.. _introduction:

============
Introduction
============

.. _what-it-does:

What does it do?
================

The extension provides an additional form element for the :ref:`TYPO3 Form
Framework <t3form:introduction>` which displays a select box with all countries
from the `ISO 3166-1 <https://en.wikipedia.org/wiki/ISO_3166-1>`_ standard. The
country list is localised according to the language of the website page.

.. figure:: ../Images/country-select-frontend.png
   :class: with-shadow
   :alt: Select a country

   A select box with all countries

This is especially useful for forms on websites with an international audience,
where the visitor can select his country.

The value of an option is the `alpha-2 code <https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2>`_
of the country, the label is the localised country name.

By default, the list is sorted alphabetically by country name. However, it is
possible to :ref:`modify <modification-country-list>` the order of the countries
or the country list as a whole.

See an example in action:

- `English form <https://www.jobrouter.com/en/request-a-demo/>`__
- `German form <https://www.jobrouter.com/de/demo-anfordern/>`__
- `Turkish form <https://www.jobrouter.com/tr/demo-talebi/>`__


.. _where-the-country-list-comes-from:

Where does the country list come from?
======================================

The list of countries is based on the `symfony/intl <https://github.com/symfony/intl>`__
package, which in turn uses the localisation data of the
`ICU library <https://github.com/unicode-org/icu>`__.

Release Management
==================

This extension uses `semantic versioning <https://semver.org/>`_ which basically
means for you, that

* Bugfix updates (e.g. 1.0.0 => 1.0.1) just includes small bug fixes or security relevant stuff without breaking changes.
* Minor updates (e.g. 1.0.0 => 1.1.0) includes new features and smaller tasks without breaking changes.
* Major updates (e.g. 1.0.0 => 2.0.0) breaking changes which can be refactorings, features or bug fixes.
