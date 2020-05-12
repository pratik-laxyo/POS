<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
class CustomersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([

            // 'id' => $row[0],
            'first_name'     => $row[0],
            'last_name'    => $row[1], 
            'email'    => $row[2], 
            'phone_number'    => $row[3], 
            'address_1'    => $row[4], 
            'address_2'    => $row[5], 
            'city'    => $row[6], 
            'state'    => $row[7], 
            'postcode'    => $row[8], 
            'country'    => $row[9], 
            'comments'    => $row[10], 
            'gstin'    => $row[11], 
            'account_number'    => $row[12], 
            'gender'    => $row[13], 
            'status'    => $row[14], 
            // 'deleted_at'    => $row[15], 
            // 'created_at'    => $row[16], 
            // 'updated_at'    => $row[17], 
            // 'password' => \Hash::make('123456'),

        ]);
        
    }
    
    public function startRow(): int
        {
        return 2;
        }
}