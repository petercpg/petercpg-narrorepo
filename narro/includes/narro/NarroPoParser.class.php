<?php


class NarroPoParser implements QTranslationBase {
    /**
     * @var gettext_reader
     */
    protected static $objGettextTables;
	public static function Initialize() {
		return self::Load(QApplication::$LanguageCode, QApplication::$CountryCode);
	}

	public static function Load($strLanguageCode = null, $strCountryCode = null) {
	    self::$objGettextTables = new gettext_reader(
	        new CachedFileReader(__LOCALE_DIRECTORY__ . '/narro.mo')
	    );
	    self::$objGettextTables->load_tables();
	    
	    return new self();
	}

	public function TranslateToken($strToken) {
		return self::$objGettextTables->translate($strToken);
	}

}
