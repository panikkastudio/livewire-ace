<?php

namespace Panikka\LivewireAce;

use Livewire\Component;

class AceEditorBase extends Component
{
    public string $editorView;

    public function mount()
    {
        $this->editorView = "livewire-ace::editor";
    }

    public function render()
    {
        return view($this->editorView);
    }

    public function onUpdate(string $value): void
    {
        //
    }
}
