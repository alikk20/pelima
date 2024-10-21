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
     document.querySelectorAll('.faq h3').forEach(faq => {
         faq.addEventListener('click', () => {
             faq.parentElement.classList.toggle('active');
         });
     });