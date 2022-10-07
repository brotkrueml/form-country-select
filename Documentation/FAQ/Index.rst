.. include:: /Includes.rst.txt

.. _faq:

===
FAQ
===

Target group: **Developers**, **Integrators**

.. contents:: Table of Contents
   :depth: 3
   :local:


Why can't I see the CountrySelect form element in frontend?
===========================================================

Please include the :ref:`static TypoScript <include-static-typoscript>`.


Why is Kosovo missing in the list of countries?
===============================================

The International Organisation for Standardisation (ISO) has not yet assigned
an official country code to Kosovo. In the meantime you can use ``XK`` as a
temporary code and add the country to the select list with a
:ref:`PSR-14 event <modification-country-list-psr-14>`. You can find more
information on the `GeoNames Blog`_.


I would like to add some regions to the list of countries. How can I achieve that?
==================================================================================

Have a look at the official `ISO 3166-2`_ standard for provinces or states. Then
use a :ref:`PSR-14 event <modification-country-list-psr-14>` to add those to the
country list.


What alpha-2 code should I use to add a custom country?
=======================================================

Use one of the letters ``AA``, ``QM`` to ``QZ``, ``XA`` to ``XZ``, or ``ZZ``.
They won't be assigned officially and can be used for that purpose.


Can I use the country list in another extension?
================================================

Yes, there is a :ref:`Service class <service-class>` available. This class is
just a wrapper around the `symfony/intl`_ component which provides an additional
:ref:`PSR-14 event <modification-country-list>`. If you don't need the
event, you can also use the Symfony component directly.


.. _GeoNames Blog: https://geonames.wordpress.com/2010/03/08/xk-country-code-for-kosovo/
.. _ISO 3166-2: https://en.wikipedia.org/wiki/ISO_3166-2
.. _symfony/intl: https://symfony.com/doc/current/components/intl.html#country-names
