BankPayment
===========

The module allows you to enter one or more bank accounts in the payment configuration which are displayed to the customer during the checkout and the order email to notify him where to transfer the money.

This extension is maintained by PHOENIX MEDIA, Magento Enterprise Partner in Stuttgart and Vienna.


Features
--------

* prepayment payment method
* SEPA ready
* allow to display multiple bank accounts
* show bank accounts dependent on order currency
* define minimum order total
* define maximum order total
* show bank accounts in PDF
* show custom text in order confirmation emails
* show custom text in order confirmation emails for specific billing countries
* pay within X days
* show custom text in checkout
* show custom text in PDF
* show link to CMS-Page instead of displaying account details in checkout


Compatibility
-------------

In older versions of Magento there may be also a Mage_BankPayment core extension which is not compatible.


Changelog
---------

From 1.1.0 see changelog in Release Notes tab.

1.3.1:
- Fix localization issues
- Fix poor representation of account data in admin section

1.3.0:
- Re-added (optional) account number and sort code for non SEPA countries
- add locale 'pt_PT'
- Fix issues #13 (Multi Store Problem)
- Added backend model for serialized array to fix magento core bug resulting in a catched exception
- Some refactoring, clean up source code

1.2.0:
- IBAN ready (but without 'AccountNumber' and 'SortCode')

1.0.0:
- version 0.3.4 is considered as stable

0.3.4:
- added configuration options to hide bank accounts and customer text in PDF

0.3.3:
- Fixed store specific accounts' configuration handling in the backend

0.3.2:
- Enabled store specific configuration for some values

0.3.1:
- Added missing PDF template

0.3.0:
- Magento 1.4 support
- Support for multiple bank accounts
- Support for CMS notification page (adopts idea from Market Ready Germany package (symmetrics))
- Min/max order total configuration option
- Additional translations for DK, ES, FR (thanks to the community)
- Configurable on store view level </span></span>

0.2.5:
- added Polish locale</span>

0.2.4:
- added Greek and Italian locales</span></span>

0.2.3:
- added Dutch and Portuguese (Brazil) locales</span></span>

0.2.2:
- custom text field converted to custom text area (multiline)
- bank data is now aligned in a table</span></span>

0.2.1:
- custom text field added
- added Norwegian Bokmål locale
- moved from local to community code space
Important: <span>As the code was moved from local to community code space, you have to remove the folder manually /app/code/local/Mage/BankPayment to clean up your existing Magento installation.</span></span></span>

0.2.0:
- first public release
