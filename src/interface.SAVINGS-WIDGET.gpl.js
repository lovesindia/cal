
/*global jQuery: false, GUI$: false, Cookies: false */
/*jslint vars: true */

/** 
* @preserve Copyright 2020 Pine Grove Software, LLC
* financial-calculators.com
* pine-grove.com
* interface.SAVINGS-WIDGET.gpl.js
*/
(function ($, GUI) {
	'use strict';

	// don't try to initialize the wrong calculator
	if (!document.getElementById('savings-plugin')) {
		return;
	}


	var obj = {}, // interface object to base equations
		// schedule,
		// gui controls
		cfInput,
		numPmtsInput,
		rateInput;



	/**
	* init() -- init or reset GUI's values
	*/
	function initGUI() {
		var dt = new Date();
		dt.setHours(0, 0, 0, 0);

		cfInput.setValue(cfInput.getUSNumber());
		numPmtsInput.setValue(numPmtsInput.getUSNumber());
		rateInput.setValue(rateInput.getUSNumber());

		document.getElementById("edFV-sv").value = GUI.formatLocalFloat(0.0, GUI.moneyConventions, 2);
		document.getElementById("edInterest-sv").value = GUI.formatLocalFloat(0.0, GUI.moneyConventions, 2);
		document.getElementById("edTotalInvested-sv").value = GUI.formatLocalFloat(0.0, GUI.moneyConventions, 2);
		document.getElementById("edFVDate-sv").value = GUI.dateConventions.date_mask;

	} // initGUI



	/**
	* clearGUI() -- reset GUI's values
	*/
	function clearGUI() {

		cfInput.setValue(0.0);
		numPmtsInput.setValue(0);
		rateInput.setValue(0.0);

		document.getElementById("edFV-sv").value = GUI.formatLocalFloat(0.0, GUI.moneyConventions, 2);
		document.getElementById("edInterest-sv").value = GUI.formatLocalFloat(0.0, GUI.moneyConventions, 2);
		document.getElementById("edTotalInvested-sv").value = GUI.formatLocalFloat(0.0, GUI.moneyConventions, 2);
		document.getElementById("edFVDate-sv").value = GUI.dateConventions.date_mask;

	} // clearGUI



	/**
	* getInputs() -- get user inputs and initialize obj equation interface object
	*/
	function getInputs() {
		// var temp, selPmtFreq, selCmpFreq, date1, date2;

		// all rates are passed as decimal equivalents
		obj = {};
		obj.pv = cfInput.getUSNumber();
		obj.cf = obj.pv;
		obj.n = numPmtsInput.getUSNumber();
		obj.nominalRate = rateInput.getUSNumber() / 100;
		obj.fv = 0.0;


		obj.oDate = GUI.dateMath.getFirstNextMonth(new Date());
		obj.oDate.setHours(0, 0, 0, 0);
		obj.fDate = GUI.dateMath.getFirstNextMonth(new Date(obj.oDate));
		obj.lDate = new Date();

		obj.pmtFreq = 6;
		obj.cmpFreq = 6;
		obj.pmtMthd = 1;

	}



	/** 
	* calc() -- initialize CashInputs data structures for equation classes
	*/
	function calc() {
		var invested;

		if (obj.cf === 0 || obj.nominalRate === 0 || obj.n === 0) {
			alert('There are unknown values.\nPlease make sure all values are entered.');
			return null;
		}

		obj.lDate.setTime(GUI.dateMath.addPeriods(obj.oDate, obj.n, obj.pmtFreq));
		GUI.SAVINGS_SCHEDULE.calc(obj);
		obj.fv = GUI.summary.unadjustedBalance;
		invested = obj.cf * obj.n;
		obj.lDate.setTime(GUI.dateMath.addPeriods(obj.oDate, obj.n - 1, obj.pmtFreq));

		document.getElementById("edFV-sv").value = GUI.formatLocalFloat(GUI.roundMoney(obj.fv, 2), GUI.moneyConventions, 2);
		document.getElementById("edInterest-sv").value = GUI.formatLocalFloat(GUI.roundMoney(obj.fv - invested, 2), GUI.moneyConventions, 2);
		document.getElementById("edTotalInvested-sv").value = GUI.formatLocalFloat(GUI.roundMoney(invested, 2), GUI.moneyConventions, 2);
		document.getElementById("edFVDate-sv").value = GUI.dateMath.dateToDateStr(obj.lDate, GUI.dateConventions);
		return 1;
	} // function calc()




	$(document).ready(function () {

		// If user has a ccy_format cookie, use its value first
		// otherwise if website set default currency use it
		// otherwise use currency determined by user's locale - previously initialized
		var currency = parseInt(document.getElementById('currency-sv').value, 10);
		if (Cookies.get('ccy_format')) {
			GUI.updateNumConventions(parseInt(Cookies.get('ccy_format'), 10));
			// GUI.moneyConventions = new GUI.LocalConventions(parseInt(Cookies.get('ccy_format'), 10));
			// // clones moneyConventions and sets ccy_r = '%'
			// GUI.rateConventions = GUI.moneyConventions.rateConvention(); // clones currency conventions with'%' symbol
			// GUI.numConventions = GUI.moneyConventions.numConvention(); // clones currency conventions without currency
		} else if (currency !== undefined && currency !== null && typeof currency === 'number' && currency !== 999) {
			GUI.updateNumConventions(currency);
		}

		// If user has a date_format cookie, use its value first
		// otherwise if website set default date_mask use it
		// otherwise use date_mask determined by user's locale - previously initialized
		var date_mask = parseInt(document.getElementById('date_mask-sv').value, 10);
		if (Cookies.get('date_format')) {
			GUI.dateConventions = new GUI.LocalDateConventions(parseInt(Cookies.get('date_format'), 10));
		} else if (date_mask !== undefined && date_mask !== null && typeof date_mask === 'number' && date_mask !== 999) {
			GUI.updateDateConventions(date_mask);
		}

		//
		// initialize GUI controls & dialog / modal controls here
		// attach
		//

		// only required on the financial-calculators.com site
		// here for each comment reply link of WordPress
		// $('.comment-reply-link').addClass('btn btn-primary');

		// here for the submit button of the comment reply form
		// $('#submit').addClass('btn btn-primary');

		// Style contact form submit button
		// $('.wpcf7-submit').addClass('btn btn-primary');

		// Add thumbnail styling
		// $('.wp-caption').addClass('thumbnail');

		// Now we'll add some classes for the WordPress default widgets - let's go
		// Add Bootstrap style for drop-downs
		// $('.postform').addClass('form-control');
		// end: only required on the financial-calculators.com site


		// main window
		cfInput = new GUI.NE('edCF-sv', GUI.moneyConventions, 2);
		numPmtsInput = new GUI.NE('edNumPmts-sv', GUI.numConventions, 0);
		rateInput = new GUI.NE('edRate-sv', GUI.rateConventions, 4);

		initGUI();


		$('#btnCalc-sv').click(function () {
			if (getInputs() !== null) {
				// schedule = null;
				obj.fv = 0.0;
				calc();
			}
		});


		$('#btnClear-sv').click(function () {
			clearGUI();
		});


		$('#btnPrint-sv').click(function () {
			getInputs();
			obj.fv = 0.0;
			if (calc() !== null) {
				GUI.print_calc();
			}
		});


		$('#btnSchedule-sv').click(function () {
			getInputs();
			obj.fv = 0.0;
			if (calc() !== null) {
				GUI.showSavingsSchedule(GUI.SAVINGS_SCHEDULE.calc(obj));
			}
		});


		$('#btnCharts-sv').click(function () {
			GUI.summary.cashFlowType = 1;
			getInputs();
			if (calc() !== null) {
				GUI.showSavingsCharts(GUI.SAVINGS_SCHEDULE.calc(obj));
			}
		});


		$('#btnHelp-sv').click(function () {
			GUI.show_help('#hText-savings');
		});


		$('#btnCcyDate, #btnCcyDate2, #CCY-sv').click(function () {
			GUI$.init_CURRENCYDATE_Dlg();
		});

	}); // $(document).ready

}(jQuery, GUI$));
