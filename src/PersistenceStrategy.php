<?php
/**
 * This file is part of the prooph/pdo-event-store.
 * (c) 2016-2017 prooph software GmbH <contact@prooph.de>
 * (c) 2016-2017 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\EventStore\PDO;

use Iterator;
use Prooph\EventStore\StreamName;

interface PersistenceStrategy
{
    /**
     * @param string $tableName
     * @return string[]
     */
    public function createSchema(string $tableName): array;

    public function columnNames(): array;

    public function prepareData(Iterator $streamEvents): array;

    /**
     * @return string[]
     */
    public function uniqueViolationErrorCodes(): array;

    public function generateTableName(StreamName $streamName): string;
}
