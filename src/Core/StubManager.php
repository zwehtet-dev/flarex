<?php

namespace FlareX\Core;

/**
 * Class StubManager
 *
 * Manages loading and processing stub templates.
 *
 * @package FlareX\Core
 */
class StubManager
{
    /**
     * Get the contents of a stub file.
     *
     * @param string $stubName
     * @return string
     */
    public function getStub(string $stubName): string
    {
        $path = __DIR__ . "/../../stubs/{$stubName}.stub";

        if (!file_exists($path)) {
            return '';
        }

        return file_get_contents($path);
    }

    /**
     * Replace placeholders in the stub content.
     *
     * @param string $stubContent
     * @param array $replacements
     * @return string
     */
    public function replacePlaceholders(string $stubContent, array $replacements = []): string
    {
        foreach ($replacements as $key => $value) {
            $stubContent = str_replace('{{' . $key . '}}', $value, $stubContent);
        }

        return $stubContent;
    }
}
