<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LecturasMeteorologicasFixture
 */
class LecturasMeteorologicasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'ubicacion' => 'Lorem ipsum dolor sit amet',
                'temperatura_actual' => 1.5,
                'humedad' => 1,
                'created' => '2026-04-04 18:56:38',
                'modified' => '2026-04-04 18:56:38',
            ],
        ];
        parent::init();
    }
}
