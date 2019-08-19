var save_method; //for save method string
var table;



var areaChartData = {
  labels: ["1", "2", "3", "4", "5", "6", "7"],
  datasets: [
	{
	  label: "Digital Goods",
	  fillColor: "rgba(60,141,188,0.9)",
	  strokeColor: "rgba(60,141,188,0.8)",
	  pointColor: "#3b8bba",
	  pointStrokeColor: "rgba(60,141,188,1)",
	  pointHighlightFill: "#fff",
	  pointHighlightStroke: "rgba(60,141,188,1)",
	  data: [28, 48, 40, 19, 86, 27, 90]
	}
  ]
};

// var dd = [12,35,23,76,65,44];
// areaChartData.datasets[0].data = dd;
// alert(areaChartData.datasets[0].data[0]);
var areaChartOptions = {
  //Boolean - If we should show the scale at all
  showScale: true,
  //Boolean - Whether grid lines are shown across the chart
  scaleShowGridLines: true,
  //String - Colour of the grid lines
  scaleGridLineColor: "grey",
  //Number - Width of the grid lines
  scaleGridLineWidth: 1,
  //Boolean - Whether to show horizontal lines (except X axis)
  scaleShowHorizontalLines: true,
  //Boolean - Whether to show vertical lines (except Y axis)
  scaleShowVerticalLines: true,
  //Boolean - Whether the line is curved between points
  bezierCurve: true,
  //Number - Tension of the bezier curve between points
  bezierCurveTension: 0.3,
  //Boolean - Whether to show a dot for each point
  pointDot: false,
  //Number - Radius of each point dot in pixels
  pointDotRadius: 4,
  //Number - Pixel width of point dot stroke
  pointDotStrokeWidth: 1,
  //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
  pointHitDetectionRadius: 20,
  //Boolean - Whether to show a stroke for datasets
  datasetStroke: true,
  //Number - Pixel width of dataset stroke
  datasetStrokeWidth: 2,
  //Boolean - Whether to fill the dataset with a color
  datasetFill: true,
  //String - A legend template
  legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
  //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
  maintainAspectRatio: true,
  //Boolean - whether to make the chart responsive to window resizing
  responsive: true
};

//Create the line chart
// areaChart.Line(areaChartData, areaChartOptions);

//-------------
//- LINE CHART -
//--------------
var ids = $("#ids").val();
var nilais = ids.split("sp");
if (nilais[1] != 0)
{
	var jml = nilais.length;
	var nilai = [];
	var label = [];
	nilai[0] = 0;
	label[0] = "Penilaian Pegawai";
	for (i=1;i<jml;i++)
	{
		nilai[i] = nilais[i];
		label[i] = "Penilaian ke-"+i;
	}
	areaChartData.datasets[0].data = nilai;
	areaChartData.labels = label;
	var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
	window.lineChart = new Chart(lineChartCanvas);
	var lineChartOptions = areaChartOptions;
	lineChartOptions.datasetFill = false;
	window.lineChart.Line(areaChartData, lineChartOptions);
}
else 
{
	alert("Pegawai ini belum dinilai!");
}



table = $('#tabel-grafik').DataTable({ 
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
		"url": "../ajax_list_grafik/",
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

// function tampilGrafik(ids)
// {
	// $("#grafiknya").hide();
	// if (ids != 0)
	// {
		// var nilais = ids.split(";");
		// var jml = nilais.length;
		// var nilai = [];
		// var label = [];
		// nilai[0] = 0;
		// label[0] = "Penilaian Pegawai";
		// for (i=1;i<jml;i++)
		// {
			// nilai[i] = nilais[i];
			// label[i] = "Penilaian ke-"+i;
		// }
		// areaChartData.datasets[0].data = nilai;
		// areaChartData.labels = label;
		 // if(window.lineChart !== undefined)
			// window.lineChart.destroy();
		// window.lineChart = new Chart(lineChartCanvas);
		// window.lineChart.Line(areaChartData, lineChartOptions);
	// }
	// else 
	// {
		// alert("Pegawai ini belum dinilai!");
	// }
// }

$("#grf_tambah").click(function(){
	$("#grf_id").val(0);
	$('#modal_grafik').modal({
		show: true,
		keyboard: false,
		backdrop: 'static'
	});
});

$("#grf_simpan").click(function(){
	var dataString = $("#frm_grafik").serialize();
	$("#grf_simpan").html("Menyimpan...");
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
			$("#modal_grafik").modal("hide");
			$("#pesan_info_ok").html(msg);
			$("#grf_simpan").html("Simpan");
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

function hapus_grafik(id)
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

function ubah_grafik(id)
{
	$.ajax({
		type	: "POST",
		url		: "cari",
		data	: "grf_id="+id,
		dataType : "json",				  
		success	: function(data){
			$("#grf_id").val(data.grf_id);
			$("#grf_nama").val(data.grf_nama);
			$("#grf_kode").val(data.grf_kode);
			$("#grf_kepala").val(data.grf_kepala);
			$(".inputan").attr("disabled",false);
			$("#modal_grafik").modal({
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