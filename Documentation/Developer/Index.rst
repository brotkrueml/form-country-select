.. include:: ../Includes.txt

.. _for-developers:

================
Developer Corner
================

Target group: **Developers**, **Integrators**


.. _modify-options:

Modify the options
==================

With the slot :php:`modifyOptions` it is possible to change the options in the
country selection box. This may be the case if you want to reduce the number of
countries, change the order of the countries or perhaps add some unofficial
countries.

Example
-------

So, let's start with an example. Imagine that you want to display the most
common English-speaking countries at the top of the option list.

.. figure:: ../Images/element-options-order-changed.png
   :class: with-shadow
   :alt: Country list with changed order


.. rst-class:: bignums-xxl

#. Create the slot

   .. code-block:: php
      :emphasize-lines: 8

      <?php
      declare(strict_types=1);

      namespace YourVendor\YourExtension\Slot;

      class OptionsSlot
      {
         public function changeOrderOfOptions(array &$options, string $formIdentifier): void
         {
            $mostCommonEnglishSpeakingCountries = ['AU', 'CA', 'NZ', 'GB', 'US'];

            $topOptions = [];
            foreach ($mostCommonEnglishSpeakingCountries as $country) {
               $topOptions[$country] = $options[$country];
               unset($options[$country]);
            }

            $options = \array_merge($topOptions, $options);
         }
      }

   In this example, the method :php:`changeOrderOfOptions()` implements the
   logic for changing the order of the countries. It always receives the options
   as an array by reference. For additional purposes the form identifier is also
   assigned, so you can modify the country list dependent on a specific form.

#. Register the slot in :file:`ext_localconf.php`

   .. code-block:: php
      :emphasize-lines: 7-8

      $signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
         TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class
      );
      $signalSlotDispatcher->connect(
         \Brotkrueml\FormCountrySelect\Domain\Model\FormElements\CountrySelect::class,
         'modifyOptions',
         \YourVendor\YourExtension\Slot\OptionsSlot::class,
         'changeOrderOfOptions'
      );

   The third argument of the :php:`connect()` method is your slot class and the
   forth argument the method name.

You can find more information in the blog article
`Signals and Slots – Extend TYPO3 Functionality <https://typo3worx.eu/2017/07/signals-and-slots-in-typo3/>`__.
