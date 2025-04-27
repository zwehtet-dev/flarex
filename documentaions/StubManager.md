# FlareX Core - StubManager

## Purpose
Handles reading stub files and replacing dynamic placeholders inside the stubs.

## Methods

| Method | Description |
|:---|:---|
| `getStub(string $stubName)` | Load the raw stub content by stub name. |
| `replacePlaceholders(string $stubContent, array $replacements)` | Replace {{placeholders}} with real values. |

## Example Usage

```php
$stubManager = new StubManager();

$content = $stubManager->getStub('model');

$final = $stubManager->replacePlaceholders($content, [
    'modelName' => 'Post',
]);

file_put_contents(app_path('Models/Post.php'), $final);
