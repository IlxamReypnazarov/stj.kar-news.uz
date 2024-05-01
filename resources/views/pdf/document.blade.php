<!DOCTYPE html>
<html>

<head>
    <title>{{ 'Document' }}</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .container {
            margin: 0%
        }
        .column {
            float: left;
            width: 33.33%;
            height: auto;
        }
        .col {
            float: left;
            width: 70%;
            height: 300px;
        }
        .cod {
            float: left;
            width: 30%;
            height: 300px;
            padding: 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <center>
                    <p>BERDAQ NOMIDAGI QORAQALPOQ DAVLAT UNIVERSITETI</p>
                </center>
            </div>
            <div class="column">
                <center><img src="files/photo.png" width="90" height="90"></center>
            </div>
            <div class="column">
                <center>
                    <p>O‘ZBEKISTON RESPUBLIKASI OLIY TA’LIM, FAN VA INNOVATSIYALAR VAZIRLIGI</p>
                </center>
            </div>
        </div>
    </div>
    <center>
        <h3>YO‘LLANMA</h3>
    </center>
    <div class="container">
        <font size="4" face="Courier New">
            <table style="width: 100%">
                <tr>
                    <td><b>Hujjat raqami</b></td>
                    <td>{{ $id }}</td>
                </tr>
                <tr>
                    <td><b>Berilgan sanasi</b></td>
                    <td>{{ $created_at }}</td>
                </tr>
                <tr>
                    <td><b>F.I.SH</b></td>
                    <td>{{ $lastname . ' ' . $firstname }}</td>
                </tr>
                <tr>
                    <td><b>JSHSHIR raqami</b></td>
                    <td>{{ $jshshir }}</td>
                </tr>
                <tr>
                    <td><b>Fakulteti</b></td>
                    <td>{{ $faculty_name . ' fakulteti' }}</td>
                </tr>
                <tr>
                    <td><b>Ta'lim yo'nalishi</b></td>
                    <td>{{ $profession_name }}</td>
                </tr>
                <tr>
                    <td><b>Guruhi</b></td>
                    <td>{{ $group_name }}</td>
                </tr>
                <tr>
                    <td><b>Hudud</b></td>
                    <td>Qoraqalpog'iston Respublikasi</td>
                </tr>
                <tr>
                    <td><b>Tuman(Shahar)</b></td>
                    <td>Nukus shahri</td>
                </tr>
                <tr>
                    <td><b>Manzil</b></td>
                    <td>Nukus shaxri Ch. Abdirov 1A</td>
                </tr>
                <tr>
                    <td><b>Talaba joylashgan qavat</b></td>
                    <td>{{ $floor_number . ' - qavat' }}</td>
                </tr>
                <tr>
                    <td><b>Talaba joylashgan xona</b></td>
                    <td>{{ $room_number . ' - xona' }}</td>
                </tr>
            </table>
        </font>
    </div>
    <div class="row">
        <div class="col">
            <p>Mazkur hujjat Vazirlar Mahkamasining 2017 yil 15 sentyabrdagi
                728-son qaroriga muvofiq Yagona interaktiv davlat xizmatlari
                portalida shakllantirilgan elektron hujjatning nusxasi bo‘lib,
                davlat organlari tomonidan ushbu hujjatni qabul qilishni rad
                etishlari qat’iyan taqiqlanadi.</p>
        </div>
        <div class="cod">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::size(100)->generate('http://google.com/')) !!} ">
        </div>
    </div>
</body>

</html>
