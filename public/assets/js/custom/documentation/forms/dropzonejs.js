"use strict";
var KTFormsDropzoneJSDemos = {
    init: function (e) {
        new Dropzone("#kt_dropzonejs_example_1", {
            url: "https://keenthemes.com/scripts/void.php",
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10,
            addRemoveLinks: !0,
            accept: function (e, o) {
                "wow.jpg" == e.name ? o("Naha, you don't.") : o()
            }
        }), function () {
            var e = "#kt_dropzonejs_example_2", o = $(e + " .dropzone-item");
            o.id = "";
            var n = o.parent(".dropzone-items").html();
            o.remove();
            var r = new Dropzone(e, {
                url: "https://keenthemes.com/scripts/void.php",
                parallelUploads: 20,
                previewTemplate: n,
                maxFilesize: 1,
                autoQueue: !1,
                previewsContainer: e + " .dropzone-items",
                clickable: e + " .dropzone-select"
            });
            r.on("addedfile", (function (o) {
                o.previewElement.querySelector(e + " .dropzone-start").onclick = function () {
                    r.enqueueFile(o)
                }, $(document).find(e + " .dropzone-item").css("display", ""), $(e + " .dropzone-upload, " + e + " .dropzone-remove-all").css("display", "inline-block")
            })), r.on("totaluploadprogress", (function (o) {
                $(this).find(e + " .progress-bar").css("width", o + "%")
            })), r.on("sending", (function (o) {
                $(e + " .progress-bar").css("opacity", "1"), o.previewElement.querySelector(e + " .dropzone-start").setAttribute("disabled", "disabled")
            })), r.on("complete", (function (o) {
                var n = e + " .dz-complete";
                setTimeout((function () {
                    $(n + " .progress-bar, " + n + " .progress, " + n + " .dropzone-start").css("opacity", "0")
                }), 300)
            })), document.querySelector(e + " .dropzone-upload").onclick = function () {
                r.enqueueFiles(r.getFilesWithStatus(Dropzone.ADDED))
            }, document.querySelector(e + " .dropzone-remove-all").onclick = function () {
                $(e + " .dropzone-upload, " + e + " .dropzone-remove-all").css("display", "none"), r.removeAllFiles(!0)
            }, r.on("queuecomplete", (function (o) {
                $(e + " .dropzone-upload").css("display", "none")
            })), r.on("removedfile", (function (o) {
                r.files.length < 1 && $(e + " .dropzone-upload, " + e + " .dropzone-remove-all").css("display", "none")
            }))
        }(), function () {
            var e = "#kt_dropzonejs_example_3", o = $(e + " .dropzone-item");
            o.id = "";
            var n = o.parent(".dropzone-items").html();
            o.remove();
            var r = new Dropzone(e, {
                url: "https://keenthemes.com/scripts/void.php",
                parallelUploads: 20,
                maxFilesize: 1,
                previewTemplate: n,
                previewsContainer: e + " .dropzone-items",
                clickable: e + " .dropzone-select"
            });
            r.on("addedfile", (function (o) {
                $(document).find(e + " .dropzone-item").css("display", "")
            })), r.on("totaluploadprogress", (function (o) {
                $(e + " .progress-bar").css("width", o + "%")
            })), r.on("sending", (function (o) {
                $(e + " .progress-bar").css("opacity", "1")
            })), r.on("complete", (function (o) {
                var n = e + " .dz-complete";
                setTimeout((function () {
                    $(n + " .progress-bar, " + n + " .progress").css("opacity", "0")
                }), 300)
            }))
        }()
    }
};
KTUtil.onDOMContentLoaded((function () {
    KTFormsDropzoneJSDemos.init()
}));
