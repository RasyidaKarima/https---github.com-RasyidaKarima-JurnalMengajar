<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Files\LocalTemporaryFile;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Carbon\Carbon;

class AbsenExport implements FromArray, WithEvents, WithCustomStartCell
{
    public $jumlahbaris = 0;
    public $getlastitemcount = 0;
    public $calledByEvent = false;
    use Exportable;
    /**
     * @return \Illuminate\Support\Array
     */
    public $arr_absens;
    public function __construct($arr_absens)
    {
        $this->arr_absens = $arr_absens;
    }
    public function array(): array
    {
        if ($this->calledByEvent) {
            return $this->arr_absens;
        }
        return [];
    }

    public function startCell(): string
    {
        return 'A15';
    }
    public function registerEvents(): array
    {
        return [
            BeforeWriting::class => function (BeforeWriting $event) {
                $templateFile = new LocalTemporaryFile(storage_path('app/template_absen.xlsx'));
                $event->writer->reopen($templateFile, ExcelExcel::XLSX);
                $event->writer->getSheetByIndex(0);
                $this->calledByEvent = true; // set the flag
                $event->writer->getSheetByIndex(0)->export($event->getConcernable()); // call the export on the first sheet

                return $event->getWriter()->getSheetByIndex(0);
            },
            AfterSheet::class => function (AfterSheet $event) {
                $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
                $event->sheet->getDelegate()->getCell('C12')->setValue($today);
                $this->getlastitemcount = ((count($this->arr_absens) - 1) + 15);
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ];
                $event->sheet->getStyle('A15:F' . $this->getlastitemcount)->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('A15:F' . $this->getlastitemcount)->getFont()->setName("Times New Roman")->setSize('11');
                $event->sheet->getDelegate()->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
                $event->sheet->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $tandatangancount = $this->getlastitemcount + 5;
                // $event->sheet->getDelegate()->mergeCells($tandatangancell);
                $today = Carbon::now()->isoFormat('D-m-Y');
                $event->sheet->getDelegate()->getCell('E' . $tandatangancount)->setValue('Gandusari, ' . $today);
                $event->sheet->getDelegate()->getStyle('E' . $tandatangancount)->getFont()->setName("Times New Roman")->setSize('11');
                $kepalasekolahcount = $tandatangancount + 1;
                // $event->sheet->getDelegate()->mergeCells('E' . $kepalasekolahcount . ':F' . $kepalasekolahcount);
                $event->sheet->getDelegate()->getCell('E' . $kepalasekolahcount)->setValue('Kepala UPT SD BUTUN 02');
                $event->sheet->getDelegate()->getStyle('E' . $kepalasekolahcount)->getFont()->setName("Times New Roman")->setSize('11');
                $kecamatancount = $kepalasekolahcount + 1;
                // $event->sheet->getDelegate()->mergeCells('E' . $kecamatancount . ':F' . $kecamatancount);
                $event->sheet->getDelegate()->getCell('E' . $kecamatancount)->setValue('Kec. Gandusari');
                $event->sheet->getDelegate()->getStyle('E' . $kecamatancount)->getFont()->setName("Times New Roman")->setSize('11');
                $kepsekcount = $kecamatancount + 4;
                $event->sheet->getDelegate()->getCell('E' . $kepsekcount)->setValue('Dra. EKO ENDANG IRIANI');
                $event->sheet->getDelegate()->getStyle('E' . $kepsekcount)->getFont()->setName("Times New Roman")->setSize('11')->setBold(true)->setUnderline(true);
                $nipkepsekcount = $kepsekcount + 1;
                $event->sheet->getDelegate()->getCell('E' . $nipkepsekcount)->setValue('NIP. 196203161980102001');
                $event->sheet->getDelegate()->getStyle('E' . $nipkepsekcount)->getFont()->setName("Times New Roman")->setSize('11');
            }
        ];
    }
}
