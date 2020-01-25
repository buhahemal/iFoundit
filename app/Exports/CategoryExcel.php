<?php

namespace App\Exports;
use App\category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;
use Session;

class CategoryExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return DB::table('icategory')->select('Category_Name','created_at')->get();

    }
    public function headings(): array
    {
        return [
            'CategoryName',
            'Create_Date',
        ];
    }
}
