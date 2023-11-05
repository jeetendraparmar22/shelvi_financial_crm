$(document).ready(function () {
    $(
        "#loan-amount, #interest-rate, #loan-term, #cutoff-fee, #loan-suraksha-vimo, #loan-suraksha-vimo,  #iho, #road-side-assite, #rto, #hold-for-insurance"
    ).on("input", function () {
        calculateLoan();
    });

    function calculateLoan() {
        let loanAmount = parseFloat($("#loan-amount").val() || 0);
        let annualInterestRate = parseFloat($("#interest-rate").val() || 0);
        let loanTermMonths = parseFloat($("#loan-term").val() || 0);
        let cutoffFee = parseFloat($("#cutoff-fee").val() || 0);
        let loanSurakshaVimo = parseFloat($("#loan-suraksha-vimo").val() || 0);
        let iho = parseFloat($("#iho").val() || 0);
        let roadSideAssite = parseFloat($("#road-side-assite").val() || 0);
        let rto = parseFloat($("#rto").val() || 0);
        let holdForInsurance = parseFloat($("#hold-for-insurance").val() || 0);

        if (loanAmount > 0 && annualInterestRate > 0 && loanTermMonths > 0) {
            let monthlyInterestRate = annualInterestRate / 12 / 100;
            let emi = calculateEMI(
                loanAmount,
                monthlyInterestRate,
                loanTermMonths
            );
            // let totalRemaining = (emi * loanTermMonths) + cutoffFee;
            let totalRemaining =
                loanAmount -
                cutoffFee -
                loanSurakshaVimo -
                iho -
                roadSideAssite -
                rto -
                holdForInsurance;

            $("#emi-result").val(emi.toFixed(2));
            $("#total-remaining").text(totalRemaining.toFixed(2));
        } else {
            $("#emi-result").text("0.00");
            $("#total-remaining").text("0.00");
        }
    }

    function calculateEMI(loanAmount, monthlyInterestRate, loanTermMonths) {
        let emi =
            (loanAmount *
                monthlyInterestRate *
                Math.pow(1 + monthlyInterestRate, loanTermMonths)) /
            (Math.pow(1 + monthlyInterestRate, loanTermMonths) - 1);
        return emi;
    }
});
