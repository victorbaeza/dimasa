/**
 * CUSTOM SCRIPTS - ECOMMERCE BACKEND | Joaquín Xia
 * version 1.0
 *
 */

function orderColumn(){
   $('.order').click(function(){
       const order_col = $(this).data('order_col');
       const order = $(this).data('order');
       $('#order_col').val(order_col);
        $('#order').val(order);
        $('#searchForm').submit();
   });
}

function toggleLanguageInputs(useRichText = true){
    if(useRichText)
        toggleRichText();

    const $navLanguages = $('.js-lang');
    $navLanguages.on('click', function(event){
        const language = $(event.target).data('id');
        const activeLanguageSelector = `[data-lang=${language}]`;
        //primero se tiene que destruir la instancia del richtext que agregar la clase de d-none para que el richtext anterior se oculte
        if(useRichText)
            toggleRichText(activeLanguageSelector);

        $('.js-translatable').addClass('d-none');
        $(activeLanguageSelector).removeClass('d-none');
    })
}

function toggleRichText(selector){
    if(selector){
        tinymce.remove();
        initTinymce('.js-rich-text'+ selector);
    }else{
        $('.js-rich-text').each(function(){
            //solo inicializar para la clase activa
            if(!$(this).hasClass('d-none')) {
                initTinymce("[name='" + this.name + "']");
            }
        });
    }
}

const MAX_IMAGE_SIZE = 10485760;
function initTinymce(selector){
    tinymce.init({
        selector: selector,
        height: 500,
        plugins: "advlist autolink lists link image preview searchreplace visualblocks fullscreen insertdatetime media table paste imagetools",
        toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        language: 'es',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ],
        relative_urls: false,
        image_title: true,
        file_picker_types: 'image',
        images_upload_base_path: '/storage',
        file_picker_callback: function(cb) {
            let input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                let file = this.files[0];

                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    const id = 'blobid' + (new Date()).getTime();
                    const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    const base64 = reader.result.split(',')[1];
                    const blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            input.click();
        },
        images_upload_handler: function(blobInfo, success, failure, progress){
            const imageSize = blobInfo.blob().size;

            if(imageSize > MAX_IMAGE_SIZE){
                failure('La imagen debe ser máximo de 10MB');
                return;
            }

            let xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/ajax/upload');

            xhr.upload.onprogress = function (e) {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = function() {
                let json;

                if (xhr.status < 200 || xhr.status >= 300) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            xhr.onerror = function () {
                failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        }
    });
}

function limitImageSize(){
    $('.js-image-input').on('change', function() {
        for(let i = 0; i < this.files.length; i++){
            if(this.files[i].size > MAX_IMAGE_SIZE){
                alert('La imagen debe ser máximo de 10MB');
                this.value = "";
                return;
            }
        }
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.js-image-label').addClass("selected").html(fileName);
    });
}

let lastLanguage = "";

function toggleKeywordsInput(){
    $('.js-lang').on('click', function(){
        const language = $(event.target).data('id');
        const activeLanguageSelector = `[data-lang=${language}]`;
        toggleKeywordsSelect2(activeLanguageSelector);
        lastLanguage = language;
    })

    $(`.js-select2-keywords`).each(function(){
        //solo inicializar para la clase activa
        if(!$(this).hasClass('d-none')) {
            initKeywordsSelect2(this);
            lastLanguage = $(this).data('lang');
        }
    });

    function initKeywordsSelect2(selector){
        $(selector).select2({
            tags: true,
            tokenSeparators: [','],
            closeOnSelect: false,
        })
    }

    function toggleKeywordsSelect2(selector){
        $('.js-select2-keywords' + `[data-lang=${lastLanguage}]`).select2('destroy');
        initKeywordsSelect2('.js-select2-keywords'+selector)
    }
}





$(document).ready(function () {
    iniBotonesAlertas();

});

function iniBotonesAlertas(){
	$(".btn_alert").click(function (e){
		e.preventDefault();
		var linkAddress = $(this).attr('href');
		$('#confirmationLink').attr('href',linkAddress);
		swal({
			  title: "¿Estás seguro?",
			  html: "Ya no podrás volver atrás",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Si, estoy seguro!",
			  cancelButtonText: "No",
			  closeOnConfirm: false
			},
			function(){
				location.href = linkAddress;
			});
	});
}


function orderColumn(){
  $('.order').click(function(){
    var order_col = $(this).data('order_col');
    var order = $(this).data('order');
    $('#order_col').val(order_col);
    $('#order').val(order);
    $('#mainForm').submit();
  });
}


/*
  Selects 2.4
*/
function select4client(){
  var currentQuery;

  $('.select4client').select2({
  	ajax: {
  	url: '/ajax/select/clients',
  	dataType: 'json',
  	delay: 250,
  		data: function (params) {
  			var query = {
  				search: params.term,
  				page: params.page || 1,
  			}
  			return query;
  		},
  	},
  	placeholder: 'Seleccione un cliente',
  });

  $('.select4client').on('select2:open', function () {
    // var cliente = $(this).find(':selected').text();
    // $('.select2-search__field').val(cliente).change();
    if(currentQuery) $('.select2-search__field').val(currentQuery).change().trigger();
  });

  $('.select4client').on('select2:closing', function(){
    currentQuery = $('.select2-search input').prop('value');
  });
}

function select4vendor(){
  var currentQuery;

  $('.select4vendor').select2({
    ajax: {
    url: '/ajax/select/vendors',
    dataType: 'json',
    delay: 250,
      data: function (params) {
        var query = {
          search: params.term,
          page: params.page || 1,
        }
        return query;
      },
    },
    placeholder: 'Selecciona un proveedor',
  });

  $('.select4vendor').on('select2:open', function () {
    if(currentQuery) $('.select2-search__field').val(currentQuery).change().trigger();
  });

  $('.select4vendor').on('select2:closing', function(){
    currentQuery = $('.select2-search input').prop('value');
  });
}

function select4user(){
  var currentQuery;

  $('.select4user').select2({
  	ajax: {
  	url: '/ajax/select/users',
  	dataType: 'json',
  	delay: 250,
  		data: function (params) {
  			var query = {
  				search: params.term,
  				page: params.page || 1,
  			}
  			return query;
  		},
  	},
  	placeholder: 'Seleccione un usuario',
  });

  $('.select4user').on('select2:open', function () {
    if(currentQuery) $('.select2-search__field').val(currentQuery).change().trigger();
  });

  $('.select4user').on('select2:closing', function(){
    currentQuery = $('.select2-search input').prop('value');
  });
}


function select4product(){
  var currentQuery;

	$('.select4product').select2({
		ajax: {
		url: '/ajax/select/products',
		dataType: 'json',
		delay: 250,
			data: function (params) {
				var query = {
					search: params.term,
					page: params.page || 1,
				}
				return query;
			},
		},
		placeholder: 'Selecciona un producto',
	});

  $('.select4product').on('select2:open', function () {
    if(currentQuery) $('.select2-search__field').val(currentQuery).change().trigger();
  });

  $('.select4product').on('select2:closing', function(){
    currentQuery = $('.select2-search input').prop('value');
  });
}


function select4paymentform(){
  var currentQuery;

	$('.select4paymentform').select2({
		ajax: {
		url: '/ajax/select/payment_forms',
		dataType: 'json',
		delay: 250,
			data: function (params) {
				var query = {
					search: params.term,
					page: params.page || 1,
				}
				return query;
			},
		},
		placeholder: 'Selecciona una forma de pago',
	});

  $('.select4paymentform').on('select2:open', function () {
    if(currentQuery) $('.select2-search__field').val(currentQuery).change().trigger();
  });

  $('.select4paymentform').on('select2:closing', function(){
    currentQuery = $('.select2-search input').prop('value');
  });
}


function select4purchasepaymentform(){
  var currentQuery;

	$('.select4purchasepaymentform').select2({
		ajax: {
		url: '/ajax/select/purchase_payment_forms',
		dataType: 'json',
		delay: 250,
			data: function (params) {
				var query = {
					search: params.term,
					page: params.page || 1,
				}
				return query;
			},
		},
		placeholder: 'Selecciona una forma de pago',
	});

  $('.select4paymentform').on('select2:open', function () {
    if(currentQuery) $('.select2-search__field').val(currentQuery).change().trigger();
  });

  $('.select4paymentform').on('select2:closing', function(){
    currentQuery = $('.select2-search input').prop('value');
  });
}
