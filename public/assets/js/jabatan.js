var save_method; //for save method string
var table;

table = $('#tabel-jabatan').DataTable({ 
	"destroy": true,
	dom: 'Bfrtip',
	lengthMenu: [
		[ 10, 25, 50, -1 ],
		[ '10 rows', '25 rows', '50 rows', 'Show all' ]
	],
	buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print','pageLength'
	],
	// "oLanguage": {
		// "sProcessing": '<center><img src="<?= base_url("assets/");?>assets/img/fb.gif" style="width:2%;"> Loading Data</center>',
	// },
	"responsive": true,
	"sort":false,
	"processing": true, //Feature control the processing indicator.
	"serverSide": true, //Feature control DataTables' server-side processing mode.
	"order": [], //Initial no order.
	// Load data for the table's content from an Ajax source
	"ajax": {
		"url": "ajax_list_jabatan/",
		"type": "POST"
	},
	//Set column definition initialisation properties.
	"columnDefs": [
	{ 
		"targets": [ -1 ], //last column
		"orderable": false, //set not orderable
	},
	],
	"initComplete": function(settings, json) {
		$("#process").html("<i class='glyphicon glyphicon-search'></i> Process")
		$(".btn").attr("disabled", false);
		$("#isidata").fadeIn();
	}
});

$("#jab_tambah").click(function(){
	$("#jab_id").val(0);
	$('#modal_jabatan').modal({
		show: true,
		keyboard: false,
		backdrop: 'static'
	});
});

$("#jab_simpan").click(function(){
	var dataString = $("#frm_jabatan").serialize();
	$("#jab_simpan").html("Menyimpan...");
	$(".btn").attr("disabled", true);
	$.ajax({
       type: "POST",
		url: "simpan",  
		data: dataString,
		success: function(d) 
        {
			var res = JSON.parse(d);
			var msg = "";
			// alert(d+ " - " + res.status);
			if (res.status == 1)
			{
				msg = res.desc;
			}
			else
			{
				msg = res.desc + "["+res.err+"]";
			}
			$("#modal_jabatan").modal("hide");
			$("#pesan_info_ok").html(msg);
			$("#jab_simpan").html("Simpan");
			$(".btn").attr("disabled", false);
			$('#info_ok').modal({
				show: true,
				keyboard: false,
				backdrop: 'static'
			});
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
	
});

$("#ok_info_ok").click(function(){
	document.location.href="";
});

function hapus_jabatan(id)
{
	// alert(id);
	$("#idSts").val(id);
	$("#jdlKonfirm").html("Konfirmasi hapus data");
	$("#isiKonfirm").html("Yakin ingin menghapus data ini ?");
	$("#frmKonfirm").modal({
		show: true,
		keyboard: false,
		backdrop: 'static'
	});
}

function ubah_jabatan(id)
{
	$.ajax({
		type	: "POST",
		url		: "cari",
		data	: "jab_id="+id,
		dataType : "json",				  
		success	: function(data){
			$("#jab_id").val(data.jab_id);
			$("#jab_nama").val(data.jab_nama);
			$("#jab_jenis").val(data.jab_jenis);
			$(".inputan").attr("disabled",false);
			$("#modal_jabatan").modal({
				show: true,
				keyboard: false,
				backdrop: 'static'
			});
			return false;
		}
	});
}

$("#yaKonfirm").click(function(){
	var id = $("#idSts").val();
	// alert(id);
	$("#isiKonfirm").html("Sedang menghapus data...");
	$(".btn").attr("disabled", true);
	$.ajax({
       type: "GET",
		url: "hapus/"+id,  
		success: function(d) 
        {
			var res = JSON.parse(d);
			var msg = "";
			// alert(d+ " - " + res.status);
			if (res.status == 1)
			{
				msg = res.desc;
			}
			else
			{
				msg = res.desc + "["+res.err+"]";
			}
			$("#isiKonfirm").html(msg);
			$(".utama").hide();
			$(".cadangan").show();
			$(".btn").attr("disabled", false);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
});