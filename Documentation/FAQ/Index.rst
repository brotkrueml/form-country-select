.. include:: ../Includes.txt

.. _faq:

===
FAQ
===

Target group: **Developers**, **Integrators**


Why can't I see the CountrySelect form element in frontend?
===========================================================

Please include the :ref:`static TypoScript <include-static-typoscript>`.


Why is Kosovo missing in the list of countries?
===============================================

The International Organisation for Standardisation (ISO) has not yet assigned
an official country code to Kosovo. In the meantime you can use ``XK`` as a
temporary code and add the country to the select list with a
:ref:`signal/slot <modification-country-list-signal-slot>` or
:ref:`PSR-14 event <modification-country-list-psr-14>`. You can find more
information on the
`GeoNames Blog <https://geonames.wordpress.com/2010/03/08/xk-country-code-for-kosovo/>`_.


I would like to add some regions to the list of countries. How can I achieve that?
==================================================================================

Have a look at the official `ISO 3166-2 <https://en.wikipedia.org/wiki/ISO_3166-2>`_
standard for provinces or states. Then use a
:ref:`signal/slot <modification-country-list-signal-slot>` or
:ref:`PSR-14 event <modification-country-list-psr-14>` to add those to the
country list.


What alpha-2 code should I use to add a custom country?
=======================================================

Use one of the letters ``AA``, ``QM`` to ``QZ``, ``XA`` to ``XZ``, or ``ZZ``.
They won't be assigned officially and can be used for that purpose.