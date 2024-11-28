<?php

namespace App\Exports;

use App\Models\Blok;
use App\Models\Rab;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use App\Models\MasterPerumahan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class LaporanRabDetailExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnFormatting, WithEvents
{
    public $perumahan_id, $blok_id;
    public function __construct($perumahan_id, $blok_id)
    {
        $this->perumahan_id = $perumahan_id;
        $this->blok_id = $blok_id;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Rab::where('perumahan_id', $this->perumahan_id)
            ->where('blok_id', $this->blok_id)
            ->with(['masterRab', 'block'])->get();

        return $data;
    }

    public function headings(): array
    {
        $today = Carbon::now()->format('d-m-Y');
        $master  = MasterPerumahan::find($this->perumahan_id)->first();
        $data = Blok::find($this->blok_id)->first();

        return [
            ['DAFTAR RANCANGAN ANGGARA BIAYA ' . strtoupper($master->nama_perumahan) . ' BLOK ' . strtoupper($data->kode)],
            [''],
            [
                '',
                '',
                '',
                '',
                'Tgl Update : ',
                $today,
            ],
            [
                'NO',
                'NAMA RAB',
                'JUMLAH',
                'SATUAN',
                'HARGA',
                'TOTAL',
                'KET',
            ]
        ];
    }

    public function map($data): array
    {


        return [
            $data->id,
            $data->masterRab->name ?? '',
            $data->amount,
            $data->satuan ?? '',
            $data->price,
            $data->total,
            $data->noted
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A4:G' . ($sheet->getHighestRow()))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        return [
            1 => ['font' => ['bold' => true]], // Membuat header tebal
            4 => ['font' => ['bold' => true]], // Membuat header tebal
            'B' => ['font' => ['italic' => true]], // Mengatur kolom B (nama customer) menjadi italic
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => '0', // Format column A as plain text (optional)
            'B' => '0', // Format column B as plain text (optional)
            'C' => '0', // Format column C as plain text (optional)
            // Add more columns as needed
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);

                $event->sheet->getDelegate()->mergeCells('A1:G1');
                $event->sheet->getDelegate()->getStyle('A1:G1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('G')->setAutoSize(true);
                // Tambahkan baris di atas sesuai dengan jumlah kolom yang Anda miliki
            },
        ];
    }
}
