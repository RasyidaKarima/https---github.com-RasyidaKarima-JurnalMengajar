<?php

namespace App\Exports;

use App\Models\Jurnal;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Files\LocalTemporaryFile;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class JurnalExport implements FromCollection, WithEvents, WithCustomStartCell
{
    public $jumlahbaris = 0;
    public $getlastitemcount = 0;
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct()
    {
        $this->calledByEvent = false;
    }
    public function collection()
    {
        if ($this->calledByEvent) {
            $this->jumlahbaris = Jurnal::all()->count();
            return Jurnal::all(['id', 'nama', 'kelas', 'uraian_tugas', 'hasil', 'kendala', 'tindak_lanjut']);
            // return Jurnal::all();
        }
        return collect([]);
    }
    public function registerEvents(): array
    {
        return [
            BeforeWriting::class => function (BeforeWriting $event) {
                $templateFile = new LocalTemporaryFile(storage_path('app/template.xlsx'));
                $event->writer->reopen($templateFile, Excel::XLSX);
                $event->writer->getSheetByIndex(0);
                $this->calledByEvent = true; // set the flag
                $event->writer->getSheetByIndex(0)->export($event->getConcernable()); // call the export on the first sheet

                return $event->getWriter()->getSheetByIndex(0);
            },
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getCell('C11')->setValue(date('l, d F Y'));
                $this->getlastitemcount = ((Jurnal::all()->count() - 1) + 15);
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ];
                $event->sheet->getStyle('A15:G' . $this->getlastitemcount)->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('A15:G' . $this->getlastitemcount)->getFont()->setName("Times New Roman")->setSize('11');
                $event->sheet->getDelegate()->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
                $event->sheet->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $tandatangancount = $this->getlastitemcount + 5;
                $tandatangancell = 'E' . $tandatangancount . ':F' . $tandatangancount;
                // $event->sheet->getDelegate()->mergeCells($tandatangancell);
                $event->sheet->getDelegate()->getCell('E' . $tandatangancount)->setValue('Gandusari, ' . date('d F Y'));
                $event->sheet->getDelegate()->getStyle('E' . $tandatangancount)->getFont()->setName("Times New Roman")->setSize('11');
                $kepalasekolahcount = $tandatangancount + 1;
                // $event->sheet->getDelegate()->mergeCells('E' . $kepalasekolahcount . ':F' . $kepalasekolahcount);
                $event->sheet->getDelegate()->getCell('E' . $kepalasekolahcount)->setValue('Kepala UPT SD BUTUN 03');
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
    public function startCell(): string
    {
        return 'A15';
    }
}
