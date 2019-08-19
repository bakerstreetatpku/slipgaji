var save_method; //for save method string
var table;

table = $('#tabel-pimpinan').DataTable({ 
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
		"url": "ajax_list_pimpinan/",
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

$("#pim_tambah").click(function(){
	$("#pim_id").val(0);
	$('#modal_pimpinan').modal({
		show: true,
		keyboard: false,
		backdrop: 'static'
	});
});

$("#pim_penempatan").change(function(){
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

$("#frm_pimpinan").submit(function(e){
	// var dataString = $("#frm_pimpinan").serialize();
	e.preventDefault();
	$("#pim_simpan").html("Menyimpan...");
	$(".btn").attr("disabled", true);
	$.ajax({
       type: "POST",
		url: "simpan",  
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
			$("#modal_pimpinan").modal("hide");
			$("#pesan_info_ok").html(msg);
			$("#pim_simpan").html("Simpan");
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

function hapus_pimpinan(id, foto)
{
	// alert(id);
	$("#idSts").val(id);
	$("#hapusfoto").val(foto);
	$("#jdlKonfirm").html("Konfirmasi hapus data");
	$("#isiKonfirm").html("Yakin ingin menghapus data ini ?");
	$("#frmKonfirm").modal({
		show: true,
		keyboard: false,
		backdrop: 'static'
	});
}

function ubah_pimpinan(id)
{
	$.ajax({
		type	: "POST",
		url		: "cari",
		data	: "pim_id="+id,
		dataType : "json",				  
		success	: function(data){
			$("#pim_id").val(data.pim_id);
			$("#pim_nama").val(data.pim_nama);
			$("#pim_nip").val(data.pim_nip);
			$("#pim_tempat_lahir").val(data.pim_tempat_lahir);
			var tgl = data.pim_tanggal_lahir.split("-");
			var tglbaru = tgl[2]+"/"+tgl[1]+"/"+tgl[0];
// alert(tglbaru);
			$("#pim_tanggal_lahir").val(tglbaru);
			$("#pim_jk").val(data.pim_jk);
			$("#pim_agama").val(data.pim_agama);
			$("#pim_alamat").val(data.pim_alamat);
			$("#pim_penempatan").val(data.pim_penempatan);
			$("#pim_jab_id").val(data.pim_jab_id);
			$("#pim_username").val(data.pim_user);
			$("#pim_password").val(data.pim_pass);
			if (data.pim_tgl_masuk != null)
			{
				var tgl_masuks = data.pim_tgl_masuk.split("-");
				var tgl_masuk = tgl_masuks[2]+"/"+tgl_masuks[1]+"/"+tgl_masuks[0];
				$("#pim_tgl_masuk").val(tgl_masuk);
			}
			// alert(data.pim_penempatan);
			if (data.pim_penempatan == "Prodi")
			{
				$("#pim_prodi").val(data.pim_penempatan_det);
				$("#inputProdi").show();
				$("#inputFakultas").hide();
			}
			else 
			{
				$("#pim_fakultas").val(data.pim_penempatan_det);
				$("#inputProdi").hide();
				$("#inputFakultas").show();
			}
				
			$(".inputan").attr("disabled",false);
			$("#modal_pimpinan").modal({
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
	// alert(id);
	$("#isiKonfirm").html("Sedang menghapus data...");
	$(".btn").attr("disabled", true);
	$.ajax({
       type: "GET",
		url: "hapus/"+id+"/"+foto,  
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