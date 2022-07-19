<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Export Jurnal</title>
  </head>
  <body>
    <div>
        <button onclick="Export2Doc('source-html', `data-jurnal-${date.getDate()}${date.getMonth() + 1}${date.getFullYear()}`);">Download Document</button>
        {{-- <button onclick="$('#source-html').wordExport();">Download Document</button> --}}
    </div>
    <div id="source-html" class="container-fluid">
        <h6>
            <center>PEMERINTAH KABUPATEN BLITAR</center>
            <center>DINAS PENDIDIKAN</center>
        </h6>
        <h4><center>UPT SD NEGERI BUTUN 02</center></h4>
        <h6><center>KECAMATAN GANDUSARI</center></h6>
        <h6><center>Jl. Diponegoro No. 03 Desa Butun Kec.Gandusari</center></h6>
        <h5><center>KABUPATEN BLITAR</center></h5>
        <h6>NAMA LEMBAGA    : UPT SD NEGERI BUTUN 02</h6>
        <h6>HARI,   TANGGAL    : </h6>
        <table style="width: 100%;" border="1">
            <thead>
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
            </thead>
            <tbody>
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
                            @if($jurnal->foto_kegiatan)
                            <img src="{{ asset('images/jurnal/'.$jurnal->foto_kegiatan) }}" alt="{{ $jurnal->foto_kegiatan }}" class="img img-thumbnail" style="width: 100px ;" width="100" height="100">
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>

        <div align="right">
            <img src="{{asset('images/absendatang/'. $ttdKepsek->foto)}}" style="height: 10rem; width: 10rem;" class="img" alt="" srcset="" width="100" height="100">
            <div style="width: 10rem">
                <h5>{{$ttdKepsek->name}}</h5>
                <p>NIP. {{$ttdKepsek->nip}}</p>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/FileSaver.js"></script>
    <script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/jquery.wordexport.js"></script>

    <script>
        const date = new Date();

        // Export2Doc('source-html', `data-jurnal-${date.getDate()}${date.getMonth() + 1}${date.getFullYear()}`);

        function Export2Doc(element, filename = '') {
            //  _html_ will be replace with custom html
            var meta= "Mime-Version: 1.0\nContent-Base: " + location.href + "\nContent-Type: Multipart/related; boundary=\"NEXT.ITEM-BOUNDARY\";type=\"text/html\"\n\n--NEXT.ITEM-BOUNDARY\nContent-Type: text/html; charset=\"utf-8\"\nContent-Location: " + location.href + "\n\n<!DOCTYPE html>\n<html>\n_html_</html>";
            //  _styles_ will be replaced with custome css
            var head= "<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n<style>\n_styles_\n</style>\n</head>\n";
            var html = document.getElementById(element).innerHTML ;

            var blob = new Blob(['\ufeff', html], {
                type: 'application/msword'
            });

            var  css = (
                '<style>' +
                'img {width:300px;}table {border-collapse: collapse; border-spacing: 0;}td{padding: 6px;}' +
                '</style>'
            );
            //  Image Area %%%%
            var options = { maxWidth: 624};
            var images = Array();
            var img = $("#"+element).find("img");
            for (var i = 0; i < img.length; i++) {
                // Calculate dimensions of output image
                var w = Math.min(img[i].width, options.maxWidth);
                var h = img[i].height * (w / img[i].width);
                // Create canvas for converting image to data URL
                var canvas = document.createElement("CANVAS");
                canvas.width = w;
                canvas.height = h;
                // Draw image to canvas
                var context = canvas.getContext('2d');
                context.drawImage(img[i], 0, 0, w, h);
                // Get data URL encoding of image
                var uri = canvas.toDataURL("image/png");
                $(img[i]).attr("src", img[i].src);
                img[i].width = w;
                img[i].height = h;
                // Save encoded image to array
                images[i] = {
                    type: uri.substring(uri.indexOf(":") + 1, uri.indexOf(";")),
                    encoding: uri.substring(uri.indexOf(";") + 1, uri.indexOf(",")),
                    location: $(img[i]).attr("src"),
                    data: uri.substring(uri.indexOf(",") + 1)
                };
            }

            // Prepare bottom of mhtml file with image data
            var imgMetaData = "\n";
            for (var i = 0; i < images.length; i++) {
                imgMetaData += "--NEXT.ITEM-BOUNDARY\n";
                imgMetaData += "Content-Location: " + images[i].location + "\n";
                imgMetaData += "Content-Type: " + images[i].type + "\n";
                imgMetaData += "Content-Transfer-Encoding: " + images[i].encoding + "\n\n";
                imgMetaData += images[i].data + "\n\n";

            }
            imgMetaData += "--NEXT.ITEM-BOUNDARY--";
            // end Image Area %%

            var output = meta.replace("_html_", head.replace("_styles_", css) +  html) + imgMetaData;

            var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(output);
            name = filename ? `${filename}.doc` : 'document.doc';


            var downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                navigator.msSaveOrOpenBlob(blob, name);
            } else {

                downloadLink.href = url;
                downloadLink.download = name;
                downloadLink.click();
            }

            document.body.removeChild(downloadLink);
        }
    </script>
  </body>
</html>
