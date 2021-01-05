<?php
/**
 * Pipeline
 * Copyright 2020-2021 Jamiel Sharief.
 *
 * Licensed under The MIT License
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * @copyright   Copyright (c) Jamiel Sharief
 * @license     https://opensource.org/licenses/mit-license.php MIT License
 */
declare(strict_types = 1);
namespace Pipeline;

use Pipeline\HandlerInterface;

/**
 * Pipeline
 *
 * @see https://java-design-patterns.com/patterns/pipeline
 */
 class Pipeline
 {
     private array $handlers;

     /**
      * Creates the Pipeline with the initial handler
      *
      * @param array $handlers
      */
     public function __construct(HandlerInterface $handler)
     {
         $this->handlers[] = $handler;
     }

     /**
      * Adds a Handler to the Chain
      *
      * @param string $handler
      * @return self
      */
     public function add(HandlerInterface $handler) : self
     {
         $this->handlers[] = $handler;
         return $this;
     }


     /**
      * Dispatches the payload to the Pipeline
      *
      * @param mixed $payload
      * @return mixed
      */
     public function dispatch($payload = null)
     {
         foreach ($this->handlers as $handler) {
             $payload = $handler->handle($payload);
         }
         return $payload;
     }
 }
