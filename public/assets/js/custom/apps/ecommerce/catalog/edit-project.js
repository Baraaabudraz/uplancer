"use strict";

var KTAppCmsSaveProject = function () {
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

    const initSelect2 = () => {
        document.querySelectorAll('[data-kt-cms-edit-project="project_option"]').forEach((e) => {
            if (!$(e).hasClass("select2-hidden-accessible")) {
                $(e).select2({ minimumResultsForSearch: -1 });
            }
        });
    };

    const initDropzone = () => {
        const uploadedFiles = [];
        const myDropzone = new Dropzone("#kt_cms_edit_project_media", {
            url: routes.post, // Update this to your server-side upload handler
            paramName: "images",
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                uploadedFiles.push(response.filePath); // Adjust based on server response
            },
            removedfile: function (file) {
                file.previewElement.remove();
            }
        });
    };

    const handleFormSubmit = () => {
        const form = document.getElementById("kt_cms_edit_project_form");
        const submitButton = document.getElementById("kt_cms_edit_project_submit");

        if (form && submitButton) {
            submitButton.addEventListener("click", function (event) {
                event.preventDefault();
                let formData = new FormData(form);
                submitButton.setAttribute("data-kt-indicator", "on");
                submitButton.disabled = true;

                $.ajax({
                    url: form.getAttribute('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        submitButton.removeAttribute("data-kt-indicator");
                        submitButton.disabled = false;

                        Swal.fire({
                            text: response.text,
                            icon: response.icon,
                            buttonsStyling: false,
                            confirmButtonText: messages.confirmButtonText,
                            customClass: { confirmButton: "btn btn-primary" }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = response.redirectUrl || form.getAttribute("data-kt-redirect");
                            }
                        });
                    },
                    error: function (xhr) {
                        submitButton.removeAttribute("data-kt-indicator");
                        submitButton.disabled = false;

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            $('.error-message').empty();

                            $.each(errors, function (key, message) {
                                if (key.includes('.')) {
                                    const [field, subfield] = key.split('.');
                                    let input = form.querySelector(`[name="${field}[${subfield}]"]`);
                                    if (input) {
                                        $(input).after(`<div class="error-message" style="color: red;">${message[0]}</div>`);
                                    }
                                } else {
                                    let input = form.querySelector(`[name="${key}"]`);
                                    if (input) {
                                        $(input).after(`<div class="error-message" style="color: red;">${message[0]}</div>`);
                                    }
                                }
                            });

                            Swal.fire({
                                text: messages.correctErrors,
                                icon: 'error',
                                buttonsStyling: false,
                                confirmButtonText: messages.confirmButtonText,
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        } else {
                            Swal.fire({
                                text: messages.genericError,
                                icon: 'error',
                                buttonsStyling: false,
                                confirmButtonText: messages.confirmButtonText,
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        }
                    }
                });
            });
        }
    };

    const initializeSelect2WithInfiniteScroll = (selectElement, url) => {
        selectElement.select2({
            allowClear: true,
            // multiple: true,
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        page: params.page || 1,
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: $.map(data.data, function (item) {
                            return {
                                id: item.id,
                                text: item.name[currentLanguage] || item.name["ar"] || item.name.en, // <--- تعديل هنا
                            };
                        }),
                        pagination: {
                            more: data.current_page < data.last_page,
                        },
                    };
                },
                cache: true,
            },
            minimumInputLength: 0,
            templateResult: function (item) {
                if (item.loading) {
                    return item.text;
                }
                if (typeof item.text === 'object') {
                    return item.text[currentLanguage] || item.text["ar"] || item.text.en;
                }
                return item.text;
            },
            templateSelection: function (item) {
                if (item && item.text) {
                    if (typeof item.text === 'object') {
                        return item.text[currentLanguage] || item.text["ar"] || item.text.en;
                    }
                    return item.text;
                }
                return item ? item.text : item;
            },
        });
    };


    $(document).ready(function() {
        const selectElement = $('select[name="service_id"]');
        const serviceId = selectElement.data('selected-id');
        if (serviceId) {
            $.ajax({
                url: services.get,
                dataType: 'json',
                data: { id: serviceId }
            }).then(function(data) {
                if (data && data.data && data.data.length > 0) {
                    const selectedItem = data.data.find(item => item.id == serviceId);
                    if (selectedItem) {
                        let serviceName;
                        if (typeof selectedItem.name === 'object') {
                            serviceName = selectedItem.name[currentLanguage] || selectedItem.name["ar"] || selectedItem.name.en;
                        } else {
                            serviceName = selectedItem.name;
                        }
                        const option = new Option(serviceName, selectedItem.id, true, true);
                        selectElement.append(option).trigger('change');
                    }
                }
                initializeSelect2WithInfiniteScroll(selectElement, services.get,serviceId);
            });
        } else {
            initializeSelect2WithInfiniteScroll(selectElement, services.get);
        }
    });

    return {
        init: function () {
            handleFormSubmit();
            initSelect2();
            initDropzone();
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTAppCmsSaveProject.init();
});
