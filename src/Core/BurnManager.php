<?php

namespace FlareX\Core;

/**
 * Class BurnManager
 *
 * Handles the generation ("burning") of files from stubs.
 *
 * @package FlareX\Core
 */
class BurnManager
{
    /**
     * Generate a file based on the type and given options.
     *
     * @param string $type
     * @param array $options
     * @return void
     */
    public function burn(string $type, array $options = []): void
    {
        switch ($type) {
            case 'model':
                $this->createModel($options);
                break;

            case 'controller':
                $this->createController($options);
                break;

            default:
                $this->output("🔥 Unsupported burn type: {$type}", 'error');
                break;
        }
    }

    /**
     * Generate a Model from the stub.
     *
     * @param array $options
     * @return void
     */
    protected function createModel(array $options): void
    {
        $name = $options['name'] ?? null;

        if (!$name) {
            $this->output('❌ Model name is required.', 'error');
            return;
        }

        $destination = app_path("Models/{$name}.php");

        if (file_exists($destination)) {
            $this->output('⚠️ Model already exists!', 'warn');
            return;
        }

        $stub = $this->getStub('model');

        $content = str_replace('{{modelName}}', $name, $stub);

        file_put_contents($destination, $content);

        $this->output("✅ Model {$name} created successfully!", 'success');
    }

    /**
     * Generate a Controller from the stub.
     *
     * @param array $options
     * @return void
     */
    protected function createController(array $options): void
    {
        $name = $options['name'] ?? null;

        if (!$name) {
            $this->output('❌ Controller name is required.', 'error');
            return;
        }

        $destination = app_path("Http/Controllers/{$name}.php");

        if (file_exists($destination)) {
            $this->output('⚠️ Controller already exists!', 'warn');
            return;
        }

        $stub = $this->getStub('controller');

        $content = str_replace('{{controllerName}}', $name, $stub);

        file_put_contents($destination, $content);

        $this->output("✅ Controller {$name} created successfully!", 'success');
    }

    /**
     * Fetch the stub content.
     *
     * @param string $type
     * @return string
     */
    protected function getStub(string $type): string
    {
        $path = __DIR__ . "/../../stubs/{$type}.stub";

        if (!file_exists($path)) {
            return '';
        }

        return file_get_contents($path);
    }

    /**
     * Output messages to console.
     *
     * @param string $message
     * @param string $level
     * @return void
     */
    protected function output(string $message, string $level = 'info'): void
    {
        switch ($level) {
            case 'error':
                echo "\033[31m{$message}\033[0m" . PHP_EOL; // Red
                break;
            case 'warn':
                echo "\033[33m{$message}\033[0m" . PHP_EOL; // Yellow
                break;
            case 'success':
                echo "\033[32m{$message}\033[0m" . PHP_EOL; // Green
                break;
            default:
                echo $message . PHP_EOL;
                break;
        }
    }
}
