<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Details and Reviews</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for styling -->
    <style>
        .service-details {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .star-rating-container {
            margin-bottom: 20px;
        }

        .star-rating {
            font-size: 1.5rem;
            color: #ffcc00;
        }

        .star {
            color: #ccc;
        }

        .star.filled {
            color: #ffcc00;
        }

        .review-form {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
        }

        .list-group-item {
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .form-select {
            width: 150px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <!-- Service Details -->
        <div class="service-details">
            <h2>{{ $service->Name }}</h2>
            <p><strong>Description:</strong> {{ $service->Description }}</p>
            <p><strong>Price:</strong> ${{ $service->Price }}</p>
            <p><strong>Location:</strong> {{ $service->location ? $service->location->Address : 'Location not available' }}</p>

            <!-- Display Average Rating as Stars -->
            <div class="star-rating-container">
                <label class="form-label"><p>Average Rating</p></label>
                <div class="star-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="star {{ $i <= $service->averageRating ? 'filled' : '' }}">&#9733;</span>
                    @endfor
                </div>
            </div>

            <!-- Star Rating Display -->
            <div class="star-rating-container">
                <div id="star-rating" class="star-rating">
                    <h5>Add a rating</h5>
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="star" data-value="{{ $i }}">&#9733;</span>
                    @endfor
                </div>
                <span class="rating-value" id="rating-value">0</span>
            </div>

            <!-- User Reviews -->
            <h3 class="mb-4">User Reviews</h3>
            <ul class="list-group">
                @forelse ($reviews as $review)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <strong>{{ $review->user->name }}</strong>
                            <div class="star-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $review->Rating ? 'filled' : '' }}">&#9733;</span>
                                @endfor
                            </div>
                        </div>
                        <p class="mt-2">{{ $review->Comment }}</p>
                    </li>
                @empty
                    <li class="list-group-item">No reviews available.</li>
                @endforelse
            </ul>

            <!-- Add Review Form -->
            <div class="review-form mt-4">
                <h4>Add a Review</h4>
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <input type="hidden" id="rating-input" name="rating">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea id="comment" name="comment" rows="4" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional JavaScript to handle star rating interaction -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const stars = document.querySelectorAll('#star-rating .star');
            const ratingValue = document.getElementById('rating-value');
            const ratingInput = document.getElementById('rating-input');

            stars.forEach(star => {
                star.addEventListener('mouseover', () => {
                    const value = star.getAttribute('data-value');
                    updateStars(value);
                });

                star.addEventListener('mouseout', () => {
                    const currentRating = ratingInput.value || 0;
                    updateStars(currentRating);
                });

                star.addEventListener('click', () => {
                    const value = star.getAttribute('data-value');
                    ratingInput.value = value;
                    ratingValue.textContent = value;
                });
            });

            function updateStars(rating) {
                stars.forEach(star => {
                    const value = star.getAttribute('data-value');
                    if (value <= rating) {
                        star.classList.add('filled');
                    } else {
                        star.classList.remove('filled');
                    }
                });
            }
        });
    </script>

</body>

</html>
