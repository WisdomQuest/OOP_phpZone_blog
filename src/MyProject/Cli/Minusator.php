<?php

namespace MyProject\Cli;



class Minusator extends AbstractCommand
{
    protected function checkParams()
    {
     $this->ensureParamExists('x');
     $this->ensureParamExists('y');
        // TODO: Implement checkParams() method.
    }

    public function execute()
    {
     echo $this->getParam('x') - $this->getParam('y');
        // TODO: Implement execute() method.
    }


}
