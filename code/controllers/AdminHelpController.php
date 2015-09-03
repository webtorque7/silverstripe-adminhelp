<?php

/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 13/08/2015
 * Time: 10:05 AM
 */
class AdminHelpController extends LeftAndMain implements PermissionProvider
{
	private static $url_segment = 'admin-help/view';

	private static $menu_title = 'Admin Help';

	private static $menu_priority = -100;

	private static $required_permission_codes = array('ADMINHELP_ACCESS_VIEW');

	public function RootHelpItems() {
		return AdminHelp::get()->filter('ParentID', 0);
	}

	public function providePermissions() {
		$title = _t("AdminHelp.MENUTITLE", LeftAndMain::menu_title_for_class($this->class));
		return array(
			"ADMINHELP_ACCESS_VIEW" => array(
				'name' => _t('AdminHelp.VIEWACCESS', "Access to '{title}' section", array('title' => $title)),
				'category' => _t('Permission.ADMINHELP_ACCESS_CATEGORY', 'Admin Help Access')
			)
		);
	}

	public function MemberCanEdit() {
		return Permission::check(array('ADMIN', 'ADMINHELP_ACCESS_EDIT'));
	}
}