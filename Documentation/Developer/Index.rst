.. include:: /Includes.rst.txt

.. _for-developers:

================
Developer Corner
================

Target group: **Developers**, **Integrators**


.. _modification-country-list:

Modification of the country list
================================

It is possible to change the list of options in the country selection box with
the PSR-14 event :php:`Brotkrueml\FormCountrySelect\Event\CountriesModificationEvent`
This may be the case if you want to reduce the number of countries, change the
order of the countries or perhaps add some "unofficial" countries.

The event provides the following methods:

.. option:: ->getFormIdentifier(): string

   Get the form identifier (e.g. ``contact-42``, where ``contact`` is the
   identifier and ``42`` the content element id).

.. option:: ->getCountries(): array

   Returns the list of countries in the format::

      [
         'DE' => 'Germany',
         'US' => 'United States',
         // ...
      ]

.. option:: ->getLanguageTwoLetterIsoCode(): string

   .. versionadded:: 1.2.0
      Get the `two letter ISO code`_ of the language of the page (e.g. ``en``
      for English or ``de`` for German).

.. option:: ->setCountries(array $countries): void

   Sets the countries in the same format as above.


Example
-------

So, let's start with an example. Imagine that you want to display the most
common English-speaking countries at the top of the option list.

.. figure:: /Images/element-options-order-changed.png
   :class: with-shadow
   :alt: Country list with changed order

.. rst-class:: bignums-xxl

#. Create the event listener

   ::

      <?php
      declare(strict_types=1);

      namespace YourVendor\YourExtension\EventListener;

      use Brotkrueml\FormCountrySelect\Event\CountriesModificationEvent;

      final class ModifyCountryOrder
      {
         private $mostCommonEnglishSpeakingCountries = ['AU', 'CA', 'NZ', 'GB', 'US'];

         public function __invoke(CountriesModificationEvent $event): void
         {
            $countries = $event->getCountries();

            $topCountries = [];
            foreach ($this->mostCommonEnglishSpeakingCountries as $country) {
               $topCountries[$country] = $countries[$country];
               unset($countries[$country]);
            }

            $event->setCountries(array_merge($topCountries, $countries));
         }
      }

   The method :php:`__invoke()` implements the logic for changing the order of
   the countries. It receives the :php:`CountriesModificationEvent` where you
   can get the countries. After your changes you have to assign the new country
   list with a call to the event method :php:`setCountries()`.


#. Register your event listener in :file:`Configuration/Services.yaml`

   .. code-block:: yaml

      services:
         YourVendor\YourExtension\EventListener\ModifyCountryOrder:
            tags:
               - name: event.listener
                 identifier: 'ext-yourextension/modifyCountryOrder'
                 event: Brotkrueml\FormCountrySelect\Event\CountriesModificationEvent

.. seealso::
   You can find more information in the blog article `PSR-14 Events in TYPO3`_
   and the official :ref:`TYPO3 documentation <t3coreapi:EventDispatcher>`.


.. _service-class:

Country list usage in other scenarios
=====================================

.. versionadded:: 1.1.0

It might be helpful to use the country list in other scenarios, e.g. an
Extbase form – especially if a PSR-14 event has been assigned. For this
case a :php:`CountryService` class is available::

   use Brotkrueml\FormCountrySelect\Service\CountryService;

   $countries = (new CountryService())->getCountries('de', 'some-identifier');

As already mentioned, the assigned PSR-14 events are taken into account.
The :php:`->getCountries()` method has two optional arguments:

.. option:: string $languageTwoLetterIsoCode

   The ISO 3166-1 code of the language (e.g. ``de`` for German).
   Default: ``en``.

.. option:: string $identifier

   The identifier is – well – an identifier. It is passed on to the event used
   by PSR-14 events, where you can work with the country list dependent on this
   identifier.
   Default: empty string.


.. _PSR-14 Events in TYPO3: https://usetypo3.com/psr-14-events.html
.. _two letter ISO code: https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
