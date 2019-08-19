var save_method; //for save method string
var table;

table = $('#tabel-gaji').DataTable({ 
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
	"processing": true //Feature control the processing indicator.
});

$("#gj_tambah").click(function(){
	$("#gj_id").val(0);
	$('#modal_gaji').modal({
		show: true,
		keyboard: false,
		backdrop: 'static'
	});
});

$("#gj_penempatan").change(function(){
	var isi = $(this).val();
	if (isi == "Prodi")
	{
		$("#inputProdi").show();
		$("#inputFakultas").hide();
	}
	else
	{
		$("#inputProdi").hide();
		$("#inputFakultas").show();
	}
		// alert(isi);
});
var hdr = $("#hdr").val();
$("#frm_gaji").submit(function(e){
	// var dataString = $("#frm_gaji").serialize();
	e.preventDefault();
	$("#gj_simpan").html("Menyimpan...");
	$(".btn").attr("disabled", true);
	$.ajax({
       type: "POST",
		url: hdr+"/gaji/store",  
		data: new FormData(this),
		processData: false,
		contentType: false,
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
			$("#modal_gaji").modal("hide");
			$("#pesan_info_ok").html(msg);
			$("#gj_simpan").html("Simpan");
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

function hapus_gaji(id)
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

function ubah_gaji(id)
{
	var token = $("#_token").val();
	// alert(token);
	$.ajax({
		type	: "POST",
		url		: hdr+"/gaji/cari",
		data	: "gj_id="+id+"&_token="+token,
		dataType : "json",				  
		success	: function(data){
			// console.log(data);
			$("#gj_id").val(data[0].gj_id);
			$("#gj_makan").val(data[0].gj_makan);
			$("#gj_pokok").val(data[0].gj_pokok);
			$("#gj_peg_id").val(data[0].gj_peg_id);
			$("#gj_lembur").val(data[0].gj_lembur);
			$("#gj_transport").val(data[0].gj_transport);
				
			$(".inputan").attr("disabled",false);
			$("#modal_gaji").modal({
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
	var foto = $("#hapusfoto").val();
	var token = $("#_token").val();

	$("#isiKonfirm").html("Sedang menghapus data...");
	$(".btn").attr("disabled", true);
	$.ajax({
       type: "POST",
		url: hdr+"/gaji/hapus",  
		data	: "gj_id="+id+"&_token="+token,
		dataType : "json",				  
		success: function(res) 
        {
			var msg = "";
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
	showDropdowns: true,
	singleDatePicker: true,
	"autoApply": true,
	opens: 'left'
});