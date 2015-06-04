<?php

// Получаем настройки модуля
PHPShopObj::loadClass("array");
class PHPShopREES46Array extends PHPShopArray {
	function PHPShopREES46Array() {
		$this->objType=3;
		$this->objBase=$GLOBALS['SysValue']['base']['rees46']['rees46_system'];
		parent::PHPShopArray("shop_key","shop_secret");
	}
}

class REES46 {

	/**
	 * Уникальный идентификатор магазина
	 * @var string
	 */
	private $shop_key = '';

	/**
	 * Секретный ключ магазина
	 * @var string
	 */
	private $shop_secret = '';


	/**
	 * Конструктор
	 */
	function __construct() {
		$PHPShopREES46Array = new PHPShopREES46Array();
		$this->shop_key = $PHPShopREES46Array->getParam('shop_key');
		$this->shop_secret = $PHPShopREES46Array->getParam('shop_secret');
	}

	/**
	 * Проверяет настройки магазина – установлены ли все необходимые параметры модулия?
	 * @return bool
	 */
	public function isConfigured() {
		return !empty($this->shop_key) && !empty($this->shop_secret);
	}


	/**
	 * Проверяет, включен ли модуль и готов ли к работе?
	 * Сейчас проверяется только конфигурация. В будущем проверять также ручное включение.
	 * @return bool
	 */
	public function isEnabled() {
		return $this->isConfigured();
	}

}

// Инициализируем REES46
$GLOBALS['REES46'] = new REES46();

