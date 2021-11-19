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

As the necessary `symfony/intl <https://github.com/symfony/intl>`_ package is
not shipped with TYPO3 v11 LTS it has to be bundled with the extension for
legacy installations. To achieve this the `humbug/box
<https://github.com/box-project/box>`_ package is used to build a phar archive
with the dependency.

.. rst-class:: bignums-xxl

#. Install Box

   The humbug/box package can be installed with
   `Phive <https://github.com/phar-io/phive>`_::

      phive install

   It is then available via :file:`tools/box`.

#. Update the symfony/intl package

   .. code-block:: shell

      cd Resources/Private/PHP
      composer update

#. Build the phar archive

   .. code-block:: shell

      make build-intl

#. Set version

   Set the new version in the files

   - :file:`ext_emconf.php`
   - :file:`Documentation/Settings.cfg`

   and adjust the :file:`CHANGELOG.md` with the new release.

#. Release

   Publish the release. After pulling the tag, the packaging of the extension
   for the TYPO3 Extension Repository (TER) can be created with::

      make zip

   This creates/replaces a file :file:`../zip/form-country-select_x.y.z.zip`
   which is ready for upload to TER. :file:`x.y.z` holds the recent version
   number.
