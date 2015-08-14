<?php

/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 14/08/2015
 * Time: 10:06 AM
 */
class AdminHelpField extends FormField
{

	protected $text;

	protected $uid;

	/**
	 * @param string $name Field name
	 * @param null|string $text Short help link description
	 * @param string $uid UniqueIdentifier for AdminHelp
	 */
	public function __construct($name, $text, $uid) {
		$this->text = $text;
		$this->uid = $uid;

		parent::__construct($name);
	}

	public function FieldHolder($properties = array()) {
		return $this->Field($properties);
	}

	public function Field($properties = array()) {
		Requirements::css(ADMINHELP_DIR . '/css/AdminHelpField.css');
		return $this->renderWith('AdminHelpField');
	}

	public function HelpItem() {
		return AdminHelp::by_uid($this->uid);
	}

	public function HelpText() {
		return $this->text;
	}

	public function HelpLink() {
		return AdminHelpController::help_link($this->uid);
	}
}