<?php

namespace Panikka\LivewireAce;

use Livewire\Component;

class AceEditorBase extends Component
{
    public string $editorView;
    public ?string $editorLayout = '';

    public string $value = '';
    public string $language = '';

    protected $listeners = ['languageChanged'];

    public function mount()
    {
        $this->editorView = $this->editorView
            ?? "livewire-ace::editor";
    }

    public function render()
    {
        if (empty($this->editorLayout)) {
            return view($this->editorView);
        }

        return view($this->editorView)
            ->layout($this->editorLayout);
    }

    /**
     * Event listener for programmatically changing the
     * session language mode.
     *
     * @param string $lang
     */
    public function languageChanged(string $lang)
    {
        $this->language = $lang;
        $this->emit('changeLanguage');
    }

    /**
     * Callback function to listen for value updates.
     */
    public function updatedValue(string $value)
    {
    }

    /**
     * Callback function to listen for language updates.
     */
    public function updatedLanguage(string $lang)
    {
        $this->emitSelf('changeLanguage', $lang);
    }
}
