const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
});
});

prevBtns.forEach((btn) => {
btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
});
});

function updateFormSteps() {
formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
    formStep.classList.remove("form-step-active");
});

formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
    progressStep.classList.add("progress-step-active");
    } else {
    progressStep.classList.remove("progress-step-active");
    }
});

const progressActive = document.querySelectorAll(".progress-step-active");

progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}
/*  ==========================================
      SHOW UPLOADED IMAGE
  * ========================================== */
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#imageResult')
                  .attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }

  $(function () {
      $('#upload').on('change', function () {
          readURL(input);
      });
  });

  /*  ==========================================
      SHOW UPLOADED IMAGE NAME
  * ========================================== */
  var input = document.getElementById( 'upload' );
  var infoArea = document.getElementById( 'upload-label' );

  input.addEventListener( 'change', showFileName );
  function showFileName( event ) {
    var input = event.srcElement;
    var fileName = input.files[0].name;
    infoArea.textContent = 'Archivo: ' + fileName;
  }