<?php

namespace App\Exports;

use Carbon\Carbon;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Element\Field;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\SimpleType\TblWidth;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\JcTable;
use PhpOffice\PhpWord\Style\Table as StyleTable;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportJurnalWord {
    /**
     * Export word
     * @param $absen
     * @param $ttd
     * @return $file filename from storage.
     */
    public function exportWord($absen, $ttd)
    {
        $template = new TemplateProcessor(storage_path('app/template_jurnal.docx'));

        $template->setValue('date-jurnal', Carbon::now()->isoFormat('dddd, D MMMM Y'));
        $template->setValue('date-jurnal-2', Carbon::now()->isoFormat('D MMMM Y'));
        $template->setValue('headschol-name', $ttd->name);
        $template->setValue('headschol-nip', $ttd->nip);
        $template->setImageValue('ttd', public_path('images/signature/'. $ttd->tanda_tangan));

        $template->setComplexBlock('table', $this->makeTable($absen));

        foreach ($absen as $key => $value) {
            $template->setImageValue('img-'.$key , public_path("images/jurnal/". $value->foto_kegiatan));
        }

        $filename = '02. Jurnal Pembelajaran UPT SD Negeri Butun 02 Kec. Gandusari, '. Carbon::now()->isoFormat('DD-M-Y') .'.docx';
        $file = storage_path('app/'.$filename);
        $template->saveAs($file);
        return $file;
    }
    private function makeTable($datas)
    {
        $table = new Table(array('borderSize' => 5, 'borderColor' => 'black', 'alignment' => JcTable::CENTER, 'unit' => TblWidth::AUTO, 'layout' => StyleTable::LAYOUT_AUTO));

        // heading table
        $headingStyle = ['bgColor' => 'f7f7f7', 'font-family' => "Times New Roman"];
        $boldStyle = ['bold' => true, 'allCaps' => true];
        $table->addRow(null);
        $table->addCell(null, $headingStyle)->addText('No', $boldStyle);
        $table->addCell(2000, $headingStyle)->addText('Nama Guru / KS', $boldStyle);
        $table->addCell(null, $headingStyle)->addText('Kelas / Mapel', $boldStyle);
        $table->addCell(4000, $headingStyle)->addText('Uraian Tugas / Kegiatan', $boldStyle);
        $table->addCell(2500, $headingStyle)->addText('Hasil', $boldStyle);
        $table->addCell(2000, $headingStyle)->addText('Kendala', $boldStyle);
        $table->addCell(2000, $headingStyle)->addText('Tindak Lanjut', $boldStyle);
        $table->addCell(2500, $headingStyle)->addText('Foto Kegiatan', $boldStyle);

        foreach ($datas as $key => $value) {
            $table->addRow();
            $table->addCell(null)->addText($key+1 . ".");
            $table->addCell(2000)->addText($value->name);
            $table->addCell(null)->addText($value->kelas . " / " . $value->mapel ?? '-');
            $table->addCell(4000)->addText($value->penjelasan ?? '-');
            $table->addCell(2500)->addText($value->hasil ?? '-');
            $table->addCell(2000)->addText($value->kendala ?? '-');
            $table->addCell(2000)->addText($value->tinda_lanjut ?? '-');
            if ($value->foto_kegiatan) {
                $table->addCell(2500)->addText('${img-'.$key.'}');
                // $table->addCell(2500)->addImage(public_path("images/jurnal/". $value->foto_kegiatan), ['width' => 100,'height' => 100]);
            }else{
                $table->addCell(2500)->addText('-');
            }
        }

        return $table;
    }
}
