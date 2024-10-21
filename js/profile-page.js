function showTab(tabName) {
         var tabs = document.getElementsByClassName('tab-content');
         for (var i = 0; i < tabs.length; i++) {
             tabs[i].classList.remove('active');
         }
         document.getElementById(tabName).classList.add('active');

         var tabButtons = document.getElementsByClassName('tab-button');
         for (var i = 0; i < tabButtons.length; i++) {
             tabButtons[i].classList.remove('active');
         }
         document.getElementById(tabName + '-button').classList.add('active');
     }
     function togglePasswordVisibility(inputId, icon) {
         const input = document.getElementById(inputId);
         if (input.type === "password") {
             input.type = "text";
             icon.classList.remove("fa-eye");
             icon.classList.add("fa-eye-slash");
         } else {
             input.type = "password";
             icon.classList.remove("fa-eye-slash");
             icon.classList.add("fa-eye");
         }
     }

     function showEditForm(formId) {
         var forms = document.getElementsByClassName('edit-form');
         for (var i = 0; i < forms.length; i++) {
             forms[i].style.display = 'none';
         }
         document.getElementById(formId).style.display = 'block';
     }
     function showAddAddressForm() {
         document.getElementById('add-address-form').style.display = 'block';
     }
