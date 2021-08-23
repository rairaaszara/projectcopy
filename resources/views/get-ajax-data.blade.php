<!doctype html>
<html>
<body>
<input type='text' id='search' name='search' placeholder='Enter kelasid 1-27'>
<input type='button' value='Search' id='btnSearch'>
<br/>
<input type='button' value='Fetch all records' id='fetchAllRecord'>
<table border='1' id='kelasTable' style='border-collapse: collapse;'>
<thead>
<tr>
<th>Id_Kelas</th>
<th>Nama_Kelas</th>
<th>Nama_Jurusan</th>
<th>Wali_Kelas</th>
</tr>
</thead>
<tbody></tbody>
</table>
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery CDN -->
<script type='text/javascript'>
$(document).ready(function(){
// Fetch all records
$('#fetchAllRecord').click(function(){
fetchRecords(0);
});
// Search by kelasid
$('#btnSearch').click(function(){
var kelasid = Number($('#search').val().trim());
if(kelasid > 0){
fetchRecords(kelasid);
}
});
});
function fetchRecords(id_kelas){
$.ajax({
url: 'kelas/{id}'+id_kelas,
type: 'get',
dataType: 'json',
success: function(response){
    console.log(response);
var len = 0;
$('#kelasTable tbody').empty(); // Empty <tbody>
if(response['data'] != null){
    len = response['data'].length;
}
if(len > 0){
for(var i=0; i<len; i++){
    console.log(i);
var id_kelas = response['data'][i].id_kelas;
var nama_kelas = response['data'][i].nama_kelas;
var nama_jurusan = response['data'][i].nama_jurusan;
var wali_kelas = response['data'][i].wali_kelas;
var tr_str = "<tr>" +
"<td align='center'>" + (i+1) + "</td>" +
"<td align='center'>" + nama_kelas + "</td>" +
"<td align='center'>" + nama_jurusan + "</td>" +
"<td align='center'>" + wali_kelas + "</td>" +
"</tr>";
$("#kelasTable tbody").append(tr_str);
}
}else if(response['data'] != null){
var tr_str = "<tr>" +
"<td align='center'>1</td>" +
"<td align='center'>" + response['data'].nama_kelas + "</td>" + 
"<td align='center'>" + response['data'].nama_jurusan + "</td>" +
"<td align='center'>" + response['data'].wali_kelas + "</td>" +
"</tr>";
$("#kelasTable tbody").append(tr_str);
}else{
var tr_str = "<tr>" +
"<td align='center' colspan='4'>No record found.</td>" +
"</tr>";
$("#kelasTable tbody").append(tr_str);
}
}
});
}
</script>
</body>
</html>