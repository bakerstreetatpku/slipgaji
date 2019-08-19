var save_method; //for save method string
var table;

table = $('#tabel-penilaian').DataTable({ 
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
		"url": "ajax_list_penilaian/",
		"type": "POST"
	},
	//Set column definition initialisation properties.
	"columnDefs": [
	{ 
		"targets": [ -1 ], //last column
		"orderable": false, //set not orderable
	},
	{ 
		"targets": [ 1,4 ], //last column
		"className": "text-center", //set aligned right
	},
	],
	"initComplete": function(settings, json) {
		$("#process").html("<i class='glyphicon glyphicon-search'></i> Process")
		$(".btn").attr("disabled", false);
		$("#isidata").fadeIn();
	}
});

$("#nkj_tambah").click(function(){
	$("#nkj_id").val(0);
	$('#modal_penilaian').modal({
		show: true,
		keyboard: false,
		backdrop: 'static'
	});
});

$("#nkj_peg_id").change(function(){
	var id = $("#nkj_peg_id").val();
	var jns = $("#nkj_peg_id option:selected").attr("jenis");
	$("#nkj_jenis").val(jns);
});

$(".krtd").click(function(){
	var max = $("#jmlkrt").val();
	var total = 0;
	for (i=1;i<max;i++)
	{
		if ($("#krt"+i).is(":checked"))
		{
			total += parseInt($("#krt"+i).attr("nilai"));
		}
	}
	$("#nkj_nilai").val(total);
});

$("#nkj_simpan").click(function(){
	var dataString = $("#frm_penilaian").serialize();
	// alert(dataString);
	$("#nkj_simpan").html("Menyimpan...");
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
			$("#modal_penilaian").modal("hide");
			$("#pesan_info_ok").html(msg);
			$("#nkj_simpan").html("Simpan");
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

function lihat_penilaian(id)
{
	$("#pesan_info_ok").css("overflowY","auto");
	$("#pesan_info_ok").css("height","400");
	$("#info_ok .modal-dialog").addClass("modal-lg");
	$.get("lihat/"+id, {}, function(d){
		$("#pesan_info_ok").html(d);
	});
	$("#info_ok").modal({
		show: true,
		keyboard: false,
		backdrop: 'static'
	});
}

function hapus_penilaian(id)
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

function ubah_penilaian(id)
{
	$.ajax({
		type	: "POST",
		url		: "cari",
		data	: "nkj_id="+id,
		dataType : "json",				  
		success	: function(data){
			$("#nkj_id").val(data.nkj_id);
			$("#nkj_peg_id").val(data.nkj_peg_id);
			$("#nkj_jenis").val(data.nkj_jenis);
			$("#nkj_tgl").val(data.nkj_tgl);
			$(".inputan").attr("disabled",false);
			$("#modal_penilaian").modal({
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

$('.tgl').daterangepicker({
	locale: {
	  format: 'DD/MM/YYYY'
	},
	singleDatePicker: true,
	"autoApply": true,
	opens: 'left'
});