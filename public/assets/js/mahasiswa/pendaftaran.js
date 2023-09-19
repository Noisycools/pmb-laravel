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
            $(".file-upload").removeClass("active");
            $("#noFile").text("No file chosen...");
        } else {
            $(".file-upload").addClass("active");
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

    $("#file_kk").bind("change", function () {
        var filename = $("#file_kk").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass("active");
            $("#noFile").text("No file chosen...");
        } else {
            $(".file-upload").addClass("active");
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

    $("#file_pasfoto").bind("change", function () {
        var filename = $("#file_pasfoto").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass("active");
            $("#noFile").text("No file chosen...");
        } else {
            $(".file-upload").addClass("active");
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

    $("#file_butawarna").bind("change", function () {
        var filename = $("#file_butawarna").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass("active");
            $("#noFile").text("No file chosen...");
        } else {
            $(".file-upload").addClass("active");
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });
});
