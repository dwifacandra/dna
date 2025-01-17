<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CoreHelper extends Command
{
    protected $signature = 'dna:helper';
    protected $description = 'Create Filament Forms & Tables';

    public function handle()
    {
        $namespace = $this->ask('Enter the full namespace (e.g., Core\\Resources\\UserResource)');
        $fullNamespace = 'App\\' . $namespace;
        $path = app_path();
        $namespacePath = str_replace('\\', '/', $namespace);
        $fullPath = "{$path}/{$namespacePath}";
        $className = $this->getClassName($namespace);
        $option = $this->choice('Select the option for the class', [
            'All',
            'Forms',
            'Tables',
            'Filters',
            'Groups',
            'Actions',
            'BulkActions',
        ]);
        if ($option === 'All') {
            $this->createClassFile($fullPath, $fullNamespace, $className, 'Forms');
            $this->createClassFile($fullPath, $fullNamespace, $className, 'Tables');
            $this->createClassFile($fullPath, $fullNamespace, $className, 'Filters');
            $this->createClassFile($fullPath, $fullNamespace, $className, 'Groups');
            $this->createClassFile($fullPath, $fullNamespace, $className, 'Actions');
            $this->createClassFile($fullPath, $fullNamespace, $className, 'BulkActions');
        } else {
            $this->createClassFile($fullPath, $fullNamespace, $className, $option);
        }
    }

    protected function getClassName($namespace)
    {
        $parts = explode('\\', $namespace);
        $className = end($parts);

        return preg_replace('/Resource$/', '', $className);
    }

    protected function createClassFile($fullPath, $fullNamespace, $className, $option)
    {
        if ($option === 'Forms') {
            $content = "<?php\n\n";
            if ($fullNamespace) {
                $content .= "namespace {$fullNamespace}\Forms;\n\n";
            }
            $fullPath = $fullPath . '/Forms';
            $className = $className . "FormSchemes";
            $content .= "use Filament\Forms\Components\{TextInput, DateTimePicker, RichEditor, FileUpload};\n\n";
            $content .= "class {$className} {\n";
            $content .= "    public static function getOptions(): array\n";
            $content .= "    {\n";
            $content .= "        return [];\n";
            $content .= "    }\n\n";
            $content .= "}\n";
        } elseif ($option === 'Tables') {
            $content = "<?php\n\n";
            if ($fullNamespace) {
                $content .= "namespace {$fullNamespace}\Tables;\n\n";
            }
            $fullPath = $fullPath . '/Tables';
            $className = $className . "TableColumns";
            $content .= "use Filament\Tables\Columns\{Layout\Split, Layout\Stack, ImageColumn, TextColumn};\n\n";
            $content .= "class {$className} {\n";
            $content .= "    public static function getOptions(): array\n";
            $content .= "    {\n";
            $content .= "       return [Split::make([Stack::make([])])];\n";
            $content .= "    }\n\n";
            $content .= "}\n";
        } elseif ($option === 'Filters') {
            $content = "<?php\n\n";
            if ($fullNamespace) {
                $content .= "namespace {$fullNamespace}\Tables;\n\n";
            }
            $fullPath = $fullPath . '/Tables';
            $className = $className . "TableFilters";
            $content .= "class {$className} {\n";
            $content .= "    public static function getOptions(): array\n";
            $content .= "    {\n";
            $content .= "       return [];\n";
            $content .= "    }\n\n";
            $content .= "}\n";
        } elseif ($option === 'Groups') {
            $content = "<?php\n\n";
            if ($fullNamespace) {
                $content .= "namespace {$fullNamespace}\Tables;\n\n";
            }
            $fullPath = $fullPath . '/Tables';
            $className = $className . "TableGroups";
            $content .= "class {$className} {\n";
            $content .= "    public static function getOptions(): array\n";
            $content .= "    {\n";
            $content .= "       return [];\n";
            $content .= "    }\n\n";
            $content .= "}\n";
        } elseif ($option === 'Actions') {
            $content = "<?php\n\n";
            if ($fullNamespace) {
                $content .= "namespace {$fullNamespace}\Tables;\n\n";
            }
            $fullPath = $fullPath . '/Tables';
            $className = $className . "TableActions";
            $content .= "use App\Core\Traits\DefaultOptions;\n\n";
            $content .= "class {$className} {\n";
            $content .= "    public static function getOptions(): array\n";
            $content .= "    {\n";
            $content .= "       return DefaultOptions::getActionGroups();\n";
            $content .= "    }\n\n";
            $content .= "}\n";
        } elseif ($option === 'BulkActions') {
            $content = "<?php\n\n";
            if ($fullNamespace) {
                $content .= "namespace {$fullNamespace}\Tables;\n\n";
            }
            $fullPath = $fullPath . '/Tables';
            $className = $className . "TableBulkActions";
            $content .= "use App\Core\Traits\DefaultOptions;\n\n";
            $content .= "class {$className} {\n";
            $content .= "    public static function getOptions(): array\n";
            $content .= "    {\n";
            $content .= "       return DefaultOptions::getBulkActionGroups();\n";
            $content .= "    }\n\n";
            $content .= "}\n";
        }
        $filePath = $fullPath . '/' . $className . '.php';
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }
        if (File::exists($filePath)) {
            $this->error("Class {$className} already exists!");
            return;
        }
        File::put($filePath, $content);
        $this->info("Class {$className} created successfully in {$fullPath}.");
    }
}
