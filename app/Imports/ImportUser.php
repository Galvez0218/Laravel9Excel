<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportUser implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        #posicion en la que inicia
        return 1;
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // dd($row);
            User::create([
                'name' => $row[0],
                'email' => $row[1],
                'password' => Hash::make($row[2]),
            ]);
        }
    }
}
