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
            ['name'	=>	'KTP','keterangan' => 'Kartu Tanda Penduduk'],
            ['name' =>  'KK','keterangan' => 'Kartu Keluarga'],
            ['name' =>  'SN','keterangan' => 'Surat Nikah'],
            ['name' =>  'PP','keterangan' => 'Pas Photo'],
            ['name' =>  'RKB','keterangan' => 'Rekening Koran Bank'],
            ['name' =>  'SKJ','keterangan' => 'Surat keterangan Kerja Asli'],
            ['name' =>  'DSG','keterangan' => 'Daftar Slip Gaji'],
            ['name' =>  'SK','keterangan' => 'SK Pengangkatan PNS'],
            ['name' =>  'KP','keterangan' => 'Kartu Pegawai'],
            ['name' =>  'NPWP','keterangan' => 'Nomor Pokok Wajib Pajak'],
            ['name' =>  'SIUP','keterangan' => 'SITU / SIUP / TDP'],
            ['name' =>  'IP','keterangan' => 'Photocopy Izin Praktek'],
            ['name' =>  'AKP','keterangan' => 'Akte Perusahaan'],
            ['name' =>  'SKBM','keterangan' => 'Surat Keterangan Belum Memiliki Rumah Dari Lurah'],
        ];

        DB::table('document_types')->insert($documentTypes);

        $this->command->info('Create Document Types!');
    }
}
