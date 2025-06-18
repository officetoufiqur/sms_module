<?php

namespace App\Imports;

use App\Models\SmsFile;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SmsImport implements ToCollection
{
    protected $message;
    protected $senderId;
    protected $gender;
    protected $age;

    public function __construct($message, $senderId, $gender, $age)
    {
        $this->message = $message;
        $this->senderId = $senderId;
        $this->gender = $gender;
        $this->age = $age;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            // Skip header row
            if ($index === 0 && is_string($row[0])) continue;

            $name = trim($row[0] ?? '');
            $number = trim($row[1] ?? '');

            // Skip empty number
            if (empty($number)) continue;

            SmsFile::create([
                'name' => $name,
                'number' => $number,
                'message' => $this->message,
                'sender_id' => $this->senderId,
                'gender' => $this->gender,
                'age' => $this->age
            ]);

            
        }
    }
}
