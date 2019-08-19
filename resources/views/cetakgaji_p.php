<table width="100%" border="0" style="border-bottom:black solid 2px;">
	<tr>
		<td width="25%">&nbsp;</td>
		<td width="50%"><b>PT Spark Integrated Solution</b><br>Ruko Kedoya Elok Plaza Blok DE No. 8 | +6221-2258 5451</td>
		<td width="25%" valign="bottom"><b>SLIP GAJI</b></td>
	</tr>
</table>
		
<table width="100%" border="0" style="margin-top:30px;" cellspacing="0">
	<tr>
		<th colspan="3" style="text-align:center;border-top:2px black solid;border-bottom:2px black solid;">DATA ABSENSI</th>
		<th colspan="3" style="text-align:center;border-top:2px black solid;border-bottom:2px black solid;">INCOME</th>
		<th colspan="3" style="text-align:center;border-top:2px black solid;border-bottom:2px black solid;">DEDUCTION</th>
	</tr>
	<tr>
		<td  style="padding:5px 5px 5px 5px;" width="10%">Hari Masuk</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" width="19%"> </td>
		<td  style="padding:5px 5px 5px 5px;" width="15%">Gaji Pokok</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" width="19%"><?=number_format($gajipokok,0,",",".");?></td>
		<td  style="padding:5px 5px 5px 5px;" width="15%">Jamsostek</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" width="19%"> <?=number_format($jamsostek,0,",",".");?></td>
	</tr>
	<tr>
		<td  style="padding:5px 5px 5px 5px;" >OT</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" > </td>
		<td  style="padding:5px 5px 5px 5px;" >Uang Makan</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" > <?=number_format($uangmakan,0,",",".");?></td>
		<td  style="padding:5px 5px 5px 5px;" >Telat Hadir</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" ><?=number_format($telathadir,0,",",".");?></td>
	</tr>
	<tr>
		<td  style="padding:5px 5px 5px 5px;" >Sakit</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" > </td>
		<td  style="padding:5px 5px 5px 5px;" >Uang Transport</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" ><?=number_format($transport,0,",",".");?></td>
		<td  style="padding:5px 5px 5px 5px;" >PPH 21</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" ><?=number_format($pph,0,",",".");?></td>
	</tr>
	<tr>
		<td  style="padding:5px 5px 5px 5px;" >Cuti Tahunan</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" > </td>
		<td  style="padding:5px 5px 5px 5px;" >Lembur (OT)</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td></td>
		<td  style="padding:5px 5px 5px 5px;" >Tidak Hadir</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" ><?=number_format($tidakhadir,0,",",".");?></td>
	</tr>
	<tr>
		<td  style="padding:5px 5px 5px 5px;" >Cuti Lainnya</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" > </td>
		<td  style="padding:5px 5px 5px 5px;" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" >Iuran Pensiunan</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" ><?=number_format($iuranpensiun,0,",",".");?></td>
	</tr>
	<tr>
		<td  style="padding:5px 5px 5px 5px;" >Cuti Potong Gaji</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" ></td>
		<td  style="padding:5px 5px 5px 5px;" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" >BPJS Kesehatan</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" ><?=number_format($bpjs,0,",",".");?></td>
	</tr>
	<tr>
		<td  style="padding:5px 5px 5px 5px;" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" >&nbsp;</td>
		<td  style="padding:5px 5px 5px 5px;" >Potongan</td>
		<td  style="padding:5px 5px 5px 5px;" align="center" width="1%">:</td>
		<td  style="padding:5px 5px 5px 5px;" align="right" ></td>
	</tr>
	<tr>
		<th colspan="3" style="padding:5px 5px 5px 5px;text-align:center;border-top:2px black solid;border-bottom:2px black solid;">&nbsp;</th>
		<th style="padding:5px 5px 5px 5px;text-align:center;border-top:2px black solid;border-bottom:2px black solid;">TOTAL INCOME</th>
		<th style="padding:5px 5px 5px 5px;border-top:2px black solid;border-bottom:2px black solid;">:</th>
		<th style="padding:5px 5px 5px 5px;text-align:right;border-top:2px black solid;border-bottom:2px black solid;"><?=number_format($totalincome,0,",",".");?></th>
		<th style="padding:5px 5px 5px 5px;text-align:center;border-top:2px black solid;border-bottom:2px black solid;"> TOTAL DEDUCTION</th>
		<th style="padding:5px 5px 5px 5px;border-top:2px black solid;border-bottom:2px black solid;">:</th>
		<th style="padding:5px 5px 5px 5px;text-align:right;border-top:2px black solid;border-bottom:2px black solid;"><?=number_format($totaldeduction,0,",",".");?></th>
	</tr>
	<tr>
		<td  style="padding:5px 5px 5px 5px;font-size:16px;" ><b>Take Home Pay</b></td>
		<td colspan="2"  style="padding:5px 5px 5px 5px;font-size:24px;" align="right" ><b>Rp. <?=number_format($total,0,",",".");?></b></td>
		<td >&nbsp;</td>
		<td >&nbsp;</td>
		<td >&nbsp;</td>
		<td >&nbsp;</td>
	</tr>
	<tr>
		<td colspan="6">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2"  >&nbsp;</td>
		<td align="right">&nbsp;</td>
		<td colspan="2"  >Disetujui Oleh :</td>
		<td >&nbsp;</td>
		<td colspan="2"  >Diterima Oleh :</td>
		<td ></td>
	</tr>
	<tr>
		<td colspan="2"  >&nbsp;</td>
		<td align="right">&nbsp;</td>
		<td colspan="2"  >&nbsp;</td>
		<td >&nbsp;</td>
		<td colspan="2" height="40" valign="bottom" ><b><?=$nama;?></b></td>
		<td ></td>
	</tr>
</table>