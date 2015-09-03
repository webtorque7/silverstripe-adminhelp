<?php

/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 13/08/2015
 * Time: 10:05 AM
 */
class AdminHelpShowController extends AdminHelpController implements PermissionProvider
{
	private static $url_segment = 'admin-help/show';

	private static $menu_title = 'Admin Help';

	private static $menu_priority = -100;

	private static $allowed_actions = array(
		'help'
	);

	public function HelpItem() {
		return AdminHelp::get()->byID($this->getRequest()->param('ID'));
	}

	public function CurrentItem() {
		return $this->HelpItem();
	}

	public function help($request) {
		return $this->getResponseNegotiator()->respond($request);
	}

	public function NextItem() {

		if ($currentItem = $this->HelpItem()) {
			return AdminHelp::get()
				->filter(array(
					'ParentID' => $currentItem->ParentID,
					'Sort' => $currentItem->Sort + 1
				))
				->first();
		}
	}

	public function PreviousItem() {

		if ($currentItem = $this->HelpItem()) {
			return AdminHelp::get()
				->filter(array(
					'ParentID' => $currentItem->ParentID,
					'Sort' => $currentItem->Sort - 1
				))
				->first();
		}
	}

}