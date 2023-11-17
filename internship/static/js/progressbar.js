const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

function nextStep() {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
}

function previousStep() {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
}

nextBtns.forEach((btn) => {
    btn.addEventListener("click", nextStep);
});

prevBtns.forEach((btn) => {
    btn.addEventListener("click", previousStep);
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


document.querySelectorAll(".progress-step").forEach(el => el.addEventListener("click", function() {
    target = this.dataset.target
    if (target < formStepsNum) {
        formStepsNum = target
        updateFormSteps()
        updateProgressbar()
    }
}))


