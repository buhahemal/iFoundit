<?php

namespace App\Exports;

use App\iitems;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;


class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      return DB::table('iitems')
        ->leftJoin('icategory', 'iitems.Cat_id', '=', 'icategory.id')->select('Name','Description','Category_Name')->get();

    }
    public function headings(): array
    {
        return [
            'Name',
            'Description',
            'Category_Name',
        ];
    }
}
