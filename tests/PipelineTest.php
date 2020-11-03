<?php
/**
 * Pipeline
 * Copyright 2020 Jamiel Sharief.
 *
 * Licensed under The MIT License
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * @copyright   Copyright (c) Jamiel Sharief
 * @license     https://opensource.org/licenses/mit-license.php MIT License
 */
declare(strict_types = 1);
namespace Pipeline\Test\TestCase;

use PHPUnit\Framework\TestCase;
use Pipeline\HandlerInterface;
use Pipeline\Pipeline;

class FirstStage implements HandlerInterface
{
    public function handle($payload = null)
    {
        $payload[] = 'one';
        return $payload;
    }
}

class SecondStage implements HandlerInterface
{
    public function handle($payload = null)
    {
        $payload[] = 'two';
        return $payload;
    }
}

class PipelineTest extends TestCase
{
    public function testPipeline()
    {
        $pipeline = (new Pipeline(new FirstStage()))
        ->add(new SecondStage());

        $this->assertEquals(['one','two'], $pipeline->dispatch([]));
    }
}
