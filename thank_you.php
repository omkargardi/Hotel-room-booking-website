<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> <!-- Beautiful Font -->
   <style> 
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Arial', sans-serif;
}

body {
  background: linear-gradient(120deg, #fef3c7, #fed7aa);
  color: #1f2937;
  line-height: 1.7;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  padding: 20px;
}

/* Container for the entire section */
.container {
  max-width: 700px;
  background: #fffaf0;
  border-radius: 20px;
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
  padding: 50px;
  text-align: center;
  animation: popIn 0.7s ease-out;
}

/* Pop-in animation */
@keyframes popIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}

/* Confirmation Message */
.confirmation {
  margin-bottom: 40px;
}

.confirmation h1 {
  font-size: 30px;
  color: #7c2d12;
  margin-bottom: 15px;
  font-family: 'Pacifico', cursive;
  letter-spacing: 1px;
}

.confirmation p {
  font-size: 17px;
  color: #6b7280;
}

/* Review Form */
.review-form {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.review-form h2 {
  font-size: 24px;
  color: #7c2d12;
  margin-bottom: 15px;
  font-weight: 700;
}

.review-form label {
  font-size: 16px;
  font-weight: 600;
  color: #4b5563;
  text-align: left;
}

.review-form input,
.review-form textarea {
  width: 100%;
  padding: 15px;
  border: 2px solid #f3e8ff;
  border-radius: 12px;
  font-size: 16px;
  background: #fefce8;
  transition: all 0.3s ease;
}

.review-form input:focus,
.review-form textarea:focus {
  outline: none;
  border-color: #c2410c;
  background: #ffffff;
  box-shadow: 0 0 10px rgba(194, 65, 12, 0.2);
}

.review-form textarea {
  resize: vertical;
  min-height: 130px;
}

/* Star Rating */
.star-rating {
  display: flex;
  justify-content: center;
  gap: 15px;
  margin: 20px 0;
}

.star-rating input {
  display: none;
}

.star-rating label {
  font-size: 30px;
  color: #d1d5db;
  cursor: pointer;
  transition: all 0.3s ease;
}

.star-rating input:checked ~ label,
.star-rating label:hover,
.star-rating label:hover ~ label {
  color: #f59e0b;
  transform: rotate(10deg) scale(1.2);
}

/* Submit Button */
.submit-btn {
  background: linear-gradient(90deg, #c2410c, #f97316);
  color: #ffffff;
  padding: 15px 30px;
  border: none;
  border-radius: 12px;
  font-size: 17px;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.3s ease;
}

.submit-btn:hover {
  background: linear-gradient(90deg, #9a3412, #ea580c);
  transform: translateY(-4px);
  box-shadow: 0 6px 20px rgba(194, 65, 12, 0.3);
}

.submit-btn:active {
  transform: translateY(0);
  box-shadow: none;
}

/* Back to Home Link */
.back-home {
  margin-top: 30px;
}

.back-home a {
  text-decoration: none;
  color: #c2410c;
  font-size: 17px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.back-home a:hover {
  color: #9a3412;
  text-decoration: underline;
  transform: translateX(8px);
}

/* Responsive Design */
@media (max-width: 480px) {
  .container {
    padding: 30px;
  }

  .confirmation h1 {
    font-size: 26px;
  }

  .confirmation p {
    font-size: 15px;
  }

  .review-form h2 {
    font-size: 22px;
  }

  .review-form input,
  .review-form textarea {
    padding: 12px;
  }

  .submit-btn {
    padding: 12px 20px;
    font-size: 16px;
  }
}
</style>
</head>
<body>
<div class="container">
  <div class="confirmation">
    <h1>Thank You for Booking!</h1>
    <p>Your booking & payment has been successfully confirmed. We look forward to hosting you!</p>
  </div>
  <form class="review-form" action="./submit_review.php" method="post">
  <form class="review-form">
    <h2>Leave a Review</h2>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment" required></textarea>
    <label>Rating (1-5):</label>
    <div class="star-rating">
      <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
      <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
      <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
      <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
      <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
    </div>
    <button type="submit" class="submit-btn">Submit Review</button>
    
  </form>
  <div class="back-home">
    <a href="./index.php">Back to Home</a>
  </div>
</div>
  <script>
        function loadGuestReviews() {
            fetch('get_reviews.php')
                .then(response => response.json())
                .then(reviews => {
                    const testimonialContent = document.getElementById('guestbook-reviews');
                    const testimonialAuthors = document.getElementById('guestbook-authors');
    
                    testimonialContent.innerHTML = '';
                    testimonialAuthors.innerHTML = '';
    
                    reviews.forEach((review, index) => {
                        const isActive = index === 0 ? 'show active' : '';
    
                        // Create testimonial content
                        const testimonialDiv = document.createElement('div');
                        testimonialDiv.classList.add('tab-pane', 'fade', isActive);
                        testimonialDiv.id = `testimonial-${review.id}`;
                        testimonialDiv.setAttribute('role', 'tabpanel');
                        testimonialDiv.innerHTML = `
                            <div class="single-testimonial-item">
                                <span class="test-date">${formatDate(review.date)}</span>
                                <div class="test-rating">
                                    ${renderStars(review.rating)}
                                </div>
                                <h4>${review.headline || ''}</h4>
                                <p>${review.comment}</p>
                            </div>
                        `;
                        testimonialContent.appendChild(testimonialDiv);
    
                        // Create author tab
                        const authorLi = document.createElement('li');
                        authorLi.innerHTML = `
                            <a data-toggle="tab" href="#testimonial-${review.id}" role="tab" class="${isActive}">
                                <div class="author-pic">
                                    <img src="img/default-guest.png.jpeg" alt="${review.name}">
                                </div>
                                <div class="author-text">
                                    <h5>${review.name}<span>${review.location || ''}</span></h5>
                                </div>
                            </a>
                        `;
                        testimonialAuthors.appendChild(authorLi);
                    });
                })
                .catch(error => console.error('Error fetching reviews:', error));
        }
    
        function formatDate(dateTimeString) {
            const date = new Date(dateTimeString);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        }
    
        function renderStars(rating) {
            let stars = '';
            for (let i = 0; i < rating; i++) {
                stars += '<i class="fa fa-star"></i>';
            }
            return stars;
        }
    
        function submitNewReview() {
            const formData = new FormData(document.getElementById('newReviewForm'));
    
            fetch('submit_review.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                document.getElementById('newReviewForm').reset();
                loadGuestReviews(); // Reload to show the new review
            })
            .catch(error => console.error('Error submitting review:', error));
        }
    
        document.addEventListener('DOMContentLoaded', loadGuestReviews);
    </script>
        
    </div>
</body>
</html>
