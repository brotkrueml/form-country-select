.. include:: /Includes.rst.txt

.. _migration:

=========
Migration
=========

Target group: **Developers, Integrators**

From version 1.x/2.x to version 3.0
===================================

Since TYPO3 v12 LTS ships with an own country select form element which
conflicts with this extension, the form type has to be adjusted in your forms:

Before:

.. code-block:: yaml
   :caption: fileadmin/form_definitions/my_form.form.yaml
   :emphasize-lines: 5

   renderables:
      -
         renderables:
            -
               type: CountrySelect
               identifier: my-countryselect
               label: 'Country'

After:

.. code-block:: yaml
   :caption: fileadmin/form_definitions/my_form.form.yaml
   :emphasize-lines: 5

   renderables:
      -
         renderables:
            -
               type: ExtCountrySelect
               identifier: my-countryselect
               label: 'Country'

.. note::
   This version of the extension should ease the upgrade to TYPO3 v12 LTS. The
   extension is now considered legacy and will not be developed further on. You
   should migrate to the form element provided by the TYPO3 Core which was
   :ref:`introduced <feature-99735-1678701694>` with TYPO3 v12.3.
