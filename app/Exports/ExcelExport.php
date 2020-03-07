<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExport implements FromArray,WithHeadings
{
    protected $header;
    protected $data;

    public function __construct(array $data, array $header)
    {
        $this->header = $header;
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return $this->header;
    }
}
