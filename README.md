IBAN Generator
==============

With this class you can generate simply a IBAN from Bankcode, Bankaccount Id and
locale.

Currently programmed only for Federal Republic of Germany...
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

    ([A-Z]{2})([0-9]{2})([0-9]{8})([0-9]{10}) // Example for Federal Republic of Germany DE581234567812345678910
    
License not Costless
--------------------

Anti Piracy
https://www.microsoft.com/de-de/aktionen/piraterie

Copyright (c) until 2015
MLabs Development and Design, Mewes Hans-Peter. All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

- Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
- Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
- All advertising materials mentioning features or use of this software must display the following acknowledgement: “This product includes software developed by MLabs Development and Design, Mewes Hans-Peter and its contributors.”
- Neither the name of MLabs Development and Design, Mewes Hans-Peter nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY MLabs Development and Design, Mewes Hans-Peter “AS IS” AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE REGENTS OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
