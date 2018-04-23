<?php

namespace li0nel\Drip;

use li0nel\Drip\DripFacade as Drip;

trait Drippable {

	public function addTag($tag) {
		return Drip::addTag($this, $tag);
	}

	public function registerEvent($action, $properties = null) {
		return Drip::registerEvent($this, $action, $properties);
	}
}