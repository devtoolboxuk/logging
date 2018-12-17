<?php

namespace devtoolboxuk\logging\Handler;

interface HandlerInterface
{
    public function createHandler(LogModel $log);
}