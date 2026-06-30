<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Laporan Kegiatan Ekstrakurikuler</title><style>body{font-family:Arial,sans-serif;padding:20px}.header{text-align:center;border-bottom:2px solid #3498db;padding-bottom:20px;margin-bottom:20px}.header h1{color:#2c3e50;margin:0}.header p{color:#666}table{width:100%;border-collapse:collapse}.table th{background:#3498db;color:white;padding:10px;text-align:left}.table td{padding:10px;border-bottom:1px solid #ddd}.footer{text-align:center;margin-top:30px;color:#666;font-size:12px;border-top:1px solid #ddd;padding-top:20px}</style></head>
<body><div class="header"><h1>LAPORAN KEGIATAN EKSTRAKURIKULER</h1><p>Dicetak: {{ date('d/m/Y H:i:s') }}</p></div>
<table class="table"><thead><tr><th>ID</th><th>Nama Kegiatan</th><th>Hari</th><th>Waktu</th><th>Pembina</th></tr></thead><tbody>@foreach($ekstrakurikuler as $item)<tr><td>{{ $item->id_kegiatan }}</td><td>{{ $item->nama_kegiatan }}</td><td>{{ $item->hari }}</td><td>{{ $item->waktu }}</td><td>{{ $item->pembina }}</td></tr>@endforeach</tbody></table>
<div class="footer"><p>&copy; {{ date('Y') }} EkstraKurikuler - UAS Rekayasa Web</p></div>
</body>
</html>