$(document).ready(function () {
    $("#smartwizard").smartWizard({
        selected: 0,
        theme: "arrows",
        autoAdjustHeight: true,
        transitionEffect: "fade",
        showStepURLhash: false,
        lang: {
            next: "Selanjutnya",
            previous: "Kembali",
        },
    });

    $("#jenis_kelamin").select2();
    $("#tanggal_lahir").datepicker({
        format: "yyyy/mm/dd",
    });

    $("#file_ijazah").bind("change", function () {
        var filename = $("#file_ijazah").val();
        if (/^\s*$/.test(filename)) {
            $(".ijazah").removeClass("active");
            $("#noFile-ijazah").text("No file chosen...");
        } else {
            $(".ijazah").addClass("active");
            $("#noFile-ijazah").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

    $("#file_kk").bind("change", function () {
        var filename = $("#file_kk").val();
        if (/^\s*$/.test(filename)) {
            $(".kk").removeClass("active");
            $("#noFile-kk").text("No file chosen...");
        } else {
            $(".kk").addClass("active");
            $("#noFile-kk").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

    $("#file_pasfoto").bind("change", function () {
        var filename = $("#file_pasfoto").val();
        if (/^\s*$/.test(filename)) {
            $(".pasfoto").removeClass("active");
            $("#noFile-pasfoto").text("No file chosen...");
        } else {
            $(".pasfoto").addClass("active");
            $("#noFile-pasfoto").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

    $("#file_butawarna").bind("change", function () {
        var filename = $("#file_butawarna").val();
        if (/^\s*$/.test(filename)) {
            $(".butawarna").removeClass("active");
            $("#noFile-butawarna").text("No file chosen...");
        } else {
            $(".butawarna").addClass("active");
            $("#noFile-butawarna").text(filename.replace("C:\\fakepath\\", ""));
        }
    });
});
