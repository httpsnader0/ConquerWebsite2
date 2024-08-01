<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use LaravelLang\Locales\Facades\Locales;

class GenerateLang extends Command
{
    protected $signature = 'generate:lang';

    protected $description = 'Translate Language Folder From PHP To JS';

    public function handle()
    {

        $this->output->progressStart(count(Locales::installed()));

        foreach (Locales::installed() as $locale) {

            app()->setLocale($locale->code);

            $path = lang_path($locale->code);

            $collection = collect(File::allFiles($path))->flatMap(function ($file, $locale) {
                return [($translation = $file->getBasename('.php')) => trans($translation, array(), null, $locale)];
            });

            $jsonFile = File::get(lang_path($locale->code . '.json'));
            foreach (json_decode($jsonFile) as $key => $value) {
                $collection->put($key, $value);
            }

            $data = 'export default ' . json_encode($collection->toArray());
            $path = resource_path("js/Lang/{$locale->code}.js");
            File::ensureDirectoryExists(resource_path("js/Lang"));
            if (!file_exists($path)) {
                touch($path);
            }
            file_put_contents($path, $data);

            $this->output->progressAdvance();
        }

        $this->output->progressFinish();
    }
}
