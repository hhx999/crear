
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab
$("#incompletoBtn").hide();
var stepValid = 0;

function irTab(n) {
  var f = document.getElementsByClassName("tab");
  if (!validateForm()) return false;
  f[currentTab].style.display = "none";
  currentTab = n;
  showTab(n);
}


function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Enviar datos";
  } else {
    document.getElementById("nextBtn").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {

  if ($("#regForm").valid()) {
    console.log(stepValid);
  }


  var x = document.getElementsByClassName("tab");
  
  if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;

  if (currentTab >= x.length) {
    document.getElementById("regForm").submit();
    return false;
  }

  showTab(currentTab);
  // Subir
  $('html, body').animate({scrollTop:0}, 'fast');
}
function validateForm() {
  valid = false;
  if ($("#regForm").valid()) {
    valid = true;
    stepValid++;
   }
  if (stepValid == 2) {
    $("#incompletoBtn").show();
    stepValid = 0;
  }
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className = "step finish";
  } else {
    document.getElementsByClassName("step finish")[currentTab].className = " step active";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
function enviarForm() {
    if ($("#regForm").valid()) {
      document.getElementById("regForm").submit();
    } 
}


$.validator.addMethod('minStrict', function (value, el, param) {
    return value >= param;
});
$.validator.addMethod('maxStrict', function (value, el, param) {
    return value <= param;
});

