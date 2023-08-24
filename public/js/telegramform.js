(function ($) {
  $(".contact-form").submit(function (event) {
    event.preventDefault();

    // Сообщения формы
    let successSendText = "Сообщение успешно отправлено";
    let errorSendText = "Сообщение не отправлено. Попробуйте еще раз!";
    let requiredFieldsText = "Пожалуста, заполните все поля!";

    // Сохраняем в переменную класс с параграфом для вывода сообщений об отправке
    let message = $(this).find(".contact-form__message");

    let form = $("#" + $(this).attr("id"))[0];
    let fd = new FormData(form);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/send",
      type: "POST",
      data: fd,
      processData: false,
      contentType: false,
      beforeSend: () => {
        $(".preloader").addClass("preloader_active");
      },
      success: function success(res) {
        $(".preloader").removeClass("preloader_active");

        console.log(res);

        let respond = $.parseJSON(res);

        if (respond === "SUCCESS") {
          message.text(successSendText).css("color", "#21d4bb");
          setTimeout(() => {
            message.text("");
          }, 4000);
        } else if (respond === "NOTVALID") {
          message.text(requiredFieldsText).css("color", "#d42121");
          setTimeout(() => {
            message.text("");
          }, 3000);
        } else {
          message.text(errorSendText).css("color", "#d42121");
          setTimeout(() => {
            message.text("");
          }, 4000);
        }
      }
    });
  });
  $(".backCall").submit(function (event) {

    event.preventDefault();

    let successSendText = "Сообщение успешно отправлено";
    let errorSendText = "Сообщение не отправлено. Попробуйте еще раз!";
    let requiredFieldsText = "Пожалуйста, заполните все поля!";

    let message = $(this).find(".contact-form__message");

    let form = $("#" + $(this).attr("id"))[0];
    let fd = new FormData(form);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/backCall",
      type: "POST",
      data: fd,
      processData: false,
      contentType: false,

      success: function success(res) {

        let respond = $.parseJSON(res);

        if (respond === "SUCCESS") {
          message.text(successSendText).css("color", "#21d4bb");
          setTimeout(() => {
            message.text("");
          }, 4000);
        } else if (respond === "NOTVALID") {
          message.text(requiredFieldsText).css("color", "#d42121");
          setTimeout(() => {
            message.text("");
          }, 3000);
        } else {
          message.text(errorSendText).css("color", "#d42121");
          setTimeout(() => {
            message.text("");
          }, 4000);
        }
      }
    });
  });

  $(".question").submit(function (event) {

    event.preventDefault();

    let successSendText = "Сообщение успешно отправлено";
    let errorSendText = "Сообщение не отправлено. Попробуйте еще раз!";
    let requiredFieldsText = "Пожалуйста, заполните все поля!";

    let message = $(this).find(".contact-form__message");

    let form = $("#" + $(this).attr("id"))[0];
    let fd = new FormData(form);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/question",
      type: "POST",
      data: fd,
      processData: false,
      contentType: false,

      success: function success(res) {

        let respond = $.parseJSON(res);

        if (respond === "SUCCESS") {
          message.text(successSendText).css("color", "#21d4bb");
          setTimeout(() => {
            message.text("");
          }, 4000);
        } else if (respond === "NOTVALID") {
          message.text(requiredFieldsText).css("color", "#d42121");
          setTimeout(() => {
            message.text("");
          }, 3000);
        } else {
          message.text(errorSendText).css("color", "#d42121");
          setTimeout(() => {
            message.text("");
          }, 4000);
        }
      }
    });
  });

})(jQuery);