<?php


namespace Panikka\LivewireAce;

use Illuminate\Support\ServiceProvider;

class LivewireAceServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . "/../resources/views", "livewire-ace");
        $this->mergeConfigFrom(__DIR__ . "/../config/config.php", 'ace');

        \Blade::directive('livewireAceScripts', function () {

            $defaultTheme = config('ace.defaults.theme');
            $defaultLanguage = config('ace.defaults.language');

            $scripts = [
                '<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" crossorigin="anonymous"></script>',
                <<<HTML
<script>
    function EditorData() {
        return {
            data: {},
            init(element, wire, lw) {
                if (!ace) {
                    console.error('Ace editor is not available in window.');
                    return;
                }

                const editor = ace.edit(element);
                editor.session.setValue(lw.value);

                if ("$defaultTheme") {
                    editor.setTheme('ace/theme/' + "$defaultTheme");
                }

                if ("$defaultLanguage") {
                    editor.session.setMode('ace/mode/' + "$defaultLanguage");
                }

                editor.session.on('change', () => {
                    lw.value = editor.getValue();
                });

                lw.on('changeLanguage', () => {
                   console.log(lw.language);
                });

                lw.on('changeTheme', () => {
                   console.log(lw.theme);
                });
            }
        }
    }
</script>
HTML
            ];

            $toAsset = fn($name) => '<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/' . $name . '.min.js" crossorigin="anonymous"></script>';

            $assets = array_merge(
                $scripts,
                array_map(fn($mode) => $toAsset('mode-' . $mode), config('ace.assets.modes')),
                array_map(fn($mode) => $toAsset('theme-' . $mode), config('ace.assets.themes')),
            );

            return implode(PHP_EOL, $assets);
        });
    }

}
