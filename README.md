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
    /**
     * Livewire hook to listen for value changes.
     */
    public function updatedValue(string $value): void
    {
        //
    }
}
```

Now, we can include our component in any view.

```html
<livewire:ace-editor />
```

Optionally you can pass initial value.
```html
<livewire:ace-editor
    value="const hello = 'world'"
/>
```

### Alternative Usage

Alternatively you can use include livewire-ace in your own livewire components.
Here is an example as full page Livewire component.

```php
<?php
// In file `app/Http/Livewire/AceEditorAlternative.php

namespace App\Http\Livewire;

use Panikka\LivewireAce\AceEditorBase;

class AceEditorAlternative extends AceEditorBase
{
    public string $language = 'javascript';
    public ?string $editorLayout = 'layouts.guest';
    public string $editorView = 'ace-editor-alternative';
}
```

This way value and language params are directly available.
```html
<div class="bg-gray-900 text-white h-screen flex items-center justify-center flex-col">
    <div class="flex flex-col w-full max-w-6xl">
        <label for="select-language">Language</label>
        <select wire:model="language" class="h-10 bg-gray-900 text-white border-white" id="select-language">
            <option value="html">HTML</option>
            <option value="javascript">Javascript</option>
        </select>
    </div>

    {{-- Include the editor template. --}}
    <div class="text-white max-h-screen max-w-6xl w-full h-96">
        @include('livewire-ace::editor');
    </div>

    {{-- Using available variables --}}
    <div class="flex justify-between w-full max-w-6xl">
        <span>{{ $language }}</span>
        <span>{{ strlen($value) }}</span>
    </div>
</div>
```
