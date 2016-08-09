<?php
namespace Metaregistrar\EPP;

class eppDebugLogger implements eppLoggerInterface
{
    /**
     * Contains the log entries
     * @var array
     */
    protected $logentries = [];

    public function getKey()
    {
        return 'debug';
    }

    public function writeLog($text, $action, array $context = [])
    {
        $this->logentries[] = "-----" . $action . "-----" . date("Y-m-d H:i:s") . "-----\n" . $text . "\n-----END-----" . date("Y-m-d H:i:s") . "-----\n";
    }

    /**
     * Shows the log when the script has ended
     */
    public function showLog() {
        echo "==== LOG ====\n";
        foreach ($this->logentries as $logentry) {
            echo $logentry . "\n";
        }
    }
}