.. include:: ../Includes.txt

.. _faq:

===
FAQ
===

Target group: **Developers**, **Integrators**

Why can't I see the CountrySelect form element in frontend?
===========================================================

Please include the :ref:`static TypoScript <include-static-typoscript>`.


I implemented a slot and received the error "The slot method ... returned a different number (xxx) of arguments, than it received (x)"
======================================================================================================================================

You have to return the same number of arguments as you received. Please look at
the :ref:`example <modify-options>` for the slot: You have to return an array
of the options:

::

   return [$options];
