<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CustomersPhoneExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all([
            'ID',
            'phone_number',
            
        ]);
    }
	public function headings(): array
    {
        return [
            'ID',
            'PHONE NUMBER',
        ];
    }
   
}
