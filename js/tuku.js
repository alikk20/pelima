let slideIndex = 0;

     function showSlides(n) {
         const slides = document.getElementsByClassName("slide");
         if (n >= slides.length) {
             slideIndex = 0;
         }
         if (n < 0) {
             slideIndex = slides.length - 1;
         }
         for (let i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";
         }
         slides[slideIndex].style.display = "block";
     }

     function nextSlide() {
         showSlides(slideIndex += 1);
     }

     function prevSlide() {
         showSlides(slideIndex -= 1);
     }

     window.onload = function() {
         showSlides(slideIndex);
     };

     function increaseQuantity() {
         var quantityInput = document.getElementById('quantity');
         var currentValue = parseInt(quantityInput.value);
         quantityInput.value = currentValue + 1;
     }

     function decreaseQuantity() {
         var quantityInput = document.getElementById('quantity');
         var currentValue = parseInt(quantityInput.value);
         if (currentValue > 1) {
             quantityInput.value = currentValue - 1;
         }
     }

     function showDetails() {
         document.getElementById('details-tab').classList.add('active');
         document.getElementById('reviews-tab').classList.remove('active');
         document.getElementById('details-content').style.display = 'flex';
         document.getElementById('reviews-content').style.display = 'none';
     }

     function showReviews() {
         document.getElementById('details-tab').classList.remove('active');
         document.getElementById('reviews-tab').classList.add('active');
         document.getElementById('details-content').style.display = 'none';
         document.getElementById('reviews-content').style.display = 'flex';
     }
     let currentRating = 0;

     function showReplyBox(element) {
     const replyBox = element.nextElementSibling;
     replyBox.style.display = replyBox.style.display === 'none' ? 'block' : 'none';
 }

 function setRating(element, rating) {
     currentRating = rating;
     const stars = document.querySelectorAll('.rating-input i');
     stars.forEach((star, index) => {
         star.classList.toggle('selected', index < rating);
     });
 }


function submitComment() {
 const commentText = document.querySelector('.comment-form textarea').value;

 if (commentText && currentRating > 0) {
     alert(`Comment Submitted:\nText: ${commentText}\nRating: ${currentRating} stars`);
 } else {
     alert('Please enter a comment and provide a rating.');
 }
}


function showTab(tab) {
         document.getElementById('details').classList.remove('active');
         document.getElementById('specification').classList.remove('active');
         document.querySelector('.tabs .active').classList.remove('active');
         document.getElementById(tab).classList.add('active');
         document.querySelector('.tabs span[onclick="showTab(\'' + tab + '\')"]').classList.add('active');
     }

     function changeImage(newSrc) {
        document.getElementById('mainImage').src = newSrc;
      }
     

     function showMoreThumbnails() {
        const moreThumbnails = `
         <img alt="Thumbnail 4" height="60" onclick="changeImage('Screenshot 2024-10-09 093055.png')" src="Screenshot 2024-10-09 093055.png" width="60"/>
        <img alt="Thumbnail 5" height="60" onclick="changeImage('Screenshot 2024-10-09 093055.png')" src="Screenshot 2024-10-09 093055.png" width="60"/>
         <img alt="Thumbnail 6" height="60" onclick="changeImage('download__1_-removebg-preview.png')" src="download__1_-removebg-preview.png" width="60" />
         <img alt="Thumbnail 7" height="60" onclick="changeImage('Screenshot 2024-10-15 074525.png')" src="Screenshot 2024-10-15 074525.png" width="60" />
        `;
        document.getElementById('thumbnails').innerHTML += moreThumbnails;
        document.getElementById('moreButton').style.display = 'none';
        
    }

