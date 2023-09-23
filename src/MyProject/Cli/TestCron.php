<?php

namespace MyProject\Cli;

//php D:\Games\OSPanel\domains\OOPphpzone\bin\cli.php TestCron -x=20 -y=17 -sleep=20
class TestCron extends AbstractCommand
{
    protected function checkParams()
    {
        $this->ensureParamExists('x');   // TODO: Implement checkParams() method.
        $this->ensureParamExists('y');   // TODO: Implement checkParams() method.
        $this->ensureParamExists('sleep');
    }

    public function execute()
    {
        $i=0;
        $sleep = $this->getParam('sleep');
        while ($i <=2){
            sleep($sleep);
            file_put_contents('D:\\1.log', date(DATE_ISO8601) . " " . $sleep . PHP_EOL, FILE_APPEND);
            $i++;
    }
    }

}
