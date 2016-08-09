<?php
namespace Metaregistrar\EPP;

interface eppLoggerInterface
{
    /**
     * Writes a log event.
     * @param  string $text    Log event data.
     * @param  string $action  Log event action.
     * @param  array  $context Additional details.
     * @return void
     */
    public function writeLog($text, $action, array $context = []);

    /**
     * Gets unique logger key.
     * @return string key
     */
    public function getKey();
}