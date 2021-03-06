<?php

namespace Ezamlinux\Happy\Traits;

use Ezamlinux\Happy\Traits\Test\TestRestApi;
use Ezamlinux\Happy\Traits\Test\TestRestWeb;

/**
 * @method testIndex
 * @method testShow
 * @method testStore
 * @method testUpdate
 * @method testDelete
 * @method testCreate
 * @method testEdit
 */
Trait TestRest
{
    /**
     * @method testIndex
     * @method testShow
     * @method testStore
     * @method testUpdate
     * @method testDelete
     */
    use TestRestApi;

    /**
     * @method testCreate
     * @method testEdit
     */
    use TestRestWeb;
}
