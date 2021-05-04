### Installation

```bash
composer require panikka/livewire-ace
```

### Requirements

This package uses;
- livewire/livewire (https://laravel-livewire.com/) under the hood.
- TailwindCSS (https://tailwindcss.com/) for base styling.
- AlpineJS (https://github.com/alpinejs/alpine)

Please make sure you include all of these dependencies before using this component.

### Usage

To use this component, you should create a new livewire component which extends from `AceEditorBase`

```php
<?php
// In file `app/Http/Livewire/AceEditor.php

namespace App\Http\Livewire;

use Panikka\LivewireAce\AceEditorBase;

class AceEditor extends AceEditorBase
{
    public function onUpdate(string $value): void
    {
        //
    }
}
```

Now, we can include our component in any view.

```html
<livewire:ace-editor />
```
