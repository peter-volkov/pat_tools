<?php

class Template
{
	private $_name;
	public function __construct($name = '')
	{
        $this->_name = $name;
		if (!file_exists($this->_name)) die("Template " . $this->_template . " doesn't exist.");

		$this->content = implode('', file($this->_name));
		$this->orig = $this->content;
	}

	public function get()
	{
		return $this->content;
	}

	public function prepare()
	{
		$this->content = $this->orig;
	}

	public function set($meta, $value)
	{
		$this->content = preg_replace('|@@' . $meta . '@@|smiu', $value, $this->content);
	}

}