<?php

/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 14/08/2015
 * Time: 10:06 AM
 */
class AdminHelpField extends FormField
{

    /**
     * Whether help items should open in a new window by default
     * @var boolean
     **/
    private static $new_window_default = false;

    /**
     * Whether this help item should open in a new window
     * @var string|boolean
     **/
    protected $newWindow;

    protected $text;

    protected $uid;

    /**
     * @param string $name Field name
     * @param null|string $text Short help link description
     * @param string $uid UniqueIdentifier for AdminHelp
     * @param string|boolean $inline Whether to open this item in a new window
     */
    public function __construct($name, $text, $uid, $newWindow='default')
    {
        $this->text = $text;
        $this->uid = $uid;
        $this->newWindow = $newWindow;

        parent::__construct($name);
    }

    public function FieldHolder($properties = array())
    {
        return $this->Field($properties);
    }

    public function Field($properties = array())
    {
        return $this->renderWith('AdminHelpField');
    }

    public function HelpItem()
    {
        return AdminHelp::by_uid($this->uid);
    }

    public function HelpText()
    {
        return $this->text;
    }

    public function HelpLink()
    {
        return AdminHelp::by_uid($this->uid)->Link();
    }

    public function getUID()
    {
        return $this->uid;
    }

    /**
     * Check if this help item should open in a new window
     * or inline in a dropdown
     * @return boolean
     **/
    public function OpenInNewWindow()
    {
        return $this->newWindow == 'default' ? $this->config()->new_window_default : $this->newWindow;
    }
}
