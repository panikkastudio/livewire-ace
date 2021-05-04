<?php


namespace Panikka\LivewireAce;

use Illuminate\Support\ServiceProvider;

class LivewireAceServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . "/../resources/views", "livewire-ace");

        \Blade::directive('livewireAceScripts', function () {
            // TODO: Based on config.
            $assets = [
                '<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" integrity="sha512-GZ1RIgZaSc8rnco/8CXfRdCpDxRCphenIiZ2ztLy3XQfCbQUSCuk8IudvNHxkRA3oUg6q0qejgN/qqyG1duv5Q==" crossorigin="anonymous"></script>',
                '<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/mode-javascript.min.js" integrity="sha512-ZxMbXDxB0Whct+zt+DeW/RZaBv33N5D7myNFtBGiqpDSFRLxn2CNp6An0A1zUAJU/+bl8CMVrwxwnFcpFi3yTQ==" crossorigin="anonymous"></script>',
                '<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/theme-dracula.min.js" integrity="sha512-ZmGpsGwcrOLdQNP/+dVnJ7E/7cHpDXHAhwJCq514151OQqzqqInfTDX3FkOdy+mZhXwagfVgV7ybBzNZyrZJ5Q==" crossorigin="anonymous"></script>',
                <<<'HTML'
<script>
    function EditorData() {
        return {
            data: {},
            init(element, wire) {
                console.log(wire);
                const editor = ace.edit(element);
                editor.setTheme('ace/theme/dracula');
                editor.session.setMode('ace/mode/javascript');
                editor.session.on('change', async () => {
                    const value = editor.getValue();
                    await wire.onUpdate(value); // TODO: Debounce.
                });
            }
        }
    }
</script>
HTML
            ];

            return implode(PHP_EOL, $assets);
        });
    }

    public function register()
    {

    }

}
