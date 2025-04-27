# FlareX Core - BurnManager

## Purpose
`BurnManager` is responsible for creating models, controllers, and other Laravel structures using stub files.

## Methods

| Method | Description |
|:---|:---|
| `burn(string $type, array $options)` | Dispatch the correct burn type (model, controller, etc.) |
| `createModel(array $options)` | Generate a new Model file |
| `createController(array $options)` | Generate a new Controller file |
| `getStub(string $type)` | Load stub templates |
| `output(string $message, string $level)` | Print messages with color to console |

## Example

```php
$burnManager = new BurnManager();
$burnManager->burn('model', ['name' => 'Post']);
