"use strict";

let messages = {};

var lang = $('html').attr('lang');

const currentLanguage = document.documentElement.lang || "ar";

function loadMessagesWithCache(lang) {
    const cachedMessages = localStorage.getItem(`messages_${lang}`);
    if (cachedMessages) {
        messages = JSON.parse(cachedMessages);
        return Promise.resolve();
    } else {
        return $.getJSON(`/assets/js/cms/language/languages.json`, function (data) {
            messages = data[lang] || data["en"];
            localStorage.setItem(`messages_${lang}`, JSON.stringify(messages));
        });
    }
}

loadMessagesWithCache(currentLanguage).then(() => {
    console.log("Messages loaded:", messages);
});

const dataTableLanguage = currentLanguage === "ar"
    ? '/assets/js/cms/language/ar.json'
    : '';
var KTAppCmsMembers = function () {
    return {
        init: function () {
            const table = $("#kt_cms_members_table").DataTable({
                processing: true,
                serverSide: true,
                language: { url: dataTableLanguage },
                ajax: {
                    url: '/' + lang + '/cms/admin/members/',
                    type: "GET",
                },
                columns: [
                    {data: "checkbox", orderable: false, searchable: false },
                    {data: 'partials', name: 'name'},
                    {data: 'position', name: 'position'},
                    {data: 'phone', name: 'phone'},
                    {data: 'role',    name: 'role'},
                    {data: 'status',    name: 'status'},
                    {data: 'actions',   name: 'actions', orderable: true, searchable: true},
                ],
                order: [[1, "asc"]]
                // target: "_all"
            });

            // Delete functionality
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            table.on("click", '[data-kt-cms-member-filter="delete_row"]', function () {
                const memberId = $(this).closest("div[data-member-id]").data("member-id");
                const memberName = $(this).closest("div[data-member-name]").data("member-name");

                Swal.fire({
                    text: `${messages.Deleted} ${memberName}?`,
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText:messages.YesButtonText,
                    cancelButtonText: messages.NoButtonText,
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            text: messages.Deleting + memberName + "...",
                            icon: "info",
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                        $.ajax({
                            url:  '/' + lang + '/cms/admin/members/' + memberId,
                            type: "DELETE",
                            success: function (response) {
                                Swal.fire({
                                    text: response.text,
                                    icon: response.icon,
                                    buttonsStyling: false,
                                    confirmButtonText: response.confirmButtonText,
                                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                                }).then(() => table.ajax.reload());
                            },
                            error: function () {
                                Swal.fire({
                                    text: messages.genericError,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: messages.confirmButtonText,
                                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                                });
                            }
                        });
                    }else if(result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            text: memberName + messages.NotDeleted,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: messages.confirmButtonText,
                            customClass: { confirmButton: "btn fw-bold btn-primary" }
                        });
                    }
                });
            });
        }
    };
}();
$('#kt_cms_projects_table').on('draw.dt', function () {
    KTMenu.createInstances();
});

KTUtil.onDOMContentLoaded(function () {
    KTAppCmsMembers.init();

});
