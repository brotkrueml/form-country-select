.. include:: ../Includes.txt

.. _installation:

============
Installation
============

Target group: **Administrators**

.. note::

   The extension works with TYPO3 9 LTS and TYPO3 v10.

The extension needs to be installed as any other extension of TYPO3 CMS:

#. **Use composer**: The preferred way is to use the composer dependency manager:
   ``composer req brotkrueml/form-country-select``.

#. **Get it from the Extension Manager:** Press the :guilabel:`Retrieve/Update`
   button in the Extension Manager backend module, search for the extension key
   :guilabel:`form-country-select` and import the extension from the repository.

#. **Get it from typo3.org:** You can always get the current version from
   `https://extensions.typo3.org/extension/form_country_select/ <https://extensions.typo3.org/extension/form_country_select/>`_
   by downloading the :file:`zip` file. Upload the file afterwards in the
   Extension Manager.


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

.. figure:: ../Images/include-static-template.png
   :class: with-shadow
   :alt: Include static TypoScript
