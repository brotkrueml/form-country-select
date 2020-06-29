.. include:: ../Includes.txt
.. highlight:: shell

.. _maintenance:

===========
Maintenance
===========

Target group: **Contributors, Developers**


.. _maintenance-translations:

Translations
============

The translation to other languages is done within the
`Crowdin <https://crowdin.com/>`_ service. It is appreciated to add missing or
incomplete languages. Please navigate to the
`project home <https://crowdin.com/project/typo3-extension-formcountryselect>`_.
If the language is not available please drop me a :ref:`note <start>` and I will
add it.

.. note::

   For now, the language files are integrated into a release of the extension.
   When the new
   `translation structure <https://github.com/TYPO3-Initiatives/crowdin>`_
   (based on the translations within Crowdin) is in place, the language files
   (other than English) will be removed in favour of the new infrastructure.


.. _maintenance-packaging-extension:

Packaging of extension for TER
==============================

Set the new version in the files

- :file:`ext_emconf.php`
- :file:`Documentation/Settings.cfg`,

adjust the :file:`CHANGELOG.md` and tag the release. After pulling the tag, the
packaging of the extension for the TYPO3 Extension Repository (TER) can be done
with:

::

   composer zip

This creates/replaces a file :file:`../zip/form-country-select_x.y.z.zip` which is
ready for upload to TER. :file:`x.y.z` holds the recent version number.
