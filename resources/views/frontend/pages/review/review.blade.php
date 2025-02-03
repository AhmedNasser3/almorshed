<div class="reviews">
    <h3>التقييمات</h3>
    @foreach ($reviews as $review)
    <div class="review_item">
        <div class="review_rating">
            @for ($i = 0; $i < $review->rating; $i++)
                <i class="fa-solid fa-star"></i>
            @endfor
        </div>
        <p>{{ $review->review }}</p>
        <p><small>تاريخ: {{ $review->created_at->format('d/m/Y') }}</small></p>
    </div>
    @endforeach
</div>

<!-- نموذج إضافة تقييم -->
<div class="review_box">
    <form action="{{ route('reviews.store', $services->id) }}" method="POST">
        @csrf
        <div class="rating_section">
            <label for="rating">التقييم:</label>
            <div class="review_stars_icons">
                <input type="radio" name="rating" value="1" id="star1"><label for="star1" class="star">&#9733;</label>
                <input type="radio" name="rating" value="2" id="star2"><label for="star2" class="star">&#9733;</label>
                <input type="radio" name="rating" value="3" id="star3"><label for="star3" class="star">&#9733;</label>
                <input type="radio" name="rating" value="4" id="star4"><label for="star4" class="star">&#9733;</label>
                <input type="radio" name="rating" value="5" id="star5"><label for="star5" class="star">&#9733;</label>
            </div>
        </div>
        <div class="review_text_section">
            <label for="review">مراجعتك:</label>
            <textarea name="review" id="review" placeholder="اكتب هنا..." rows="5"></textarea>
        </div>
        <button type="submit" class="submit_btn">إرسال التقييم</button>
    </form>
</div>
