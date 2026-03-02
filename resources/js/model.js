let root_url = $("meta[name=base-url]").attr("content");
let csrf_token = $("meta[name=csrf-token]").attr("content");
function notifyError(title, message){
    $(".notification_bar").append(`<div class="notification_data" model_id="" param='{"type":"E","title":"`+title+`"}'>
                <div class="actions"></div>
                <div class="message">`+message+`</div>
                <div class="buttons"></div>
            </div>`);
    $(".notification_bar .notification_data").each(function (index, bar) {
        setTimeout(function () { Modelize(bar) }, 500 * index);
    });
}
function notifySuccess(title, message){
    $(".notification_bar").append(`<div class="notification_data" model_id="" param='{"type":"S","title":"`+title+`"}'>
                <div class="actions"></div>
                <div class="message">`+message+`</div>
                <div class="buttons"></div>
            </div>`);
    $(".notification_bar .notification_data").each(function (index, bar) {
        setTimeout(function () { Modelize(bar) }, 500 * index);
    });
}
function notifyWarning(title, message){
    $(".notification_bar").append(`<div class="notification_data" model_id="" param='{"type":"W","title":"`+title+`"}'>
                <div class="actions"></div>
                <div class="message">`+message+`</div>
                <div class="buttons"></div>
            </div>`);
    $(".notification_bar .notification_data").each(function (index, bar) {
        setTimeout(function () { Modelize(bar) }, 500 * index);
    });
}
function notify(title, message){
    $(".notification_bar").append(`<div class="notification_data" model_id="" param='{"type":"N","title":"`+title+`"}'>
                <div class="actions"></div>
                <div class="message">`+message+`</div>
                <div class="buttons"></div>
            </div>`);
    $(".notification_bar .notification_data").each(function (index, bar) {
        setTimeout(function () { Modelize(bar) }, 500 * index);
    });
}
function Modelize(model) {
    let param = {
        align: 'right', // left, right, center
        vAlign: 'bottom', // top, bottom, middle
        color: 'white', // color code
        titleBackground: 'green', // title background,
        titleColor: 'white',
        closeIcon: true,
        border: true,
        buttons: false,
        screenTime: 5000,
        typewritter: true,
        type: 'S', // S = Success, N = Notice, E = Error, W = Warning
        animation: 'animate-top' // animate-top, animate-bottom, animate-center, animate-left, animate-right, animate-spin, animate-rotate, animate-scale
    };
    let p = $(model).attr("param");
    if (p = JSON.parse(p)) {
        for (const key in p) {
            param[key] = p[key];
        }
    }
    if (param.typewritter == true) {
        let text = $(model).find(".message").text();
        $(model).find(".message").text("");
        typeWritter($(model).find(".message"), text, 50);
        $(model).addClass("show");
        $(model).width("350px");
    } else {
        $(model).addClass("show");
    }
    if (param.align) {
        $(".notification_bar").addClass(param.align);
    }
    if (param.vAlign) {
        $(".notification_bar").addClass(param.vAlign);
    }

    if (param.type) {
        $(model).addClass("type_" + param.type);
        $(model).find(".actions").html(gTitle(param.textTitle ?? param.title));
    }
    if (param.closeIcon) {
        $(model).addClass("type_" + param.type);
        $(model).find(".actions").append(Button());
    }
    if (param.border) {
        $(model).addClass("border");
    }
    if (param.titleColor) {
        $(model).find("actions").css("color", param.titleColor);
    }
    if (param.titleBackground) {
        $(model).find("actions").css("background", param.titleBackground);
    }
    if (param.screenTime) {
        modeOff(model, param);
    }

    if (param.animation) {
        $(model).addClass(param.animation);
    }



}
function typeWritter(node, text, time = 50, cl = true) {
    if (cl) {
        $(node).addClass("typeWritter");
    }
    let j = 0;
    for (let i = 0; i < text.length; i++) {
        setTimeout(function () {
            $(node).append(text[i]);
        }, i * time);
        j = i;
    }
    if (cl) {
        setTimeout(function () {
            $(node).removeClass("typeWritter");
        }, j * time + 1);
    }
}
function modeOff(model, param) {
    setTimeout(function () {
        model.remove();
    }, param.screenTime);
}
function Button() {
    return "<button>" + '<i class="fa fa-close"></i>' + "</button>";
}
function gTitle(title) {
    return `<h3 class="titles">` + title + `</h3>`;
}

$(document).ready(function () {
    $(".notification_bar .notification_data").each(function (index, bar) {
        setTimeout(function () { Modelize(bar) }, 500 * index);
    });


    $(".notification_data").click(function () {
        $(this).hide();
        $(this).remove();
    });

    $(".ai_points .points").each(function (key, node) {
        setTimeout(function () {
            // let text = $(node).find("span").text();
            // $(node).find("span").text("");
            $(node).addClass("show");
            // typeWritter($(node).find("span"), text);
        }, key * 1000);
    });
    let ind = $(".mw .narote").length;


    function slideNarote(k = 0) {
        $(".mw .narote").each(function (key, node) {
            if (k == key) {
                setTimeout(function () {
                    let text = $(node).text();
                    $(node).text("");
                    $(node).addClass("show");
                    typeWritter($(node), text);
                    setTimeout(function () {
                        $(node).removeClass("show");
                        if (key == ind - 1) {
                            slideNarote();
                        } else {
                            slideNarote(key + 1);
                        }
                    }, 7000);

                }, 500);

            }
        });
    }
    slideNarote();
    $(".details .sum").click(function () {
        $(this).find(".ans").slideToggle(400);
        $(this).find(".questions button").toggleClass('rotate');
    });

    $(".ds-flie[type='file']").change(function () {
        var connection = $(this).attr("connection");
        var blob_link = $("#" + connection);
        var files = $(this).prop('files');
        if (files.length > 0) {
            var file = files[0];
            // Add to pending files
            convertToBlobUrl(file, function (blobUrl, mimeType) {
                blob_link.val(blobUrl);
                blob_link.change();
            });
        }
    });
});
function opener(query) {
    $("." + query).slideToggle();
}
function serializeFormToObject(formSelector) {
    let formArray = $(formSelector).serializeArray();
    let formDataObject = {};

    $.each(formArray, function () {
        if (formDataObject[this.name]) {
            if (!Array.isArray(formDataObject[this.name])) {
                formDataObject[this.name] = [formDataObject[this.name]];
            }
            formDataObject[this.name].push(this.value || '');
        } else {
            formDataObject[this.name] = this.value || '';
        }
    });

    return formDataObject;
}
function getFormData(query) {
    var result = {};
    var pendingFiles = []; // To keep track of files being processed

    $(query).find('input, textarea, select').each(function () {
        var name = $(this).attr('name');
        var value;
        if ($(this).is('input[type="file"]')) {
            var files = $(this).prop('files');
            if (files.length > 0) {
                var file = files[0];
                // Add to pending files
                pendingFiles.push(new Promise((resolve) => {
                    convertToBlobUrl(file, function (blobUrl, mimeType) {
                        result[name] = blobUrl;
                        resolve(); // Resolve the promise once processing is done
                    });
                }));
            } else {
                result[name] = null; // No file selected
            }
        } else if ($(this).is(':radio') || $(this).is(':checkbox')) {
            if ($(this).is(':checked')) {
                value = $(this).val();
                result[name] = value;
            }
        } else {
            value = $(this).val();
            result[name] = value;
        }
    });

    // Wait for all file processing promises to complete
    return Promise.all(pendingFiles).then(() => result);
}

function detectMimeType(file, callback) {
    const reader = new FileReader();

    reader.onloadend = function () {
        const arrayBuffer = reader.result;
        const dataView = new DataView(arrayBuffer);
        let mimeType = 'application/octet-stream'; // Default MIME type

        // Check the beginning of the file to detect image types
        const bytes = new Uint8Array(arrayBuffer);

        // PNG
        if (bytes[0] === 137 && bytes[1] === 80 && bytes[2] === 78 && bytes[3] === 71) {
            mimeType = 'image/png';
        }
        // JPEG
        else if (bytes[0] === 255 && bytes[1] === 216 && bytes[2] === 255) {
            mimeType = 'image/jpeg';
        }
        // GIF
        else if (bytes[0] === 71 && bytes[1] === 73 && bytes[2] === 70) {
            mimeType = 'image/gif';
        }

        callback(mimeType);
    };

    reader.readAsArrayBuffer(file);
}
//
// function convertToBlobUrl(file, callback) {
//     detectMimeType(file, function (mimeType) {
//         const reader = new FileReader();
//         reader.onloadend = function () {
//             const base64 = reader.result;
//             const byteString = atob(base64.split(',')[1]);
//             const ab = new ArrayBuffer(byteString.length);
//             const ia = new Uint8Array(ab);
//
//             for (let i = 0; i < byteString.length; i++) {
//                 ia[i] = byteString.charCodeAt(i);
//             }
//
//             const blob = new Blob([ab], { type: mimeType });
//             const blobUrl = URL.createObjectURL(blob);
//             callback(blobUrl, mimeType);
//         };
//         reader.readAsDataURL(file);
//     });
// }
function convertToBlobUrl(file, callback) {
    const formData = new FormData();
    formData.append('file', file);
    formData.append('_token', csrf_token);

    $.ajax({
        url: root_url+'/file-uploader-free',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend:function(){
            $(".st_model_12_overlay").show();
        },
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('.st_model_12_progress_bar').width(percentComplete + '%');
                    $('.st_model_12_percentage').text(percentComplete + '%');
                }
            }, false);
            return xhr;
        },
        success: function(response) {
            $(".st_model_12_overlay").hide();
            $('.st_model_12_progress_bar').width("0" + '%');
            $('.st_model_12_percentage').text("0" + '%');
            if (response.success) {
                callback(response.url, response.mimeType);
            } else {
                notifyError('Upload error:', response.error);
            }
        },
        error: function(xhr, status, error) {
            $(".st_model_12_overlay").hide();
            $('.st_model_12_progress_bar').width("0" + '%');
            $('.st_model_12_percentage').text("0" + '%');
            notifyError('Upload error:', error.toString());
        }
    });
}
document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.single-content-output');
    let draggedItem = null;

    if (container) {
        container.addEventListener('dragstart', (event) => {
            draggedItem = event.target;
            event.target.style.opacity = 0.5;
        });

        container.addEventListener('dragend', (event) => {
            event.target.style.opacity = 1;
            draggedItem = null;
        });

        container.addEventListener('dragover', (event) => {
            event.preventDefault();
            let target = event.target;
            while (target && !target.classList.contains('ps5')) {
                target = target.parentElement;
            }
            if (target && target.classList.contains('ps5')) {
                target.style.border = '2px dashed #505050';
                target.style.margin = '0'; // Ensure no margin is applied
                event.dataTransfer.dropEffect = 'move';
            }

        });

        container.addEventListener('dragenter', (event) => {
            let target = event.target;
            while (target && !target.classList.contains('ps5')) {
                target = target.parentElement;
            }
            if (target && target.classList.contains('ps5')) {
                target.style.border = '2px dashed #000';
                target.style.margin = '0'; // Ensure no margin is applied
                event.dataTransfer.dropEffect = 'move';
            }
        });

        container.addEventListener('dragleave', (event) => {
            let target = event.target;
            while (target && !target.classList.contains('ps5')) {
                target = target.parentElement;
            }
            if (target && target.classList.contains('ps5')) {
                target.style.border = '';
                target.style.margin = ''; // Reset margin
            }
        });

        container.addEventListener('drop', (event) => {
            event.preventDefault();
            let target = event.target;
            while (target && !target.classList.contains('ps5')) {
                target = target.parentElement;
            }
            if (target && target.classList.contains('ps5')) {
                target.style.border = '';
                target.style.margin = ''; // Reset margin after drop
                if (draggedItem && draggedItem !== target) {
                    const draggedIndex = parseInt(draggedItem.getAttribute('data-index'));
                    const itemIndex = parseInt(draggedItem.getAttribute('item-index'));
                    const itemType = draggedItem.getAttribute('item-type');
                    const targetIndex = parseInt(target.getAttribute('data-index'));

                    // Swap items
                    if (draggedIndex !== targetIndex) {
                        const items = Array.from(container.querySelectorAll('.ps5'));
                        container.insertBefore(draggedItem, targetIndex > draggedIndex ? target.nextSibling : target);

                        // Update indexes
                        items.forEach((item, index) => {
                            item.setAttribute('data-index', index);
                        });

                        // Optionally, send an AJAX request or update your data model here
                        updateComponentOrder(draggedIndex, targetIndex, itemIndex, itemType);
                    }
                }
            }
        });
    }
});

$(".color-twig").change(function() {
    let attr = $(this).attr("relation");
    if (typeof attr !== 'undefined' && attr !== false) {
        $('#' + $(this).attr("relation")).val($(this).val());
    }

});

document.addEventListener('DOMContentLoaded', () => {
    itemsDragger();
});
function itemsDragger(){
    const container = document.querySelector('.items_dragger');
    let draggedItem = null;

    if (container) {
        container.addEventListener('dragstart', (event) => {
            draggedItem = event.target;
            event.target.style.opacity = 0.5;
        });

        container.addEventListener('dragend', (event) => {
            event.target.style.opacity = 1;
            draggedItem = null;
        });

        container.addEventListener('dragover', (event) => {
            event.preventDefault();
            let target = event.target;
            while (target && !target.classList.contains('ps5')) {
                target = target.parentElement;
            }
            if (target && target.classList.contains('ps5')) {
                target.style.border = '2px dashed #505050';
                target.style.margin = '0'; // Ensure no margin is applied
                event.dataTransfer.dropEffect = 'move';
            }

        });

        container.addEventListener('dragenter', (event) => {
            let target = event.target;
            while (target && !target.classList.contains('ps5')) {
                target = target.parentElement;
            }
            if (target && target.classList.contains('ps5')) {
                target.style.border = '2px dashed #000';
                target.style.margin = '0'; // Ensure no margin is applied
                event.dataTransfer.dropEffect = 'move';
            }
        });

        container.addEventListener('dragleave', (event) => {
            let target = event.target;
            while (target && !target.classList.contains('ps5')) {
                target = target.parentElement;
            }
            if (target && target.classList.contains('ps5')) {
                target.style.border = '';
                target.style.margin = ''; // Reset margin
            }
        });

        container.addEventListener('drop', (event) => {
            event.preventDefault();
            let target = event.target;
            while (target && !target.classList.contains('ps5')) {
                target = target.parentElement;
            }
            if (target && target.classList.contains('ps5')) {
                target.style.border = '';
                target.style.margin = ''; // Reset margin after drop
                if (draggedItem && draggedItem !== target) {
                    const draggedIndex = parseInt(draggedItem.getAttribute('data-index'));
                    const targetIndex = parseInt(target.getAttribute('data-index'));

                    // Swap items
                    if (draggedIndex !== targetIndex) {
                        const items = Array.from(container.querySelectorAll('.ps5'));
                        container.insertBefore(draggedItem, targetIndex > draggedIndex ? target.nextSibling : target);

                        // Update indexes
                        items.forEach((item, index) => {
                            item.setAttribute('data-index', index);
                        });

                        // Optionally, send an AJAX request or update your data model here
                        updateItemsOrder(draggedIndex, targetIndex);
                    }
                }
            }
        });
    }
}

function fileToBase64(file, callback) {
    const reader = new FileReader();
    reader.onloadend = function() {
        callback(reader.result);
    };
    reader.readAsDataURL(file);
}
