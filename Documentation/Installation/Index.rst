.. include:: /Includes.rst.txt
.. highlight:: bash

.. _installation:

============
Installation
============

Target group: **Administrators**

.. note::
   The extension in version |release| supports TYPO3 v11 LTS. Use
   version 1.x for support with TYPO3 v9 LTS and TYPO3 v10 LTS.

.. attention::
   Version 2.0 supported also TYPO3 v12. The compatibility was removed with
   version 2.1 again as a form element with the same name was
   :ref:`introduced <feature-99735-1678701694>` with TYPO3 v12.3. For
   compatibility with TYPO3 v12.3+ use version 3 of this extension.

The recommended way to install this extension is by using Composer. In your
Composer-based TYPO3 project root, just type::

   composer req brotkrueml/form-country-select

and the recent stable version will be installed.

You can also install the extension from the `TYPO3 Extension Repository (TER)`_.
See :ref:`t3start:extensions_legacy_management` for a manual how to
install an extension.


.. _include-static-typoscript:

Preparation: Include static TypoScript
======================================

The extension ships some TypoScript code which needs to be included.

#. Switch to the root page of your site.

#. Switch to the :guilabel:`Template module` and select :guilabel:`Info/Modify`.

#. Press the link :guilabel:`Edit the whole template record` and switch to the
   tab :guilabel:`Includes`.

#. Select :guilabel:`Form Country Select (form_country_select)` from the
   available items at the field :guilabel:`Include static (from extensions):`

.. figure:: /Images/include-static-template.png
   :class: with-shadow
   :alt: Include static TypoScript


.. _TYPO3 Extension Repository (TER): https://extensions.typo3.org/extension/form_country_select/
