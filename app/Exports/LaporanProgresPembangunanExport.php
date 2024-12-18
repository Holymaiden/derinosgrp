<?php

namespace App\Exports;

use App\Helpers\Helpers;
use App\Models\MasterPerumahan;
use App\Models\ProgressBlock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class LaporanProgresPembangunanExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnFormatting, WithEvents
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

        $latestData = DB::table('progress_block')
            ->select(DB::raw('MAX(id) as latest_id'))
            ->where('perumahan_id', $this->perumahan_id)
            ->groupBy('blok_id');

        $data = ProgressBlock::where('perumahan_id', $this->perumahan_id)->with('block')->joinSub($latestData, 'latest', function ($join) {
            $join->on('progress_block.id', '=', 'latest.latest_id');
        })->select('progress_block.*')->orderBy('date', 'desc')->get();

        return $data;
    }

    public function headings(): array
    {
        $today = Carbon::now()->format('d-m-Y');
        $data = MasterPerumahan::find($this->perumahan_id);
        return [
            ['DAFTAR PROSES PEMBANGUNAN ' . strtoupper($data->nama_perumahan)],
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
                'BLOK',
                'UPDATE TERAKHIR',
                'PROGRESS',
                'STATUS',
                'KET',
            ]
        ];
    }

    public function map($data): array
    {


        return [
            $data->id,
            strtoupper($data->block->kode ?? ''),
            date('Y-m-d', strtotime($data->date)),
            ($data->progress  ?? '0') . '%',
            Helpers::getStatus($data->status),
            $data->ket
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
