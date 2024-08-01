<?php

namespace App\Traits;

use App\Exports\ExcelExport;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

trait ExportableTrait
{
    public $exportExtension = '.xlsx';

    public function whenExport(): bool
    {
        return request('export_excel') ?? false;
    }

    public function handleExport($queryBuilder, $fields, $export_file_name = null)
    {
        return Excel::download(
            new ExcelExport($queryBuilder->get(), $fields),
            $this->getExportFileNameFormat(class_basename($queryBuilder->getModel()), $export_file_name)
        );
    }

    protected function getExportFileNameFormat(string $class_basename, ?string $export_file_name): string
    {
        return ($export_file_name ?? Str::plural(Str::lower($class_basename))) . $this->exportExtension;
    }
}
