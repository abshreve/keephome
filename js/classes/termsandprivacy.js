export default class Terms_and_privacy {
  constructor() {

  $(".legal").show();
  $(".plain_english").hide();
  $(".legal_label").show();
  $(".plain_english_label").hide();


    $("#customSwitches").change(function () {
      if (this.checked) {
        $(".legal").hide();
        $(".plain_english").show();
        $(".legal_label").hide();
        $(".plain_english_label").show();
      } else {
        $(".legal").show();
        $(".plain_english").hide();
        $(".legal_label").show();
        $(".plain_english_label").hide();
      }
    })
}
}

jQuery(document).ready(function() {
  new Terms_and_privacy();
});
