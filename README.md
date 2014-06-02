IBAN Generator
==============

With this class you can generate simply a IBAN from Bankcode, Bankaccount Id and
locale.

Currently only for Germany...
Further description for other languages http://www.pruefziffernberechnung.de/I/IBAN.shtml

Example
-------

    $IBANGenerator = new IBANGenerator($bankCode, $bankAccountNr, $locale);
    $IBANGenerator->generate();

Check
-----

To check if a IBAN correct use follow Project

    http://code.google.com/p/php-iban/

Todo
----

Use of Regex for check

    ([A-Z]{2})([0-9]{2})([0-9]{8})([0-9]{10}) // Example for Germany DE581234567812345678910
    
License
-------
GNU General Public License
