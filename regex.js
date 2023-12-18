

document.getElementById('floating_first_name').addEventListener('input', function() {
    const nomValue = this.value;
    const nomstyle = this;
    const regexnom = /^[A-Za-z]+$/;
  
    nomstyle.classList.remove('border-gray-300', 'border-red-300', 'border-green-300' ,'focus:border-blue-600' , 'focus:border-green-600' , 'focus:border-red-600');  
    if (!regexnom.test(nomValue)) {
      nomstyle.classList.add('border-red-300');
      nomstyle.classList.add('focus:border-red-600');

      showError('errorMessage');
    } else {
      nomstyle.classList.add('border-green-300');
      nomstyle.classList.add('focus:border-green-600');

      hideError('errorMessage');
    }
  });





  // Regex nom



  document.getElementById('floating_last_name').addEventListener('input', function() {
    const nomValue = this.value;
    const nomstyle = this;
    const regexnom = /^[A-Za-z]+$/;
  
    nomstyle.classList.remove('border-gray-300', 'border-red-300', 'border-green-300' ,'focus:border-blue-600' , 'focus:border-green-600' , 'focus:border-red-600');  
    if (!regexnom.test(nomValue)) {
      nomstyle.classList.add('border-red-300');
      nomstyle.classList.add('focus:border-red-600');

      showError('errormessage2');
    } else {
      nomstyle.classList.add('border-green-300');
      nomstyle.classList.add('focus:border-green-600');

      hideError('errormessage2');
    }
  });




   // Regex Email



   document.getElementById('floating_repeat_email').addEventListener('input', function() {
    const nomValue = this.value;
    const nomstyle = this;
    const regexnom = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
  
    nomstyle.classList.remove('border-gray-300', 'border-red-300', 'border-green-300' ,'focus:border-blue-600' , 'focus:border-green-600' , 'focus:border-red-600');  
    if (!regexnom.test(nomValue)) {
      nomstyle.classList.add('border-red-300');
      nomstyle.classList.add('focus:border-red-600');

      showError('errormessage3');
    } else {
      nomstyle.classList.add('border-green-300');
      nomstyle.classList.add('focus:border-green-600');

      hideError('errormessage3');
    }
  });




  // Regex telephone


  document.getElementById('floating_phone').addEventListener('input', function() {
    const nomValue = this.value;
    const nomstyle = this;
    const regexnom = /^(06|07|05)\d{8}$/;
  
    nomstyle.classList.remove('border-gray-300', 'border-red-300', 'border-green-300' ,'focus:border-blue-600' , 'focus:border-green-600' , 'focus:border-red-600');
  
    if (!regexnom.test(nomValue)) {
      nomstyle.classList.add('border-red-300');
      nomstyle.classList.add('focus:border-red-600');
      showError('errormessage4');
    } else {
      nomstyle.classList.add('border-green-300');
      nomstyle.classList.add('focus:border-green-600');
      hideError('errormessage4');
    }
  });



//   invalide messages


function showError(errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.classList.remove('hidden');
    errorElement.classList.add('block');

  }
  
  function hideError(errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.classList.add('hidden');
  }








































