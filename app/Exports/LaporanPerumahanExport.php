<?php

namespace App\Exports;

use App\Models\Blok;
use App\Models\Customer;
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

class LaporanPerumahanExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnFormatting, WithEvents
{
    public $perumahan_id;
    public function __construct($perumahan_id)
    {
        $this->perumahan_id = $perumahan_id;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Blok::where('perumahan_id', $this->perumahan_id)->with(['status_blok', 'customer.marketing'])->get();

        return $data;
    }

    public function headings(): array
    {
        $today = Carbon::now()->format('d-m-Y');
        return [
            ['DAFTAR BERKAS PROSES PERUMAHAN ARRAIN RESIDENCE 2 BANK BTN KC MAKASSAR'],
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
                'NAMA USER',
                'BLOK',
                'NAMA MARKETING',
                'STATUS',
                'KET',
            ]
        ];
    }

    public function map($data): array
    {


        return [
            $data->id,
            $data->customer->nama ?? '',
            strtoupper($data->kode),
            $data->customer->marketing->nama ?? '',
            $data->status_blok->status,
            $data->keterangan
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A4:F' . ($sheet->getHighestRow()))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

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

                $event->sheet->getDelegate()->mergeCells('A1:F1');
                $event->sheet->getDelegate()->getStyle('A1:F1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('F')->setAutoSize(true);
                // Tambahkan baris di atas sesuai dengan jumlah kolom yang Anda miliki
            },
        ];
    }
}
