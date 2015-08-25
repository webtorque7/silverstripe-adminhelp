<?php

/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 13/08/2015
 * Time: 10:12 AM
 */
class AdminHelp extends DataObject
{
	private static $db = array(
		'Title' => 'Varchar(200)',
		'UniqueIdentifier' => 'Varchar(255)', //lookup so records can be retrieved without ID
		'Summary' => 'HTMLText',
		'Content' => 'HTMLText',
		'Sort' => 'Int'
	);

	private static $has_one = array(
		'Parent' => 'AdminHelp'
	);

	private static $has_many = array(
		'Children' => 'AdminHelp.Parent'
	);

	private static $default_sort = '"Sort" ASC';

	private static $summary_fields = array(
		'Title' => 'Title',
		'Parent.Title' => 'Parent',
		'Summary.NoHTML' => 'Summary'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('Sort');
		$fields->removeByName('ParentID');
		$fields->removeByName('Summary');
		$fields->removeByName('Content');
		$fields->removeByName('UniqueIdentifier');

		$fields->addFieldsToTab('Root.Main', array(
			TextField::create('Title'),
			TreeDropdownField::create('ParentID', 'Parent', 'AdminHelp', 'ID', 'Title'),
			TextField::create('UniqueIdentifier'),
			HtmlEditorField::create('Summary')
				->setDescription('Short summary to show on hover')
				->setRows(5),
			HtmlEditorField::create('Content')->setDescription('Content of help article'),
		));

		if ($childrenGrid = $fields->fieldByName('Root.Children.Children')) {
			$childrenGrid->getConfig()->addComponent(GridFieldOrderableRows::create('Sort'));
		}

		return $fields;
	}

	/**
	 * Override this so groups are ordered in the CMS
	 */
	public function stageChildren() {
		return AdminHelp::get()->filter(array(
			'ParentID' => $this->ID
		));
	}

	public function getTreeTitle() {
		if($this->hasMethod('alternateTreeTitle')) return $this->alternateTreeTitle();
		else return htmlspecialchars($this->Title, ENT_QUOTES);
	}

	/**
	 * Checks for permission-code CMS_ACCESS_AdminHelpAdmin.
	 * If the group has ADMIN permissions, it requires the user to have ADMIN permissions as well.
	 *
	 * @param $member Member
	 * @return boolean
	 */
	public function canEdit($member = null) {
		if(!$member || !(is_a($member, 'Member')) || is_numeric($member)) $member = Member::currentUser();

		// extended access checks
		$results = $this->extend('canEdit', $member);
		if($results && is_array($results)) if(!min($results)) return false;

		if(
			// either we have an ADMIN
			(bool)Permission::checkMember($member, "ADMIN")
			|| (
				// or a privileged CMS user and a group without ADMIN permissions.
				// without this check, a user would be able to add himself to an administrators group
				// with just access to the "Security" admin interface
				Permission::checkMember($member, "CMS_ACCESS_AdminHelpAdmin") &&
				!Permission::get()->filter(array('GroupID' => $this->ID, 'Code' => 'ADMIN'))->exists()
			)
		) {
			return true;
		}

		return false;
	}

	/**
	 * Checks for permission-code CMS_ACCESS_AdminHelpAdmin.
	 *
	 * @param $member Member
	 * @return boolean
	 */
	public function canView($member = null) {
		if(!$member || !(is_a($member, 'Member')) || is_numeric($member)) $member = Member::currentUser();

		// extended access checks
		$results = $this->extend('canView', $member);
		if($results && is_array($results)) if(!min($results)) return false;

		// user needs access to CMS_ACCESS_SecurityAdmin
		if(Permission::checkMember($member, "CMS_ACCESS_AdminHelpAdmin")) return true;

		return false;
	}

	public function canDelete($member = null) {
		if(!$member || !(is_a($member, 'Member')) || is_numeric($member)) $member = Member::currentUser();

		// extended access checks
		$results = $this->extend('canDelete', $member);
		if($results && is_array($results)) if(!min($results)) return false;

		return $this->canEdit($member);
	}

	/**
	 * Make sure we have Sort
	 */
	public function onBeforeWrite() {
		parent::onBeforeWrite();

		if (!$this->Sort || $this->isChanged('ParentID')) {
			$this->Sort = AdminHelp::get()->filter('ParentID', $this->ParentID)->max('Sort') + 1;
		}
	}

	/**
	 * Find a AdminHelp record by UniqueIdentifier
	 *
	 * @param string $uid
	 * @return DataObject
	 */
	public static function by_uid($uid) {
		return AdminHelp::get()->filter('UniqueIdentifier', $uid)->first();	
	}

	/**
	 * Returns a link to view this AdminHelp item in the CMS
	 *
	 * @return String
	 */
	public function Link(){
		return Controller::join_links('admin/admin-help/show/help', $this->ID);
	}
}