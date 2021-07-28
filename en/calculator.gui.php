<!--pass website's default currency selection and / or date mask for JavaScript access-->
<div style="position:absolute; left:-9999px; top:-9999px">
	<input type="text" id="currency-sv" value=<?php echo $currency ?>>
	<input type="text" id="date_mask-sv" value=<?php echo $date_mask ?>>
</div>

<?php

// default max-width: 440px, medium: 340px, small: 290px, tiny: 150px


if ($brand_name != '' && strtolower($add_link) == 'yes') {
	$title = $brand_name . "<br>Savings Calculator";
} else {
	$title = "Savings Calculator";
}

$intl_conventions = 'yes'; // will international conventions modal be available to users?


// rather than using exclusively a CSS solution for setting size, PHP is used as well
// so that the text displayed can vary as well
if (strtolower($size) == 'tiny'){
?>

<!-- Copyright 2018 financial-calculators.com -->

<div id="savings-wrap" class="calc-wrap tiny">
	<!--default max-width: 440px, medium: 340px, small: 290px, tiny: 150px-->

	<!--calculator-->
	<form id="savings-plugin" class="financial-calculators calculator">

		<!--savings calculator-->

		<!-- calculator title -->
		<div class="calc-name">
			<?php echo ((strtolower($add_link) == 'yes') ? '<a href="https://financial-calculators.com/savings-calculator" target="_blank" data-toggle="tooltip" data-placement="right" title="click for another version of this calculator">' . $title . '</a>' : $title) ?>
		</div>


		<!--no backlink option-->
		<!-- <div class="calc-name"><?php // echo $title ?></div> -->


		<!-- start calculator inputs -->

		<div class="control-group">
			<label class="label" for="edCF-sv">Saved Monthly?:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edCF-sv" maxlength="14" size="16" value=<?php echo $save_amt ?>>
			</div>
		</div>


		<div class="control-group">
			<label class="label" for="edNumPmts-sv">Months? (#):</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edNumPmts-sv" maxlength="3" size="16"
					value=<?php echo $n_months ?>>
			</div>
		</div>


		<div class="control-group">
			<label class="label" for="edRate-sv">Annual Interest Rate?:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edRate-sv" maxlength="8" size="16" value=<?php echo $rate ?>>
			</div>
		</div>


		<hr class="bar" />

		<div class="control-group">
			<label class="label">Final Amount (FV):</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edFV-sv" maxlength="8" size="16" disabled>
			</div>
		</div>


		<div class="control-group">
			<label class="label">Interest Earned:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edInterest-sv" maxlength="14" size="16" disabled>
			</div>
		</div>

		<div class="control-group">
			<label class="label">Total Invested:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edTotalInvested-sv" maxlength="14" size="16" disabled>
			</div>
		</div>


		<div class="control-group tail-sm">
			<label class="label">Last Deposit:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edFVDate-sv" maxlength="14" size="16" disabled>
			</div>
		</div>


		<!-- end savings calculator -->

		<!--buttons-->

		<!--buttons small-->
		<div class="btn-group">
			<div class="btn-row">
				<div class="btn-wrapper-4">
					<button type="button" id="btnCalc-sv" class="btn btn-primary btn-calculator" data-toggle="tooltip"
						data-placement="top" title="calc">C</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnClear-sv" class="btn btn-primary btn-calculator" data-toggle="tooltip"
						data-placement="top" title="clear">Cl</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnPrint-sv" class="btn btn-primary btn-calculator" data-toggle="tooltip"
						data-placement="top" title="print">P</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnHelp-sv" class="btn btn-primary btn-calculator" data-toggle="tooltip"
						data-placement="top" title="help">H</button>
				</div>
			</div>
			<div class="btn-row">
				<div class="btn-wrapper-2">
					<button type="button" id="btnSchedule-sv" class="btn btn-primary btn-calculator" data-toggle="tooltip"
						data-placement="bottom" title="schedule">S</button>
				</div>
				<div class="btn-wrapper-2">
					<button type="button" id="btnCharts-sv" class="btn btn-primary btn-calculator" data-toggle="tooltip"
						data-placement="bottom" title="charts">Ch</button>
				</div>
			</div>
		</div>


		<div class="calc-footer">
			<span class="cr">
				<?php echo ((strtolower($add_link) == 'yes') ? ' <a href="https://financial-calculators.com" target="_blank" data-toggle="tooltip" data-placement="right" title="(c) financial-calculators.com">©' . date("Y") . '</a>' : ' <a href="#" data-toggle="tooltip" data-placement="right" title="(c) financial-calculators.com">©' . date("Y") . '</a>' ) ?>
			</span>
			<?php if (strtolower($intl_conventions) == 'yes'){ ?>
			<span id="CCY-sv" class="localization" data-toggle="tooltip" data-placement="right"
				title="click to change currency or date format">$ : mm/dd/yyyy</span>
			<?php } ?>
		</div>


	</form>
	<!--calculator-->

</div>
<!--calc-wrap-->

<!--end loan calculator widget-->
<!--end tiny-->


<?php
} elseif(strtolower($size) == "small"){
?>
<!-- Copyright 2018 financial-calculators.com -->

<div id="savings-wrap" class="calc-wrap small">
	<!--default max-width: 440px, medium: 340px, small: 290px, tiny: 150px-->

	<!--calculator-->
	<form id="savings-plugin" class="financial-calculators calculator">

		<!--savings calculator-->

		<!-- calculator title -->
		<div class="calc-name">
			<?php echo ((strtolower($add_link) == 'yes') ? '<a href="https://financial-calculators.com/savings-calculator" target="_blank" data-toggle="tooltip" data-placement="right" title="financial-calculators.com has an enhanced edition of this calculator">' . $title . '</a>' : $title) ?>
		</div>

		<!-- start calculator inputs -->

		<div class="control-group">
			<label class="label" for="edCF-sv">Monthly Savings?:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edCF-sv" maxlength="14" size="16" value=<?php echo $save_amt ?>>
			</div>
		</div>


		<div class="control-group">
			<label class="label" for="edNumPmts-sv">Months? (#):</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edNumPmts-sv" maxlength="3" size="16"
					value=<?php echo $n_months ?>>
			</div>
		</div>


		<div class="control-group">
			<label class="label" for="edRate-sv">Interest Rate?:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edRate-sv" maxlength="8" size="16" value=<?php echo $rate ?>>
			</div>
		</div>


		<hr class="bar" />

		<div class="control-group">
			<label class="label">Final Amount (FV):</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edFV-sv" maxlength="8" size="16" disabled>
			</div>
		</div>


		<div class="control-group">
			<label class="label">Interest Earned:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edInterest-sv" maxlength="14" size="16" disabled>
			</div>
		</div>

		<div class="control-group">
			<label class="label">Total Invested:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edTotalInvested-sv" maxlength="14" size="16" disabled>
			</div>
		</div>


		<div class="control-group tail-sm">
			<label class="label">Last Deposit Date:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edFVDate-sv" maxlength="14" size="16" disabled>
			</div>
		</div>


		<!-- end savings calculator -->



		<!--buttons-->

		<!--buttons small-->
		<div class="btn-group">
			<div class="btn-row">
				<div class="btn-wrapper-4">
					<button type="button" id="btnCalc-sv" class="btn btn-primary btn-calculator">Calc</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnClear-sv" class="btn btn-primary btn-calculator">Clear</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnPrint-sv" class="btn btn-primary btn-calculator">Print</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnHelp-sv" class="btn btn-primary btn-calculator">Help</button>
				</div>
			</div>
			<div class="btn-row">
				<div class="btn-wrapper-2">
					<button type="button" id="btnSchedule-sv" class="btn btn-primary btn-calculator">Schedule</button>
				</div>
				<div class="btn-wrapper-2">
					<button type="button" id="btnCharts-sv" class="btn btn-primary btn-calculator">Charts</button>
				</div>
			</div>
		</div>


		<div class="calc-footer">
			<span
				class="cr">©<?php echo date("Y"); ?><?php echo ((strtolower($add_link) == 'yes') ? ' <a href="https://financial-calculators.com" target="_blank" data-toggle="tooltip" data-placement="right" title="click for more advanced calculator by financial-calculators.com">financial-calculators.com</a>' : ' financial-calculators.com') ?></span>
			<?php if (strtolower($intl_conventions) == 'yes'){ ?>
			<span id="CCY-sv" class="localization" data-toggle="tooltip" data-placement="right"
				title="click to change currency or date format">$ : mm/dd/yyyy</span>
			<?php } ?>
		</div>

	</form>
	<!--calculator-->

	<!--zoom calculator's size-->
	<div id="zoomer-sv" <?php echo ((strtolower($hide_resize)==='yes' ) ? 'class="zoomer hidden"' : 'class="zoomer"' ) ?>>
		<span id="shrink-sv" class="flaticon-minussign7" data-toggle="tooltip" data-placement="left"
			title="Make me smaller."></span>
		<span id="original-sv">&nbsp;&nbsp;Original Size&nbsp;&nbsp;</span>
		<span id="grow-sv" class="flaticon-add73" data-toggle="tooltip" data-placement="right"
			title="Make me larger."></span>
	</div>

</div>
<!--calc-wrap-->

<!--end loan calculator widget-->
<!--end small-->


<?php
} elseif(strtolower($size) == "medium"){
?>
<!-- Copyright 2018 financial-calculators.com -->

<div id="savings-wrap" class="calc-wrap medium">
	<!--default max-width: 440px, medium: 340px, small: 290px, tiny: 150px-->

	<!--calculator-->
	<form id="savings-plugin" class="financial-calculators calculator">

		<!--savings calculator-->

		<!-- calculator title -->
		<div class="calc-name">
			<?php echo ((strtolower($add_link) == 'yes') ? '<a href="https://financial-calculators.com/savings-calculator" target="_blank" data-toggle="tooltip" data-placement="right" title="try an enhanced edition of this calculator">' . $title . '</a>' : $title) ?>
		</div>

		<!-- start calculator inputs -->

		<div class="control-group">
			<label class="label" for="edCF-sv">Periodic Savings?:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edCF-sv" maxlength="14" size="16" value=<?php echo
				 $save_amt ?>>
			</div>
		</div>


		<div class="control-group">
			<label class="label" for="edNumPmts-sv">Number of Months?:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edNumPmts-sv" maxlength="3" size="16" value=<?php
				 echo $n_months ?>>
			</div>
		</div>


		<div class="control-group">
			<label class="label" for="edRate-sv">Annual Interest Rate?:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edRate-sv" maxlength="8" size="16" value=<?php echo $rate ?>>
			</div>
		</div>


		<hr class="bar" />

		<div class="control-group">
			<label class="label">Final Amount (fv):</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edFV-sv" maxlength="8" size="16" disabled>
			</div>
		</div>


		<div class="control-group">
			<label class="label">Interest Earned:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edInterest-sv" maxlength="14" size="16" disabled>
			</div>
		</div>

		<div class="control-group">
			<label class="label">Total Amount Invested:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edTotalInvested-sv" maxlength="14" size="16" disabled>
			</div>
		</div>


		<div class="control-group tail-sm">
			<label class="label">Last Deposit Date:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edFVDate-sv" maxlength="14" size="16" disabled>
			</div>
		</div>


		<!-- end savings calculator -->


		<!--buttons-->
		<div class="btn-group">
			<div class="btn-row">
				<div class="btn-wrapper-4">
					<button type="button" id="btnCalc-sv" class="btn btn-primary btn-calculator">Calc</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnClear-sv" class="btn btn-primary btn-calculator">Clear</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnPrint-sv" class="btn btn-primary btn-calculator">Print</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnHelp-sv" class="btn btn-primary btn-calculator">Help</button>
				</div>
			</div>
			<div class="btn-row">
				<div class="btn-wrapper-2">
					<button type="button" id="btnSchedule-sv" class="btn btn-primary btn-calculator">Schedule</button>
				</div>
				<div class="btn-wrapper-2">
					<button type="button" id="btnCharts-sv" class="btn btn-primary btn-calculator">Charts</button>
				</div>
			</div>
		</div>

		<div class="calc-footer">
			<span
				class="cr">©<?php echo date("Y"); ?><?php echo ((strtolower($add_link) == 'yes') ? ' <a href="https://financial-calculators.com" target="_blank" data-toggle="tooltip" data-placement="right" title="click for more advanced calculator by financial-calculators.com">financial-calculators.com</a>' : ' financial-calculators.com') ?></span>
			<?php if (strtolower($intl_conventions) == 'yes'){ ?>
			<span id="CCY-sv" class="localization" data-toggle="tooltip" data-placement="right"
				title="click to change currency or date format">$ : mm/dd/yyyy</span>
			<?php } ?>
		</div>


	</form>
	<!--calculator-->

	<!--zoom calculator's size-->
	<div id="zoomer-sv" <?php echo ((strtolower($hide_resize)==='yes' ) ? 'class="zoomer hidden"' : 'class="zoomer"' ) ?>>
		<span id="shrink-sv" class="flaticon-minussign7" data-toggle="tooltip" data-placement="left"
			title="Make me smaller."></span>
		<span id="original-sv">&nbsp;&nbsp;Original Size&nbsp;&nbsp;</span>
		<span id="grow-sv" class="flaticon-add73" data-toggle="tooltip" data-placement="right"
			title="Make me larger."></span>
	</div>


</div>
<!--calc-wrap-->

<!--end loan calculator widget-->
<!--end medium-->



<?php
}else{
?>

<!-- default size - large -->
<!-- Copyright 2018 financial-calculators.com -->

<div id="savings-wrap" class="calc-wrap large">
	<!--default max-width: 440px, medium: 340px, small: 290px, tiny: 150px-->

	<!--calculator-->
	<form id="savings-plugin" class="financial-calculators calculator">

		<!--savings calculator-->

		<!-- calculator title -->
		<div class="calc-name">
			<?php echo ((strtolower($add_link) == 'yes') ? '<a href="https://financial-calculators.com/savings-calculator" target="_blank" data-toggle="tooltip" data-placement="right" title="click for an enhanced savings calculator">' . $title . '</a>' : $title) ?>
		</div>

		<!-- start calculator inputs -->

		<div class="control-group">
			<label class="label" for="edCF-sv">Periodic Savings Amount?:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edCF-sv" maxlength="14" size="16" value=<?php echo $save_amt ?>>
			</div>
		</div>


		<div class="control-group">
			<label class="label" for="edNumPmts-sv">Number of Periods to Save?:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edNumPmts-sv" maxlength="3" size="16"
					value=<?php echo $n_months ?>>
			</div>
		</div>


		<div class="control-group">
			<label class="label" for="edRate-sv">Annual Interest Rate?:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edRate-sv" maxlength="8" size="16" value=<?php echo $rate ?>>
			</div>
		</div>


		<hr class="bar" />

		<div class="control-group">
			<label class="label">Final Amount (future value):</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edFV-sv" maxlength="8" size="16" disabled>
			</div>
		</div>


		<div class="control-group">
			<label class="label">Interest Earned:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edInterest-sv" maxlength="14" size="16" disabled>
			</div>
		</div>

		<div class="control-group">
			<label class="label">Total Amount Invested:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edTotalInvested-sv" maxlength="14" size="16" disabled>
			</div>
		</div>


		<div class="control-group tail-sm">
			<label class="label">Last Deposit Date:</label>
			<div class="wrapper">
				<input type="tel" class="calc-control num" id="edFVDate-sv" maxlength="14" size="16" disabled>
			</div>
		</div>


		<!-- end savings calculator -->


		<!--buttons-->

		<div class="btn-group">
			<div class="btn-row">
				<div class="btn-wrapper-4">
					<button type="button" id="btnCalc-sv" class="btn btn-primary btn-calculator">Calc</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnClear-sv" class="btn btn-primary btn-calculator">Clear</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnPrint-sv" class="btn btn-primary btn-calculator">Print</button>
				</div>
				<div class="btn-wrapper-4">
					<button type="button" id="btnHelp-sv" class="btn btn-primary btn-calculator">Help</button>
				</div>
			</div>
			<div class="btn-row">
				<div class="btn-wrapper-2">
					<button type="button" id="btnSchedule-sv" class="btn btn-primary btn-calculator">Savings
						Schedule</button>
				</div>
				<div class="btn-wrapper-2">
					<button type="button" id="btnCharts-sv" class="btn btn-primary btn-calculator">Charts</button>
				</div>
			</div>
		</div>


		<div class="calc-footer">
			<span
				class="cr">©<?php echo date("Y"); ?><?php echo ((strtolower($add_link) == 'yes') ? ' <a href="https://financial-calculators.com" target="_blank" data-toggle="tooltip" data-placement="right" title="click for more advanced calculator by financial-calculators.com">financial-calculators.com</a>, all rights reserved' : ' financial-calculators.com, all rights reserved') ?></span><?php if (strtolower($intl_conventions) == 'yes'){ ?><span
				id="CCY-sv" class="localization" data-toggle="tooltip" data-placement="right"
				title="click to change currency or date format">$ : mm/dd/yyyy</span><?php } ?>
		</div>

	</form>
	<!--calculator-->

	<!--zoom calculator's size-->
	<div id="zoomer-sv" <?php echo ((strtolower($hide_resize)==='yes' ) ? 'class="zoomer hidden"' : 'class="zoomer"' ) ?>>
		<span id="shrink-sv" class="flaticon-minussign7" data-toggle="tooltip" data-placement="left"
			title="Make me smaller."></span>
		<span id="original-sv">&nbsp;&nbsp;Original Size&nbsp;&nbsp;</span>
		<span id="grow-sv" class="flaticon-add73" data-toggle="tooltip" data-placement="right"
			title="Make me larger."></span>
	</div>

</div>
<!--calc-wrap-->

<!--end loan calculator widget-->
<!--end default/large-->


<?php
};  // if
?>

<!-- below included with all calculator layouts -->


<!-- HELP TEXT -->
<div class="fc-widget">
	<div class="hShow hidden">
		<div id="hText-savings">
			<h2>Savings Calculator — calculate future value</h2>

			<p>This calculator easily answers the question &quot;If I save 'X' amount for 'Y' months what will the value be at
				the end?&quot;</p>
			<p>The user enters the &quot;Periodic Savings Amount&quot; (amount saved or invested every month); the
				&quot;Number
				of Months&quot; and the &quot;Annual Interest Rate&quot; or the annual rate of return one expects to earn on
				their
				investments.</p>
			<p>The calculator quickly creates a savings schedule and a set of charts that will help the user see the
				relationship between the amount invested and the return on the investment. The schedule can be copied and pasted
				to
				Excel, if desired.</p>
			<p>The investment term is always expressed in months.</p>
			<ul class="mono tail">
				<li>&nbsp;60 months = &nbsp;5 years</li>
				<li>120 months = 10 years</li>
				<li>180 months = 15 years</li>
				<li>240 months = 20 years</li>
				<li class="tail">360 months = 30 years</li>
			</ul>
			<p>If you need a more advanced &quot;Savings Calculator&quot; &mdash; one that lets the user solve for the
				starting
				amount, the amount to invest, the interest rate, the term required to reach a goal or the future value; or if
				you
				would like to easily print the schedule; or if you need to pick a different investment frequency, then you may
				want
				to try the calculator located here: <b>https:/financial-calculators.com/savings-calculator</b></p>
		</div>
	</div>
</div>
<!--- end of help text -->




<?php
if (strtolower($intl_conventions) == 'yes'){
?>


<!-- start dialog code -->
<div id="fc-modals" class="fc-modals">

	<!-- currency date options -->
	<div class="modal fade" id="CURRENCYDATE" role="dialog" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-modal">
					<h4 class="modal-title">Currency and Date Conventions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="sym" aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="modal-group modal-group-narrow">
						<form class="financial-calculators tail-md">

							<div class="control-group tail-lg">
								<select name="ccy-select" id="ccy-select" class="calc-control">
									<option value="59">Albania&nbsp;&nbsp;&nbsp;&nbsp;(Lek)&nbsp;&nbsp;&nbsp;&nbsp;Lek12,345,678.99
									</option>
									<option value="90">Algeria&nbsp;&nbsp;&nbsp;&nbsp;(Algerian
										Dinar)&nbsp;&nbsp;&nbsp;&nbsp;DZD12,345,678.99</option>
									<option value="36">Argentina&nbsp;&nbsp;&nbsp;&nbsp;(Argentine
										Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99</option>
									<option value="88">Armenia&nbsp;&nbsp;&nbsp;&nbsp;(Armenian
										Dram)&nbsp;&nbsp;&nbsp;&nbsp;AMD12,345,678.99</option>
									<option value="49">Australia&nbsp;&nbsp;&nbsp;&nbsp;(Australian
										Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
									<option value="43">Austria&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99
									</option>
									<option value="84">Azerbaijan&nbsp;&nbsp;&nbsp;&nbsp;(Manat)&nbsp;&nbsp;&nbsp;&nbsp;₼12,345,678.99
									</option>
									<option value="89">Bahrain&nbsp;&nbsp;&nbsp;&nbsp;(Bahraini
										Dinar)&nbsp;&nbsp;&nbsp;&nbsp;BHD12,345,678.994</option>
									<option value="54">Belarus&nbsp;&nbsp;&nbsp;&nbsp;(Ruble)&nbsp;&nbsp;&nbsp;&nbsp;Br12,345,678.99
									</option>
									<option value="18">Belgium&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€
									</option>
									<option value="42">Belgium&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99
									</option>
									<option value="53">Belize&nbsp;&nbsp;&nbsp;&nbsp;(Belize
										Dollar)&nbsp;&nbsp;&nbsp;&nbsp;BZ$12,345,678.99</option>
									<option value="38">Bolivia&nbsp;&nbsp;&nbsp;&nbsp;(Boliviano)&nbsp;&nbsp;&nbsp;&nbsp;$b12.345.678,99
									</option>
									<option value="28">
										Bosnia/Herzegovina&nbsp;&nbsp;&nbsp;&nbsp;(Mark)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99KM</option>
									<option value="40">Brazil&nbsp;&nbsp;&nbsp;&nbsp;(Brazilian
										Real)&nbsp;&nbsp;&nbsp;&nbsp;R$12.345.678,99</option>
									<option value="49">Brunei&nbsp;&nbsp;&nbsp;&nbsp;(Brunei Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99
									</option>
									<option value="27">Bulgaria&nbsp;&nbsp;&nbsp;&nbsp;(Bulgarian
										Lev)&nbsp;&nbsp;&nbsp;&nbsp;12345678,99лв</option>
									<option value="50">Canada&nbsp;&nbsp;&nbsp;&nbsp;(Canadian
										Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
									<option value="13">Canada&nbsp;&nbsp;&nbsp;&nbsp;(Canadian Dollar)&nbsp;&nbsp;&nbsp;&nbsp;12 345
										678,99$</option>
									<option value="35">Chile&nbsp;&nbsp;&nbsp;&nbsp;(Chilean Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.679
									</option>
									<option value="73">China&nbsp;&nbsp;&nbsp;&nbsp;(Yuan Renminbi)&nbsp;&nbsp;&nbsp;&nbsp;¥12,345,678.99
									</option>
									<option value="36">Colombia&nbsp;&nbsp;&nbsp;&nbsp;(Colombian
										Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99</option>
									<option value="26">Costa Rica&nbsp;&nbsp;&nbsp;&nbsp;(Colon)&nbsp;&nbsp;&nbsp;&nbsp;₡12 345 678,99
									</option>
									<option value="29">Croatia&nbsp;&nbsp;&nbsp;&nbsp;(Kuna)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99kn
									</option>
									<option value="15">Czechia&nbsp;&nbsp;&nbsp;&nbsp;(Czech Koruna)&nbsp;&nbsp;&nbsp;&nbsp;12 345
										678,99Kč</option>
									<option value="30">Denmark&nbsp;&nbsp;&nbsp;&nbsp;(Danish
										Krone)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99kr</option>
									<option value="63">Dominican Republic&nbsp;&nbsp;&nbsp;&nbsp;(DR
										Peso)&nbsp;&nbsp;&nbsp;&nbsp;RD$1,234.99</option>
									<option value="36">Ecuador&nbsp;&nbsp;&nbsp;&nbsp;(US Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99
									</option>
									<option value="70">Egypt&nbsp;&nbsp;&nbsp;&nbsp;(Egyptian Pound)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99
									</option>
									<option value="49">El Salvador&nbsp;&nbsp;&nbsp;&nbsp;(El Salvador
										Colon)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
									<option value="20">Estonia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€
									</option>
									<option value="68">Faroe Islands&nbsp;&nbsp;&nbsp;&nbsp;(Danish
										Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,678.99</option>
									<option value="20">Finland&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€
									</option>
									<option value="18">France&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
									<option value="91">Georgia&nbsp;&nbsp;&nbsp;&nbsp;(Lari)&nbsp;&nbsp;&nbsp;&nbsp;GEL12,345,678.99
									</option>
									<option value="34">Germany&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€
									</option>
									<option value="33">Greece&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€</option>
									<option value="61">Guatemala&nbsp;&nbsp;&nbsp;&nbsp;(Quetzal)&nbsp;&nbsp;&nbsp;&nbsp;Q12,345,678.99
									</option>
									<option value="58">Honduras&nbsp;&nbsp;&nbsp;&nbsp;(Lempira)&nbsp;&nbsp;&nbsp;&nbsp;L12,345,678.99
									</option>
									<option value="56">Hong Kong&nbsp;&nbsp;&nbsp;&nbsp;(HK
										Dollar)&nbsp;&nbsp;&nbsp;&nbsp;HK$12,345,678.99</option>
									<option value="14">Hungary&nbsp;&nbsp;&nbsp;&nbsp;(Forint)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99Ft
									</option>
									<option value="67">Iceland&nbsp;&nbsp;&nbsp;&nbsp;(Iceland Krona)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,679
									</option>
									<option value="83">India&nbsp;&nbsp;&nbsp;&nbsp;(Indian Rupee)&nbsp;&nbsp;&nbsp;&nbsp;₹1,23,45,678.99
									</option>
									<option value="41">Indonesia&nbsp;&nbsp;&nbsp;&nbsp;(Rupiah)&nbsp;&nbsp;&nbsp;&nbsp;Rp12.345.678,99
									</option>
									<option value="85">Iran&nbsp;&nbsp;&nbsp;&nbsp;(Iranian Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99
									</option>
									<option value="92">Iraq&nbsp;&nbsp;&nbsp;&nbsp;(Iraqi Dinar)&nbsp;&nbsp;&nbsp;&nbsp;IQD12,345,678.994
									</option>
									<option value="80">Ireland&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12,345,678.99
									</option>
									<option value="78">Israel&nbsp;&nbsp;&nbsp;&nbsp;(Sheqel)&nbsp;&nbsp;&nbsp;&nbsp;₪12,345,678.99
									</option>
									<option value="33">Italy&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€</option>
									<option value="57">Jamaica&nbsp;&nbsp;&nbsp;&nbsp;(Jamaican
										Dollar)&nbsp;&nbsp;&nbsp;&nbsp;J$12,345,678.99</option>
									<option value="72">Japan&nbsp;&nbsp;&nbsp;&nbsp;(Yen)&nbsp;&nbsp;&nbsp;&nbsp;¥12,345,679</option>
									<option value="93">Jordan&nbsp;&nbsp;&nbsp;&nbsp;(Jordanian
										Dinar)&nbsp;&nbsp;&nbsp;&nbsp;JOD12,345,678.994</option>
									<option value="74">Kazakhstan&nbsp;&nbsp;&nbsp;&nbsp;(Tenge)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99
									</option>
									<option value="94">Kenya&nbsp;&nbsp;&nbsp;&nbsp;(Kenyan
										Shilling)&nbsp;&nbsp;&nbsp;&nbsp;KES12,345,678.99</option>
									<option value="77">Korea (South)&nbsp;&nbsp;&nbsp;&nbsp;(Won)&nbsp;&nbsp;&nbsp;&nbsp;₩12,345,679
									</option>
									<option value="95">Kuwait&nbsp;&nbsp;&nbsp;&nbsp;(Kuwaiti
										Dinar)&nbsp;&nbsp;&nbsp;&nbsp;KWD12,345,678.994</option>
									<option value="74">Kyrgyzstan&nbsp;&nbsp;&nbsp;&nbsp;(Som)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99
									</option>
									<option value="21">Latvia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
									<option value="70">Lebanon&nbsp;&nbsp;&nbsp;&nbsp;(Lebanese
										Pound)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99</option>
									<option value="96">Libya&nbsp;&nbsp;&nbsp;&nbsp;(Libyan
										Dinar)&nbsp;&nbsp;&nbsp;&nbsp;LYD12,345,678.994</option>
									<option value="103">Liechtenstein&nbsp;&nbsp;&nbsp;&nbsp;(Swiss
										Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99</option>
									<option value="19">Lithuania&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€
									</option>
									<option value="34">Luxembourg&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€
									</option>
									<option value="33">Luxembourg&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€
									</option>
									<option value="98">Macao&nbsp;&nbsp;&nbsp;&nbsp;(Pataca)&nbsp;&nbsp;&nbsp;&nbsp;MOP12,345,678.99
									</option>
									<option value="64">Malaysia&nbsp;&nbsp;&nbsp;&nbsp;(Ringgit)&nbsp;&nbsp;&nbsp;&nbsp;RM12,345,678.99
									</option>
									<option value="99">Maldives&nbsp;&nbsp;&nbsp;&nbsp;(Rufiyaa)&nbsp;&nbsp;&nbsp;&nbsp;MVR12,345,678.99
									</option>
									<option value="79">Malta&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12,345,678.99</option>
									<option value="49">Mexico&nbsp;&nbsp;&nbsp;&nbsp;(Mexican Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99
									</option>
									<option value="18">Monaco&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€</option>
									<option value="81">Mongolia&nbsp;&nbsp;&nbsp;&nbsp;(Tugrik)&nbsp;&nbsp;&nbsp;&nbsp;₮12,345,678.99
									</option>
									<option value="97">Morocco&nbsp;&nbsp;&nbsp;&nbsp;(Dirham)&nbsp;&nbsp;&nbsp;&nbsp;MAD12,345,678.99
									</option>
									<option value="44">Netherlands&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99
									</option>
									<option value="49">New Zealand&nbsp;&nbsp;&nbsp;&nbsp;(NZ
										Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
									<option value="55">Nicaragua&nbsp;&nbsp;&nbsp;&nbsp;(Cordoba
										Oro)&nbsp;&nbsp;&nbsp;&nbsp;C$12,345,678.99</option>
									<!--[KT] 06/05/2020 - ccyNGN ₦ ₦1,234.56 -->
									<option value="104">Nigeria&nbsp;&nbsp;&nbsp;&nbsp;(Naira)&nbsp;&nbsp;&nbsp;&nbsp;₦12,345,678.99
									</option>
									<option value="25">Norway&nbsp;&nbsp;&nbsp;&nbsp;(Norwegian Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12 345
										678,99</option>
									<option value="68">Norway&nbsp;&nbsp;&nbsp;&nbsp;(Norwegian
										Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,678.99</option>
									<option value="86">Oman&nbsp;&nbsp;&nbsp;&nbsp;(Rial Omani)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.994
									</option>
									<option value="76">Pakistan&nbsp;&nbsp;&nbsp;&nbsp;(Pakistan
										Rupee)&nbsp;&nbsp;&nbsp;&nbsp;₨12,345,678.99</option>
									<option value="52">Panama&nbsp;&nbsp;&nbsp;&nbsp;(Balboa)&nbsp;&nbsp;&nbsp;&nbsp;B/.12,345,678.99
									</option>
									<option value="39">Paraguay&nbsp;&nbsp;&nbsp;&nbsp;(Guarani)&nbsp;&nbsp;&nbsp;&nbsp;Gs12.345.679
									</option>
									<option value="65">Peru&nbsp;&nbsp;&nbsp;&nbsp;(Sol)&nbsp;&nbsp;&nbsp;&nbsp;S/.12,345,678.99</option>
									<option value="82">Philippines&nbsp;&nbsp;&nbsp;&nbsp;(Philippine
										Peso)&nbsp;&nbsp;&nbsp;&nbsp;₱12,345,678.99</option>
									<option value="17">Poland&nbsp;&nbsp;&nbsp;&nbsp;(Zloty)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99zł
									</option>
									<option value="18">Portugal&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€
									</option>
									<option value="85">Qatar&nbsp;&nbsp;&nbsp;&nbsp;(Qatari Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99
									</option>
									<option value="31">Romania&nbsp;&nbsp;&nbsp;&nbsp;(Romanian
										Leu)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99lei</option>
									<option value="23">Russian Federation&nbsp;&nbsp;&nbsp;&nbsp;(Ruble)&nbsp;&nbsp;&nbsp;&nbsp;12 345
										678,99₽</option>
									<option value="85">Saudi Arabia&nbsp;&nbsp;&nbsp;&nbsp;(Saudi
										Riyal)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99</option>
									<option value="51">Singapore&nbsp;&nbsp;&nbsp;&nbsp;(Singapore
										Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
									<option value="20">Slovakia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€
									</option>
									<option value="34">Slovenia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€
									</option>
									<option value="62">South Africa&nbsp;&nbsp;&nbsp;&nbsp;(Rand)&nbsp;&nbsp;&nbsp;&nbsp;R12,345,678.99
									</option>
									<option value="62">South Africa&nbsp;&nbsp;&nbsp;&nbsp;(Rand)&nbsp;&nbsp;&nbsp;&nbsp;R12 345 678,99
									</option>
									<option value="33">Spain&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€</option>
									<option value="16">Sweden&nbsp;&nbsp;&nbsp;&nbsp;(Swedish Krona)&nbsp;&nbsp;&nbsp;&nbsp;12 345
										678,99kr</option>
									<option value="103">Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss
										Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99</option>
									<option value="47">Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss
										Franc)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678.99CHF</option>
									<option value="102">Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss
										Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99</option>
									<option value="">Syrian Arab Republic&nbsp;&nbsp;&nbsp;&nbsp;(SYP)&nbsp;&nbsp;&nbsp;&nbsp;SYP
										12,345,679</option>
									<option value="60">Taiwan&nbsp;&nbsp;&nbsp;&nbsp;(Taiwan
										Dollar)&nbsp;&nbsp;&nbsp;&nbsp;NT$12,345,678.99</option>
									<option value="75">Thailand&nbsp;&nbsp;&nbsp;&nbsp;(Baht)&nbsp;&nbsp;&nbsp;&nbsp;฿12,345,678.99
									</option>
									<option value="66">Trinidad & Tobago&nbsp;&nbsp;&nbsp;&nbsp;(T/T
										Dollar)&nbsp;&nbsp;&nbsp;&nbsp;TT$1,234.99</option>
									<option value="100">Tunisia&nbsp;&nbsp;&nbsp;&nbsp;(Tunisian
										Dinar)&nbsp;&nbsp;&nbsp;&nbsp;TND12,345,678.994</option>
									<option value="45">Turkey&nbsp;&nbsp;&nbsp;&nbsp;(Turkish Lira)&nbsp;&nbsp;&nbsp;&nbsp;₺12.345.678,99
									</option>
									<option value="22">Ukraine&nbsp;&nbsp;&nbsp;&nbsp;(Hryvnia)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99₴
									</option>
									<option value="87">United Arab Emirates&nbsp;&nbsp;&nbsp;&nbsp;(UAE
										Dirham)&nbsp;&nbsp;&nbsp;&nbsp;AED12,345,678.99</option>
									<option value="71">United Kingdom&nbsp;&nbsp;&nbsp;&nbsp;(GBP)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99
									</option>
									<option value="48">United States&nbsp;&nbsp;&nbsp;&nbsp;(US
										Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99</option>
									<option value="37">Uruguay&nbsp;&nbsp;&nbsp;&nbsp;(Peso
										Uruguayo)&nbsp;&nbsp;&nbsp;&nbsp;$U12.345.678,99</option>
									<option value="74">Uzbekistan&nbsp;&nbsp;&nbsp;&nbsp;(Uzbekistan
										Sum)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99</option>
									<option value="46">Venezuela&nbsp;&nbsp;&nbsp;&nbsp;(Bolívar
										Soberano)&nbsp;&nbsp;&nbsp;&nbsp;VES12.345.678,99</option>
									<option value="32">Viet Nam&nbsp;&nbsp;&nbsp;&nbsp;(Dong)&nbsp;&nbsp;&nbsp;&nbsp;12.345.679₫</option>
									<option value="85">Yemen&nbsp;&nbsp;&nbsp;&nbsp;(Yemeni Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99
									</option>
									<option value="101">Zimbabwe&nbsp;&nbsp;&nbsp;&nbsp;(ZWL)&nbsp;&nbsp;&nbsp;&nbsp;ZWL12,345,678.99
									</option>

								</select>
							</div>



							<div class="control-group">
								<select name="date-select" id="date-select" class="calc-control">
									<option value="0">MM/DD/YYYY</option>
									<option value="1">DD/MM/YYYY</option>
									<option value="4">DD-MM-YYYY</option>
									<option value="3">DD.MM.YYYY</option>
									<option value="2">YYYY-MM-DD</option>
									<option value="5">YYYY.MM.DD</option>
									<option value="6">YYYY/MM/DD</option>
								</select>
							</div>

						</form>
					</div>
					<p class="text-center">All calculators will remember your choice. You may also
						change it at any
						time.
					</p>
					<p class="text-center">Clicking
						<b>&quot;Save changes&quot;</b> will cause the calculator to reload. Your
						edits will be
						lost.
					</p>
				</div>
				<div class="modal-footer">
					<button id="CURRENCYDATE_cancel" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button id="CURRENCYDATE_save" type="button" class="btn btn-primary" data-dismiss="modal">Save
						changes</button>
				</div>
			</div>
		</div>
	</div>
	<!--CURRENCYDATE modal-->
	<!-- end currency date options -->

</div>
<!--id="fc-modals"-->
<!-- end dialog code -->





<?php
}
?>
<!--end savings calculator plugin-->