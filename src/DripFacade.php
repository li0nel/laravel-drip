<?php

namespace li0nel\Drip;

use \Illuminate\Support\Facades\Facade;

class DripFacade extends Facade {

	protected static function getFacadeAccessor() {
		return 'drip';
	}

}
