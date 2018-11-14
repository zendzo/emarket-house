<?php

use Illuminate\Database\Seeder;
use App\DocumentType;

class DocumentTypesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentTypes = [
            'KTP',
            'Kartu Keluarga',
            'Rekening Listrik'
        ];

        foreach ($documentTypes as $document) {
            DocumentType::create(['name' => $document]);
        }

        $this->command->info('Create Document Types!');
    }
}
