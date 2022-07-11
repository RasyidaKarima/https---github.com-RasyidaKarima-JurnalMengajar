<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Export Jurnal</title>
  </head>
  <body>
    <div id="source-html">
        <h6>
            <center>PEMERINTAH KABUPATEN BLITAR</center>
            <center>DINAS PENDIDIKAN</center>
        </h6>
        <h4><center>UPT SD NEGERI BUTUN 02</center></h4>
        <h6><center>KECAMATAN GANDUSARI</center></h6>
        <h6><center>Jl. Diponegoro No. 03 Desa Butun Kec.Gandusari</center></h6>
        <h5><center>KABUPATEN BLITAR</center></h5>
        <h6>NAMA LEMBAGA    :</h6>
        <h6>HARI,   TANGGAL    : </h6>
        <table style="width: 100%;" border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Uraian Tugas</th>
                <th>Hasil</th>
                <th>Kendala</th>
                <th>Tindak Lanjut</th>
                <th>Foto Kegiatan</th>
            </tr>
            @foreach ($jurnal as $jurnal )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$jurnal->name}}</td>
                <td>{{$jurnal->tanggal}}</td>
                <td>{{$jurnal ->penjelasan}}</td>
                <td>{{$jurnal->hasil}}</td>
                <td>{{$jurnal->kendala}}</td>
                <td>{{$jurnal ->tindak_lanjut}}</td>
                <td>
                    <img src="{{ asset('images/jurnal/'.$jurnal->foto_kegiatan) }}" alt="{{ $jurnal->foto_kegiatan }}" class="img img-thumbnail" style="width: 50px ;">
                  </td>
            </tr>
            @endforeach
        </table>
        </div>

        <script>
            exportHTML();
            function exportHTML(){
            var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
                    "xmlns:w='urn:schemas-microsoft-com:office:word' "+
                    "xmlns='http://www.w3.org/TR/REC-html40'>"+
                    "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
            var footer = "</body></html>";
            var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;

            var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
            var fileDownload = document.createElement("a");
            document.body.appendChild(fileDownload);
            fileDownload.href = source;
            fileDownload.download = 'data_jurnal.doc';
            fileDownload.click();
            document.body.removeChild(fileDownload);
            }
        </script>
  </body>
</html>
