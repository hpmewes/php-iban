<?php
class IBANGenerator {

    protected $bankCode;
    protected $locale = 'DE';
    protected $bankAccountNr;

    /**
     * Constructor
     * 
     * @param type $bankCode
     * @param type $bankAccountNr
     * @param type $locale 
     */
    function __construct($bankCode, $bankAccountNr, $locale = 'DE') {
        $this->locale = $locale;
        $this->bankCode = $bankCode;
        $this->bankAccountNr = $bankAccountNr;
    }
    
    /**
     * Generate the IBAN Code
     * 
     * @param type $bankCode
     * @param type $bankAccountNr
     * @param type $locale
     * 
     * @return string
     */
    public function generate($bankCode = '', $bankAccountNr = '', $locale = '') {
        if(empty($locale)) $locale = $this->locale;
        if(empty($bankCode)) $bankCode = $this->bankCode;
        if(empty($bankAccountNr)) $bankAccountNr = $this->bankAccountNr;
        
        $BBAN = $this->getBBAN($bankCode, $bankAccountNr);
        $checksum = $this->getChecksum($bankCode, $bankAccountNr, $locale);
        // ISO 7064 per Modulo 97-10
        $checkcipher = $this->getCheckcipher($checksum);

        // the ready IBAN ;)
        return $locale.$checkcipher.$BBAN;
    }

    /**
    * Get the Checkcipher like ISO 7064 per Modulo 97-10
    * if value lower then 10 "0" append to left
    * 
    * @param type $checksum
    * 
    * @return string 
    */
    public function getCheckcipher($checksum = '') {
        return str_pad(98 - bcmod($checksum, 97), 2, "0", STR_PAD_LEFT);
    }

    /**
    * Get Checksum for IBAN
    * 
    * @param type $bankCode
    * @param type $bankAccountNr
    * @param type $locale
    * 
    * @return string 
    */
    public function getChecksum($bankCode = '', $bankAccountNr = '', $locale = '') {
        if(empty($locale)) $locale = $this->locale;
        if(empty($bankCode)) $bankCode = $this->bankCode;
        if(empty($bankAccountNr)) $bankAccountNr = $this->bankAccountNr;

        return $this->getBBAN($bankCode, $bankAccountNr).$this->getNumericLanguageCode($locale);
    }

    /**
    * Get the BBAN from Bank Code and Account Identification Number
    * 
    * @param type $bankCode
    * @param type $bankAccountNr
    * 
    * @return string 
    */
    public function getBBAN($bankCode = '', $bankAccountNr = '') {
        if(empty($bankCode)) $bankCode = $this->bankCode;
        if(empty($bankAccountNr)) $bankAccountNr = $this->bankAccountNr;
        
        return $bankCode.str_pad($bankAccountNr, 10, "0", STR_PAD_LEFT);
    }

    /**
    * Generate the Numeric Language Code from Locale
    * add präfix 00
    * 
    * Example: DE => 00314
    * 
    * Every letter should be converted to it's count number (a = 1, g = 8)
    * then add 9 while this is position in latin alphabet (a = 9, g = 17)
    * 
    * @param type $locale
    * 
    * @return string 
    */
    public function getNumericLanguageCode($locale = '') {
        if(empty($locale)) $locale = $this->locale;
        
        $alphabet = array(
            1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D', 5 => 'E', 6 => 'F', 7 => 'G', 8 => 'H',
            9 => 'I', 10 => 'J', 11 => 'K', 12 => 'L', 13 => 'M', 14 => 'N', 15 => 'O',
            16 => 'P', 17 => 'Q', 18 => 'R', 19 => 'S', 20 => 'T', 21 => 'U', 22 => 'V',
            23 => 'W', 24 => 'X', 25 => 'Y', 26 => 'Z'
        );
        $numericLanguageCode = "";

        // step over each char from language code
        foreach(str_split($locale) as $char) {
            // use the number for latein alphabet to decode
            $numericLanguageCode .= array_search($char, $alphabet) + 9;
        }

        return $numericLanguageCode."00";
    }
    
}