"use strict";
var KTDatatablesAdvanced = {
    init: function () {
        var t, e;
        t = {
            1: {title: "Pending", state: "primary"},
            2: {title: "Delivered", state: "danger"},
            3: {title: "Canceled", state: "primary"},
            4: {title: "Success", state: "success"},
            5: {title: "Info", state: "info"},
            6: {title: "Danger", state: "danger"},
            7: {title: "Warning", state: "warning"}
        }, $("#kt_datatable_example_1").DataTable({
            columnDefs: [{
                render: function (e, a, n) {
                    var l = KTUtil.getRandomInt(1, 7);
                    return e + '<span class="ms-2 badge badge-light-' + t[l].state + ' fw-bold">' + t[l].title + "</span>"
                }, targets: 1
            }]
        }), $("#kt_datatable_example_2").DataTable({
            columnDefs: [{
                visible: !1,
                targets: -1
            }]
        }), e = $("#kt_datatable_example_3").DataTable({
            columnDefs: [{visible: !1, targets: 2}],
            order: [[2, "asc"]],
            displayLength: 25,
            drawCallback: function (t) {
                var e = this.api(), a = e.rows({page: "current"}).nodes(), n = null;
                e.column(2, {page: "current"}).data().each((function (t, e) {
                    n !== t && ($(a).eq(e).before('<tr class="group fs-5 fw-bolder"><td colspan="5">' + t + "</td></tr>"), n = t)
                }))
            }
        }), $("#kt_datatable_example_3 tbody").on("click", "tr.group", (function () {
            var t = e.order()[0];
            2 === t[0] && "asc" === t[1] ? e.order([2, "desc"]).draw() : e.order([2, "asc"]).draw()
        })), $("#kt_datatable_example_4").DataTable({
            footerCallback: function (t, e, a, n, l) {
                var r = this.api(), s = function (t) {
                    return "string" == typeof t ? 1 * t.replace(/[\$,]/g, "") : "number" == typeof t ? t : 0
                }, c = r.column(4).data().reduce((function (t, e) {
                    return s(t) + s(e)
                }), 0), o = r.column(4, {page: "current"}).data().reduce((function (t, e) {
                    return s(t) + s(e)
                }), 0);
                $(r.column(4).footer()).html("$" + o + " ( $" + c + " total)")
            }
        }), $("#kt_datatable_example_5").DataTable({
            language: {lengthMenu: "Show _MENU_"},
            dom: "<'row'<'col-sm-6 d-flex align-items-center justify-conten-start'l><'col-sm-6 d-flex align-items-center justify-content-end'f>><'table-responsive'tr><'row'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i><'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>>"
        })
    }
};
KTUtil.onDOMContentLoaded((function () {
    KTDatatablesAdvanced.init()
}));
